@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Task') }}</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('timesheets.tasks.update', [$timesheet, $task->id]) }}" >
                        @method("PUT")
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
                            <label for="name" >{{ __('Name') }}</label>
                            <input type="name" name="name" class="form-control"  value="{{ $task->name }}">
                        </div>
                       
                        <div>
                            <label for="desc" >{{ __('Desction') }}</label>
                            <input type="desc" name="desc" class="form-control" value="{{ $task->desc }}">
                        </div>
                        
                        <div>
                            <label for="use_time" >{{ __('Use Time') }}</label>
                            <input type="time" name="use_time" class="form-control" value="{{ $task->use_time }}">
                        </div>

                        <br>
                        <div>
                            <button type="submit" class="btn btn-success">{{ __('Edit Task') }}</button>
                            <a class="btn btn-link pull-right" href="{{ route('timesheets.tasks.show', [$timesheet, $task->id]) }}"><i class="fas fa-backward"></i> Back</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection