<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    public function getData(){
        // header('Content-Type: text/event-stream');
        // header('Cache-Control: no-cache');

        // //$time = Carbon\Carbon::now();
        // echo 'data: tes123';
        // //ob_end_flush();
        // ob_flush();
        // flush();

        // Break the loop if the client aborted the connection (closed the page)
        //if( connection_aborted() ) break;

        $response = new StreamedResponse(function() {
        
                echo 'data: tes123';
                ob_flush();
                flush();
            
        
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        return $response;
    }
}
