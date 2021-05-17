@extends('layouts.app')

@section('content')
    <h1 class="text-center"></h1>
    <div class="container">
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            <label for="month" class="col-md-4 col-form-label">{{__('Month') }}</label>
            <div class="col-md-6">
                <input type="month" name="month" value="{{ date('Y-m') }}">
                <button type="submit" class="btn btn-light">Update and view Reports</button>
            </div>
        </form> 

        <br>
        <div class="card">
            <div class="card-header text-center">
                {{ __('Timesheets Report of ') }}
                <label>{{ Auth::user()->name }}</label>
            </div>
            <div class="card-body text-center">
                @if ($reports->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Month') }}</th>
                                <th scope="col">{{ __('Created Times') }}</th>
                                <th scope="col">{{ __('Lated Times') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->month }}</td>
                                    <td>{{ $report->created_times }}</td>
                                    <td>{{ $report->lated_times }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                   <div class="text-center">Report Empty</div> 
                @endif
            </div>
        </div>
    </div>
@endsection