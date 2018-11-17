@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h2>Edit Opinion <small>№ {{ $opinion->id }} <code>lang:{{$locale}}</code></small></h2>

    @include('admin.common.imgMessages')

    <div class="row">
      <form action="{{ route('admin.document.uploadimage', $locale) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-3">    
              <input type="file" name="images[]" id="images" multiple="multiple" class="btn btn-default">
              <input type="text" hidden name="post_id" value="{{$opinion->id}}">
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


    <form action="{{ route('admin.opinion.update', [$opinion,$locale]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="text" hidden name="lang_id" id="" value="{{$opinion->lang_id}}">
        <input type="text" name="opinion_id" value="{{$opinion->id}}" hidden>
        <input type="text" hidden name="post_typ" value="{{$post_typ}}">

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $opinion->title }}">
        <hr>

        <label for="status">Status</label>
        <select name="status" class="form-control" >
            <option value="" style="display:none">Select Post status</option>
            <option value="published" @if($opinion->status =='published') selected @endif >Published</option>
            <option value="not_published" @if($opinion->status == 'not_published') selected @endif>Not published</option>       
        </select>
        <hr>

        <label for="authors_id">Author</label>
        <select name="author_id" class="form-control">
            <option value="">Select Author</option>
            @forelse ($authors as $author)
            <option value="{{ $author->id }}"
                @if ($opinion->author_id == $author->id)
                    selected='selected'
                @endif
                >
                {{ $author->name }} {{ $author->lastname }} 
            </option>
            @empty
                <option value="">Please Insert One Author, then update the Post.</option>
            @endforelse
        </select>
        <hr>

        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $opinion->date }}">
        <hr>

        <label for="post_short_text">Short Description <code>without any media.</code></label>
        <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control">       
            {{ $opinion->short_text }}
        </textarea>
        <hr>

        <label for="post_full_text">Full Content</label>
        <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control">       
            {{ $opinion->html_code }}
        </textarea>
        <hr>

        <label for="img">Main image 900x600: upload and past url here <code>/storage/opinions/14/clouds-picture.jpg</code></label>
          <input type="text" name="img" id="img" class="form-control" value="{{$opinion->img}}">
        <hr>

        <label for="duration">Duration <code>minute</code></label>
        <span class="btn btn-danger" onclick="CountDurationLong()">count</span>
        <span style="margin-left:20px"> <span id="time_text"></span> <span id="time_words"></span> </span>
        <input type="text" name="o_duration" id="duration" class="form-control" value="{{$opinion->o_duration}}">
        <hr>

        <label for="" style="display:block">Opinion tags <kbd>without spaces</kbd></label>
        <p>{{$allTagsList}}</p>
        <input type="text" name="tags" class="form-control" value="{{$opinionTagsList}}">
        <hr>

        <label for="">Viewed</label>
        <input type="text" name="view" value="{{ $opinion->view }}" class="form-control">
        <hr>

        <h4>Meta data</h4>
        <label for="meta_k">Meta keywords <kbd>without spaces</kbd></label>
        <input type="text" name="meta_k" class="form-control" value="{{ $opinion->meta_k }}">
        <label for="meta_d">Meta description</label>
        <input type="text" name="meta_d" class="form-control" value="{{ $opinion->meta_d }}">
        <hr>

        <label for="post_files">Opinion files</label>
        <div class="panel panel-default">
            <div class="panel-heading">
                To manage Files and Comments, please, push here
                <a href="{{route('admin.opinion.show',[$opinion, $locale])}}" class="btn btn-info" target="_blank">
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
                        <mark>Current Post doesn't have attached files.</mark>
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
