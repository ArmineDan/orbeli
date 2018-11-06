@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    <h2> Create Parralax </h2>

    <form action="{{ route('admin.parralax.store', $locale) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Create name">
        <hr>

        <label for="post_short_text">Parallax Text</label>
        <textarea name="text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input text">       
        </textarea>
        <hr>

        <label for="title">Link</label>
        <input type="text" name="link" class="form-control" placeholder="Create link">
        <hr>

        <label for="title">Post main image 900x600: upload and past url here <code>photos/1/posts/image_name.jpg</code></label>
        <input type="text" name="img" class="form-control" placeholder="Create img">
        <br>

        <button type="submit" class="btn btn-success"> Save </button>
    </form>
</div>

@endsection