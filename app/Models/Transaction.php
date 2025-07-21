<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Transaction extends Model
{
    protected $fillable = ['item', 'amount', 'price', 'note', 'user_id', 'category_id'];
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function category(){
        return $this -> belongsTo(Category::class);
    }
}
