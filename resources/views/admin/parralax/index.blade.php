@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>Parralax List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <a href="create" class="btn btn-primary pull-right">Create Post <i class="fa fa-plus"></i> </a>
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
                          <th>{{$item->id}}</th>
                          <td>{{$item->title}}</td>
                          <td>{{$item->text}}</td>
                          <td>{{$item->link}}</td>
                          <td> {{$item->img}} </td>
                          <td> <a href="{{route('admin.parralax.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default"><i class="glyphicon glyphicon-edit"></i> </a> <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </button></td>
                        </tr>
                      </tbody>
            @endforeach
        </table>
        </div>
    </div>

@endsection
