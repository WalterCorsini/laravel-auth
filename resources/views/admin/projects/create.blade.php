@extends('layouts.admin')

@section('content')
{{-- <div class="pt-5">
    @include('partials.errors')
</div> --}}
<form class="w-50 m-auto d-flex flex-column pt-5"
action="{{ route('admin.projects.store') }}" method="POST">
    @csrf
    <label for="title">Titolo :
        @error('title')
            <span class="text-danger">
                {{ $errors->first('title') }}
            </span>
        @enderror
    </label>
    <input class="form-control
        @error('title')
            is-invalid
        @enderror"
    type="text" id="title" name="title" value="{{ @old('title') }}">
    <label for="description">Descrizione :
        @error('description')
            <span class="text-danger">
                {{ $errors->first('description') }}
            </span>
        @enderror
    </label>
    <textarea class="form-control
        @error('description')
            is-invalid
        @enderror"
    type="text" id="description" name="description"></textarea>
    <button class="btn btn-success mt-3"><i class="fa-solid fa-plus"></i></button>
</form>
@endsection
