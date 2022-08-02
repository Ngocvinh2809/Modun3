<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function type(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
    public function borrow_books(){
        return $this->belongsToMany(Book::class,'borrow_book','student_id','book_id');
    }
}
