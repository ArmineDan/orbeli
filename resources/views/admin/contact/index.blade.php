@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <h2>Contact List <small><code> lang:{{$locale}}</code><small></h2>
        <div class="table-resposive">
        <table class="table table-bordered table-striped table-hover" style="font-size: 15px">
            <thead class="thead-dark">
                <tr>
                  <th>Row</th>
                  <th>Address Icon Text</th>
                  <th>Phone Icon Text</th>
                  <th>Mail Icon Text</th>
                  <th>Title</th>
                  <th>Text</th>
                  <th> Edit </th>
                </tr>
              </thead>  
          @foreach ($contact as $item)
                      <tbody>
                        <tr>
                          <th>{{$item->id}} </th>
                          <th>{{$item->address_icon_text}}</th>
                          <td>{{$item->phone_icon_text}}</td>
                          <td>{{$item->mail_icon_text}}</td>
                          <td>{{$item->big_text_title}}</td>
                          <td>{{$item->big_text_title}}</td>
                          <td>
                              {{-- route('admin.post.show', [$post, $locale]) --}}
                            <a href="{{route('admin.contact.edit', [$item->id,$locale])}}" class="cat-edit btn btn-default">
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
