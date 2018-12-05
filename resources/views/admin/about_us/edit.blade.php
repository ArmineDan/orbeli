@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    <h3> Edit About Us <small><code> lang:{{$locale}}</code></small></h3>
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
    <br>
    <form action="{{ route('admin.about_us.update', [$locale, $about_uses]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="text" name="lang_id" value="{{$lang_id}}" hidden>

        <label for="first_section_img">First Section Img <code> 1920x450 </code> </label>
            <input name="first_section_img" class="form-control" value="{{ $about_uses['first_section_img'] }}">
        <hr>

        <label for="parallax_title"> Second Section Title </label>
            <input name="parallax_title" class="form-control" value="{{ $about_uses['parallax_title'] }}">
        <hr>

        <label for="parallax_text"> Second Section Text </label>
            <textarea name="parallax_text" class="form-control">
                {{ $about_uses['parallax_text'] }}
            </textarea>
        <hr>

        <div class="row">
            
            <div class="col-md-4">
                <label for="parallax_first_box_img"> First Box Img <code> 700x500 </code> </label>
                <input name="parallax_first_box_img" class="form-control" value="{{ $about_uses['parallax_first_box_img'] }}">
            </div>

            <div class="col-md-4">
                <label for="parallax_second_box_img"> Second Box Img <code> 700x500 </code> </label>
                <input name="parallax_second_box_img" class="form-control" value="{{ $about_uses['parallax_second_box_img'] }}">
            </div>

            <div class="col-md-4">
                <label for="parallax_third_box_img"> Third Box Img <code> 700x500 </code> </label>
                <input name="parallax_third_box_img" class="form-control" value="{{ $about_uses['parallax_third_box_img'] }}">
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-4">
                <label for="parallax_first_box_title"> Firts Box Title </label>
                <input name="parallax_first_box_title" class="form-control" value="{{ $about_uses['parallax_first_box_title'] }}">
            </div>

            <div class="col-md-4">
                <label for="parallax_second_box_title"> Second Box Title </label>
                <input name="parallax_second_box_title" class="form-control" value="{{ $about_uses['parallax_second_box_title'] }}">
            </div>

            <div class="col-md-4">
                <label for="parallax_third_box_title"> Third Box Title </label>
                <input name="parallax_third_box_title" class="form-control" value="{{ $about_uses['parallax_third_box_title'] }}">
            </div>

        </div>

        <hr>

        <div class="row">

                <div class="col-md-4">
                    <label for="parallax_first_box_text"> Firts Box Text </label>
                    <textarea name="parallax_first_box_text" class="form-control" rows="5">
                        {{ $about_uses['parallax_first_box_text'] }}
                    </textarea>

                </div>
    
                <div class="col-md-4">
                    <label for="parallax_second_box_text"> Second Box Text </label>
                    <textarea name="parallax_second_box_text" class="form-control" rows="5">
                        {{ $about_uses['parallax_second_box_text'] }}
                    </textarea>
                </div>
    
                <div class="col-md-4">
                    <label for="parallax_third_box_text"> Third Box Text </label>
                    <textarea name="parallax_third_box_text" class="form-control" rows="5">
                        {{ $about_uses['parallax_third_box_text'] }}
                    </textarea>
                </div>
                
        </div>

        <hr>

        <div class="row">

            <div class="col-md-4">
                <label for="video_text"> Video Text </label>
                <input name="video_text" class="form-control" value="{{ $about_uses['video_text'] }}">
            </div>

            <div class="col-md-4">
                <label for="video_img"> Video Img <code> 1920x1100 </code> </label>
                <input name="video_img" class="form-control" value="{{ $about_uses['video_img'] }}">
            </div>

            <div class="col-md-4">
                <label for="video_url"> Video Url </label>
                <input name="video_url" class="form-control" value="{{ $about_uses['video_url'] }}">
            </div>

        </div>

        <hr>

        <label for="end_title"> Third Section Title </label>
        <input name="end_title" class="form-control" value="{{ $about_uses['end_title']}}">

        <hr>

        <label for="end_text"> Third Section Text </label>
            <textarea name="end_text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $about_uses['end_text'] }}
            </textarea>
        <br>

        <div class="well">
            <button type="submit" class="btn btn-info" style="width:150px">Update</button>
        </div>

    </form>

</div>

@endsection