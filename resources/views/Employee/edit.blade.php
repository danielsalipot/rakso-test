@extends('layouts.app')

@section('content')
    <div class="card p-0 w-50 mx-auto">
        <h5 class="p-4 alert alert-secondary rounded-0">Update new employee</h5>

        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger">{{ $err }}</div>
            @endforeach
        @endif

        <form action="/employee/{{ $employee->id }}" method="POST">
            @csrf
            @method("PUT")
            <div class="p-4 pt-0">
                <label for="first-name-input" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first-name-input" value="{{ $employee->first_name }}">
            </div>

            <div class="p-4 pt-0">
                <label for="last-name-input" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last-name-input" value="{{ $employee->last_name }}">
            </div>

            <div class="p-4 pt-0">
                <label for="company-input" class="form-label">Company</label>
                <select name="company_id" class="form-control" id="company-input">
                    @foreach ($companies as $company)
                        <option {{ $company->id == $employee->company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="p-4 pt-0">
                <label for="phone-input" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone-input" value="{{ $employee->phone }}">
            </div>

            <div class="p-4 pt-0">
                <label for="email-input" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email-input" value="{{ $employee->email }}">
            </div>

            <div class="row p-4 pt-0">
                <div class="col text-center">
                    <button type="submit" class="btn btn-sm p-3 w-100 mx-auto btn-outline-success">Create</button>
                </div>
                <div class="col text-end">
                    <a href="/employee" class="btn btn-sm p-3 w-50 mx-auto btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
