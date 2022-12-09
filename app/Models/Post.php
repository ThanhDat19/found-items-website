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
        'image',
        'author'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'author', 'id');
    }
    public function follow(){
        return $this->hasMany(PostFollow::class, 'post_id', 'id');
    }

    public function sumFollowPostByPost($id){
        $count = PostFollow::where('post_id', $id)->count();// số lượng follow của 1 bài đăng
        return $count;
    }

    public function followByUser($id, $post){
        $follow = PostFollow::where([
            'user_id'=> $id,
            'post_id'=> $post
        ])->first();
        if(empty($follow)){
            return true;
        }
        return false;
    }

    public function report(){
        return $this->hasMany(Report::class, 'post_id', 'id');
    }
}
