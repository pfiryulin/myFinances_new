<?php

namespace App\Http\Controllers\Services;

use App\Models\Operations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperationController extends Controller
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
    public function store(Request $request)
    {
        $validationRules = [
            'categoryes_id' => 'required|integer',
            'types_id' => 'required|integer',
            'user_id' => 'required|integer',
            'summ' => 'required|numeric',
            'comment' => 'string',
        ];

        $errorMessages = [
            'summ.required' => 'Сумма обязательна для заполнения',
        ];

        $rowValid = Validator::make(
            $request->all(),
            $validationRules,
            $errorMessages,
        );

        if($rowValid->passes()){
            $newOperation = Operations::create($request->all());
            return $newOperation;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Operations $operations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operations $operations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operations $operations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operations $operations)
    {
        //
    }
}
