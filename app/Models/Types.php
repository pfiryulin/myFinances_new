<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoryes;

class Types extends Model
{
    use HasFactory;

    protected $table = "types";

    public function categoryes()
    {
        return $this->hasMany(Categoryes::class, 'types_id');
    }
}
