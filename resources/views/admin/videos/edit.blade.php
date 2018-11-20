@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h2>Edit Video <small>№ {{ $video->id }} <code>lang:{{$locale}}</code></small></h2>

    @include('admin.common.imgMessages')

    <div class="row">
      <form action="{{ route('admin.document.uploadimage', $locale) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-3">    
              <input type="file" name="images[]" id="images" multiple="multiple" class="btn btn-default">
              <input type="text" hidden name="post_id" value="{{$video->id}}">
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
    @foreach ($imageurls as $image)
    <tr>
        <td><span>{{$image['url']}}</span></td>
        <td><img src="{{$image['url']}}" alt="" width="120px"></td>
        <td><span>{{$image['size']}}</span></td>      
    </tr>
    @endforeach
    </tbody>
    </table>        
    @endisset


    <form action="{{ route('admin.video.update', [$video,$locale]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="text" hidden name="lang_id" id="" value="{{$video->lang_id}}">
        <input type="text" name="video_id" value="{{$video->id}}" hidden>
        <input type="text" hidden name="post_typ" value="{{$post_typ}}">

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $video->title }}">
        <hr>

        <label for="status">Status</label>
        <select name="status" class="form-control" >
            <option value="" style="display:none">Select Video status</option>
            <option value="published" @if($video->status =='published') selected @endif >Published</option>
            <option value="not_published" @if($video->status == 'not_published') selected @endif>Not published</option>       
            <option value="main" @if($video->status =='main') selected @endif >Main Post</option>
        </select>
        <hr>

        <label for="authors_id">Author</label>
        <select name="author_id" class="form-control">
            <option value="">Select Author</option>
            @forelse ($authors as $author)
            <option value="{{ $author->id }}"
                @if ($video->author_id == $author->id)
                    selected='selected'
                @endif
                >
                {{ $author->name }} {{ $author->lastname }} 
            </option>
            @empty
                <option value="">Please Insert One Author, then update the Video.</option>
            @endforelse
        </select>
        <hr>

        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $video->date }}">
        <hr>

        <label for="post_short_text">Short Description <code>without any media.</code></label>
        <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control">       
            {{ $video->short_text }}
        </textarea>
        <hr>

        <label for="post_full_text">Full Content</label>
        <p>For sharing video add "embed"-link<code>https://www.youtube.com/<mark>embed</mark>/SHo3fAZfXMk</code></p>
        <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control">       
            {{ $video->html_code }}
        </textarea>
        <hr>

        <label for="img">Main image 900x600: upload and past url here <code>/storage/videos/14/clouds-picture.jpg</code></label>
          <input type="text" name="img" id="img" class="form-control" value="{{$video->img}}">
        <hr>

        <label for="duration">Duration <code>minute</code></label>
        <input type="text" name="duration" id="duration" class="form-control" value="{{$video->duration}}">
        <hr>

        {{-- <label for="" style="display:block">Video tags <kbd>without spaces</kbd></label>
        <p>{{$allTagsList}}</p>
        <input type="text" name="tags" class="form-control" value="{{$videoTagsList}}">
        <hr> --}}

        <label for="" style="display:block">Video tags</label>        
        <input type="text" name="new_tag" id="new_tag" value="">
        <span onclick="addNewTag(event)" id="add_tag_btn">Add</span><br>
        <select name="tags[]" id="ex-search" multiple="multiple">
            @if ($atags)
                @for ($i = 0; $i < count($atags); $i++)
                    <option value="{{$atags[$i]}}"
                    @if (in_array($atags[$i], $vtags))
                        selected="selected"
                    @endif                    
                    >{{$atags[$i]}}</option>
                @endfor
            @else
            <option value="">No tags in list. Please add new tags manually.</option>        
            @endif
        </select>
        <hr>

        <label for="">Viewed</label>
        <input type="text" name="view" value="{{ $video->view }}" class="form-control">
        <hr>

        <h4>Meta data</h4>
        <label for="meta_k">Meta keywords <kbd>without spaces</kbd></label>
        <input type="text" name="meta_k" class="form-control" value="{{ $video->meta_k }}">
        <label for="meta_d">Meta description</label>
        <input type="text" name="meta_d" class="form-control" value="{{ $video->meta_d }}">
        <hr>

        <label for="post_files">Video files</label>
        <div class="panel panel-default">
            <div class="panel-heading">
                To manage Files and Comments, please, push here
                <a href="{{route('admin.video.show',[$video, $locale])}}" class="btn btn-info" target="_blank">
                    Manage Files and Comments
                    <i class="glyphicon glyphicon-comment"></i>
                    <i class="glyphicon glyphicon-paperclip"></i>
                </a>                    
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @forelse($docsObject as $key => $doc)
                    <li class="list-group-item">
                        {{$doc->link}}
                    </li>
                    @empty
                    <li class="list-group-item">
                        <mark>Current Video doesn't have attached files.</mark>
                    </li>                                                    
                    @endforelse
                </ul>
            </div>
        </div>
        <hr>

        <div class="well">
            <button type="submit" class="btn btn-info" style="width:15%">Update</button>
        </div>
    </form>
</div>    
@endsection
