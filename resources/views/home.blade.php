@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">

                    </div>
                    @endif
                    <a href="{{ url('create') }}" class="btn btn-success">Create new company</a>

                </div>
                <div class="col-md-12">

                <div class="card">
                        <div class="card-header">Companies List</div>
        
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
        
                            </div>
                            @endif

                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($companies as $company)
            
                                            <tr class="col-md-8">
                                                <th scope="row"> {{ $company -> name}}</th>
                                                <td>{{ $company -> email}}</td>
                                                <td><img width="50" height="50" src="storage/app/public/images/{{ $company -> logo}}" alt=""></td>
                                                <td>{{ $company -> website}}</td>
                                                <td><a href="/home/{{ $company->id }}/edit"class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="/home/{{ $company->id }}/employees"class="btn btn-success btn-sm">View Employees</a>
                                                    <form method="POST" action="/home/{{ $company->id }}">

                                                        @method('DELETE')
                                                        @csrf
                                                    
                                                                <button type="submit" style="margin-top:5px"class="btn btn-danger btn-sm">Delete</button>
                                                    
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                
                                    </tbody>
                                </table>

                                {{  $companies->links() }}
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection