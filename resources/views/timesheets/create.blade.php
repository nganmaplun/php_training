<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <form id="timesheets-form" action="{{ route('timesheets.store') }}" method="POST">
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
                <label for="date-field">{{ __('Date') }} </label>
                <div class="input-group date datetimepicker" id="date" data-target-input="nearest">
                <input type="date" name="date"  id="datepicker" class="form-control datetimepicker-input" data-target="#date" value = "{{ date('Y-m-d') }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="problem-field">{{ __('Problem') }}</label>
                <input class="form-control" type="text" name="problem" id="plan-field" value="Non Problem" />
            </div>

            <div class="form-group">
                <label for="plan-field">{{ __('Plan') }}</label>
                <textarea name="plan" id="plan-field" class="form-control" rows="3" >Non Plan</textarea>
            </div>
            <div class="well well-sm text-center">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

            </form>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

