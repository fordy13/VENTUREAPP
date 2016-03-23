@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Company
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Company Form -->
                    <form action="/company" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Company Name -->
                        <div class="form-group">
                            <label for="company-name" class="col-sm-3 control-label">Company</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="company-name" class="form-control" value="{{ old('company') }}">
                            </div>
                        </div>

                        <!-- Add Company Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Company
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Companies -->
            @if (count($companies) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Companies
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped company-table">
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td class="table-text"><div>{{ $company->name }}</div></td>

                                        <!-- Company Edit Button -->
                                        <td>
                                            <form action="/company/{{ $company->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('GET') }}
                                                @if (!Auth::guest())
                                                    @if (Auth::user()->company_id == $company->id)
                                                        <button type="submit" id="delete-company-{{ $company->id }}" class="btn btn-default">
                                                            <i class="fa fa-btn fa-edit"></i>{{ $company->id }}
                                                        </button>
                                                    @endif
                                                @endif
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
