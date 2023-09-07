<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['comment','user_id','is_active'];
	protected $dates = ['created_at', 'updated_at'];

    public function image()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
