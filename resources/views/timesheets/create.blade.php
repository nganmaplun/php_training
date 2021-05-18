@extends('layouts.app')

@section('header')
<div class="page-header">
  <h1><i class="fas fa-plus"></i> Timesheet / Create </h1>
</div>
@endsection

@section('content')
<div class="container">
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
        <input class="form-control" type="text" name="problem" id="plan-field" value="" />
      </div>

      <div class="form-group">
        <label for="plan-field">{{ __('Plan') }}</label>
        <textarea name="plan" id="plan-field" class="form-control" rows="3"></textarea>
      </div>

      <div class="well well-sm">
        <button type="submit" class="btn btn-primary" >Create</button>
        <a class="btn btn-link pull-right" href="{{ route('timesheets.list') }}"><i class="fas fa-backward"></i> Back</a>
      </div>
    </form>
  </div>
</div>
</div>
@endsection