@extends('layouts.admin')

@section('content')
    <div class="container ms-table-container mt-5">

        <div class="d-flex justify-content-between align-items-center">
            {{-- title --}}
            <h1 class="fw-bold">Projects</h1>
            {{-- /title --}}

            {{-- success message --}}
            @if (session('message'))
                <div class="alert alert-success">
                    <span class="info-info-success">{{ session('message') }}</span>
                </div>
            @endif
            {{-- /success message --}}

            {{-- add btn --}}
            <div class="d-flex flex-column">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"> Add</i>
                </a>
            </div>
            {{-- /add btn --}}

        </div>
        <hr>
        <div class="table-responsive">


            {{-- table --}}
            <table class="table">

                {{-- thead --}}
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Button</th>
                    </tr>
                </thead>

                {{-- t-body --}}
                <tbody>
                    @foreach ($projectsList as $curProject)
                        <tr>
                            <td>{{ $curProject->title }}</td>
                            <td>
                                <span>{{ $curProject->description }}</span>
                            </td>
                            <td class="h-100">
                                <div class="h-100 d-flex gap-2">

                                    {{-- show btn --}}
                                    <a class="btn btn-info"
                                        href="{{ route('admin.projects.show', ['project' => $curProject->slug]) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- /show btn --}}

                                    {{-- edit btn --}}
                                    <a class="btn btn-success"
                                        href="{{ route('admin.projects.edit', ['project' => $curProject->slug]) }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- /edit btn --}}

                                    {{-- delete btn  --}}
                                    <form class="delete"
                                        action="{{ route('admin.projects.destroy', ['project' => $curProject->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button data-project-title="{{ $curProject->title }}" class="btn btn-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                    {{-- /delete btn  --}}

                                    <!-- modal -->
                                    @include('partials.modal-softdeletes')
                                    {{-- /modal --}}

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{-- /table --}}
        </div>

    </div>
@endsection
