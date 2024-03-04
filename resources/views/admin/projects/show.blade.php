@extends('layouts.admin')

@section('content')
    <section class="px-3" id="show">
        <div class="container">
            <div class="row my-2">
                <div class="col-12 mt-4">
                    <h1 class="text-center text-capitalize">{{ $project->name }}</h1>
                </div>
                <div class="col-6 px-5 mt-5">
                    <h2>Info:</h2>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa-solid fa-heart"></i>
                            <span>Nome:</span> {{ $project->name }}
                        </li>
                        <li>
                            <i class="fa-solid fa-calendar"></i>
                            <span>Data di inzio progetto:</span> {{ $project->start_date }}
                        </li>
                        <li>
                            <i class="fa-solid fa-calendar"></i>
                            <span>Data di fine progetto:</span> {{ $project->end_date }}
                        </li>
                    </ul>
                    <h2>Descrizione:</h2>
                    <p>{{ $project->description }}</p>

                    <h2>Caratteristiche:</h2>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa-solid fa-code"></i>
                            <span>Tecnologia:</span>
                            @forelse ($project->technology as $technology)
                                {{ $technology->name . ',' }}
                            @empty
                                Nessuno
                            @endforelse
                        </li>
                        <li>
                            <i class="fa-solid fa-file-code"></i>
                            <span>Tipo:</span> {{ $project->type->name }}
                        </li>
                    </ul>
                </div>
                <div class="col-6 px-5 mt-5 d-flex flex-column justify-content-between">
                    <div class="img-card">
                        @if ($project->image != null)
                            <img src="{{ asset('/storage/') . $project->image }}" alt=""
                                class="img-fluid w-100 h-100">
                        @else
                            <img src="{{ '/img/sfondo.jpg' }}" alt="...img" class="img-fluid w-100 h-100">
                        @endif
                    </div>
                    <div class="d-flex justify-content-end px-5 mt-5">
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-sm btn-success mx-2 ">
                            <i class="fa-solid fa-pen-to-square fa-xs"></i>
                            <span>Modifica</span>
                        </a>
                        <button class="btn btn-sm btn-success delete-button" data-bs-toggle="modal"
                            data-bs-target="#modal_delete" data-slug="{{ $project->id }}">
                            <i class="fa-solid fa-trash-can fa-xs"></i> Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.partials.modal_delete')
@endsection
