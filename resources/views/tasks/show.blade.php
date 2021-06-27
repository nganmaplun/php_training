<div class="modal-body">
    <div class="container">
    <h2 class="text-center"> Timesheet : {{ $timesheet->date }}</h2>
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
                        <div >
                            <h3 >Description</h3>
                            <p class="font-italic"> {{ $task->desc }}</p>
                        </div>

                        <div>
                            <h3>Use Time</h3>
                            <p> {{ $task->use_time }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
</div>
