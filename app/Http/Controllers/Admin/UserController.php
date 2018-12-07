<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $connetion = 'mysql2';
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    // User $user
    public function edit($user_id, $locale)
    {
        // dd($user_id);
        $user = User::findOrFail($user_id);
        // dump($user);
        return view('admin.users.edit', [
            'user' => $user,
            'locale' => $locale,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $user_id )
    {
        // https://laravel.ru/docs/v5/hashing - checking method
        if ($request->ch_pass == true) {

            $passErrors = [];
            $old_pass = $request->old_password;
            $new_pass = $request->new_password;
            $old_hash = $request->old_hash;

            $user = User::findOrFail($request->user_id);
            if ($user->name != $request->name || $request->name == '') {
                $passErrors['name'] = 'Is not valid.';
            }
            if ($user->email != $request->email || $request->email == '') {
                $passErrors['email'] = 'Is not valid.';
            }
            if (!Hash::check($old_pass, $old_hash)) {
                $passErrors['old-password'] = 'Is not valid.';
            }
            if ( mb_strlen($new_pass, 'utf8') < 8 || $new_pass == '') {
                $passErrors['new-password'] = 'length of password must to be at least 8.';
            }

            if(!empty($passErrors)) {
                return redirect()->back()->with(['sessMess' => $passErrors]);
            }else{
                $user->update([ 'password' => Hash::make($new_pass) ]);
                $passSuccess['new-password'] = 'successfuly has changed!';
                return redirect()->back()->with(['sessMessOk' => $passSuccess]);
            }

            // dump($request->all());
            // $old_pass = $request->old_password;
            // $new_pass = $request->new_password;
            // $old_hash = $request->old_hash;
            // if (Hash::check($old_pass, $old_hash)) {
            //     echo 'yes its true';
            // }
        }
        // dump($request->all());
        if ($request->ch_name_mail == true) {
            
            $nmErrors = [];

            $user = User::findOrFail($request->user_id);
            $old_hash = $request->old_hash;
            $old_pass =str_replace(' ', '',$request->old_password);
            $confirm = str_replace(' ', '',$request->confirm);
            $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
            $name = filter_var($request->name, FILTER_SANITIZE_STRING);
            $email = str_replace(' ', '',$email);
            $name = str_replace(' ', '',$name);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == '') {
                $nmErrors['email'] = 'Must to be valid email-address and can not be empty.';
            }
            
            if(!filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))) ||
             $name == '' || mb_strlen($name, 'utf8') < 3) {
                $nmErrors['name'] = 'Can only contain alphabetical characters, min-lenght 3 simbols, and can not be empty.' .mb_strlen($name, 'utf8');
            }

            if (!Hash::check($old_pass, $old_hash)) {
                $nmErrors['password'] = 'No user with this password.';
            }

            if( $old_pass  !== $confirm ) {
                $nmErrors['confirm-password'] = 'Password and his confirmation are different.';
            }

            if(!empty($nmErrors)) {
                return redirect()->back()->with(['sessMess' => $nmErrors]);
            }else{
                $user->update([ 'name' => $name, 'email' => $email ]);
                $nmSuccess['Info'] = 'User\'s data was successfuly updated!';
                return redirect()->back()->with(['sessMessOk' => $nmSuccess]);
            }

            // dump($request->all());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
