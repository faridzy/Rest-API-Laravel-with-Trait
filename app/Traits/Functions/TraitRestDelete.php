<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:50:27
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:43:54
 */
namespace App\Traits\Functions;

use Illuminate\Http\Request;

trait TraitRestDelete {

   
	public function delete( $id, Request $request)
	{
		if ( ! defined ( self::class . '::MODEL' ) ) {
			return $this->errorResponse( 'MODEL not defined' );
		}
		
        $model = self::MODEL;
		
		try {
			
			$entity = $model::find( $id );
			
			if (!$entity){
				return $this->notFoundResponse();
			}
			if ($entity->delete()){
				return $this->deleteResponse();
			}
		
		} catch (\Exception $e){
			return $this->errorResponse($e->getMessage());
		}
		
        return $this->errorResponse();
	}
	
}