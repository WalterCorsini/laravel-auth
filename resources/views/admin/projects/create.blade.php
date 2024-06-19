@extends('layouts.admin')

@section('content')
<form class="w-50 m-auto d-flex flex-column pt-5" action="{{ route('admin.projects.store') }}" method="POST">
    @csrf
    <label for="title">Titolo : </label>
    <input type="text" id="title" name="title">
    <label for="description">Descrizione : </label>
    <textarea type="text" id="description" name="description"></textarea>
    <button class="btn btn-success mt-3"><i class="fa-solid fa-plus"></i></button>
</form>
@endsection
