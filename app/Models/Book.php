<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'type',
        'condition',
        'description',
        'stock',
        'price',
        'author',
        'language',
        'number_of_pages',
        'publication_date'
    ];

}
