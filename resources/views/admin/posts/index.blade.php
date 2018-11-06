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
                    <th>Published At</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              @forelse ($posts as $post)           
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post['getCategory']->name}}</td>
                    <td>{{$post->date ??'no-date'}}</td>
                    <td>{{$post->status}}</td>
                    <td class="text-center">
                      {{--['id'=>$category->id]--}}
                      <form action="{{ route('admin.post.destroy', [$post, $locale]) }}" onsubmit="if(confirm('Delete ?')) { return true } else {return false}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a class="cat-edit btn btn-default" href="{{ route('admin.post.edit',[$post, $locale]) }}">
                        {{-- <a class="cat-edit btn btn-default" href="{{ url('admin/'.$locale.'/post/'.$post->id.'/edit', $post) }}"> --}}
                          <i class="glyphicon glyphicon-edit"></i>                        
                        </a>
                        <button type="submit" class="btn btn-danger">
                          <i class="glyphicon glyphicon-trash"></i>
                        </button>
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