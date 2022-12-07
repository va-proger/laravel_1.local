@extends('layouts.admin')
@section('content')
        <h1>Detail post:  {{  $post->title }} </h1>
        <div class="card mb-3" >
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $post->image ?? 'https://imgholder.ru/600x600/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson' }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="d-flex align-items-center" style="gap: 10px;">ID: <span class="badge bg-secondary d-flex align-items-center justify-content-center">{{ $post->id }}</span></p>
                        <div class="d-flex align-items-center">Category: <span class="fw-bold ms-1">{{$post->category->title}}</span></div>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $post->created_at->format('d.m.Y') }}</small></p>

                    </div>
                </div>
            </div>
        </div>
     <div class="d-flex align-items-center" style="gap: 10px">
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
         <div class="">
             <a class="btn btn-dark" href="{{ route('admin.post.index') }}">Back</a>
         </div>

     </div>

@endsection
