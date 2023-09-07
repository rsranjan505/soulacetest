<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $fillable = ['follower_id','following_id','is_unfollow'];
	protected $dates = ['created_at', 'updated_at'];

    public function followers()
    {
        return $this->hasMany(User::class,'follower_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'following_id');
    }
}
