@extends('admin.layouts.app_admin') 

@section('content')

    <div class="container">
        <h2>Authors List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.authors.create', $locale)}}" class="btn btn-primary pull-right">Create Authors <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px;">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Name </th>
                  <th> LastName </th>
                  <th> Expert</th>
                  <th> Email </th>
                  <th> Img </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
            
              <tbody>
                @forelse ($author as $item)
                <tr>
                  <th>{{$item->id}}</th>
                  <td>{{$item->name}}</td>
                  <td>{{$item->lastname}}</td>
                  <td>{{$item->sub_name}}</td>
                  <td>{{$item->email}}</td>
                  <td> <img src="{{$item->img}}" width="120"> </td>
              
                  <td class="text-center">
                    <a href="{{route('admin.authors.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                  </td>

                  <td class="text-center">
                      <form action="{{ route('admin.authors.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="cat-edit btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button></td>
                        </form>
                    </td>
                  </tr>
                @empty
                <tr class="text-center">
                  <td colspan="8"><h4><mark> No data to show! </mark></h4></td>
                </tr>
                @endforelse
              </tbody>
            
        </table>
        </div>
        <center>{{$author->links()}}</center>
    </div>

@endsection