@extends('layouts.admin')


@section('content')
    <div class="">

        @foreach($posts as $post)

            <div class="card mb-3" >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $post->image ?? 'https://imgholder.ru/600x600/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson' }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-end" style="gap: 10px">
                                <div class="">
                                    <a  class="btn btn-success" href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
                                </div>
                                <div class="me-auto">
                                    <form action="{{ route('admin.post.delete', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </div>


                            </div>
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
                            <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-primary mt-auto">More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>

@endsection
