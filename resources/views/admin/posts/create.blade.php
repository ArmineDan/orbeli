@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">
    <h2>Create Post <small><code> lang:{{$locale}}</code> {{$last_id}}<small></h2>
    @if(count($errors) > 0) 
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      </div>
    @endif

    
        
    @isset(session()->get( 'imgDebug' )['errors'])
      <div class="alert alert-danger">
        <ul>
          @foreach (session()->get( 'imgDebug' )['errors'] as $error)
          <li>{{ $error['message'] }}</li>
          @endforeach
        </ul>
      </div>
    @endisset
    @isset(session()->get( 'imgDebug' )['success'])
      <div class="alert alert-success">
          <ul class="list-group-item">
            @foreach (session()->get( 'imgDebug' )['success'] as $success)
            <li>{{ $success['path'] }}</li>
            @endforeach
          </ul>         
      </div>
    @endisset

    <div class="row">
      <form action="{{ route('admin.document.uploadimage', $locale) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-3">      
            <input type="file" name="images[]" id="images" multiple="multiple" class="btn btn-default">
            <input type="text" hidden name="post_id" value="{{$last_id}}">
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
    
    
    <form action="{{ route('admin.post.store', $locale) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <h5 for="title">Title</h5>
      <input type="text" name="title" class="form-control" placeholder="Post name">
      <input type="text" name="lang_id" value="{{$lang_id}}" hidden>
      <input type="text" hidden name="post_id" value="{{$last_id}}">
      <hr>

      <h5 for="post_typ">Category</h5>
      <select name="post_typ" class="form-control">
        <option value="">Select Category</option>
        @forelse ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @empty
          <option value="">Category is empty.</option>
        @endforelse
      </select>
      <hr>

      <h5 for="status">Status</h5>
      <select name="status" class="form-control" >
          <option value="" style="display:none">Select Post status</option>
          <option value="published">Published</option>
          <option value="not_published">Not published</option>
          <option value="main">Main Post</option>
          {{-- <option value="archive">Archive</option>        --}}
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

      <h5 for="post_short_text">Short Description</h5>
      <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input short description">       
      </textarea>
      <hr>
      <h5 for="post_long_text">Full Text</h5>
      <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input post description">       
      </textarea>
      <hr>

      <h5 for="img">Post main image 900x600: upload and past url here <code>/storage/post/14/clouds-picture.jpg</code></h5>
      <input type="text" name="img" id="img" class="form-control" placeholder="post image url" >
      <hr>

      <h5 for="thumb_img">Cropped Image url 450x600: <code>/storage/post/14/cropped-clouds-picture.jpg</code></h5>
      <input type="text" name="thumb_img" id="thumb_img" class="form-control" placeholder="automaticaly cropped image url" >
      <hr>

      {{-- <h5 for="files">Post files: 
        <code>files/1/posts/file_name.pdf,files/1/posts/file_name.doc(x)</code>
        <a href="https://ebook.online-convert.com/ru" target="_blank"><mark>ebook-online-convert (epub/azw3/fb2/pdb)</mark></a>
      </h5>
      <input type="text" name="files" id="files" class="form-control" placeholder="input files separated by comma">
      <hr> --}}

      
      <h5 for="duration">Duration <code>minute</code></h5>
      <input type="text" name="p_duratioan" class="form-control" value="5">
      <hr>
      
      
      <h5 for="" style="display:block">Select tags for current post, separated by comma.<kbd>without spaces</kbd></h5>
      <p>{{ implode(",",$tags) }}</p>
      <input type="text" name="tags" class="form-control" placeholder="Insert tags separated by commas">
      <hr>

      

      <h5>Meta data</h5>
      <h5 for="meta_k">Meta keywords <kbd>without spaces</kbd></h5>
      <input type="text" name="meta_k" class="form-control" placeholder="Insert meta-keywords separated by commas">
      <h5 for="meta_d">Meta description</h5>
      <input type="text" name="meta_d" class="form-control" placeholder="Insert meta-description">
      <hr>
      <button type="submit" class="btn btn-success" style="width:130px">Next</button>
    </form><hr>
  </div>
@endsection
