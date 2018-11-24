@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h3>Attache files to Opinion <small> № {{$opinion->id}}<code> lang:{{$locale}}</code><small></h3>

    {{-- <!-- Current Video --> --}}
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">          
          <thead>
              <tr>
                  <th>Num</th>
                  <th>Title</th>
                  <th>Viewed</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Main Image</th>
              </tr>
          </thead>
          <tbody style="font-weight:600; font-size:13px">
            <tr>
              <td>{{$opinion->id}}</td>
              <td>{{$opinion->title}}</td>
              <td>{{$opinion->view}}</td>
              <td>{{$opinion->o_duration}}</td>
              @if($opinion->status == 'not_published')
                <td class="alert alert-danger">{{$opinion->status}}</td>
              @else
                <td>{{$opinion->status}}</td>
              @endif
              <td><img src="{{$opinion->img}}" alt="" width="100px"></td>
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

    {{-- <!-- file upload form vars: $video_id | $folder_name --> --}}
    <div class="row">
      <form action="{{ route('admin.document.uploadfile', $locale) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-3">  
            <input type="file" name="files[]" id="files" multiple="multiple" class="btn btn-default">
            <input type="text" name="post_id" value="{{$opinion->id}}" hidden>
            <input type="text" name="folder_name" value="{{$folder_name}}" hidden>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-info" style="margin-top:5px; width:130px">Upload files</button>
        </div>     
      </form>
    </div>

    {{-- <!-- uploaded | not-uploaded | status-changed --> --}}
    @include('admin.common.fileMessages')

    {{-- <!-- Document-Status-Change Form --> --}}
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
              <input type="text" name="post_id" value="{{$opinion->id}}" readonly>
                <button type="submit" class="btn btn-success">Save Changes</button>
            </td>                
          </tr>            
        </tfoot>
        </table>
      </form>
    @endisset


    {{-- <!-- Comments form-list with success-message --> --}}
    @include('admin.common.comments')

</div>    
@endsection