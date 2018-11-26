@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">
    <h2>Create Post <small>№ {{$last_id}} <code>lang:{{$locale}}</code> <small></h2>
    
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
        <td><span>{{ $imageurls[$i]['url'] }}</span></td>
        <td><img src="{{$imageurls[$i]['url']}}" alt="" width="120px"></td>
        <td><span>{{$imageurls[$i]['size']}}</span></td>      
      </tr>
      @endfor
    </tbody>
    </table>        
    @endisset
    
    
    <form action="{{ route('admin.post.store', $locale) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <input type="text" name="lang_id" value="{{$lang_id}}" hidden>
      <input type="text" name="post_id" value="{{$last_id}}" hidden>
      <input type="text" name="author_id" value="1" hidden>
 
      <div class="panel panel-info">
          <div class="panel-heading"><h5 for="post_typ">Select Category</h5></div>
          <div class="panel-body">
              <select name="post_typ" class="form-control" onchange="checkCategory()">
                <option value="">Select Category</option>
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                  <option value="">Category is empty.</option>
                @endforelse
              </select>
          </div>
      </div>
      <hr>

      <h5 for="title">Title</h5>
      <input type="text" name="title" class="form-control" placeholder="Post name">
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

      <h5>Authors</h5>
      <select name="authors[]" class="form-control" id="ex-search-2" multiple>        
        @forelse ($authors as $author)
          <option value="{{ $author->id }}"> {{ $author->name }} {{ $author->lastname }} </option>
        @empty
          <option value="">Please Insert One Author, then update the Video.</option>
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

      <h5 for="post_long_text">Long Description</h5>
      <span class="text text-info">only for "Economy"-category</span>
      <div id="long_text_wrap" style="display:none">
        <textarea name="long_text" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input long description">       
        </textarea>
      </div>
      <hr>

      <h5 for="post_full_text">Full Content</h5>
      <textarea name="html_code" id="post_full_text" cols="30" rows="10" class="form-control" placeholder="Input content">       
        Content com1es here ...
      </textarea>
      <hr>

      <h5 for="img">Main image 900x600: upload and past url here <code>/storage/post/14/clouds-picture.jpg</code></h5>
      <input type="text" name="img" id="img" class="form-control" placeholder="Main image url..." >
      <hr>

      <h5 for="thumb_img">Cropped Image 450x600: <code>/storage/post/14/cropped-clouds-picture.jpg</code></h5>
      <span class="text text-info">only for "Economy"-category</span>
      <div id="thumb_img_wrap" style="display:none">
        <input type="text" name="thumb_img" id="thumb_img" class="form-control" placeholder="Second image url...">
      </div>
      <hr>

      
      <h5 for="duration">Duration <code>minute</code>
        <span class="btn btn-danger" onclick="CountDuration()">count</span>
        <span style="margin-left:20px"> <span id="time_text"></span> <span id="time_words"></span> </span>
      </h5>
      <input type="text" name="p_duratioan" id="duration" class="form-control" value="1">
      <hr>
      
      
      {{-- <h5 for="" style="display:block">Select tags for current post, separated by comma.<kbd>without spaces</kbd></h5>
      <p>{{ implode(",",$tags) }}</p>
      <input type="text" name="tags" class="form-control" placeholder="Insert tags separated by commas">
      <hr> --}}

      <h5 style="display:block">Select tags for current post</h5>
      <input type="text" name="new_tag" id="new_tag" value="">
      <span onclick="addPostNewTag(event)" id="add_tag_btn">Add</span><br>
      <select name="tags[]" id="ex-search-1" class="form-control" multiple="multiple">
        @if ($tags)
         @for ($i = 0; $i < count($tags); $i++)
         <option value="{{$tags[$i]}}">{{$tags[$i]}}</option>
         @endfor
        @else
        <option value="">No tags in list. Please add new tags manually.</option>        
        @endif
      </select>
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
