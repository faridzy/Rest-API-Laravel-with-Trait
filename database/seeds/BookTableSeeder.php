<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=1;$i<20;$i++){
    		DB::table('book')->insert([
    			'book_name'=>'Matematika 3',
    			'book_description'=>'Buku untuk kelas 3 SMP',
    			'book_price'=>50000,
    			'book_author'=>'Airlangga'
    		]);
    	}
        
    }
}
