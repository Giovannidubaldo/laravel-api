@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="d-flex justify-content-center align-items-center">
                <div class="card" style="width: 18rem;">
                    @if ($project->image != null)
                        <img src=" {{ asset('/storage/' . $project->image) }}" alt="{{ $project->name }}" class="card-img-top">
                    @else
                        <img src=" {{ asset('/img/sfondo.jpg') }}" alt="{{ $project->name }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text">Tipo: {{ $project->type ? $project->type->name : 'Nessuno' }}</p>
                        <p>
                            Tecnologia:
                            @forelse ($project->technology as $technology)
                                {{ $technology->name . ',' }}
                            @empty
                                Non è stata assegnata nessuna tecnologia...
                            @endforelse
                        </p>
                        <p class="card-text">Data di inizio: {{ $project->start_date }}</p>
                        <p class="card-text">Data di fine: {{ $project->end_date }}</p>
                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                            class="btn btn-primary">Modifica progetto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
