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

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Button</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($projectsList as $curProject)
                            <tr>
                                <td>{{ $curProject->title }}</td>
                                <td>
                                    <span>{{ $curProject->description }}</span>
                                </td>
                                <td class="h-100">
                                    <div class="h-100 d-flex gap-2">
                                        <a class="btn btn-info" href="{{ route('admin.projects.show', ['project' =>$curProject->slug]) }}"><i class="fa-solid fa-plus"></i></a>
                                        <a class="btn btn-success" href="{{ route('admin.projects.edit', ['project' =>$curProject->slug]) }}"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{ route('admin.projects.destroy', ['project' =>$curProject->slug]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
        </div>
    </div>
@endsection
