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

    <h2> Edit Announcement Number <code>{{$announcement['id']}}</code> </h2>

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

    <form action="{{ route('admin.announcements.update', [$locale, $announcement]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{$announcement['title']}}">
        <hr>

        <label for="title">Short Text</label>
        <input type="text" name="short_text" class="form-control" value="{{$announcement['short_text']}}">
        <hr>

        <label for="title">Long Text</label>
        <input type="text" name="long_text" class="form-control" value="{{$announcement['long_text']}}">
        <hr>

        <label for="post_short_text">HTML code</label>
        <textarea name="html_code" id="post_short_text" cols="30" rows="10" class="form-control" value="{{$announcement['html_code']}}">       
        </textarea>
        <hr>

        <label for="title">IMG <code> 500x500 </code> </label>
        <input type="text" name="img" class="form-control" value="{{$announcement['img']}}">
        <hr>

        <label for="title">Thumb IMG <code> 500x500 </code> </label>
        <input type="text" name="thumb_img" class="form-control" value="{{$announcement['thumb_img']}}">
        <br>

        <button class="btn btn-success">Save</button>

    </form>

</div>

@endsection