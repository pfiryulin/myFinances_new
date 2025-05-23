<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Types;
use App\Models\User;
use App\Models\Categoryes;

class Operations extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->beLongsTo(Types::class, 'types_id');
    }

    public function user()
    {
        return $this->beLongsTo(User::class, 'user_id');
    }
    public function categoryes()
    {
        return $this->beLongsTo(Categoryes::class, 'categoryes_id');
    }
}
