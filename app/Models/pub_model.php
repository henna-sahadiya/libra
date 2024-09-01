<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pub_model extends Model
{
    use HasFactory;
    protected $table="pub_tb";
    public $timestamps=false;
}
