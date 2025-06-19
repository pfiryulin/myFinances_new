<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'summ',
    ];

    public function user()
    {
        return $this->beLongsTo(User::class, 'user_id');
    }
}
