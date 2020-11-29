<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiBaseController extends Controller
{
    public function successResponse()
    {
        return response()->json(['success' => true], Response::HTTP_OK);
    }
}
