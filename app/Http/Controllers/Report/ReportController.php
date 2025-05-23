<?php

namespace App\Http\Controllers\Report;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryes;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{
    public static function showReport()
    {
        echo 'HELLO WORLD';
    }
}
