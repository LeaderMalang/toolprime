<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = "packages";
    protected $fillable = [
        'title',
        'slug',
        'des',
        'image',
        'status','price'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
