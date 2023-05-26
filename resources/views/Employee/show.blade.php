@extends('layouts.app')

@section('content')
    <div class="card w-50 m-auto p-4">
        <div class="row p-3">
            <div class="col">
                <h6>First Name</h6>
                <h3>{{ $employee->first_name }}</h3>
            </div>
            <div class="col">
                <h6>Last Name</h6>
                <h3>{{ $employee->last_name }}</h3>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <h6>Phone Number</h6>
                <h3>{{ $employee->phone }}</h3>
            </div>
            <div class="col">
                <h6>Email Address</h6>
                <h3>{{ $employee->email }}</h3>
            </div>
        </div>

        <div class="row p-3 text-center">
            <h6>Company</h6>
            <h3>{{ $employee->company->name }}</h3>
            <h6>{{ $employee->company->email }}</h6>
            <a href="{{ $employee->company->website }}">{{ $employee->company->website }}</a>
        </div>
    </div>
@endsection
