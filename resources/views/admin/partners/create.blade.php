@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    <h2> Create Authors <code>{{$locale}}</code> </h2>

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

    <form action="{{ route('admin.partners.store', $locale) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

        <label for="title">Partners Name</label>
        <input type="text" name="name" class="form-control" placeholder="Create name">
        <hr>

        <label for="title">Partners URL</label>
        <input type="text" name="url" class="form-control" placeholder="Create url">
        <hr>

        <label for="title">Partners Text</label>
        <input type="text" name="text" class="form-control" placeholder="Create text">
        <hr>

        <label for="title">Logo <code> 500x500 </code> </label>
        <input type="text" name="logo" class="form-control" placeholder="Create logo">
        <hr>

        <input type="hidden" value="{{$lang_id}}" name="lang_id">
        <br>

        <button type="submit" class="btn btn-success"> Save </button>
    </form>
</div>

@endsection