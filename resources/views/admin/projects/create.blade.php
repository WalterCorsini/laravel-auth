@extends('layouts.admin')

@section('content')

{{-- form --}}
<form class="w-50 m-auto d-flex flex-column pt-5"
    action="{{ route('admin.projects.store') }}"
    method="POST" enctype="multipart/form-data">
    @csrf

    {{-- title --}}
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
        type="text" id="title" name="title" value="{{old('title')}}">
    {{-- /title --}}

    {{-- description --}}
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
        type="text" id="description" name="description">{{old('description')}}</textarea>
    {{-- description --}}

    {{-- file --}}
    <label for="cover_image"> Immagine</label>
    <input class="form-control
    @error('cover_image')
        is-invalid
    @enderror"
    type="file" name="cover_image" id="cover_image">
    @error('cover_image')
    <span class="text-danger">
        {{ $errors->first('cover_image') }}
    </span>
    @enderror
    <img id="imagePreview" class="hide" src="" alt="new-image">
    <div>
        <a id="btnDelete" class="btn btn-danger hide" >rimuovi</a>
    </div>
    {{-- file --}}

    {{-- button --}}
    <button class="btn btn-success mt-3"><i class="fa-solid fa-plus"></i></button>

</form>
{{-- /form --}}
@endsection
