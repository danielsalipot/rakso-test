@extends('layouts.app')

@section('content')
    <div class="card p-3 w-75 mx-auto">
        <div class="row">
            <div class="col-4 pt-5">
                <img src="{{ asset('storage/' . $company->logo_asset) }}" class="w-100">
            </div>
            <div class="col p-5">
                <div class="row">
                    <div class="col">
                        <h6>Name</h6>
                        <h3>{{ $company->name }}</h3>
                    </div>
                    <div class="col text-end">
                        <a href="/company" class="btn btn-outline-warning border-0">Back</a>
                    </div>
                </div>

                <h6 class="mt-4">Email</h6>
                <h3>{{ $company->email }}</h3>

                <h6 class="mt-4">Website</h6>
                <a href="{{ $company->website }}">{{ $company->website }}</a>

                {{-- <div class="row mt-4 p-0 m-0 w-100">
                    <div class="col">
                        <a href="/company/{{ $company->id }}/edit" class="btn w-100 m-2 btn-outline-primary">Update</a>
                    </div>
                    <div class="col">
                        <form action="/company/{{ $company->id }}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="btn w-100 m-2 btn-danger">Delete</button>
                        </form>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
@endsection
