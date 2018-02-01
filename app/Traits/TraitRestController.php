<?php

/**
 * @Author: ELL
 * @Date:   2018-02-02 03:40:27
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-02-02 04:29:37
 */
namespace App\Traits;

use Illuminate\Http\Request;
use Validator;

trait TraitRestController {
    
   use \App\Traits\Config\TraitRestConfig, \App\Traits\Functions\TraitRestIndex, \App\Traits\Functions\TraitRestDelete,  \App\Traits\Functions\TraitRestUpdate,  \App\Traits\Functions\TraitRestCreate,  \App\Traits\Functions\TraitRestShow, \App\Traits\Functions\TraitRestResponse;


}
