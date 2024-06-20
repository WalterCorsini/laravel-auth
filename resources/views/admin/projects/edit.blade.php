@extends('layouts.admin')

@section('content')

{{-- <div class="pt-5">
    @include('partials.errors')
</div> --}}

{{--  --}}
<form class="w-50 m-auto d-flex flex-column pt-5"
action="{{ route('admin.projects.update',['project' => $project->slug]) }}" method="POST">
    @csrf
    @method('put')
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
    type="text" id="title" name="title" value="@old('title',{{ $project->title }})">
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
    type="text" id="description" name="description">{{ @old('description',$project->description) }}</textarea>
    <button class="btn btn-success mt-3" type="submit"><i class="fa-solid fa-plus"></i></button>
</form>
@endsection
