@extends('layouts.app')
@section('content')
    <h1 class="text-center"> Timesheet : {{ $timesheet->date }}</h1>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="card">
                    @include('shared.error')
                    <div class="card-header">Task: {{ $task->name }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="font-weight-bold"> Descrition: 
                            <p class="font-italic"> {{ $task->desc }}</p>
                        </div>

                        <div> Use_time:
                            <p> {{ $task->use_time }}</p>
                        </div>
                        <a class="btn btn-success float-center" href="{{ route('timesheets.tasks.edit',[$timesheet->id, $task->id]) }}">
                            <i class="fas fa-edit"></i> Edit Task
                        </a>

                        <form action="{{ route('timesheets.tasks.destroy', [$timesheet,$task->id]) }}" method="POST" style="display: inline;"
                            onsubmit="return confirm('Delete? Are you sure?');">
                           @csrf
                           @method("delete")
                            <button type="submit" class="btn btn-sm btn-danger">
                              <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                        
                        <a class="btn  float-center" href="{{ url()->previous() }}"><i class="fas fa-backward"></i> Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
