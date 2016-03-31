@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Conversation
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Conversation Form -->
                    <form action="/api/conversation/{{ $conversation->id }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Conversation Name -->
                        <div class="form-group">
                            <label for="conversation-name" class="col-sm-3 control-label">Conversation</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="conversation-name" class="form-control" value="{{ $conversation->name }}">
                            </div>
                        </div>

                        <!-- Add Conversation Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-floppy-o"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection