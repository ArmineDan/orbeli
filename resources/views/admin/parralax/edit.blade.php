@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h2> Edit parallax <small><code> lang:{{$locale}} </code></small> </h2>

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
                <button type="submit" class="btn btn-success" style="width:130px;margin-top:5px">Upload Images</button>
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

    <form action="{{ route('admin.parralax.update', [$parralax, $locale]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('put') }}

        <label for="title">Parralax Name</label>
            <input name="title" class="form-control" value="{{ $parralax['title'] }}">
        <hr>

        <label for="post_short_text">Parralax Text</label>
        <textarea name="text" id="post_short_text" cols="30" rows="10" class="form-control">       
            {{ $parralax['text'] }}
        </textarea>
        <hr>


        <label for="link">Link</label>
        <input name="link" class="form-control" value="{{ $parralax['link'] }}">
        <hr>

        <label for="post_short_text">Parallax image url 1200x600</label>
        <input name="img" class="form-control" value="{{ $parralax['img'] }}">
        <br>

        <div class="well"><button class="btn btn-success" style="width:130px">Update</button></div>
    </form>

</div>

@endsection