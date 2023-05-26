@extends('layouts.app')

@include('import.datatables-import')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Company Management</h3>
        </div>
        <div class="col text-end">
            <a href="/company/create" class="btn btn-outline-success p-2 ">Create new company</a>
        </div>
    </div>

    <hr>

    <table id="company-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $company->logo_asset) }}" style="height:100px; width:100px" class="rounded-circle">
                </td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                <td>
                    <a href="/company/{{ $company->id }}" class="btn btn-outline-success m-2 w-100 ">View</a>
                    <a href="/company/{{ $company->id }}/edit" class="btn w-100 m-2 btn-outline-primary">Update</a>
                    <form action="/company/{{ $company->id }}" method="POST">
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
