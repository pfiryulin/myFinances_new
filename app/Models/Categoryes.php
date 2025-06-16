<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Types;
use App\Models\User;
use App\Models\Operations;

class Categoryes extends Model
{
    use HasFactory;

    protected $table = 'categoryes';

    protected $fillable = [
        'category_name',
        'types_id',
        'user_id',
    ];

    public function type()
    {
        return $this->beLongsTo(Types::class, 'types_id');
    }

    public function user()
    {
        return $this->beLongsTo(User::class, 'user_id');
    }

    public function operations()
    {
        return $this->hasMany(Operations::class, 'categoryes_id');
    }

}
