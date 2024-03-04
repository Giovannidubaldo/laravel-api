@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center my-3">
                <h2>I miei Progetti</h2>
                <div>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-success">Aggiungi progetto</a>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->slug }}</td>
                                    <td>{{ $project->type ? $project->type->name : 'Nessuno' }}</td>
                                    <td>{{ Str::limit($project->description, 20, '(...)') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"
                                            class="btn btn-sm btn-success mx-2"><i class="fas fa-edit"></i></a>
                                        {{-- <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE') --}}
                                        {{-- </form> --}}
                                        <button class="btn btn-sm btn-success delete-button" data-bs-toggle="modal"
                                            data-bs-target="#modal_delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @include('admin.partials.modal_delete')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
