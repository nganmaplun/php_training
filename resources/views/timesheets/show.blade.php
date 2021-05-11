@extends('layouts.app')

@section('header')
    <h1>TimeSheet/Show</h1>
@endsection

@section('content')
    <h2 class="text-center"> Date: {{ $timesheet->date }}</h2>
    <div class="container">
        @include('shared.error')
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
    <div class="col-md-12 text-center">
        <a class="btn btn-link pull-right" href="{{ route('timesheets.list') }}"><i class="fas fa-backward"></i> Back</a>
    </div>
   
@endsection