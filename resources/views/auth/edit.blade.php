@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Profile') }}</div>
                <div class="card-body">
                    <img width="100px" height="100px" src="{{ asset('images/avatars/'.$user->avatar) }}">
                    
                    <form enctype="multipart/form-data" method="POST" action="{{ route('profile.update') }}" >
                        @csrf
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif

                        <div>
                            <input type="file" name="avatar" class="form-controll">
                        </div>
                        
                        <div>
                            <label for="name" >{{ __('Name') }}</label>
                            <input type="name" name="name" class="form-control"  value="{{ $user->name }}">
                        </div>
                        <div>
                            <label for="email" >{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control"  value="{{ $user->email }}">
                        </div>
                        <div>
                            <label for="desc" >{{ __('Desction') }}</label>
                            <input type="desc" name="desc" class="form-control" value="{{ $user->desc }}">
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-success">Update Profile</button>
                            <a class="btn btn-link pull-right" href="{{ route('profile') }}"><i class="fas fa-backward"></i> Back</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection