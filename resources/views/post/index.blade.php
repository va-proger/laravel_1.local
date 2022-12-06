@extends('layouts.main')
@section('content')
    <h1>This is posts page</h1>
    <div class="mb-2">
        <a class="btn btn-success" href="{{ route('post.create') }}">Add Post</a>
    </div>
    @foreach($posts as $post)

        <div class="card mb-3" >
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $post->image ?? 'https://imgholder.ru/600x600/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson' }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center justify-content-between">{{ $post->title }}  <span class=" badge bg-secondary ">ID: {{ $post->id }}</span></h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <div class="d-flex align-items-center">Category: <span class="fw-bold ms-1">{{$post->category->title}}</span></div>
                        <div class="d-flex flex-column">
                            <span>Tags:</span>
                            <div class="d-flex align-items-center flex-wrap" style="gap: 5px;">
                                @foreach($post->tags as $tag)
                                    <span class="badge text-bg-secondary">{{$tag->title}}</span>
                                @endforeach
                            </div>
                        </div>

                        <p class="card-text"><small class="text-muted">{{ $post->created_at->format('d.m.Y') }}</small></p>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary mt-auto">More</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
