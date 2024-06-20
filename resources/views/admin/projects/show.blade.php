@extends('layouts.admin')

@section('content')
    <h1>dettagli</h1>
    <p>Titolo : {{ $project->title }} </p>
    <p>Descrizione : {{ $project->description }} </p>
    <p>slug : {{ $project->slug }} </p>
@endsection
