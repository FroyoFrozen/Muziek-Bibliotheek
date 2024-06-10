<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';

    protected $fillable = [
        'name',
        'bio',
        'genre',
        'website',
        'awards',
        'facebook',
        'twitter',
        'instagram'
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}

