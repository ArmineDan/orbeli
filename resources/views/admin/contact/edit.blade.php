@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @if(count($errors) > 0) 
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2> Edit contact Number <code>{{$contact['id']}}</code> </h2>

    <form action="{{ route('admin.contact.update', [$locale, $contact]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <label for="title">Address</label>
            <input name="address" class="form-control" value="{{ $contact['address_icon_text'] }}">
            <hr>

            <label for="post_short_text">Phone</label>
            <input name="phone" class="form-control" value="{{ $contact['phone_icon_text'] }}">
            <hr>

            <label for="mail">Mail</label>
            <input name="mail" class="form-control" value="{{ $contact['mail_icon_text'] }}">
            <hr>

            <label for="post_short_text">Title</label>
            <input name="title" class="form-control" value="{{ $contact['big_text_title'] }}">
            <hr>

            <label for="post_short_text">Text</label>
            <textarea name="text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $contact['big_text'] }}
            </textarea>
            <hr>

            <button class="btn btn-success">Save</button>

    </form>

</div>

@endsection