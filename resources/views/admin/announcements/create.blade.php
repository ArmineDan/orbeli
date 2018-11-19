@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    <h2>Create Announcements <small>№ {{$last_id}} <code>lang:{{$locale}}</code> </small></h2>

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

    <form action="{{ route('admin.announcements.store', $locale) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

        <label for="title">Title</label>
        <input name="title" class="form-control" placeholder="Create Title">
        <hr>

        <label for="short_text">Short Text</label>
        <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control">       
        </textarea>
        <hr>

        <label for="html_code">HTML code</label>
        <textarea name="html_code" id="post_long_text" cols="30" rows="10" class="form-control">       
        </textarea>
        <hr>

        <label for="img">Img <code> 500x500 </code> </label>
        <input name="img" class="form-control" placeholder="Img">
        <hr>

        <h5 for="date">Date</h5>
        <input type="date" name="date" class="form-control" placeholder="select date">
        <hr>

        <select name="status" class="form-control">
            <option>Select Status</option>
            <option>Published</option>
            <option>no published</option>
        </select><hr>

        <label for="meta_k">Meta keywords <kbd>without spaces</kbd> </label>
        <input type="email" name="meta_k" class="form-control" placeholder="Insert meta-keywords separated by commas">
        <hr>

        <label for="meta_d"> Meta description </label>
        <input name="meta_d" class="form-control" placeholder="Insert meta-description">
        <hr>

        <h5 for="duration">Duration <code>minute</code>
        <span class="btn btn-danger" onclick="CountDurationLong()">count</span>
        <span style="margin-left:20px"> <span id="time_text"></span> <span id="time_words"></span> </span>
        </h5>
        <input name="p_duratioan" id="duration" class="form-control" value="5">
        <hr>

        <label for="authors_id"> Select Author Id </label>
        <select name="author_id" class="form-control">
            @foreach ($authors as $item)
                <option value="{{$item->id}}"> {{ $item->name }} {{ $item->lastname }} </option>
            @endforeach
        </select><br>

        <input type="hidden" value="{{$lang_id}}" name="lang_id">

        <input name="view" value="0" type="hidden"><br>

        <button type="submit" class="btn btn-success"> Save </button>
    </form>
</div>

@endsection