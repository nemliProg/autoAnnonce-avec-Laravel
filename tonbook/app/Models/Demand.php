<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;


    protected $fillable = [
        'book_title',
        'book_category',
        'photo',
        'idUser',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-y h:i');
    }
    
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-y h:i');
    }
}
