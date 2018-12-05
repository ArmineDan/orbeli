@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
<h2>Post List <small><code> lang:{{$locale}}</code><small></h2>    
    
    <div class="table-responsive">
        <a href="{{ route('admin.post.create', $locale) }}" class="btn btn-primary pull-right">
          Create Post
          <i class="fa fa-plus"></i>
        </a>
        <table class="table table-bordered table-striped table-hover">          
            <thead>
                <tr>
                    <th>Row</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Viewed</th>
                    <th>Published At</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody style="font-weight:600; font-size:13px">
              @forelse ($posts as $post)           
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{ $post->title }}</td>
                    <td
                      @if($post['getCategory'] == null)
                        class="text-center alert alert-danger"
                      @else
                        class="text-center"
                      @endif>
                    	{{$post['getCategory']->name ?? 'no-category'}}
                    </td>
                    {{-- <td>{{$post['getCategory']->name}}</td> --}}
                    <td>{{$post->view}}</td>
                    <td>{{$post->date ??'no-date'}}</td>
                    @if ($post->status == 'main')
                      <td class="alert alert-success">{{$post->status}}</td>
                    @elseif($post->status == 'not_published')
                    <td class="alert alert-danger">{{$post->status}}</td>
                    @else
                    <td>{{$post->status}}</td>
                    @endif                  
                    <td class="text-center" style="min-width:25%">
                      {{--['id'=>$category->id]--}}
                      <form action="{{ route('admin.post.destroy', [$post, $locale]) }}" onsubmit="if(confirm('Delete ?')) { return true } else {return false}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="btn-group">
                          <a class="btn btn-default" href="{{ route('admin.post.edit',[$post, $locale]) }}">
                            <i class="glyphicon glyphicon-edit"></i>                        
                          </a>
                          <a class="btn btn-info" href="{{route('admin.post.show', [$post, $locale])}}">                          
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
                <tr>
                  <td colspan="5">
                    <h3>No data to show!</h3>
                  </td>
                </tr>
              @endforelse               
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="5">
                    {{ $posts->links() }}
                </td>
              </tr>
            </tfoot>
        </table>
    </div>    
  </div>
@endsection