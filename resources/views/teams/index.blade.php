@extends('layouts.app')

@section('header')
<div class="text-center">
  <h1>
     TEAM MANAGER
    <br>
    <a class="btn btn-success "  data-toggle="modal" data-target="#createTeam"><i class="fas fa-plus"></i> Create new Team</a>
    <br>
  </h1>
</div>
<br>
@endsection

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
            @include('shared.error')
           </div>
       </div>
       <div class="row">
            @foreach ($teams as $team)
                <div class="col-xs-6 col-md-4 text-center">
                    <div class="card">
                        <div class="card-header">
                            {{ $team->name }}
                        </div>
                        <div class="card-body">
                           <h3>Manager</h3>
                           <span>{{ $team->manager->name }}</span>
                           <hr >

                            <h4>Members</h4>
                           <div >
                            @foreach ( $team->users as $user )
                            <li>
                                <span>{{ $user->name }}</span>
                                <hr >
                            </li>
                            @endforeach

                           </div>
                        </div>

                        <div class="card-footer">
                                <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-sm btn-info">Edit Team</a>
                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline;"
                                    onsubmit="return confirm('Remove Team? Are you sure?');">
                                   @csrf
                                   @method("delete")
                                    <button type="submit" class="btn btn-sm btn-danger">
                                       Remove Team
                                    </button>
                                  </form>
                        </div>
                    </div>
                </div>
                
            @endforeach
       </div>

       <div class="modal fade" id="createTeam" role="dialog">
           <div class="modal-dialog">
               <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                   <div class="modal-body">
                       @include('teams.create')
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
