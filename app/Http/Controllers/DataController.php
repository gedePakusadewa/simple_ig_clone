<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class DataController extends Controller
{
  public function getDataSearchResutl(){
    $dataServer = Account::getAccountSearchResult($_GET['keywords']);
    header('Content-Type: application/json');
    echo json_encode($dataServer);

  }
}
