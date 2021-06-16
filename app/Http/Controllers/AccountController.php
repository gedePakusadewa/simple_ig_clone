<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Account;
use App\Models\Follower;
use App\Models\CookiesLogInUser;
use App\Http\Traits\UsersSessionTrait;
use App\Http\Traits\InputValidationTrait;
use App\Http\Traits\CookieTrait;
use Illuminate\Support\Facades\Cookie;


class AccountController extends Controller
{
    use UsersSessionTrait;
    use InputValidationTrait;
    use CookieTrait;

  public function processSpecialLogin(){
    $this->setNewSession("deltagamma");
    $this->setCookies();
    return redirect()->route('home_timeline_page');
  }

    public function getLogInPage(Request $request){
        //Account::addSampleData();
        //$this->isSessionExists($request, 'account_username') 

        if($this->isCookieExist() && $this->isSessionExists($request, 'account_username')){
            return redirect()->route('home_timeline_page');
        }else if($this->isCookieExist() === true 
            && $this->isSessionExists($request, 'account_username') === false){
            //kondisi ketika user exit browser tapi belum logout.
            $this->setNewSessionForCookie($this->getIdUserFromCookie($this->getCookieValue('cookie_id')));
            return redirect()->route('home_timeline_page');
        }else{
            //$this->setCookies();
            return view('account.login-page');
        }

        //ada kondisi lainnyua yaitu ketika user ada session tetapi tidak ada cookie. kuala sink terapin ibe karena klo session ada pasti cookie dibuat.
    }

    public function getUpdateAccountPage(){
        //return view('account.update-account-information-page');
        return view('announcement.under-development', ['pageName' => 'Settings']);
    }

    public function getSwitchAccountPage(){
        return view('announcement.under-development', ['pageName' => 'Switch Account']);
    }

    public function verifyLogInData(Request $request){

        // // var_dump($request->cookie('name'));
        // var_dump(Cookie::get('tes1'));  
        $username = $this->filterBasicInput($request->input('username'));
        $pwd = $this->filterBasicInput($request->input('pwd'));

        if($this->canThisLogIn($username, $pwd)){
            $this->setNewSession($username);
            $this->setCookies();
            return redirect()->route('home_timeline_page');
        }else{
            //return view('account.login-page', ['notif' => "Please fill it correctly."]);
            // return redirect()->route('login_page', ['notif' => "Please fill it correctly."]);
            return redirect()->route('login_page')->with('status', 'One or all of your input data is in wrong format, please fill it correctly. Or your username or password is not in our database yet.');
        }
        //var_dump($this->isCookieExistInServer());
    }

    public function getSignUpPage(Request $request){
        if($this->isSessionExists($request, 'account_username')){
            return redirect()->route('home_timeline_page');
        }else{
            $this->setExpiredCookie();
            return view('account.sign-up-page');
        }
    }

    public function setNewDataAccount(Request $request){
        $username = $this->filterBasicInput($request->input('username'));
        $pwd = $this->filterBasicInput($request->input('pwd'));
        $email = $this->filterBasicInput($request->input('email'));
        $fullname = $this->filterBasicInput($request->input('fullname'));

        if($this->canThisSignUp($email, $fullname, $username, $pwd)){
            $data = Account::addNewData($username, $pwd, '-', $email, $fullname, '-', '-');
            Follower::addNewData($data->id, $data->id);
            $this->setNewSession($username);
            return redirect()->route('home_timeline_page');
        }else{
            //return view('account.login-page', ['notif' => "Please fill it correctly."]);
            // return redirect()->route('login_page', ['notif' => "Please fill it correctly."]);
            return redirect()->route('sign_up_page')->with('status', 'One or all of your input data is in wrong format, please fill it correctly.');
        }
    }

    public function getLogOut(Request $request){
        $request->session()->flush();
        $this->setExpiredCookie();
        return redirect()->route('login_page');
    }

    public function resetSession(Request $request){
        $request->session()->flush();
        return redirect()->route('login_page');
    }

    private function setNewSession($username){
        $data = Account::getOneData('username', $username);
        session(['account_username' => $username, 'account_id' => strval($data->id), 'account_img_path' =>$data->selfie_path]);
    }

    private function setNewSessionForCookie($user_id){
        $data = Account::getOneData('id', $user_id);
        session(['account_username' => $data->username, 'account_id' => strval($data->id)]);
    }

    private function isUsernameAndPasswordFormatValid($username, $pass){
        return $this->isUsernameFormatValid($username) && $this->isPasswordFormatValid($pass) ? true : false;
    }

    private function isUsernameAndPasswordExist($username, $pass){
        return $this->isUsernameExist($username) && $this->isPasswordExist($pass) ? true : false;
    }

    private function canThisLogIn($username, $pass){
        return $this->isUsernameAndPasswordFormatValid($username, $pass) && $this->isUsernameAndPasswordExist($username, $pass) ? true : false;
    }

    private function canThisSignUp($email, $fullname, $username, $pass){
        // return $this->isEmailFormatValid($email) && $this->isFullNameFormatValid($fullname) && $this->isUsernameFormatValid($username) && $this->isPasswordFormatValid($pass) ? true : false;

        return $this->isFullNameFormatValid($fullname) && $this->isUsernameFormatValid($username) && $this->isPasswordFormatValid($pass) ? true : false;
    }

}
