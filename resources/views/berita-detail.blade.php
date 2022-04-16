@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <div class="card mb-4">
                    <a href="/berita/{{ $berita->slug }}"><img class="card-img-top" src="{{ asset('berita-images/' . $berita->image) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $berita->created_at->diffForHumans() }} , by {{ $berita->user->name }}</div>
                        <h2 class="card-title">{{ $berita->title }}</h2>
                        <p class="card-text">{!! $berita->description !!}</p>
                    </div>
                </div>
            </header>
        </article>
    </div>
</div>
@endsection