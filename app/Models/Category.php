<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ['id', 'name', 'image', 'description', 'parent_id', 'created_at', 'updated_at'];
    public $translatable = ['name', 'description'];
    function getnews()
    {
        return $this->hasMany(news::class, 'category_id');
    }
    function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
