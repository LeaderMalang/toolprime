<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;
    protected $table = "tools";
    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'status'
    ];
    public function category(){
        return $this->hasOne(Categories::class,'id','category_id');
    }
}
