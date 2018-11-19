@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>About Us List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> Code </th>
                  <th> Edit </th>
                </tr>
              </thead>
            @foreach ($about_us as $item)
                      <tbody>
                        <tr>
                          <th>{{$item->id}}</th>
                          <td>{{$item->title}}</td>
                          <td>{{$item->html_code}}</td>                        
                          <td>
                            <a href="{{route('admin.about_us.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
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