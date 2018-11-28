@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        <h2>Announcements List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.announcements.create', $locale)}}" class="btn btn-primary pull-right">Create Announcements <i class="fa fa-plus"></i> </a>

        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> View </th>
                  <th> Date </th>
                  <th> Duration </th>
                  <th> Status </th>

                  <th> Img</th>
                  <th> Actions </th>

                </tr>
              </thead>
            @foreach ($announcement as $item)
                      <tbody>
                        <tr>

                          <th>{{$item->id}}</th>
                          <td>{{$item->title}}</td>
                          <td> {{$item->view}} </td>
                          <td>{{$item->date}}</td>
                          <td> {{$item->a_duration}} </td>
                          @if ($item->status == 'main')
                          <td class="alert alert-success">{{$item->status}}</td>
                          @elseif($item->status == 'not_published')
                          <td class="alert alert-danger">{{$item->status}}</td>
                          @else
                          <td>{{$item->status}}</td>
                          @endif             
                          <td> <img src="{{$item->img}}" width="120"> </td>

                          <td class="text-center">
                              <form action="{{ route('admin.announcements.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="btn-group">
                                  <a href="{{route('admin.announcements.edit', [$item->id,$locale])}}" class="btn btn-default">
                                    <i class="glyphicon glyphicon-edit"></i> 
                                  </a>
                                  <a class="btn btn-info" href="{{route('admin.announcements.show', [$item->id, $locale])}}">                          
                                    <i class="glyphicon glyphicon-comment"></i>
                                    <i class="glyphicon glyphicon-paperclip"></i>
                                  </a>
                                  <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button>                
                                </div>
                              </form>
                            </td>      

                          </tr>
                      </tbody>
            @endforeach
        </table>
        </div>
    </div>

@endsection