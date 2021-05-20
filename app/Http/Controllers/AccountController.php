<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function getLogInPage(Request $request){
        //Account::addSampleData();
        return view('account.login-page');
    }

    public function getUpdateAccountPage(){
        return view('account.update-account-information-page');
    }

    public function verifyLogInData(Request $request){
        $username = $request->input('username');
        $pwd = $request->input('pwd');

        if($this->isUsernameExist($username) && $this->isPasswordExist($pwd)){
            $this->setNewSession($username);
            return redirect()->route('home_timeline_page');
        }else{
            return redirect()->route('login_page');
        }

    }

    private function isUsernameExist($username){
        $data = Account::getOneData('username', $username);
        return $data !== null ? true : false;
    }

    private function isPasswordExist($pwd){
        $data = Account::getOneData('password', $pwd);
        return $data !== null ? true : false;
    }

    private function setNewSession($username){
        $data = Account::getOneData('username', $username);
        session(['account_username' => $username, 'account_id' => strval($data->id)]);
    }

    public function resetSession(Request $request){
        $request->session()->flush();
        return redirect()->route('login_page');
    }
}
