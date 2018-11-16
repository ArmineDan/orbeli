@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>News List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.news.create', $locale)}}" class="btn btn-primary pull-right">Create News <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> Short Text </th>
                  <th> HTML code </th>
                  <th> Img </th>
                  <th> Thumb Img </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
            @foreach ($news as $item)
                      <tbody>
                        <tr>
                          <th>{{$item->id}}</th>
                          <th> {{$item->title}} </th>
                          <th><textarea rows="7">{{$item->short_text}}</textarea></th>
                          <th><textarea rows="7">{{$item->html_code}}</textarea></th>
                          <th>{{$item->img}}</th>
                          <th>{{$item->thumb_img}}</th>

                          <td>
                            <a href="{{route('admin.news.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                          </td>

                          <td>
                            <form action="{{ route('admin.news.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
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