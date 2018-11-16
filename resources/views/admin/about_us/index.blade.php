@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>About Us List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.about_us.create', $locale)}}" class="btn btn-primary pull-right">Create About Us <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> Short Text </th>
                  <th> Code </th>
                  <th> Img </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
            @foreach ($about_us as $item)
                      <tbody>
                        <tr>
                          <th>{{$item->id}}</th>
                          <td>{{$item->title}}</td>
                          <td><textarea cols="40" rows="5">{{$item->short_text}}</textarea></td>
                          <td><textarea cols="40" rows="5">{{$item->html_code}}</textarea></td>
                          <td> {{$item->img}} </td>
                        
                          <td>
                            <a href="{{route('admin.about_us.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                          </td>

                          <td>
                            <form action="{{ route('admin.about_us.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
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