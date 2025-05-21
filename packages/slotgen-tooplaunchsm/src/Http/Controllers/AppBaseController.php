<?php

namespace Slotgen\SpaceMan\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use App\Http\Controllers\AppBaseController as LaravelController;
use Response;

class AppBaseController extends LaravelController
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 200)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
