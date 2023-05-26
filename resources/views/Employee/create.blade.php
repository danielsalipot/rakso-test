@extends('layouts.app')

@section('content')
    <div class="card p-0 w-50 mx-auto">
        <h5 class="p-4 alert alert-secondary rounded-0">Create new employee</h5>

        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger">{{ $err }}</div>
            @endforeach
        @endif

        <form action="/employee" method="POST">
            @csrf
            <div class="p-4 pt-0">
                <label for="first-name-input" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first-name-input" placeholder="First Name">
            </div>

            <div class="p-4 pt-0">
                <label for="last-name-input" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last-name-input" placeholder="Last Name">
            </div>

            <div class="p-4 pt-0">
                <label for="company-input" class="form-label">Company</label>
                <select name="company_id" class="form-control" id="company-input">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="p-4 pt-0">
                <label for="phone-input" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone-input" placeholder="Phone Number">
            </div>

            <div class="p-4 pt-0">
                <label for="email-input" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email-input" placeholder="Email Address">
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
