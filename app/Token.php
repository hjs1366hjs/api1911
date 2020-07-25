<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    //
    public $table="token";
    protected $primaryKey="id";
    public $timestamps = false;
}
