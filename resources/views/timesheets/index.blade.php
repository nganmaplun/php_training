@extends('layouts.app')
@section('header')
<div>
  <h1>
     TimeSheet
    <br>
    <a class="btn btn-success float-left" href="{{ route('timesheets.export') }}"><i class="fas fa-plus"></i> Export</a>
    <a class="btn btn-success float-right"  data-toggle="modal" data-target="#createTimesheet"><i class="fas fa-plus"></i> Create new timesheet</a>
    <br>
  </h1>
</div>
@endsection
@section('content')
    
@if($timesheets->count())
<div >
  
    <table class="table ">
      @include('shared.error')
        <thead  class="thead-dark">
            <tr>
              <th scope="col">#</th>
              @can('viewAny', App\Models\Timesheet::class)
                <th scope="col">User Name</th>
              @endcan
              <th scope="col">Date</th>
              <th scope="col">Tasks</th>
              <th scope="col">Problem</th>
              <th scope="col">Plan</th>
              <th class="text-right">OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timesheets as $timesheet)
            <tr>
                <th scope="row">{{ $timesheet['id'] }}</th>
                @can('viewAny', $timesheet)
                  <td>{{ $timesheet->user->name }}</td>
                @endcan
                <td>{{ $timesheet->date }}</td>
                <td>
                    @foreach ($timesheet->tasks()->get() as $task)
                    <a class="btn btn-sm btn-info" href="{{ route('timesheets.tasks.show',[ $timesheet->id, $task->id]) }}">
                       {{ $task->name }}
                    </a>
                    @endforeach
                </td>
                <td>{{ $timesheet->problem }}</td>
                <td>{{ $timesheet->plan }}</td>
                
                <td class="text-right">
                    <a class="btn btn-sm btn-primary" href="{{ route('timesheets.show', $timesheet->id) }}">
                      <i class="fas fa-eye"></i> View
                    </a>
                    <a class="btn btn-sm btn-warning" href="{{ route('timesheets.edit', $timesheet->id) }}">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST" style="display: inline;"
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
    <div class="modal fade" id="createTimesheet" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @include('timesheets.create')
          </div>
        </div>
      </div>
    </div>
    @else
    <h3 class="text-center alert alert-info">Empty!</h3>
    @endif
</div>
@endsection