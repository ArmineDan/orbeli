@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h3>Attache files to Post № {{$post->id}} <small><code> lang:{{$locale}}</code><small></h3>

      <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">          
              <thead>
                  <tr>
                      <th>Num</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Main Image</th>                      
                  </tr>
              </thead>
              <tbody style="font-weight:600; font-size:13px">
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post['getCategory']->name}}</td>
                  @if ($post->status == 'main')
                    <td class="alert alert-success">{{$post->status}}</td>
                  @elseif($post->status == 'not_published')
                    <td class="alert alert-danger">{{$post->status}}</td>
                  @else
                    <td>{{$post->status}}</td>
                  @endif
                  <td><img src="{{$post->img}}" alt="" width="100px"></td>
                </tr>
              <tbody>
              <tfoot>
                <tr class="text-center">
                  <td colspan="5">                      
                  </td>
                </tr>
              </tfoot>                
          </table>
      </div>
      <hr>

      <div class="row">
        <form action="{{ route('admin.document.uploadfile', $locale) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-3">  
              <input type="file" name="files[]" id="files" multiple="multiple" class="btn btn-default">
              <input type="text" hidden name="post_id" value="{{$post->id}}">
          </div>
          <div class="col-md-6">
              <button type="submit" class="btn btn-info" style="margin-top:5px; width:130px">Upload files</button>
          </div>     
        </form>
      </div>

        @isset(session()->get( 'flDebug' )['errors'])
        <div class="alert alert-danger">
          <ul>
            @foreach (session()->get( 'flDebug' )['errors'] as $error)
            <li>{{ $error['message'] }}</li>
            @endforeach
          </ul>
        </div>
        @endisset
        @isset(session()->get( 'flDebug' )['success'])
        <div class="alert alert-success">
            <ul class="list-group-item">
              @foreach (session()->get( 'flDebug' )['success'] as $success)
              <li>{{ $success['path'] }}</li>
              @endforeach
            </ul>          
        </div>
        @endisset

        {{-- @isset($fileurls)
        <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
          <thead>
            <th>url</th>
            <th>file</th>
            <th>size: kb</th>
          </thead>
          <tbody>     
          @for ($i = 0; $i < count($fileurls); $i++)
          <tr>
            <td><span>{{$fileurls[$i]['url']}}</span></td>
            <td><a href="{{$fileurls[$i]['url']}}" target="_blank">{{$fileurls[$i]['url']}}</a></td>
            <td><span>{{$fileurls[$i]['size']}}</span></td>      
          </tr>
          @endfor
        </tbody>
        </table>        
        @endisset --}}


        @if (session()->get('docStatusMessage') !== null)
        <div class="alert alert-success" style="margin-bottom:0px">
          <p class="lead">{{ session()->get('docStatusMessage') }}</p>          
        </div>
        @endif

        @isset($docsObject)
        <form action="{{route('admin.document.savedocstatus', $locale)}}" method="POST">
          <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
            <h4>Files</h4>
            <thead>
              <th>url</th>
              <th>file</th>
              <th>inused</th>
            </thead>
            <tbody>     
            @foreach($docsObject as $key => $document)
            <tr>
              <td><span>{{$document->link}}</span></td>
              <td><a href="{{$document->link}}" target="_blank">{{$document->name}}</a></td>
              <td>{{-- <span>{{$document->inused}}</span> --}}
                <input type="checkbox" name="cBox[{{$document->id}}]"  onchange="getStatusChangeValue(event)"                
                @if ($document->inused == 1)
                  checked=true                
                @endif
                >
                <input type="text" id="cBox[{{$document->id}}]" name="docs[{{$document->id}}]" value="{{$document->inused}}" hidden>
              </td>            
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="text-center">
                  {{ csrf_field() }}
                <input type="text" name="post_id" value="{{$post->id}}" readonly>
                  <button type="submit" class="btn btn-success">Save Changes</button>
              </td>                
            </tr>            
          </tfoot>
          </table>
        </form>        
        @endisset


        {{ session()->get('CommStatusMessage') }}
        @if(session()->get('CommStatusMessage') !== null)
          <div class="alert alert-success" style="margin-bottom:0px">
            <p class="lead">{{ session()->get('CommStatusMessage') }}</p>          
          </div>
        @endif

        @isset($comments)
        <hr>        
        <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
          <h4>Comments</h4>
          <thead>
            <th>DB_id</th>
            <th>name</th>
            <th>email</th>
            <th>comment</th>
            <th>approved</th>
          </thead>
          <tbody>     
          @foreach($comments as $key => $comment)
          
          
          <tr>
            <form action="{{ route('admin.comment.savecommentstatus', $locale)}}" method="POST" id="{{$comment->c_email}}">            
              <input type="hidden" name="_token" value="{{csrf_token()}}" form="{{$comment->c_email}}">
              <td>{{ $comment->id}}</td>
              <td>{{ $comment->c_name }}</td>
              <td>{{ $comment->c_email }}</td>
              <td>
                <textarea name="body" id="body" cols="100" rows="5" form="{{$comment->c_email}}">{{ $comment->body }}</textarea>  
              </td>
              <td style="text-align:center">
                {{-- $comment->approved --}}              
                  <input type="checkbox" name="cBox_{{$comment->id}}" onchange="getStatusChangeValue(event)" form="{{$comment->c_email}}"
                  @if ($comment->approved == 1)
                      checked
                  @endif
                  >
                  <input type="text" id="cBox_{{$comment->id}}" name="comment[{{$comment->id}}]" value="{{$comment->approved}}" form="{{$comment->c_email}}" hidden>
                  
                  
                  <button type="submit" class="btn btn-default" form="{{$comment->c_email}}">Save</button>                            
              </td>
            </form>
          </tr>
          
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" class="text-center">            
              -- commecnts --
            </td>                
          </tr>            
        </tfoot>
        </table>                  
        @endisset

</div>
@endsection