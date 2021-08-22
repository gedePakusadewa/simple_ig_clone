<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class DataController extends Controller
{

  public function __construct(Account $account){
    $this->account = $account;
  }

  public function getDataSearchResutl(){
    $dataServer = $this->account::getAccountSearchResult($_GET['keywords']);
    header('Content-Type: application/json');
    echo json_encode($dataServer);
  }
}
