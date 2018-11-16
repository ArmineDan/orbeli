@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>Parralax List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <table class="table table-bordered table-striped table-hover table-responive" style="font-size: 15px;">
            <thead class="thead-dark">
                <tr>
                  <th>Row</th>
                  <th>Title</th>
                  <th>Text</th>
                  <th>Link</th>
                  <th>Img</th>
                  <th>Edit</th>
                </tr>
              </thead>  
          @foreach ($parralax as $item)
                      <tbody>
                        <tr>
                          <td> {{$item->id}} </td>
                          <td> {{$item->title}} </td>
                          <td> {{$item->text}} </td>
                          <td> {{$item->link}} </td>
                          <td> <img src="{{$item->img}}" alt="" width="120px"> </td>
                          <td>
                            <a href="{{route('admin.parralax.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                          </td>
                          </tr>
                      </tbody>
            @endforeach
        </table>
        </div>
    </div>

@endsection
