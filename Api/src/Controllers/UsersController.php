<?php

namespace App\Http\Controllers\Api\V1;

use oangia\Api\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class UsersController extends ApiBaseController
{
    public function index()
    {
        dd(Auth::guard('api')->user());
    }
}
