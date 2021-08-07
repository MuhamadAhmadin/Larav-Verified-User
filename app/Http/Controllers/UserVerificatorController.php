<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use App\Models\UserVerificator;
use App\Traits\CaptureIpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use jeremykenedy\LaravelRoles\Models\Role;

class UserVerificatorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $themes = Theme::where('status', 1)
        ->orderBy('name', 'asc')
        ->get();

        $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'title' => 'Verifikasi Akun Anda',
            'user' => $user,
            'user'         => $user,
            'themes'       => $themes,
            'currentTheme' => $currentTheme,
        ];

        if ($user->verification != null) {
            $verification = new UserVerificator();
            $data['verification'] = $user->verification;
        }

        if (Auth::user()->isAdmin()) {
            $paginationEnabled = config('usersmanagement.enablePagination');
            if ($paginationEnabled) {
                $data['verification_list'] = UserVerificator::paginate(config('usersmanagement.paginateListSize'));
            } else {
                $data['verification_list'] = UserVerificator::all();
            }

            return view('pages.user.verification_list', $data);
        }

        return view('pages.user.verification', $data);
    }

    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->only('user_id', 'address', 'phone');
        $user_id = $request->user_id;
        $address = $request->address;
        $phone = $request->phone;


        $ipAddress = new CaptureIpTrait();

        if ($user->verification === null) {
            $verification = new UserVerificator();
            $verification->user_id = $user_id;
            $verification->address = $address;
            $verification->phone = $phone;
            if($request->hasFile('attachment')) {
                $filename = Str::random(64) . '.' . $request->file('attachment')->getClientOriginalExtension();
                $attachment_path = $request->file('attachment')->storeAs('public/attachment', $filename);
            }

            $verification->attachment = (isset($attachment_path) ? $attachment_path : '');
            $verification->save();
        } else {

            if($request->hasFile('attachment')) {
                $filename = Str::random(64) . '.' . $request->file('attachment')->getClientOriginalExtension();
                $attachment_path = $request->file('attachment')->storeAs('public/attachment', $filename);
            }

            $user->verification->attachment = (isset($attachment_path) ? $attachment_path : '');
            $user->verification->fill($input)->save();
        }

        $user->updated_ip_address = $ipAddress->getClientIp();
        $user->save();

        // return redirect('profile/'.$user->name.'/edit')->with('success', trans('profile.updateSuccess'));
        return redirect()->back()->with('success', 'Berhasil mengirimkan permohonan verifikasi');
    }

    // Verify the account
    public function verify(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // dd($user);

        $verification = UserVerificator::where('user_id', $user->id)->first();
        $verification->is_verified = 1;
        $verification->save();

        $role = Role::where('slug', '=', 'verified')->first();
        $user->detachAllRoles();
        $user->attachRole($role);
        $user->save();

        return redirect()->back()->with('success', 'Berhasil diverifikasi');
    }
}
