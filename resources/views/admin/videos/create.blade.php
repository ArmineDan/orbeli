@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h3>Create Video <small> № {{$last_id}}<code> lang:{{$locale}}</code><small></h3>

    @include('admin.common.imgMessages')

    <div class="row">
      <form action="{{ route('admin.document.uploadimage', $locale) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-3">    
            <input type="file" name="images[]" id="images" multiple="multiple" class="btn btn-default">
            <input type="text" hidden name="post_id" value="{{$last_id}}">
            <input type="text" hidden name="folder_name" id="" value="{{$folder_name}}">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success" style="margin-top:5px; width:130px">Upload Images</button>
        </div>     
      </form>
    </div>
    <hr>

    @isset($imageurls)
    <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
      <thead>
        <th>url</th>
        <th>image</th>
        <th>size: kb</th>
      </thead>
      <tbody>     
      @for ($i = 0; $i < count($imageurls); $i++)
      <tr>
        <td><span>{{$imageurls[$i]['url']}}</span></td>
        <td><img src="{{$imageurls[$i]['url']}}" alt="" width="120px"></td>
        <td><span>{{$imageurls[$i]['size']}}</span></td>      
      </tr>
      @endfor
    </tbody>
    </table>        
    @endisset

    <form action="{{ route('admin.video.store', $locale) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <input type="text" name="lang_id" value="{{$lang_id}}" hidden>
      <input type="text" name="video_id" value="{{$last_id}}" hidden>
      <input type="text" name="post_typ" value="{{$post_typ}}" hidden>

      <h5 for="title">Title</h5>
      <input type="text" name="title" class="form-control" placeholder="Post name">
      <hr>

      <h5 for="status">Status</h5>
      <select name="status" class="form-control" >
          <option value="" style="display:none">Select Post status</option>
          <option value="published">Published</option>
          <option value="not_published">Not published</option>
          {{-- <option value="main">Main Post</option> --}}
      </select>
      <hr>

      <h5 for="authors_id">Author</h5>
      <select name="author_id" class="form-control">
        <option value="">Select Author</option>
        @forelse ($authors as $author)
            <option value="{{ $author->id }}"> {{ $author->name }} {{ $author->lastname }} </option>
        @empty
            <option value="">Please Insert One Author, then update the Post.</option>
        @endforelse
      </select>
      <hr>

      <h5 for="date">Date</h5>
      <input type="date" name="date" class="form-control" placeholder="select date">
      <hr>

      <h5 for="post_short_text">Short Description <code>without any media.</code></h5>
      <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input short description">       
      </textarea>
      <hr>

      <h5 for="post_full_text">Full Content</h5>
      <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input content">       
        Content comes here ...
      </textarea>
      <hr>

      <h5 for="img">Main image 900x600: upload and past url here <code>/storage/videos/14/clouds-picture.jpg</code></h5>
      <input type="text" name="img" id="img" class="form-control" placeholder="Main image url..." >
      <hr>

      <h5 for="duration">Duration <code>minute</code></h5>
      <input type="text" name="duration" id="duration" class="form-control" value="1">
      <hr>

      <h5 for="" style="display:block">Select tags for current post, separated by comma.<kbd>without spaces</kbd></h5>
      <p>{{ implode(",",$tags) }}</p>
      <input type="text" name="tags" class="form-control" placeholder="Insert tags separated by commas">
      <hr>

      <h4>Meta data</h4>
      <h5 for="meta_k">Meta keywords <kbd>without spaces</kbd></h5>
      <input type="text" name="meta_k" class="form-control" placeholder="Insert meta-keywords separated by commas">
      <h5 for="meta_d">Meta description</h5>
      <input type="text" name="meta_d" class="form-control" placeholder="Insert meta-description">
      <hr>
      <button type="submit" class="btn btn-success" style="width:130px">Next</button>
    </form><hr>
<div>   
@endsection