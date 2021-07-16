@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name-field">{{ __('name') }}</label>
                    <textarea name="name" id="name-field" class="form-control" rows="3">{{ $user->name }}</textarea>
                </div>
                <div class="form-group">
                    <label for="email-field">{{ __('email') }}</label>
                    <textarea name="email" id="email-field" class="form-control" rows="3">{{ $user->email }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label select-label" for="roles_field">{{ __('roles') }}</label>
                    <select name="roles[]" id="roles_field" class="selectpicker" data-live-search="true" multiple>
                        @foreach ($roles as $role)
                            @if ($role)
                                <option value="{{ $role->id }}"  {{ $user->roles->contains($role->id)  ? "selected" : null }}>{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="fas fa-backward"></i> Back</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
    
