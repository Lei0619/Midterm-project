<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notepad extends Model
{
    protected $fillable = ['notename','description','content'] ;
    use HasFactory;
}