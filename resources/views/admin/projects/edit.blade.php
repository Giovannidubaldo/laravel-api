@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="my-3 text-center">Modifica progetto</h2>
                <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" value="{{ old('name') ?? $project->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Inserisci nome progetto" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            @if ($project->image != null)
                                <div class="my-2">
                                    <img src="{{ asset('/storage/' . $project->image) }}" alt="{{ $project->name }}"
                                        class="img-fluid" width="100">
                                </div>
                            @else
                                <div class="my-2">
                                    <img src="{{ asset('/img/sfondo.jpg') }}" alt="{{ $project->name }}" class="img-fluid"
                                        width="100">
                                </div>
                            @endif
                            <label for="image">Immagine di copertina</label>
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="Inserisci un immagine" value="{{ old('image') }}">
                        </div>
                        <div class="form-group col-4 mt-3">
                            <label for="start_date">Data di inizio progetto</label>
                            <input type="date" name="start_date" id="start_date"
                                value="{{ old('start_date') ?? $project->start_date }}"
                                class="form-control @error('start_date') is-invalid @enderror" required>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4 mt-3">
                            <label for="end_date">Data di fine progetto</label>
                            <input type="date" name="end_date" id="end_date"
                                value="{{ old('end_date') ?? $project->end_date }}"
                                class="form-control @error('start_date') is-invalid @enderror">
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4 mt-3">
                            <label for="type_id">Seleziona il tipo</label>
                            <select name="type_id" id="type_id" class="form-select">
                                <option value="">Seleziona tipo</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 mt-3">
                            <label for="">Seleziona tecnologia</label>
                            <div>
                                @foreach ($technologies as $technology)
                                    <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                        class="form-check-input" value="{{ $technology->id }}"
                                        @checked(is_array(old('technologies')) && in_array($technology->id, old('technologies')))>
                                    <label for="">{{ $technology->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-12 mt-3">
                            <label for="description">Descrizione</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control @error('description') is-invalid @enderror" required>{{ old('description') ?? $project->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Salva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
