<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'author_id',
        'category_id',
        'Publisher_ID',
    ];

    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class);
    }

    public function author()
    {
        return $this->hasMany(Author::class);
    }
}
