@extends('layouts.app')

@section('template_title')
    List Permohonan Verifikasi Akun
@endsection

@section('template_linked_css')
    @if (config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }

        .users-table tr td:first-child {
            padding-left: 20px;
        }

        .users-table tr td:last-child {
            padding-right: 1px;
        }

        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                List Permohonan Verifikasi Akun
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('usersmanagement.users-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        {!! trans('usersmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/users/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('usersmanagement.show-deleted-users') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if (config('usersmanagement.enableSearchUsers'))
                            @include('partials.search-users-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('usersmanagement.users-table.caption', 1, ['userscount' => $verification_list->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama User</th>
                                        <th class="">Alamat</th>
                                        <th class="">Nomor Handphone</th>
                                        <th class="">Lampiran</th>
                                        <th class="">Status</th>
                                        <th class="no-search no-sort">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach ($verification_list as $verification)
                                        <tr>
                                            <td>{{ $verification->id }}</td>
                                            <td>{{ $verification->user->name }}</td>
                                            <td>{{ $verification->address }}</td>
                                            <td>{{ $verification->phone }}</td>
                                            <td>
                                                @if ($verification != null && $verification->attachment != '')
                                                    {!! \Helper::get_lampiran($verification->attachment) !!}
                                                    <br>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($verification->is_verified == 1)
                                                    <span class="badge badge-success">Verified User</span>
                                                @else
                                                    <span class="badge badge-warning">Waiting Verification</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($verification->is_verified == 1)
                                                    Already Verified
                                                @else
                                                    <form
                                                        action="{{ route('public.verification.verify', $verification->user_id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('PUT')

                                                        <button class="btn btn-sm btn-primary buttonDeletion"> <i
                                                                data-feather="trash-2" class="w-4 h-4 mr-1"></i> Verify Now
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if (config('usersmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if (config('usersmanagement.enablePagination'))
                                {{ $verification_list->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')

    <script>
        $(document).on('click', '.buttonDeletion', function(e) {
            e.preventDefault();
            let form = $(this).parents('form');

            if (confirm('Yakin diverifikasi ?')) {
                form.submit();
            }
        })
    </script>

    @if (count($verification_list) > config('usersmanagement.datatablesJsStartCount') && config('usersmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if (config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if (config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
