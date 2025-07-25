<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\User;

class Category extends Model
{
    
    protected $fillable = ['name', 'type', 'user_id'];
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    public function user(){
        return $this -> belongsTo(User::class);
    }
    
    public function transaction(){
        return $this -> hasMany(Transaction::class);
    }
}
