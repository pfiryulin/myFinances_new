<?php

namespace App\Http\Controllers\Services;

use App\Models\Categoryes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validationRules = [
            'category_name' => 'required|max:255|string',
            'types_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];

        $errorMessages = [
            'category_name.required' => 'Введите название категории',
            'category_name.max' => 'Длинна названия категории не может превышать 255 символов',
            'types_id.required' => 'Тип категории обязателен',
        ];

        $rowValid = Validator::make(
            $request->all(),
            $validationRules,
            $errorMessages,
        );

//        return $rowValid;
        // todo Разобраться, что с выводом ошибок

        if($rowValid){
            $newCategory = Categoryes::create(
                [
                    'category_name' => $request['category_name'],
                    'types_id' => $request['types_id'],
                    'user_id' => $request['user_id'],
                ]
            );
            return $newCategory;
        }

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

        $validationRules = [
            'category_name' => 'required|max:255|string',
            'types_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];

        $errorMessages = [
            'category_name.required' => 'Введите название категории',
            'category_name.max' => 'Длинна названия категории не может превышать 255 символов',
            'types_id.required' => 'Тип категории обязателен',
        ];

        $rowValid = Validator::make(
            $request->all(),
            $validationRules,
            $errorMessages,
        );

        if($rowValid->passes()){
            $categoryes->update($request->all());
        }

        return $categoryes;
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
