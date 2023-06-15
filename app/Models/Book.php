<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{
    use HasFactory;
    
    // protected $fillable = [
    //     'title',
    //     'condition',
    //     'description',
    //     'stock',
    //     'price',
    //     'author',
    //     'language',
    //     'page',
    //     'publication_date'
    // ];

    protected $casts = [
        'publication_date' => 'datetime:Y-m-d'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

}
