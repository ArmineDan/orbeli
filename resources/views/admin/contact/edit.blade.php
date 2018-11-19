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

    <h2> Edit contact Number <small><code>{{$contact['lang_id']}}</code></small> </h2>

    <form action="{{ route('admin.contact.update', [$locale, $contact]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <label for="address">Address</label>
            <input name="address" class="form-control" value="{{ $contact['address_icon_text'] }}">
            <hr>

            <label for="phone">Phone</label>
            <input name="phone" class="form-control" value="{{ $contact['phone_icon_text'] }}">
            <hr>

            <label for="mail">Mail</label>
            <input name="mail" class="form-control" value="{{ $contact['mail_icon_text'] }}">
            <hr>

            <label for="title">Title</label>
            <input name="title" class="form-control" value="{{ $contact['big_text_title'] }}">
            <hr>

            <label for="post_short_text">Text</label>
            <textarea name="text" id="post_short_text" cols="30" rows="10" class="form-control">       
                {{ $contact['big_text'] }}
            </textarea>
            <br>

            <input type="hidden" name="lang_id" value="{{ $contact['lang_id'] }}">

            <div class="well">
                <button class="btn btn-success">Save</button>
            </div>
    </form>

</div>

@endsection