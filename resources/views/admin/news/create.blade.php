@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  {{-- js-ok-in-app_admin --}}
  <h3>Create News <small> № {{$last_id}}<code> lang:{{$locale}}</code><small></h3>
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
                <button type="submit" class="btn btn-success" style="width:130px; margin-top:5px">Upload Images</button>
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


    <form action="{{ route('admin.news.store', $locale) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="text" name="lang_id" value="{{$lang_id}}" hidden>
        <input type="text" name="news_id" value="{{$last_id}}" hidden>
        <input type="text" name="post_typ" value="{{$post_typ}}" hidden>

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Create title">
        <hr>

        <label for="status">Status</label>
        <select name="status" class="form-control" >
            <option value="" style="display:none">Select Post status</option>
            <option value="published">Published</option>
            <option value="not_published">Not published</option>
        </select>
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

        <label for="short_text">Short Description</label>
        <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input short description">       
        </textarea>
        <hr>

        <label for="html_code">Full Text</label>
        <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control" placeholder="Input content">       
        </textarea>
        <hr>        

        <label for="img">Main image 900x600: upload and past url here <code>/storage/news/14/clouds-picture.jpg</code></label>
        <input type="text" name="img" id="img" class="form-control" placeholder="Main image url..." >
        <hr>

        <label for="duration">Duration <code>minute</code>
          <span class="btn btn-danger" onclick="CountDurationLong()">count</span>
          <span style="margin-left:20px"> <span id="time_text"></span> <span id="time_words"></span> </span>
        </label>
        <input type="text" name="n_duration" id="duration" class="form-control" value="1">
        <hr>

        {{-- <label for="" style="display:block">Select tags for current post, separated by comma.<kbd>without spaces</kbd></label>
        <p>{{ implode(",",$tags) }}</p>
        <input type="text" name="tags" class="form-control" placeholder="Insert tags separated by commas">
        <hr> --}}

        <h5 style="display:block">Select tags for current News</h5>
        <input type="text" name="new_tag" id="new_tag" value="">
        <span onclick="addNewTag(event)" id="add_tag_btn">Add</span><br>
        <select name="tags[]" id="ex-search" class="form-control" multiple="multiple">
            @if ($tags)
            @for ($i = 0; $i < count($tags); $i++)
            <option value="{{$tags[$i]}}">{{$tags[$i]}}</option>
            @endfor
            @else
            <option value="">No tags in list. Please add new tags manually.</option>        
            @endif
        </select>
        <hr>

        <h4>Meta data</h4>
        <label for="meta_k">Meta keywords <kbd>without spaces</kbd></label>
        <input type="text" name="meta_k" class="form-control" placeholder="Insert meta-keywords separated by commas">
        <hr>
        <label for="meta_d">Meta description</label>
        <input type="text" name="meta_d" class="form-control" placeholder="Insert meta-description">
        <hr>

        <button type="submit" class="btn btn-success" style="width:130px">Next</button>
    </form>
    <hr>
</div>

@endsection