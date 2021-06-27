@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ $user->name }}</div>
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
                        <div>
                            <h5 for="desc" >{{ __('Role') }}</h5>
                            <p>
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}   ||
                                @endforeach
                            </p>
                        </div>
                        <div>

                        </div>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
