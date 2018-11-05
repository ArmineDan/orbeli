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

    <form action="{{ route('admin.post.store', $locale) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Post name">
      <input type="text" name="lang_id" value="{{$lang_id}}" hidden>
      <hr>

      <label for="post_short_text">Short Description</label>
      <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input short description">       
      </textarea>
      <hr>
      <label for="post_long_text">Full Description</label>
      <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input post description">       
      </textarea>
      <hr>

      <label for="img">Post main image 900x600: upload and past url here <code>photos/1/posts/image_name.jpg</code></label>
      <input type="text" name="img" id="img" class="form-control" placeholder="post image url" required>
      <hr>

      <label for="thumb_img">Cropped Image url 450x600: <code>photos/1/posts<mark>/thumbs/</mark>image_name.jpg</code></label>
      <input type="text" name="thumb_img" id="thumb_img" class="form-control" placeholder="automaticaly cropped image url" required>
      <hr>

      <label for="files">Post files: 
        <code>files/1/posts/file_name.pdf,files/1/posts/file_name.doc(x)</code>
        <a href="https://ebook.online-convert.com/ru" target="_blank"><mark>ebook-online-convert (epub/azw3/fb2/pdb)</mark></a>
      </label>
      
      <input type="text" name="files" id="files" class="form-control" placeholder="input files separated by comma">
      <hr>

      <label for="authors_id">Author</label>
      <select name="author_id" class="form-control">
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

      
      <label for="" style="display:block">Select tags for current post, separated by comma.</label>
      <p>{{ implode(",",$tags) }}</p>
      <input type="text" name="tags" class="form-control" placeholder="Insert tags separated by commas">
      <hr>

      <label for="status">Status</label>
      <select name="status" class="form-control" >
          <option value="" style="display:none">Select Post status</option>
          <option value="published">Published</option>
          <option value="not_published">Not published</option>
          <option value="main">Main Post</option>
          {{-- <option value="archive">Archive</option>        --}}
      </select>
      <hr>

      <h4>Meta data</h4>
      <label for="meta_k">Meta keywords</label>
      <input type="text" name="meta_k" class="form-control" placeholder="Insert meta-keywords separated by commas">
      <label for="meta_d">Meta description</label>
      <input type="text" name="meta_d" class="form-control" placeholder="Insert meta-description">
      <button type="submit">Save</button>
    </form>
  </div>
@endsection
