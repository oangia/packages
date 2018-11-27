<?php

namespace oangia\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Auth;

abstract class ApiBaseController extends Controller
{
    protected $_curUser;

    public function __construct(Request $request)
    {
        $this->middleware([ 'wants.json', 'log.requests' ], [ 'except' => config('api.except') ]);

        $this->_curUser = Auth::guard('api')->user();
    }

    /**
     * Returns a properly formatted success response.
     *
     * @param  \Illuminate\Database\Eloquent\Model|array   $data
     * @param  integer $code  HTTP code of the response
     *
     * @return \Illuminate\Http\Response
     */
    public function responseSuccess($data = [], $message = 'OK', $code = 200, $additional = null)
    {
        $key = (is_array($data) || ($data instanceof Collection))  ? 'objects' : 'object';

        $content = [
            'code'    => $code,
            'message' => $message,
            $key      => $data,
        ];

        if ($additional) {
            $content = array_merge($content, $additional);
        }

        return response($content, $code);
    }

    /**
     * Returns a properly formatted error message.
     *
     * @param  string  $message
     * @param  integer $code     HTTP code of the error
     *
     * @return \Illuminate\Http\Response
     */
    public function responseError($message, $code = 500)
    {
        return response([
            'code'    => $code,
            'message' => $message,
            'data'    => [],
        ], $code);
    }
}
