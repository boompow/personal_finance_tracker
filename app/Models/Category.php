<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Category extends Model
{
    
    protected $fillable = ['name', 'type'];
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    public function transaction(){
        return $this -> hasMany(Transaction::class);
    }
}
