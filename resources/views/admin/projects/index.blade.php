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
                                <td>{{ $curProject->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
        </div>
    </div>
@endsection
