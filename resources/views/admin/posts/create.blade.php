@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    <h2>Create Post</h2>
    @if(count($errors) > 0) 
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      </div>
    @endif

    <form action="{{ route('admin.post.store') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Post name">
      <hr>

      <label for="post_short_text">Short Description</label>
      <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input short description">       
      </textarea>
      <hr>
      <label for="post_long_text">Full Description</label>
      <textarea name="long_text" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input post description">       
      </textarea>
      <hr>

      <input type="text" name="img" class="form-control" placeholder="main image" disabled>
      <hr>

      <label for="authors_id">Author</label>
      <select name="authors_id" class="form-control">
        <option value="">Select Author</option>
        @forelse ($authors as $author)
            <option value="{{ $author->id }}"> {{ $author->name }} {{ $author->lastname }} </option>
        @empty
            <option value="">Please Insert One Author, then update the Post.</option>
        @endforelse
      </select>
      <hr>

      <label for="date">Date</label>
      <input type="date" name="date" class="form-control" placeholder="select date">
      <hr>

      <label for="post_typ">Category</label>
      <select name="post_typ" class="form-control">
        <option value="">Select Category</option>
        @forelse ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @empty
          <option value="">Category is empty.</option>
        @endforelse
      </select>
      <hr>

      
      <label for="" style="display:block">Select tags for current post</label>
      {{-- <select name="tag1" class="col-sm-3">
          <option value="">Tag 1</option>
          @forelse ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @empty
            <option value="">Tags are empty.</option>            
          @endforelse
      </select>
      <select name="tag2" class="col-sm-2">
          <option value="">Tag 2</option>
          @forelse ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @empty
            <option value="">Tags are empty.</option>            
          @endforelse
      </select>
      <select name="tag3" class="col-sm-2">
          <option value="">Tag 3</option>
          @forelse ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @empty
            <option value="">Tags are empty.</option>            
          @endforelse
      </select>
      <select name="tag4" class="col-sm-2">
          <option value="">Tag 4</option>
          @forelse ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @empty
            <option value="">Tags are empty.</option>            
          @endforelse
      </select>
      <select name="tag5" class="col-sm-3">
          <option value="">Tag 5</option>
          @forelse ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @empty
            <option value="">Tags are empty.</option>            
          @endforelse
      </select> --}}
      <input type="text" name="tags" class="form-control" placeholder="Insert tags separated by commas">
      <hr>

      <label for="status">Status</label>
      <select name="status" class="form-control" >
          <option value="" style="display:none">Select Post status</option>
          <option value="published">Published</option>
          <option value="main">Main Post</option>
          {{-- <option value="archive">Archive</option>        --}}
      </select>
      <hr>

      <h4>Meta data</h4>
      <label for="meta-k">Meta keywords</label>
      <input type="text" name="meta-k" class="form-control" placeholder="Insert meta-keywords separated by commas">
      <label for="meta-d">Meta description</label>
      <input type="text" name="meta-d" class="form-control" placeholder="Insert meta-description">
      <button type="submit">Save</button>
    </form>
  </div>
@endsection
