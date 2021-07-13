@extends('layouts.app')

@section('header')
    <h1>TimeSheet/Edit</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('timesheets.update', $timesheet->id) }}" method="POST">
                @csrf
                @method("PUT")
                <h1 class="text-center">{{ __('Date') }}  {{ $timesheet->date }}</h1>
                
                <div class="form-group">
                    <label for="problem-field">{{ __('Problem') }}</label>
                    <textarea class="form-control" type="text" name="problem" id="plan-field">{{ $timesheet->problem }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="plan-field">{{ __('Plan') }}</label>
                    <textarea name="plan" id="plan-field" class="form-control" rows="3">{{ $timesheet->plan }}</textarea>
                </div>

                <div class="form-group">
                    <label for="plan-field">{{ __('Task') }}</label>
                        <a class="btn btn-success float-center" href="{{ route('timesheets.tasks.create', $timesheet->id) }}" data-toggle="modal" data-target="#createTask"><i class="fas fa-plus"></i> Add task</a>
                        @foreach ($timesheet->tasks()->get() as $task)
                            <a class="btn btn-sm btn-info" href="{{ route('timesheets.tasks.show',[ $timesheet->id, $task->id]) }}">
                            <i class="fas fa-eye"></i> {{ $task->name }}
                            </a>
                        @endforeach
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-link pull-right" href="{{ route('timesheets.list') }}"><i class="fas fa-backward"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="createTask" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                    @include('tasks.create')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection