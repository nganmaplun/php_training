
<div class="modal-body">
        <h2 class="text-center"> Date: {{ $timesheet->date }}</h2>
        <div class="col-md-12">
            <div class="table">
                @include('shared.error')
                <table  class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col"> Problem </th>
                            <th scope="col"> Plan </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="text-danger"> {{ $timesheet->problem }} </td>
                            <td scope="row" class="text-danger"> {{ $timesheet->plan }} </td>
                        </tr>
                    </tbody>
                </table>
                <h2 class="text-center"> List Tasks</h2>
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col"> Task Name </th>
                            <th scope="col"> Descrition </th>
                            <th scope="col"> Use time </th>
                        </tr>
                        @foreach ($timesheet->tasks()->get() as $task)
                        <tbody>
                            <tr>
                                <td scope="row">{{ $task->name }}</td>
                                <td scope="row">{{ $task->desc }}</td>
                                <td scope="row">{{ $task->use_time }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

