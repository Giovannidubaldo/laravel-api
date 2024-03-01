@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between my-3">
                <h2>I miei Progetti</h2>
                <div>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary">Aggiungi progetto</a>
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
                                <th>Start Date</th>
                                <th>End Date</th>
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
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">more</a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                            class="btn btn-sm btn-warning mx-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Sei sicuro di voler cancellare questo progetto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
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
