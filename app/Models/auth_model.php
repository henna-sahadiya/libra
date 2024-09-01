<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auth_model extends Model
{
    use HasFactory;
    protected $table="auth_tb";
    public $timestamps=false;
}
