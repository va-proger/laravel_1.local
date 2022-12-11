@extends('layouts.admin')
@section('content')
    <div class="">
        <a href="{{ route('admin.post.index') }}">To Posts</a>
    </div>
    <div class="">
        <form action="{{ route("admin.post.store") }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Title">

                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 ">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input value="{{ old('image') }}" type="text" name="image" class="form-control" id="image" placeholder="Image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select" id="category"  name="category_id">
                    @foreach($categories as $category)
                     <option
                        {{ old('category_id') == $category->id ? ' selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select class="form-select" multiple  id="tags" name="tags[]">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
