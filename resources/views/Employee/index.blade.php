@extends('layouts.app')
@include('import.datatables-import')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Employee Management</h3>
            </div>
            <div class="col text-end">
                <a href="/employee/create" class="btn btn-outline-success p-2 ">Create new employee</a>
            </div>
        </div>

        <hr>

        <table id="company-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $employee->company->logo_asset) }}" style="height: 100px; width: 100px" class="rounded-circle">
                        <a href="/company/{{ $employee->company->id }}" class="m-3">{{ $employee->company->name }}</a>
                    </td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="/employee/{{ $employee->id }}" class="btn btn-outline-success m-2 w-100 ">View</a>
                        <a href="/employee/{{ $employee->id }}/edit" class="btn w-100 m-2 btn-outline-primary">Update</a>
                        <form action="/employee/{{ $employee->id }}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="btn w-100 m-2 btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#company-table').DataTable();
        });
    </script>
@endsection
