@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>Partners List <small><code>Lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="{{route('admin.partners.create', $locale)}}" class="btn btn-primary pull-right">Create Partners <i class="fa fa-plus"></i> </a>
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px;">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Partner Name </th>
                  <th> Partner url </th>
                  <th> Partner text </th>
                  <th> Partner logo </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
            @foreach ($partner as $item)
                      <tbody>
                        <tr>
                          <th>{{$item->id}}</th>
                          <th>{{$item->p_name}}</th>
                          <th>{{$item->url}}</th>
                          <th>{{$item->text}}</th>
                          <th><img src="{{$item->logo}}" width="120"></th>

                          <td>
                            <a href="{{route('admin.partners.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                          </td>

                          <td>
                            <form action="{{ route('admin.partners.destroy', [$item->id, $locale]) }}" method="POST" onsubmit="if(confirm('Delete ?')) { return true } else {return false}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button></td>
                            </form>  
                          </td>
                
                          </tr>
                      </tbody>
            @endforeach
        </table>
        <center>{{$partner->links()}}</center>
        </div>
    </div>

@endsection