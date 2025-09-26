<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class peminjaman extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'bookid',
    ];
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookid');
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($peminjaman) {
            $book = Book::find($peminjaman->bookid);
            if ($book && $book->stock >= $peminjaman->stock) {
                $book->decrement('stock', $peminjaman->quantity);
            } else {
                throw new \Exception("Out Of Stock!");
            }
        });
 
    }
}