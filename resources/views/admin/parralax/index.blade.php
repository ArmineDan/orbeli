@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>Parralax List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.partner.create', $locale)}}" class="btn btn-primary pull-right">Create Parralax <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px;">
            @foreach ($parralax as $item)
                <thead class="thead-dark">
                        <tr>
                          <th>Row</th>
                          <th>Title</th>
                          <th>Text</th>
                          <th>Link</th>
                          <th>Img</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>{{$item->title}}</th>
                          <td>{{$item->text}}</td>
                          <td>{{$item->link}}</td>
                          <td>{{$item->img}}</td>
                          <td>
                              {{-- route('admin.post.show', [$post, $locale]) --}}
                            <a href="{{route('admin.parralax.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                            <form action="{{ route('admin.parralax.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button></td>
                            </form>
                          </tr>
                      </tbody>
            @endforeach
        </table>
        </div>
    </div>

@endsection
