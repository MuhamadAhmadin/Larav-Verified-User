@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp

<div class="card">
    <div class="card-header @role('admin', true) bg-secondary text-black @endrole">
        @role('admin', true)
            <span class="pull-right badge badge-primary" style="margin-top:4px">
                Admin Access
            </span>
        @else
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <b>Hi {{ Auth::user()->name }}, </b><em>Welcome to</em> COD-IN.ID <strong>Don't forget for get verification on your account!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endrole

    </div>
    <div class="card-body">
        <h2 class="lead">
            {{ trans('auth.loggedIn') }}
        </h2>
        <p>
            <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=laravel-auth&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 0px 0 -3px .5em;"></iframe>
        </p>
        <p>
            This page route is protected by <code>activated</code> middleware. Only accounts with activated emails are able pass this middleware.
        </p>

    </div>
</div>
