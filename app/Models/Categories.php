<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'title',
        'slug',
        'des',
        'image',
        'status'
    ];
    public function tools(){
        return $this->belongsTo(Tools::class);
    }
}
