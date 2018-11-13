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
                  <th> Sub_name </th>
                  <th> Img </th>
                  <th> Biography</th>
                  <th> lang_id </th>
                  <th> Facebook </th>
                  <th> Twitter </th>
                  <th> Linkedin </th>
                  <th> Email </th>
                  <th> Edit </th>
                </tr>
              </thead>
            @foreach ($author as $item)
                      <tbody>
                        <tr>
                          <th>{{$item->id}}</th>
                          <td>{{$item->name}}</td>
                          <td>{{$item->lastname}}</td>
                          <td>{{$item->sub_name}}</td>
                          <td> {{$item->img}} </td>
                          <td> <textarea>{{$item->biography}}</textarea></td>
                          <td> {{$item->lang_id}} </td>
                          <td> {{$item->faceebook}} </td>
                          <td> {{$item->twitter}} </td>
                          <td> {{$item->linkedin}} </td>
                          <td> {{$item->email}} </td>

                          <td>
                            <a href="{{route('admin.authors.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
                              <i class="glyphicon glyphicon-edit"></i> 
                            </a>
                          </td>
                
                          </tr>
                      </tbody>
            @endforeach
        </table>
        </div>
        <center>{{$author->links()}}</center>
    </div>

@endsection