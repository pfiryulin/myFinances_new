<?php

namespace App\Http\Controllers\Services;

use App\Models\Categoryes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoryes $categoryes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoryes $categoryes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoryes $categoryes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoryes $categoryes)
    {
        //
    }

    /**
     * Показываем список категорий пользователя + категории по умолчанию.
     */

    public function showUserCategory(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);
        $userId = $request->input('user_id');
        $data = Categoryes::with('type')
            ->whereIn('user_id', [$userId, 0])
            ->get();
        return $data;
    }
}
