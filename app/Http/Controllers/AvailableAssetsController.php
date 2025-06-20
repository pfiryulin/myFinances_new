<?php

namespace App\Http\Controllers;

use App\Models\AvailableAssets;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailableAssetsController extends Controller
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
        $balance = AvailableAssets::create(
            [
                'user_id' => $id,
                'summ' => 0,
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
//        return $request->user()['id'];
        $money = AvailableAssets::where('user_id', $request->user()['id'])->first();
        return $money;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AvailableAssets $availableAssets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($availableAssets, $newScore)
    {
        $newAvailableAssets = new AvailableAssets;
        $newAvailableAssets->update(['summ' => $newScore]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AvailableAssets $availableAssets)
    {
        //
    }

    public function plussSumm($request, $int = 10){
        $score = self::show($request);
        $newScore = $score['summ'] + $int;
        self::update($score, $newScore);
        return $score;
    }

    public function testSumm(Request $request){
        self::plussSumm($request, 100);
        return $request;
    }

}
