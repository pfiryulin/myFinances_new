<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categoryes;
use App\Models\Types;
use App\Models\Operations;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateTable extends Controller
{
    public function test(){
        $data = [
            'name' => 'test',
            'email' => 'test@test.ru',
            'password' => Hash::make('Az1234567890'),
        ];
        
        User::create($data);

        $categoryes = User::all();
        dd($categoryes);
        // dd($categoryes->user);
        // dd($categoryes->operations);
    }
}
