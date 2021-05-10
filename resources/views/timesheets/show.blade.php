@extends('layouts.app')

@section('header')
    <h1>TimeSheet/Show</h1>
@endsection

@section('content')
    <h2 class="text-center"> Date: {{ $timesheet->date }}</h2>
    <div class="container">
        <table  class="table text-center">
            <thead class="table-warning">
                <tr>
                    <th scope="col">Problem</th>
                    <th scope="col">Plan</th>
                </tr>
            </thead>
            <tbody class="table-danger">
                <tr>
                    <th scope="col"> {{ $timesheet->problem }} </th>
                    <th scope="col"> {{ $timesheet->plan }} </th>
                </tr>
            </tbody>
        </table>
    </div>

    <h2 class="text-center"> List Tasks</h2>
    <div class="text-center">
        <a class="btn btn-success " href="{{ route('timesheets.create') }}"><i class="fas fa-plus"></i> Create new task</a>
    </div>   

    <div>
        @yield('task')
    </div>

   
@endsection