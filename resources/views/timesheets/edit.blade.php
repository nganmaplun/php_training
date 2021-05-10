@extends('layouts.app')

@section('header')
    <h1>TimeSheet/Edit</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('timesheets.update', $timesheet->id) }}" method="POST">
                @method("PUT")
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h1 class="text-center">Date:  {{ $timesheet->date }}</h1>
                
                <div class="form-group">
                    <label for="problem-field">Problem</label>
                    <textarea class="form-control" type="text" name="problem" id="plan-field">{{ $timesheet->problem }}</textarea>
                </div>
                <div class="form-group">
                    <label for="plan-field">Plan</label>
                    <textarea name="plan" id="plan-field" class="form-control" rows="3">{{ $timesheet->plan }}</textarea>
                </div>
                
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-link pull-right" href="{{ route('timesheets.index') }}"><i class="fas fa-backward"></i> Back</a>
                </div>
            
            </form>
        </div>
    </div>
</div>
@endsection