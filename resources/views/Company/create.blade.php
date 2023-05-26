@extends('layouts.app')

@section('content')
    <div class="card p-0 w-50 mx-auto">
        <h5 class="p-4 alert alert-secondary rounded-0">Create new company</h5>

        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger">{{ $err }}</div>
            @endforeach
        @endif

        <form action="/company" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-4 pt-0">
                <label for="name-input" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name-input" placeholder="Company Name">
            </div>

            <div class="p-4 pt-0">
                <label for="email-input" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email-input" placeholder="Company Email">
            </div>

            <div class="p-4 pt-0">
                <label for="logo-input" class="form-label">Upload Company Logo</label>
                <input class="form-control" name="logo_asset" type="file" id="logo-input" accept="image/png, image/jpeg">
            </div>

            <div class="p-4 pt-0">
                <label for="website-input" class="form-label">Website Link</label>
                <input type="text" name="website" class="form-control" id="website-input" placeholder="Company Website Link">
            </div>

            <div class="row p-4 pt-0">
                <div class="col text-center">
                    <button type="submit" class="btn btn-sm p-3 w-100 mx-auto btn-outline-success">Create</button>
                </div>
                <div class="col text-end">
                    <a href="/company" class="btn btn-sm p-3 w-50 mx-auto btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
