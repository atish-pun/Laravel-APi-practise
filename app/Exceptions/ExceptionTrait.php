<?php

namespace App\Exceptions;

trait ExceptionTrait
{
    public function apiException($request, $e){
            if($e instanceof ModelNotFoundException){
                return response()->json([
                    'errors' => 'Product Model not found'
                ],404);
            
    }
    }
}
    
