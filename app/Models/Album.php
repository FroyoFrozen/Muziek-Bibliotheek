<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = [
        'titel',
        'artiest_id',
        'genre_id',
        'jaar_van_uitgave',
        'aantal_nummers',
    ];

    public function artiest()
    {
        return $this->belongsTo(Artiest::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

