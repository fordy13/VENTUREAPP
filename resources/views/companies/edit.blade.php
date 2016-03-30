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
                    <form action="/api/company/{{ $company->id }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Company Name -->
                        <div class="form-group">
                            <label for="company-name" class="col-sm-3 control-label">Company</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="company-name" class="form-control" value="{{ $company->name }}">
                            </div>
                        </div>

                        <!-- Add Company Button -->
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