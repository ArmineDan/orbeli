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


    <h3> User Info <small><code>lang:{{$locale}}</code></small></h3><hr>

    {{-- {{ var_dump(session()->get('passMess')) }} --}}
    @if (session()->get('sessMess') !== null)
        <div class="alert alert-danger">
            <ul>
                @foreach (session()->get('sessMess') as $key => $mess)
                    <li>{{ $key . ' --- ' . $mess }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->get('sessMessOk') !== null)
        <div class="alert alert-success">
            <ul>
                @foreach (session()->get('sessMessOk') as $key => $messOk)
                    <li>{{ $key . ' --- ' . $messOk }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">

        <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading">Change Password 
            <kbd> min-length: 8 simbols</kbd>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.update', [$locale, $user]) }}" method="POST" class="form-horizontal" id="ch_pass">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input name="old_hash" value="{{ $user['password'] }}" type="hidden" form="ch_pass">
                <input name="ch_pass" value="true" type="hidden" form="ch_pass">
                <input name="user_id" value="{{$user['id']}}" type="hidden" form="ch_pass">
        
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <input name="name" class="form-control" value="{{ $user['name'] }}" form="ch_pass">
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="email" class="control-label col-xs-2">Email</label>
                    <div class="col-xs-10">
                        <input name="email" class="form-control" value="{{ $user['email'] }}" form="ch_pass">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="old_password" class="control-label col-xs-3">Old password</label>
                    <div class="col-xs-9">
                        <input name="old_password" class="form-control" value="" form="ch_pass">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="new_password" class="control-label col-xs-3">New password</label>
                    <div class="col-xs-9">
                        <input name="new_password" class="form-control" value="" form="ch_pass">
                    </div>
                </div>
                
                <div class="well">
                    <button type="submit" class="btn btn-success" style="width:130px" form="ch_pass">Change</button>
                </div>
            </form>
        </div>
        </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
            <div class="panel-heading">Change Name/Email</div>
            <div class="panel-body">
                <form action="{{ route('admin.user.update', [$locale, $user]) }}" method="POST" class="form-horizontal" id="ch_name_mail">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <input name="old_hash" value="{{ $user['password'] }}" type="hidden" form="ch_name_mail">
                    <input name="ch_name_mail" value="true" type="hidden" form="ch_name_mail">
                    <input name="user_id" value="{{$user['id']}}" type="hidden" form="ch_name_mail">
            
                    <div class="form-group">
                        <label for="name" class="control-label col-xs-2">Name</label>
                        <div class="col-xs-10">
                            <input name="name" class="form-control" value="{{ $user['name'] }}" form="ch_name_mail">
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label for="email" class="control-label col-xs-2">Email</label>
                        <div class="col-xs-10">
                            <input name="email" class="form-control" value="{{ $user['email'] }}" form="ch_name_mail">
                        </div>
                    </div>
    
                    
                    <div class="form-group">
                        <label for="old_password" class="control-label col-xs-4">Password</label>
                        <div class="col-xs-8">
                            <input name="old_password" class="form-control" value="" form="ch_name_mail">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm" class="control-label col-xs-4">Confirm password</label>
                        <div class="col-xs-8">
                            <input name="confirm" class="form-control" value="" form="ch_name_mail">
                        </div>
                    </div>
                    
                    <div class="well">
                        <button type="submit" class="btn btn-success" style="width:130px" form="ch_name_mail">Change</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

    </div>
</div>

@endsection