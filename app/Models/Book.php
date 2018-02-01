<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:28:13
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 03:30:47
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model{

	protected $table="book";
	protected $primaryKey="id";
	public $timestamps=false;
	
	protected $fillable=[
		'id',
		'book_name',
		'book_description',
		'book_price',
		'book_author'
	];

	
}