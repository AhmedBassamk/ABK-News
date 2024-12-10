<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class news extends Model
{
    use HasTranslations;

    protected $fillable = ['id' , 'title' , 'description' , 'country' , 'image' ,'is_active','views_count', 'category_id' , 'user_id', 'created_at' , 'updated_at'];
    public $translatable = ['title' , 'description'];

    function getCategory() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
