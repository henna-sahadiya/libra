<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_model extends Model
{
    use HasFactory;
    protected $table="login_tb";
    public $timestamps=false;
}
