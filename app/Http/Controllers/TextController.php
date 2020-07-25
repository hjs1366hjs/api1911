<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Token;
use Illuminate\Support\Str;
use redis;


class TextController extends Controller
{
    //注册
    public function reg(){
        $username=request()->post('username','');
        $email=request()->post('email','');
        $pass=request()->post('pass','');
        $user=new User();
        $user->username=$username;
        $user->email=$email;
        $user->pass=$pass;
        // dd($user);
        if($user->save()){
            $data=[
                "errno"=>0,
                "msg"=>"注册成功"
            ];
        }else{
            $data=[
                "error"=>40003,
                "msg"=>"注册失败"
            ];
        }
        return $data;
    }
    //登录
    public function login(){
        $username=request()->post('username');
        $pass=request()->post('pass');
        $result=User::where("username",$username)->first();
        // dd($res);
        if($result){
            $res=User::where("pass",$pass)->first();
            if($res){
                $token=Str::random(32);
                $tokenmodel=new Token();
                $tokenmodel->token=$token;
                $tokenmodel->user_id=$res->user_id;
                $tokenmodel->save();
                $data=[
                    "error"=>0,
                    "msg"=>'登录成功',
                    "token"=>$token
                ];
            }else{
                $data=[
                    "error"=>40003,
                    "msg"=>"登录失败"
                ];
            }
        }else{
            $data=[
                "error"=>40003,
                "msg"=>"登录失败"
            ];
        }
        return $data;
    }

    public function center(){
        $token=request()->get('token');
        if($token){
            $userinfo=Token::where("token",$token)->first();
            if($userinfo){
                $user_id=$userinfo->user_id;
                $user=User::where("user_id",$user_id)->first();
                $data=[
                    "error"=>0,
                    "msg"=>"ok",
                    'user'=>"欢迎qqq1`sa".$user->username."进入用户中心"
                ];
            }else{
                $data=[
                    "error"=>40003,
                    "msg"=>"进入失败"
                ];
            }

        }else{
            $data=[
                "error"=>40003,
                "msg"=>"no"
            ];
        }
        return $data;
    }


    public function rsa1()
    {
        $data = "土豆土豆我是地瓜，收到请回答";
        $content = file_get_contents(storage_path("keys/api_pub.key"));
        var_dump($content);

    }



}
