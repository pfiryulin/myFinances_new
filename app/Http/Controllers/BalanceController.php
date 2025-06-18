<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        // todo создание баланса при регистрации пользователя с нулевым значением
        $balance = Balance::create(
            [
                'user_id' => $id,
                'summ' => 0,
            ]
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(Balance $balance)
    {
        // todo вывод баланса
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Balance $balance)
    {
        /***
         * todo вызов функций для обновления баланса
         * написать функции для прихода и расхода средств
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balance $balance)
    {
        //
    }

    public function plussBalance()
    {
        /** *
         * todo написать функцию поступления средств
         */

    }

    public function minusBalance()
    {
        /**
         * todo написать функцию расхода средств
         */
    }
}
