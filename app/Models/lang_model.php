<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lang_model extends Model
{
    use HasFactory;
    protected $table="lang_tb";
    public $timestamps=false;
}
