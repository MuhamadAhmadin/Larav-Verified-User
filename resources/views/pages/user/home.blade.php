@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 offset-lg-1">
                        @role('verified', true)
                        <h1>Is Verified</h1>
        @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <b>Hi {{ Auth::user()->name }}, </b><em>Welcome to</em> COD-IN.ID <strong>Don't forget for get verification on your account!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endrole
        @include('panels.welcome-panel')
        <br>
        <p class="h4" style="">Quick actions</p>
            <div class="card-deck">
                <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                </div>
                </div>
                <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>

                </div>
                </div>
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>

                </div>
                </div>
            </div>
            <br>
            <p class="h4" style="">Account set-up</p>
            <div class="card-deck">
                <div class="card"><a href="{{ url('profile/'.Auth::user()->name . '/edit') }}" style="text-decoration:none;">
                    <div class="card-header bg-light-success text-white text-center">
                        <img src="{{ asset('media/authentication.svg') }}" text-white  width="50" height="50" class="card-img-top"></div>
                    <p class="card-text text-center text-black" >Enable 2FA</p>
                    <p class="text-sm text-center text-black" >Enable 2FA on your account</p></a>
                </div>

                <div class="card"><a href="{{ url('profile/'.Auth::user()->name . '/edit') }}" style="text-decoration:none;">
                    <div class="card-header bg-light-danger text-white text-center">
                        <img src="{{ asset('media/edit.svg') }}" text-white  width="50" height="50" class="card-img-top"></div>
                    <p class="card-text text-center text-black" >Edit Profile Details</p>
                    <p class="text-sm text-center text-black" >Edit your profile details</p></a>
                </div>

            </div>
            <br>



            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
<script type="text/javascript">

</script>
