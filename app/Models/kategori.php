<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name'];
    public function question(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    public $timestamps = false;
}
