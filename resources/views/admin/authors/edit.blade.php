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

    <h2> Edit contact Number <code>{{$author['id']}}</code> </h2>

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

    <form action="{{ route('admin.authors.update', [$locale, $author]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <label for="title">Name</label>
            <input name="name" class="form-control" value="{{ $author['name'] }}">
            <hr>

            <label for="post_short_text">LastName</label>
            <input name="lastname" class="form-control" value="{{ $author['lastname'] }}">
            <hr>

            <label for="post_short_text">Sub Name</label>
            <input name="sub_name" class="form-control" value="{{ $author['sub_name'] }}">
            <hr>

            <label for="post_short_text">Img</label>
            <input name="img" class="form-control" value="{{ $author['img'] }}">
            <hr>

            <label for="post_short_text">Biography</label>
            <textarea name="biography" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $author['biography'] }}
            </textarea>
            <hr>

            <label for="post_short_text">Facebook</label>
            <input name="faceebook" class="form-control" value="{{ $author['faceebook'] }}">
            <hr>

            <label for="post_short_text">Twitter</label>
            <input name="twitter" class="form-control" value="{{ $author['twitter'] }}">
            <hr>

            <label for="post_short_text">Linkedin</label>
            <input name="linkedin" class="form-control" value="{{ $author['linkedin'] }}">
            <hr>

            <label for="post_short_text">Email</label>
            <input name="email" class="form-control" value="{{ $author['email'] }}">
            <br>
            
            <input type="hidden" name="lang_id" value="{{$author['lang_id']}}">
            <button class="btn btn-success">Save</button>

    </form>

</div>

@endsection