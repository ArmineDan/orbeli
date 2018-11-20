@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    <h2> Edit Partner <small>N: {{$partner['id']}} <code> lang: {{$locale}}</code></small> </h2>
    <hr>
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

    <form action="{{ route('admin.partners.update', [$partner, $locale]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <label for="name">Partner Name</label>
                <input name="name" class="form-control" value="{{ $partner['p_name'] }}">
            <hr>

            <label for="url">Partner URL</label>
                <input name="url" class="form-control" value="{{ $partner['url'] }}">
            <hr>

            <label for="post_short_text">Partner Description</label>
            <textarea name="text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $partner['text'] }}
            </textarea>
            <hr>

            <label for="logo">Partner logo</label>
                <input name="logo" class="form-control" value="{{ $partner['logo'] }}">
            <hr>
            
            <div class="well">
                <button class="btn btn-success" style="width:130px">Save</button>
            </div>
    </form>
    <hr>
</div>

@endsection