@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @if ((count($questions) > 0)&&(count($questions) === count($answers)))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Q&A
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped question-table">
                            <thead>
                                <th>Questions</th>
                                <th>Answers</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @for ($tmp = 0; $tmp < count($questions); $tmp++)
                                    <tr>
                                        <td class="table-text"><div>{{ $questions[$tmp]->title }}</div></td>

                                        <!-- Conversations Delete Button -->
                                        <td class="table-text"><div>{{ $answers[$tmp]->value }}</div></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection