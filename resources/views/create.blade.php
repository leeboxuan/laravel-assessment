<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a new company</title>
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
                <div class="card-header">Create a new company
                        <div style="float:right"><a href="/home" class="btn btn-info"> &laquo; Back</a>

                </div>
                <div class="card-body">

                    <form method="POST" action="/home" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{-- name field --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>

                            <div class="col-md-6 control">
                                <input type="text"
                                    class="form-control input {{ $errors->has('name') ? 'is-danger' : '' }} "
                                    name="name" value="{{ old('name') }}" placeholder="Company's Name">
                            </div>
                        </div>

                        {{-- email field --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Company Email</label>

                            <div class="col-md-6 control">
                                <input type="email"
                                    class="form-control input {{ $errors->has('email') ? 'is-danger' : '' }} "
                                    name="email" value="{{ old('email') }}" placeholder="Company's Email">
                            </div>
                        </div>

                        {{-- website field --}}
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Company Website</label>

                            <div class="col-md-6 control">
                                <input type="text"
                                    class="form-control input {{ $errors->has('website') ? 'is-danger' : '' }} "
                                    name="website" value="{{ old('website') }}" placeholder="Company's Website">
                            </div>
                        </div>                     
                        
                        {{-- logo field - to be input --}}

                        <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">Company Logo</label>

                                <div class="col-md-6 control">
                                    <input type="file"
                                        class="form-control input {{ $errors->has('logo') ? 'is-danger' : '' }} "
                                        name="logo">
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