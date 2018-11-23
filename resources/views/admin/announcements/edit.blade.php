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

    <h2> Edit Announcement <small><code>Number:{{$announcement['id']}}</code></small> </h2>

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
                <input type="text" hidden name="folder_name" id="" value="{{$folder_name}}">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success" style="width:130px">Upload Images</button>
            </div>     
        </form>
    </div>

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

    <form action="{{ route('admin.announcements.update', [$locale, $announcement]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

        <label for="title">Title</label>
        <input name="title" class="form-control" value="{{$announcement['title']}}">
        <hr>

        <label for="short_text">Short Text</label>
        <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control">       
            {{$announcement['short_text']}}
        </textarea>
        <hr>

        <label for="html_code">HTML code</label>
        <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control" value="{{$announcement['html_code']}}">       
            {{$announcement['html_code']}}
        </textarea>
        <hr>

        <label for="img">Img <code> 900x600 </code> </label>
        <input name="img" class="form-control" value="{{$announcement['img']}}">
        <hr>

        <h5 for="date">Date</h5>
        <input type="date" name="date" class="form-control" value="{{$announcement['date']}}">
        <hr>

        <label for="status">Select Status</label>
            <select name="status" class="form-control" >
                <option value="published" @if($announcement->status =='published') selected @endif >Published</option>
                <option value="not_published" @if($announcement->status == 'not_published') selected @endif>Not published</option>       
            </select>
            <hr>
        

        <label for="meta_k">Meta keywords <kbd>without spaces</kbd> </label>
        <input name="meta_k" class="form-control" value="{{$announcement['meta_k']}}">
        <hr>

        <label for="meta_d"> Meta description </label>
        <input name="meta_d" class="form-control" value="{{$announcement['meta_d']}}">
        <hr>

        <h5 for="a_duration">Duration <code>minute</code>
            <span class="btn btn-danger" onclick="CountDurationLong()">count</span>
            <span style="margin-left:20px"> <span id="time_text"></span> <span id="time_words"></span> </span>
        </h5>

        <input name="a_duration" id="duration" class="form-control" value="{{$announcement['a_duration']}}">
        <hr>

        <label for="" style="display:block">Post tags</label>            
            <input type="text" name="new_tag" id="new_tag" value="">
            <span onclick="addNewTag(event)" id="add_tag_btn">Add</span><br>
            <select name="tags[]" id="ex-search" multiple="multiple">
                @if ($atags)
                    @for ($i = 0; $i < count($atags); $i++)
                        <option value="{{$atags[$i]}}"
                        @if (in_array($atags[$i], $ptags))
                            selected="selected"
                        @endif                    
                        >{{$atags[$i]}}</option>
                    @endfor
                @else
                <option value="">No tags in list. Please add new tags manually.</option>        
                @endif
            </select>
            <hr>
    
        <label for="authors_id">Select Author Id</label>
            <select name="author_id" class="form-control">
                @forelse ($authors as $item)
                <option value="{{ $item->id }}"
                    @if ($announcement['author_id'] == $item->id)
                        selected='selected'
                    @endif
                    >
                    {{ $item->name }} {{ $item->lastname }} 
                </option>
                @empty
                    <option value="">Please Insert One Author, then update the Post.</option>
                @endforelse
            </select>
            <hr> 

        <input type="hidden" value="{{$announcement['post_typ']}}" name="post_typ">

        <input type="hidden" value="{{$lang_id}}" name="lang_id">

        <input name="view" value="{{$announcement['view']}}" type="hidden"><br>
            
        <div class="well"><button class="btn btn-success">Update</button></div>

    </form>

</div>

@endsection