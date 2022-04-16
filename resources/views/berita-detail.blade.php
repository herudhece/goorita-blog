@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{{ $berita->title }}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">{{ $berita->created_at->diffForHumans() }}, by {{ $berita->user->name }}</div>                
            </header>
            
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid" width="1000" src="{{ asset('berita-images/' . $berita->image) }}" alt="..." /></figure>
            <!-- Post content-->
            <section class="mb-5">
                <p class="fs-5 mb-4">{!! $berita->description !!}</p>
            </section>
        </article>
    </div>
</div>
@endsection