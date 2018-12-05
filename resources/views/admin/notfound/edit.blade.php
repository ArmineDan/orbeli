@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <h3>Edit NotFound <small><code>lang:{{$locale}}</code></small></h3>

    @isset($notFound)
    <form action="{{route('admin.notfound.update', [$notFound, $locale])}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('put') }}
    <table  class="table table-bordered table-striped table-hover table-condensed" style="font-size:14px">
        <thead>
            <th>ID</th>
            <th>Text</th>
            <th>Action</th>
        </thead>
        <tbody>     
        
        <tr>
            <td style="vertical-align:middle">{{$notFound->id}}</td>
            <td>
                <textarea name="error_text" id="post_short_text" cols="30" rows="10">
                    {{$notFound->error_text}}
                </textarea>
            </td>
            <td class="text-center" style="vertical-align:middle">
                <input type="text" name="lang_id" value="{{$notFound->lang_id}}" hidden>
                <button class="btn btn-success" >Update</button>
            </td>
        </tr>
        
        </tbody>
    </table>
    </form>
    @endisset

</div>   
@endsection