@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row my-3">
            <h2 class="text-capitalize">Tipologia: {{ $type->name }}</h2>
            @forelse ($type->projects as $project)
                <div class="col-3 my-3">
                    <div class="card h-100">
                        <img src="{{ $project->image ? asset('/storage/' . $project->image) : asset('https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg') }}"
                            alt="" class="card-image-top">
                        <div class="card-body">
                            <h4 class="text-capitalize">{{ $project->name }}</h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 my-3">
                    <h3>Non esistono progetti di questo tipo...</h3>
                </div>
            @endforelse
        </div>
    </div>
    </div>
    </div>
@endsection
