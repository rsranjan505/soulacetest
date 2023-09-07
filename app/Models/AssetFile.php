<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetFile extends Model
{
    use HasFactory;
    protected $fillable = ['image_type','model_id','model_type','filename', 'filetype','filepath','original_name','url','width','height','size','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    public function pictureable()
    {
        return $this->morphTo(__FUNCTION__, 'model_type', 'model_id');
    }
}
