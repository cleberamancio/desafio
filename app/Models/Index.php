<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'titulo',
        'pagina'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function sub_indices()
    {
        return $this->hasMany(SubIndex::class);
    }
}
