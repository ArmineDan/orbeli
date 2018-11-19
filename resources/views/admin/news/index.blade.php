@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h3>News List <small><code> lang:{{$locale}}</code><small></h3>
        <div class="table-resposive">
        <a href="{{route('admin.news.create', $locale)}}" class="btn btn-primary pull-right">Create News <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
          <thead class="thead-dark">
              <tr>
                <th> Row </th>
                <th> Title </th>
                <th> Duration </th>
                <th> Date </th>                
                <th> Status </th>
                <th class="text-center"> Actions </th>                
              </tr>
            </thead>
            <tbody>
              @forelse ($news as $item)
              <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->title}}</th>
                <th>{{$item->n_duration}}</th>
                <th>{{$item->date}}</th>                
                <th>{{$item->status}}</th>

                
                <td class="text-center">
                  <form action="{{ route('admin.news.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="btn-group">
                      <a href="{{route('admin.news.edit', [$item->id,$locale])}}" class="btn btn-default">
                        <i class="glyphicon glyphicon-edit"></i> 
                      </a>
                      <a class="btn btn-info" href="{{route('admin.news.show', [$item->id, $locale])}}">                          
                        <i class="glyphicon glyphicon-comment"></i>
                        <i class="glyphicon glyphicon-paperclip"></i>
                      </a>
                      <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button>                
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
                    {{ $news->links() }}
                </td>
              </tr>
            </tfoot>
        </table>
        </div>
    </div>

@endsection