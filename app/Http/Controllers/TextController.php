<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    //



    public function getWxController(){
    	$appid = 'wx88bbb6308e8c3a9e'; 
    	$secret = '3fd6e27322e58bb22ec01c15b5e4416f';
    	$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret.'';
    	$cont = file_get_contents($url);
    	echo $cont;
    }
}
