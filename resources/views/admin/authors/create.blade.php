@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    <h2> Create Authors <small>№ {{$last_id}} <code>Lang:{{$locale}}</code></small></h2>

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

    <form action="{{ route('admin.authors.store', $locale) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

        <label for="title">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Create name">
        <hr>

        <label for="title">Last Name</label>
        <input type="text" name="lastname" class="form-control" placeholder="Create LastName">
        <hr>

        <label for="title">Expert</label>
        <input type="text" name="sub_name" class="form-control" placeholder="Create sub_name">
        <hr>

        <label for="title">Img <code> 500x500 </code> </label>
        <input type="text" name="img" class="form-control" placeholder="Create img">
        <hr>

        <label for="post_short_text">Biography</label>
        <textarea name="biography" id="post_short_text" cols="30" rows="10" class="form-control" placeholder="Biography">       
        </textarea>
        <hr>

        <label for="title">Facebook</label>
      <input type="text" name="faceebook" class="form-control" placeholder="Facebook" value="http://facebook.com">
        <hr>

        <label for="title">Twitter</label>
        <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="http://twitter.com">
        <hr>

        <label for="title">Linkedin</label>
        <input type="text" name="linkedin" class="form-control" placeholder="Linkedin" value="http://linkedin.com">
        <hr>

        <label for="title">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email">

        <input type="hidden" value="{{$lang_id}}" name="lang_id">
        <br>

        <div class="well">
          <button type="submit" class="btn btn-success" style="width:130px"> Save </button>
        </div>
    </form>
</div>

@endsection