<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class Login extends Controller
{
    public  function login(){
        $error=false;
        return view('login',compact('error'));
    }
    public  function sign(){
        $var="sign";
        return view('sign',compact('var'));
    }
    public  function updateUser($id){
        $user=User::find($id);
        $var="updateUser";
        if($user)
        return view('sign',compact('var','user'));
        else
            return redirect('/users');
    }
    public  function signin(Request $request){
        if($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|max:255',
                'password' => 'required|min:6',

            ]);
            $error=false;
            $user=User::where('email',$request->input('email'))
                ->where('password',$request->input('password'))->get();
            if(count($user)>0){
                Session::put('user',$user);
                return redirect('/');
            }else{
                $error=true;
                return view('login',compact('error'));
            }
        }
    }
    public  function signup(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'username'=>'required|max:255|unique:users',
                'email'=>'required|max:255|unique:users',
                'password' => 'min:6|required_with:password2|same:password2',
                'password2' => 'min:6'
            ]);
            $admin=0;
            if($request->has('admin')){
                $admin=1;
            }
            $user=new User();
            $user->admin=$admin;
            $user->username=$request->input('username');
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->saveOrFail();
            return redirect('/users');

        }
    }
    public  function updateUsers(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'username'=>'required|max:255',
                'email'=>'required|max:255',
                'password' => 'same:password2',
            ]);
            $admin=0;
            if($request->has('admin')){
                $admin=1;
            }
            $user=User::find($request->input('userId'));
            $user->admin=$admin;
            $user->username=$request->input('username');
            $user->email=$request->input('email');
            if($request->input('password')!="")
            $user->password=$request->input('password');
            $user->saveOrFail();
            return redirect('/users');

        }
    }
    public function deleteUser(Request $request,$id){
        $user=User::find($id);
        $user->delete();
        return redirect('/users');

    }
    public  function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/');
    }
}
