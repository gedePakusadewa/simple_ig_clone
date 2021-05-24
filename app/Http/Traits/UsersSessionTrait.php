<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait UsersSessionTrait {
    public function isSessionExists($request, $data){
        return $request->session()->exists($data)? true : false;
    }
}