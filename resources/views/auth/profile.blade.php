@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Profile') }}</div>
                <div class="card-body text-center">
                    <div class="text-center">
                        <img width="100px" height="100px" src="{{ asset('images/avatars/'.$user->avatar) }}">
                    </div>
                    
                    <form enctype="multipart/form-data">
                        <div>
                            <h5 for="name" >{{ __('Name') }}</h5>
                            <p> {{ $user->name }}</p>
                        </div>
                        <div>
                            <h5 for="email" >{{ __('Email') }}</h5>
                            <p> {{ $user->email }}</p>
                        </div>
                        <div>
                            <h5 for="desc" >{{ __('Desction') }}</h5>
                            <p> {{ $user->desc }}</p>
                        </div>
                        <br>
                        <div class="col-md-12 text-center">
                            <a class="btn btn-link pull-right" href="{{ route('profile.edit') }}"><i class="fas fa-backward"></i> Edit Profile</a>
                        </div>
                        @include('shared.error')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection