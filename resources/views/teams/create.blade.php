
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('teams.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name-field">{{ __('Name Of Team') }}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label select-label" for="manager_field">{{ __('Manager') }}</label>
                        <select name="manager" id="manager_field" class="selectpicker" data-live-search="true">
                            @foreach ($users as $user)
                                @if ($user->hasRole('manager'))
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label select-label" for="members_field">{{ __('Members') }}</label>
                        <select class="selectpicker" id="memebers_field" data-live-search="true" name="members[]" multiple>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="well well-sm text-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
