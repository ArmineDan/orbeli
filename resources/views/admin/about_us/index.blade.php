@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h3>About Us <small><code> lang:{{$locale}}</code><small></h3>
        <hr>
        <div class="table-resposive">

        {{-- <a href="{{route('admin.about_us.create', $locale)}}" class="btn btn-primary pull-right">
          Create About Us <i class="fa fa-plus"></i>
        </a> --}}

        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th> Row </th>
                  <th> Title </th>
                  <th> Content </th>
                  <th class="text-center"> Edit </th>
                </tr>
              </thead>
            @foreach ($about_us as $item)
              <tbody>
                <tr>
                  <th>{{$item->id}}</th>
                  <td>{{$item->title}}</td>
                  <td>{{ mb_substr($item->html_code, 0, 94,"UTF-8") . ' ... ' }}</td>
                  <td class="text-center">
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