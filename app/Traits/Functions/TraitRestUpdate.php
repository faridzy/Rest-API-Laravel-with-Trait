<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:56:44
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:47:58
 */
namespace App\Traits\Functions;

use Illuminate\Http\Request;

trait TraitRestUpdate {

	public function update( $id, Request $request )
	{
		if (!defined( self::class . '::MODEL')) {
			return $this->errorResponse( 'MODEL not defined' );
		}
		
		$model = self::MODEL;
		
		try {
			$entity = $model::find($id);
			
			if (!$entity) {
				return $this->notFoundResponse();
			}
			
			$entity->fill($request->input());
			
			if( $entity->save()) {
				return $this->successResponse($entity);
			}
		} catch (\Exception $e) {
			return $this->errorResponse($e->getMessage());
		}
		
		return $this->errorResponse();
	}	
	
}
