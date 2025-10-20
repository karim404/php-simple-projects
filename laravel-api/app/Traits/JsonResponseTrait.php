<?php 

namespace App\Traits ;

trait JsonResponseTrait 
{
    public function sendSuccess (   string $message , mixed $data=[], int  $status = 200 )
    {

        return response()->json([
            'success' => true ,
            'message' =>  $message ,
            'data' => $data ,
        ] , $status);

    }
}