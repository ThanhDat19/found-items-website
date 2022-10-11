<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable =[
        'category_id',
        'name',
        'slug',
        'description',
        'content',
        'image'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
