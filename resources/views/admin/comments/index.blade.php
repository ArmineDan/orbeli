@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h3>Unapproved Comments <small><code> lang:{{$locale}}</code><small></h3>
        <div class="table-resposive">
        
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
          <thead class="thead-dark">
              <tr>
                <th> Row </th>
                <th> Type </th>
                <th> Title </th>
                <th> Date </th>                
                <th> Status </th>
                <th class="text-center"> Actions </th>                
              </tr>
            </thead>
            <tbody>
              @forelse ($comments as $comment)
              <tr>
                <td>{{$comment->commentable_id}}</td>
                <td>{{$comment->commentable_type}}</td>
                <td>{{$comment->commentable->title}}</td>
                <td>{{$comment->commentable->date}}</td>
                @if ($comment->commentable->status === 'not_published')
                  <td class="alert alert-danger">{{$comment->commentable->status}}</td>
                @else
                  <td>{{$comment->commentable->status}}</td>
                @endif
                
                
                <td class="text-center">
                    <a class="btn btn-info" target="_blank"
                      href="{{route($comment->getRoute($comment->commentable_type), [
                        $comment->commentable_id, $locale
                      ]).'#comments'}}">
                      {{ $comment->typeIs($comment->commentable_type) }}
                      <i class="glyphicon glyphicon-comment"></i>
                      <i class="glyphicon glyphicon-paperclip"></i>
                    </a>
                </td>      
              </tr>
              @empty
              <tr class="text-center">
                  <td colspan="5">
                    <h4><mark style="padding:3px 25px 3px 25px">No comments to check! </mark></h4>
                  </td>
              </tr>
              @endforelse  
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="5">
                    {{ $comments->links() }}
                </td>
              </tr>
            </tfoot>
        </table>
        </div>
    </div>

@endsection