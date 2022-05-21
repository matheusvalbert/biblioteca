<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'description',
        'pages',
        'image'
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
