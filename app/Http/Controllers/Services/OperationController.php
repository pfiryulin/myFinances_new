<?php

namespace App\Http\Controllers\Services;

use App\Models\Operations;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BalanceController;

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
            'summ' => 'required|numeric',
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
            $newOperation = Operations::create(self::returnData($request));

            $modificator = ($request['types_id'] == 1 || $request['types_id'] ==3) ? 'plus' : 'minus';

//            BalanceController::changeBalance($modificator, $request['summ'], $request->user()['id']);
            self::changeBalance($modificator, $request['summ'], $request->user()['id']);
            /**
             * TODO Дописать механизм изменения баланса
             */
            return $newOperation;
        }else{
            return 'ERROR';
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
        $validationRules = [
            'categoryes_id' => 'required|integer',
            'types_id' => 'required|integer',
            'summ' => 'required|numeric',
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
            $operations->update(self::returnData($request));
            /**
             * TODO Дописать механизм изменения баланса
             */
            return $operations;
        }else{
            return 'Error';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operations $operations)
    {
        /**
         * TODO Дописать механизм изменения баланса
         * ПОлучить операци, сумму и отнять из баланса
         * Хорошая мысль записывать операции в файл...
         */
        $operations->delete();

        return 'Запись удалена';
    }

    public function showUserCategory(Request $request)
    {
        $data = Operations::with(['type', 'categoryes'])
            ->where('user_id', $request->user()['id'])
            ->get();
        return $data;
    }

    public function filterOperations(Request $request)
    {
        $filter = $request['filter'];
        $value = $request['value'];
        $data = Operations::with(['type', 'categoryes'])
            ->where('user_id', $request->user()['id'])
            ->where($filter, $value)
            ->get();

        return $data;
    }

    public function returnData($request){
        $data = [
            'categoryes_id' => $request['categoryes_id'],
            'types_id' => $request['types_id'],
            'user_id' => $request->user()['id'],
            'summ' => $request['summ'],
            'comment' => $request['comment'],
        ];

        return $data;
    }

    public function changeBalance($modificator, $int, $userId){
        BalanceController::changeBalance($modificator, $int, $userId);
    }

    // todo дописать фильтрацию по периоду и сортировку
}
