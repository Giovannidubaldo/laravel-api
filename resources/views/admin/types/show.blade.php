@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row my-3">
            <h2>{{ $type->name }}</h2>
            @forelse ($type->projects as $project)
                <div class="col-3 my-3">
                    <div class="card h-100">
                        <img src="{{ $project->image ? asset('/storage/' . $project->image) : asset('/img/sfondo.jpg') }}"
                            alt="" class="card-image-top">
                        <div class="card-body">
                            <h4>{{ $project->name }}</h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 my-3">
                    <h3>Non esistono progetto di questo tipo...</h3>
                </div>
            @endforelse
        </div>
    </div>
    </div>
    </div>
@endsection
