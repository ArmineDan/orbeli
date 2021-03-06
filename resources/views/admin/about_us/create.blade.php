@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    <h3> Create About Us <small><code> lang:{{$locale}}</code></small></h3>
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
                <input type="text" hidden name="folder_name" id="" value="{{$folder_name}}">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success" style="width:130px;margin-top:5px">
                  Upload Images
                </button>
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

    <form action="{{ route('admin.about_us.store', $locale) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="text" name="lang_id" value="{{$lang_id}}" hidden>

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Create Title">
        <hr>

        <label for="html_code">HTML code</label>
        <textarea name="html_code" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="About content here ..."></textarea>
        <hr>        
        
        <div class="well">
          <button type="submit" class="btn btn-success" style="width:130px"> Save </button>
        </div>
    </form>
</div>

@endsection