<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='question';
    protected $fillable=['question','image','category_id','user_id'];
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo('App\Models\kategori', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function answer()
    {
        return $this->hasMany(answer::class, 'question_id');
    }

}
