<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryes;
use App\Models\Types;
use Illuminate\Support\Facades\Auth;
class CategoryTableController extends Controller
{
    public static function showCategory()
    {
        if(Auth::check()){
            $user = Auth::id();
            $data = Categoryes::with('type')
                ->whereIn('user_id', [$user, 0])
                ->get();
            foreach ($data as $item){
                $item->types_id = $item->type->type_name;
            }
            return view('reportpage.report', compact('data'));
        }
    }
}


