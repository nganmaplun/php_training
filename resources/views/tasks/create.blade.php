

<div class="modal-body">
        <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('timesheets.tasks.store', $timesheet->id) }}" method="POST">
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

                <div class="form-group">
                    <label for="name-field">{{ __('Name') }}</label>
                    <input class="form-control" type="text" name="name" id="name-field"/>
                </div>

                <div class="form-group">
                    <label for="problem-field">{{ __('Descrition') }}</label>
                    <input class="form-control" type="text" name="desc" id="desc-field"/>
                </div>

                <div class="form-group">
                    <label for="use_time-field">{{ __('Use time') }}</label>
                    <input type="time" name="use_time" id="use_time-field" class="form-control" />
                </div>

                <div class="well well-sm text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal-footer" data-dismiss="modal" class="btn btn-default">Close</div>
