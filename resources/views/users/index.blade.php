@extends('layouts.app')

@section('content')
    @if($users->count())
    <div >
        <table class="table ">
        @include('shared.error')
            <thead  class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Email') }}</th>
                <th scope="col">{{ __('Desc') }}</th>
                <th scope="col">{{ __('Role') }}</th>
                <th class="text-right">OPTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user['id'] }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->desc }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                    
                    <td class="text-right">
                        <a class="btn btn-sm btn-primary" href="{{ route('users.show', $user->id) }}">
                        <i class="fas fa-eye"></i> View
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;"
                            onsubmit="return confirm('Delete? Are you sure?');">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            
        </table>
        @else
        <h3 class="text-center alert alert-info">Empty!</h3>
        @endif
    </div>
@endsection