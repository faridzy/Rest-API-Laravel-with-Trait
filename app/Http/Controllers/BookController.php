<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 04:21:10
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:36:40
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\TraitRestController;

class BookController extends Controller
{
    use TraitRestController;

    const MODEL = \App\Models\Book::class;
    
    //Example
    protected $restConfig = [
		'limit' 				=> 10,
		'searchable_field' 		=> ['book_name'],
		'sort_field' 			=> null,
		'sort_direction'		=> 'ASC',
	];
}