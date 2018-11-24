@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h3>Video List <small><code> lang:{{$locale}}</code><small></h3>

    <div class="table-responsive">
        <a href="{{ route('admin.video.create', $locale) }}" class="btn btn-primary pull-right">
          Create Video
          <i class="fa fa-plus"></i>
        </a>
        <table class="table table-bordered table-striped table-hover">          
            <thead>
                <tr>
                    <th>Row</th>
                    <th>Title</th>
                    <th>Viewed</th>
                    <th>Duration</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody style="font-weight:600; font-size:13px">
              @forelse ($videos as $video)           
                <tr>
                    <td>{{$video->id}}</td>
                    <td>{{$video->title}}</td>
                    <td>{{$video->view}}</td>
                    <td>{{$video->duration}}</td>
                    <td>{{$video->date ??'no-date'}}</td>

                    @if ($video->status == 'main')
                    <td class="alert alert-success">{{$video->status}}</td>
                    @elseif($video->status == 'not_published')
                    <td class="alert alert-danger">{{$video->status}}</td>
                    @else
                    <td>{{$video->status}}</td>
                    @endif  
                    
                                     
                    <td class="text-center" style="min-width:25%">
                      {{--['id'=>$category->id]--}}
                      <form action="{{ route('admin.video.destroy', [$video, $locale]) }}" onsubmit="if(confirm('Delete ?')) { return true } else {return false}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="btn-group">
                          <a class="btn btn-default" href="{{ route('admin.video.edit',[$video, $locale]) }}">
                            <i class="glyphicon glyphicon-edit"></i>                        
                          </a>
                          <a class="btn btn-info" href="{{route('admin.video.show', [$video, $locale])}}">                          
                              <i class="glyphicon glyphicon-comment"></i>
                              <i class="glyphicon glyphicon-paperclip"></i>
                          </a>
                          <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                          </button>
                        </div>
                      </form>
                    </td>
                </tr>
              @empty
                <tr class="text-center">
                  <td colspan="5">
                    <h4><mark> No data to show! </mark></h4>
                  </td>
                </tr>
              @endforelse               
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="5">
                    {{ $videos->links() }}
                </td>
              </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection