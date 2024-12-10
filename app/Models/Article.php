<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['id' , 'title' , 'description' , 'image','user_id', 'views_count' ,'created_at' , 'updated_at'];
    public $translatable = ['title' , 'description'];

    function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
