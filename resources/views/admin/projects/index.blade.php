@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="ms-table-container mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="fw-bold">Projects</h1>

                <div class="d-flex flex-column">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                        <i class="fa-solid fa-plus"> Add</i>
                    </a>
                </div>

            </div>
            <hr>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($projectsList as $curProject)
                            <tr>
                                <td>{{ $curProject->title }}</td>
                                <td class="d-flex justify-content-center align-items-center me-2">
                                    <span>{{ $curProject->description }}</span>
                                    <a class="btn btn-danger" href="{{ route('admin.projects.edit', ['project' =>$curProject->slug]) }}">Modifica</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
        </div>
    </div>
@endsection
