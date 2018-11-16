@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>Announcement List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.announcements.create', $locale)}}" class="btn btn-primary pull-right">Create Announcement <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px;">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> Short Text </th>
                  <th> Long Text </th>
                  <th> Html Code </th>
                  <th> IMG </th>
                  <th> Thumb Img </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
            @foreach ($announcement as $item)
                      <tbody>
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->title}}</td>
                          <td>{{$item->short_text}}</td>
                          <td><textarea rows="10">{{$item->long_text}}</textarea></td>
                          <td><textarea cols="30" rows="10">{{$item->html_code}}</textarea></td>
                          <td>{{$item->img}}</td>
                          <td>{{$item->thumb_img}}</td>

                          <td>
                            <a href="{{route('admin.announcements.edit', [$locale,$item->id])}}" class="cat-edit btn btn-default">
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