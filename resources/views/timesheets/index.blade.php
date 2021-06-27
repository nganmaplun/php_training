@extends('layouts.app')
@section('header')
<div>
  <h1>
    <i class="fas fa-align-justify"></i> TimeSheet
    <br>
    <a class="btn btn-success float-left" href="{{ route('timesheets.export') }}"><i class="fas fa-plus"></i> Export</a>
    <a class="btn btn-success float-right" data-toggle="modal" data-target="#createTimesheet" href="{{ route('timesheets.create') }}"><i class="fas fa-plus"></i> Create new timesheet</a>
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
                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#showTask" href="{{ route('timesheets.tasks.show',[ $timesheet->id, $task->id]) }}">{{ $task->name }}
                    </a>
                    @endforeach
                    <a data-toggle="modal" data-target="#createTask" href="{{ route("timesheets.tasks.create", $timesheet->id) }}"> <li class="fas fa-plus-circle"></li></a>
                </td>
                <td>{{ $timesheet->problem }}</td>
                <td>{{ $timesheet->plan }}</td>

                <td class="text-right">
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#showTimesheet" href="{{ route('timesheets.show', $timesheet->id) }}">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTimesheet" href="{{ route('timesheets.edit', $timesheet->id) }}">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST" style="display: inline;"
                      onsubmit="return confirm('Delete? Are you sure?');">
                     @csrf
                     @method("delete")
                      <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>

                  </td>
            </tr>
            @endforeach

        </tbody>

        {{-- Modal --}}
        <div class="modal fade" id="editTimesheet" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              </div>
            </div>
        </div>
        <div class="modal fade" id="createTimesheet" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              </div>
            </div>
        </div>
        <div class="modal fade" id="showTimesheet" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              </div>
            </div>
        </div>
        <div class="modal fade" id="showTask" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              </div>
            </div>
        </div>
        <div class="modal fade" id="createTask" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              </div>
            </div>
        </div>
    </table>
    @else
    <h3 class="text-center alert alert-info">Empty!</h3>
    @endif
</div>
@endsection
