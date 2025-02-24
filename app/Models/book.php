<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'stock',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'bookid');
    }

}
