<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function responseSuccess($data, $code = 200, $message = "")
    {
    	$response = [
    		'success' => true,
    		'data' => $data,
    		'message' => $message,
    	];
    	return response()->json($response, $code);
    }

    public function responseFail($message, $code = 400, $data = [])
    {
    	$response = [
    		'success' => false,
    		'message' => $message,
    	];

    	if (!empty($data)) {
            // if ($message === trans('api.validation_error')) {
            //     $response['data'] = ['validation_errors' => []];
            //     foreach ($data->all() as $errorMsg) {
            //         array_push($response['data']['validation_errors'], $errorMsg);
            //     }
            // } else {
                $response['data'] = $data;
            // }
        }
    	return response()->json($response, $code);
    }
}
