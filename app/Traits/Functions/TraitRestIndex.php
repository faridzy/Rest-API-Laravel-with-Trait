<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:47:27
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:44:46
 */
namespace App\Traits\Functions;

use Illuminate\Http\Request;

trait TraitRestIndex {

    
    public function index( Request $request ) 
    {
		try {
			return $this->restIndex( $request );
		} catch ( \Exception $e ) {
			return $this->errorResponse( $e->getMessage() );
		}
		
    }
	
	
	protected function restIndex( $request )
	{
		if ( ! defined ( self::class . '::MODEL' )) {
			return $this->errorResponse('MODEL not defined');
		}
		
        $model = self::MODEL;
        $model = $model::query();
		
		// Searching
		if ( $this->getRestConfig('enable_search') == true) {
			if ( $request->has('search')){
				foreach ( $this->getRestConfig( 'searchable_field') as $field ) {
					$model->where($field, 'LIKE', '%' . $request->input( 'search' ) . '%');
				}
			}
		}
		if ( $this->getRestConfig('enable_custom_search') == true ) {
			foreach ( $this->getRestConfig( 'searchable_field') as $field ) {
				if ( $request->has( $field)) {
					$model->where( $field,$request->input($field));
				}
			}
		}
		
		// Sorting
		$sortField 	= $this->getRestConfig('default_sort_field');
		$sortDirection = $this->getRestConfig('default_sort_direction');
		$sortableField = $this->getRestConfig('sortable_field');
		if ($sortableField != null && $this->getRestConfig('enable_custom_sort') && $request->has('sort')) 
		{
			
			if (in_array( $request->input('sort'),$sortableField)) {
				$sort_field = $request->input('sort');
			}
			
			if ($request->has('sort_direction')) {
				$sortDirection = $request->input('sort_direction');
			}
		}
		if (!empty( $sort_field)) {
			$model->orderBy($sortField,$sortDirection);
		}
		
		// Limit Paginated Result
        $limit = $this->getRestConfig('limit');
        if ( $this->getRestConfig( 'enable_custom_limit' ) == true ) {
			if ( $request->has('limit')) {
				$limit = (int)$request->input('limit');
			}
        }
		
		
		$data = [];
		
		if (!empty($limit)) {
			if ( $this->getRestConfig('paginate_index_result') == true ) {
				$data = $model->paginate($limit);
				return $this->successResponse($data);
			} else {
				$model->limit($limit);
			}
		}
		
		$data = $model->get()->all();

        return $this->successResponse($data);
	}
	
}
