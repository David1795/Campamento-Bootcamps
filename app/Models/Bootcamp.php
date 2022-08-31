<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    protected $fillable = ['name', 'description', 'website','phone','user_id','avarage_rating', 'avarage_cost'];
    use HasFactory;
}