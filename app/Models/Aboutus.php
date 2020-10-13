<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    protected $table = 'aboutuses';
    protected $fillable = ['title','subtitle','description'];
}
