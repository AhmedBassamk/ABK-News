<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatAdmins extends Model
{
    use HasFactory;
    protected $fillable= ['sender' , 'receiver' , 'message'];
 }
