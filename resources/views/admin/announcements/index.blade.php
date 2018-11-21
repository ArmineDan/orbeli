@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        <h2>Announcements List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.announcements.create', $locale)}}" class="btn btn-primary pull-right">Create Authors <i class="fa fa-plus"></i> </a>

        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> Short Text </th>

                  <th> HTML code </th>
                  <th> Meta Keyword </th>
                  <th> Meta Description </th>
                  <th> Img</th>

                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
            @foreach ($announcement as $item)
                      <tbody>
                        <tr>

                          <th>{{$item->id}}</th>
                          <td>{{$item->title}}</td>
                          <td>{{$item->short_text}}</td>
                          <td> {{$item->html_code}} </td>
                          <td> {{$item->meta_k}} </td>
                          <td> {{$item->meta_d}} </td>
                          <td> <img src="{{$item->img}}"> </td>
            
                          <td>
                            <a href="{{route('admin.announcements.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">

                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                          </td>


                          <td> 
                              <form action="{{ route('admin.announcements.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button></td>
                              </form>
                            </td> 

                
                          </tr>
                      </tbody>
            @endforeach
        </table>
        </div>
    </div>

@endsection