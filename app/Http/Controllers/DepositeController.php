<?php

namespace App\Http\Controllers;

use App\Models\Deposite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepositeController extends Controller
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
        $rowValid = validator($request);

        if($rowValid->passes()){
            $newDeposite = Deposite::create(self::returnData($request));

            return $newDeposite;
        }else{
            return response()->json([
                'errors' => $rowValid->errors(),
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposite $deposite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposite $deposite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposite $deposite)
    {
        $rowValid = self::validatorData($request);

        if($rowValid->passes()){
            $newDeposite = $deposite->update(self::returnData($request));

            return $newDeposite;
        }else{
            return response()->json([
                'errors' => $rowValid->errors(),
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposite $deposite)
    {
        /**
         * TODO Механим удаления депозита. Нужно подумать что делать со средствами на депозите? Следует ли перед удалением проверять остаток на депозите? Думаю стоит проверить на наличие денег, если ноль, закрыть депозит, если есть, предложить перевести
         */
    }

    public function returnData($request){
        $data = [
            'name' => $request['name'],
            'user_id' => $request->user()['id'],
            'summ' => $request['summ'],
        ];

        return $data;
    }

    public function validatorData($request){
        $validationRules = [
            'name' => 'required|string',
            'summ' => 'required|numeric',
        ];

        $errorMessages = [
            'summ.required' => 'Сумма обязательна для заполнения',
            'summ.numeric' => 'Сумма должна быть числом',
            'name.required' => 'Наименование обязательно',
        ];

        $rowValid = Validator::make(
            $request->all(),
            $validationRules,
            $errorMessages,
        );

        return $rowValid;
    }
}
