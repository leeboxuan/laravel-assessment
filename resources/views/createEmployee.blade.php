<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a new Employee</title>
</head>

<body>

</body>

</html>

@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new Employee</div>
                <div class="card-body">

                    <form method="POST" action="/home/{{ $company->id }}/employees">

                        {{ csrf_field() }}
                        {{-- name field --}}

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Employee First Name</label>

                            <div class="col-md-6 control">
                                <input type="text"
                                    class="form-control input {{ $errors->has('firstname') ? 'is-danger' : '' }} "
                                    name="firstname" value="{{ old('firstname') }}" placeholder="Employee's First Name">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Employee Last Name</label>
    
                                <div class="col-md-6 control">
                                    <input type="text"
                                        class="form-control input {{ $errors->has('lastname') ? 'is-danger' : '' }} "
                                        name="lastname" value="{{ old('lastname') }}" placeholder="Employees Last Name">
                                </div>
                            </div>

                        {{-- email field --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Employee Email</label>

                            <div class="col-md-6 control">
                                <input type="email"
                                    class="form-control input {{ $errors->has('email') ? 'is-danger' : '' }} "
                                    name="email" value="{{ old('email') }}" placeholder="Employee's Email">
                            </div>
                        </div>

                        {{-- phone field --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Employee Phone</label>

                            <div class="col-md-6 control">
                                <input type="text"
                                    class="form-control input {{ $errors->has('phone') ? 'is-danger' : '' }} "
                                    name="phone" value="{{ old('phone') }}" placeholder="Employee's phone">
                            </div>
                        </div>


                        {{-- submit button --}}

                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create
                                </button>
                            </div>
                        </div>

                        @include('errors')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection