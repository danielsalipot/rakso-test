@extends('layouts.app')

@section('content')
    <div class="card w-75 p-0 mx-auto row">
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger">{{ $err }}</div>
            @endforeach
        @endif
        <div class="row">
            <div class="col-4 pt-5">
                <img src="{{ asset('storage/' . $company->logo_asset) }}" class="w-100">
            </div>
            <div class="col p-4">
                <form action="/company/{{ $company->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="p-4 pt-0">
                        <label for="name-input" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name-input" value="{{ $company->name }}">
                    </div>

                    <div class="p-4 pt-0">
                        <label for="email-input" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email-input" value="{{ $company->email }}">
                    </div>

                    <div class="p-4 pt-0">
                        <label for="logo-input" class="form-label">Upload Company Logo</label>
                        <input class="form-control" name="logo_asset" type="file" id="logo-input" accept="image/png, image/jpeg">
                    </div>

                    <div class="p-4 pt-0">
                        <label for="website-input" class="form-label">Website Link</label>
                        <input type="text" name="website" class="form-control" id="website-input" value="{{ $company->website }}">
                    </div>

                    <div class="row p-4 pt-0">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-sm p-3 w-100 mx-auto btn-outline-primary">Update</button>
                        </div>
                        <div class="col text-end">
                            <a href="/company" class="btn btn-sm p-3 w-50 mx-auto btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
