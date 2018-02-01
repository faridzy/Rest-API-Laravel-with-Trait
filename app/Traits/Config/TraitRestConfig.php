<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:33:29
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:48:48
 */
namespace App\Traits\Config;

use Illuminate\Http\Request;

trait TraitRestConfig{

	//   on Controller
	// protected $restConfig = [
	// 	'limit' 				=> 10,
	// 	'searchable_field' 		=> ['name'],
	// 	'sort_field' 			=> null,
	// 	'sort_direction'		=> 'ASC',
	// ];
	
	
	protected function getDefaultValue()
	{
		return [
		
			'limit' 					=> 25,
			'paginate_index_result' 	=> true,
			'enable_custom_limit'		=> true,
			'enable_custom_search' 		=> true,
			'searchable_field' 			=> ['id'],
			'enable_search'				=> true,
			'default_sort_field' 		=> null,
			'default_sort_direction'	=> 'ASC',
			'sortable_field'			=> ['id'],
			'enable_custom_sort'		=> true,
			
		];
	}
	

	protected function getRestConfig($key)
	{
		$config = $this->getDefaultValue();
		if ( isset( $this->restConfig)) {
			$config = array_merge( $config,$this->restConfig);
		}
		
		return $config[$key];
	}
}