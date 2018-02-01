<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:54:28
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:47:05
 */
namespace App\Traits\Functions;

use Illuminate\Http\Request;

trait TraitRestShow {

	public function show($id,Request $request)
	{
		if (!defined(self::class . '::MODEL')) {
			return $this->errorResponse('MODEL not defined');
		}
		
        $model = self::MODEL;
		
		try {
			
			$entity = $model::find($id);
			return $this->successResponse($entity);

		} catch (\Exception $e) {
			return $this->errorResponse($e->getMessage());
		}
		
        return $this->errorResponse();
	}
	
}