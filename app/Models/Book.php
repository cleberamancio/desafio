<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'usuario_publicador'
    ];


    public function indices()
    {
        return $this->hasMany(Index::class);
    }
}
