@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @if(count($errors) > 0) 
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h2> Edit parralax Number {{$parralax['id']}} </h2>

    <form action="{{ route('admin.parralax.update', $locale) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <label for="title">Title</label>
            <input name="title" class="form-control" value="{{ $parralax['title'] }}">
            <hr>

            <label for="post_short_text">Text</label>
            <textarea name="text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $parralax['text'] }}
            </textarea>
            <hr>

            <label for="link">Link</label>
            <input name="link" class="form-control" value="{{ $parralax['link'] }}">
            <hr>

            <label for="post_short_text">Main image url 900x600: <code>photos/1/posts/image_name.jpg</code></label>
            <input name="img" class="form-control" value="{{ $parralax['img'] }}">
            <hr>

            <button class="btn btn-success">Save</button>

    </form>

</div>

@endsection