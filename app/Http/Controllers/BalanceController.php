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
    public static function show(Request $request)
    {
        $balance = Balance::where('user_id', $request->user()['id'])->first();
        return $balance;
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
         * Обновляем в self::changeBalance()
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balance $balance)
    {
        //
    }

    public static function plussBalance($int, $summ)
    {
        $result = $summ + $int;
        return $result;
    }

    public static function minusBalance($int, $summ)
    {
        $result = $summ - $int;
        return $result;
    }

    public static function changeBalance($modificator, $int, $request)
    {
        $balance = self::show($request);
        $newSumm = 0;
        switch ($modificator){
            case 'minus':
                $newSumm = self::minusBalance($int, $balance['summ']);
                break;
            case 'plus':
                $newSumm = self::plussBalance($int, $balance['summ']);
                break;
        }

        $balance->update(['summ' => $newSumm,]);
    }
}
