
<div class="modal-body">

    <h1>Edit Timesheet</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('timesheets.update', $timesheet->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h1 class="text-center">{{ __('Date') }}  {{ $timesheet->date }}</h1>

                    <div class="form-group">
                        <label for="problem-field">{{ __('Problem') }}</label>
                        <textarea class="form-control" type="text" name="problem" id="plan-field">{{ $timesheet->problem }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="plan-field">{{ __('Plan') }}</label>
                        <textarea name="plan" id="plan-field" class="form-control" rows="3">{{ old('plan', $timesheet->plan) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="plan-field">{{ __('Task') }}</label>
                            <a class="btn btn-success float-center" data-toggle="modal" data-target="#addTask" href="{{ route('timesheets.tasks.create', $timesheet->id) }}"><i class="fas fa-plus"></i> Add task</a>
                            @foreach ($timesheet->tasks()->get() as $task)
                                <a class="btn btn-sm btn-info" href="{{ route('timesheets.tasks.show',[ $timesheet->id, $task->id]) }}">
                                    <i class="fas fa-eye"></i> {{ $task->name }}
                                    <form action="{{ route('timesheets.tasks.destroy', [$timesheet->id, $task->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="close">
                                        &times;
                                        </button>
                                    </form>
                                </a>
                            @endforeach
                    </div>

                    <div class="well well-sm text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
