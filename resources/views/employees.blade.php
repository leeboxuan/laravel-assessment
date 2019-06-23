@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees of {{ $company->name }}
                        <div style="float:right"><a href="/home" class="btn btn-info"> &laquo; Back</a>
                        </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">

                    </div>
                    @endif
                    <a href="/{{ $company->id }}/create" class="btn btn-success">Create new Employee</a>

                </div>
                <div class="col-md-12">

                <div class="card">
                        <div class="card-header">Employee List</div>
        
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
        
                            </div>
                            @endif

                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($employees as $employee)
            
                                            <tr class="col-md-8">
                                                <th scope="row"> {{ $employee -> firstname}}</th>
                                                <td>{{ $employee -> lastname}}</td>
                                                <td>{{ $employee -> email}}</td>
                                                <td>{{ $employee -> phone}}</td>
                                                <td><a href="/home/employees/{{ $employee->id }}/edit"class="btn btn-primary btn-sm">Edit</a>
                                                    <form method="POST" action="/home/employees/{{ $employee->id }}/delete">

                                                        @method('DELETE')
                                                        @csrf
                                                    
                                                                <button type="submit" style="margin-top:5px" class="btn btn-danger btn-sm">Delete</button>
                                                    
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                
                                    </tbody>
                                </table>

                                {{  $employees->links() }}

                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection