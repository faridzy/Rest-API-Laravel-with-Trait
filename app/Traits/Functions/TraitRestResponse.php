<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:52:24
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:46:23
 */
namespace App\Traits\Functions;

use Illuminate\Http\Request;

trait TraitRestResponse {

    
    protected function successResponse($data) 
    {
        $response = [
            'code' 		=> 200,
            'status' 	=> 'success',
            'data' 		=> $data
        ];

		return response()->json($response,$response['code'] );    
    }


  
    protected function notFoundResponse() 
    {
        $response = [
            'code' 		=> 404,
            'status'	=> 'error',
            'data' 		=> 'Resource Not Found',
            'message' 	=> 'Not Found'
        ];

        return response()->json( $response, $response['code'] );
    }


    protected function authenticationRequiredResponse()
    {
        $response = [
            'code' 		=> 401,
            'status' 	=> 'error',
            'data' 		=> 'Authentication Required',
            'message' 	=> 'Unauthorized'
        ];

        return response()->json( $response, $response['code'] );
    }

    protected function forbiddenResponse()
    {
        $response = [
            'code' 		=> 403,
            'status' 	=> 'error',
            'data' 		=> 'Forbidden Request',
            'message' 	=> 'Forbidden'
        ];
        
        return response()->json($response,$response['code'] );
    }


    
    protected function deleteResponse() 
    {
        $response = [
            'code' 		=> 204,
            'status' 	=> 'success',
            'data' 		=> [],
            'message' 	=> 'Delete Successfull !'
        ];

        return response()->json($response,$response['code'] );    
    }


   
    protected function emptyResponse() 
    {
        $response = [
            'code' 		=> 204,
            'status'	=> 'success',
            'data' 		=> [],
            'message' 	=> 'Resource Empty'
        ];

        return response()->json($response,$response['code'] );
    }


    protected function errorResponse($data = null) 
    {
        $response = [
            'code' 		=> 422,
            'status' 	=> 'error',
            'data' 		=> $data,
            'message' 	=> 'Unprocessable Entity' 
        ];

		return response()->json($response,$response['code'] );
    }
}