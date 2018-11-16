@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    <h2> Create News <code>{{$locale}}</code> </h2>

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
                <input type="text" hidden name="author_id" value="{{$last_id}}">
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

    <form action="{{ route('admin.news.store', $locale) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

        <label for="title">News Title</label>
        <input type="text" name="title" class="form-control" placeholder="Create title">
        <hr>

        <label for="html_code">HTML code</label>
        <textarea name="html_code" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Html code">       
        </textarea>
        <hr>

        <label for="short_text">Short Text</label>
        <textarea name="short_text" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Input short description">       
        </textarea>
        <hr>

        <label for="img">Img <code> 500x500 </code> </label>
        <input type="text" name="img" class="form-control" placeholder="Create img">
        <hr>

        <label for="img">Thumb Img <code> 500x500 </code> </label>
        <input type="text" name="thumb_img" class="form-control" placeholder="Create thumb img">
        <br>

        <input type="hidden" value="{{$lang_id}}" name="lang_id">

        <input type="hidden" value="{{date('Y-m-d H:i:s')}}" name="date">
        <input type="hidden" value="published" name="status">
        <input type="hidden" value="absdabsd" name="meta_k">
        <input type="hidden" value="absdabsd" name="meta_d">
        <input type="hidden" value="0" name="view">
        <input type="hidden" value="30" name="n_duration">
        <input type="hidden" value="11" name="post_typ">
        <input type="hidden" value="11" name="author_id">

        <button type="submit" class="btn btn-success"> Save </button>
    </form>
</div>

@endsection