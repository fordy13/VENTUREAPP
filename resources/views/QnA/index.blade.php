@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/api/question" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="question-title" class="col-md-3 control-label">
                Enter a Question:</label>
                <div class="col-md-6">
                    <input type="text" name="title" id="question-title"
                        class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" 
                        id="create-question" 
                        class="btn btn-default">
                        Ask  <i class="fa fa-btn fa-hand-pointer-o"></i>
                    </button>
                </div>    
            </div>
        </form>
        <!-- Current Questions -->
        @if (count($questions ) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Questions
                </div>

                <div class="panel-body">
                    <table class="table table-striped question-table">
                        <thead>
                            <th>Questions</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $question->title }}</div>
                                        @if (!Auth::guest())
        <!-- backtabbed in between if and endif for editor purposes -->
        <form action="/api/answer/{{ $question->id }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="answer-value" class="col-md-3 control-label">
                A:</label>
                <div class="col-md-6">
                    <input type="text" name="value" id="answer-value"
                        class="form-control" value="{{ old('value') }}" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" 
                        id="create-question" 
                        class="btn btn-default">
                        Answer this Question  <i class="fa fa-btn fa-check-square-o"></i>
                    </button>
                </div>    
            </div>
        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
