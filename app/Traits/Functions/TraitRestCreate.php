<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:55:43
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:43:40
 */
namespace App\Traits\Functions;

use Illuminate\Http\Request;

trait TraitRestCreate {

   /**
	* Update
	*/
	public function create( Request $request )
	{
		if ( ! defined ( self::class . '::MODEL' ) ) {
			return $this->errorResponse( 'MODEL not defined' );
		}
		
		$model = self::MODEL;
		try {
			
			$entity = $model::create($request->input());
					
			if($entity->save()){
				return $this->successResponse($entity);
			}
		} catch ( \Exception $e){
			return $this->errorResponse($e->getMessage());
		}
		return $this->errorResponse();
	}	
	
}
