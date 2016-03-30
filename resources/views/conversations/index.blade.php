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
                    <form action="/api/conversation" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Conversation Name -->
                        <div class="form-group">
                            <label for="conversation-name" class="col-sm-3 control-label">Conversation</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="conversation-name" class="form-control" value="{{ old('conversation') }}">
                            </div>
                        </div>

                        <!-- Add Conversation Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Conversation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Conversations -->
            @if (count($conversations) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Conversations
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped conversation-table">
                            <thead>
                                <th>Conversation</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($conversations as $conversation)
                                    <tr>
                                        <td class="table-text"><div>{{ $conversation->name }}</div></td>

                                        <!-- Conversations Delete Button -->
                                        <td>
                                            <form action="/conversation/{{ $conversation->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('GET') }}

                                                <button type="submit" id="edit-conversation-{{ $conversation->id }}" class="btn btn-default">
                                                    <i class="fa fa-btn fa-edit"></i>Edit
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
