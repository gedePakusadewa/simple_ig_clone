<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = ['id', 'created_at', 'username', 'password', 'phone_number', 'email', 'full_name', 'selfie_path', 'status'];

    static function addNewData($username, $password, $phone_number, $email, $full_name, $selfie_path, $status){
        return Account::create([
            'username' => $username, 
            'password'  => $password, 
            'phone_number' => $phone_number, 
            'email'  => $email, 
            'full_name' => $full_name, 
            'selfie_path'  => $selfie_path, 
            'status'  => $status
        ]);
    }

    static function addSampleData(){
        return Account::addNewData('werta', '1234asdf', '-', 'wwf@gmail.com', '-', '-', '-');
    }



    public function scopeGetOneData($query, $column, $keywords){
        return $query->where($column, "=", $keywords)->first();
    }

    public function scopeGetAccountSearchResult($query, $keyword){
        return $query->select('username', 'selfie_path', 'id', 'full_name')
                ->where('username', 'LIKE', '%'.$keyword.'%')
                ->orWhere('full_name', 'LIKE', '%'.$keyword.'%')
                ->get();
    }

    public function scopeGetLimitedData($query, $numberRow){
        return $query->limit($numberRow)->get();
    }
    
    public function liked(){
        return $this->hasMany(Liked::class);
    }

    public function postingan(){
        return $this->hasMany(Postingan::class);
    }

    // static function getOneData($column, $keywords){
    //     return Account::where($column, "=", $keywords)->first();
    // }

    // static function getLimitedData($numberRow){
    //     return Account::limit($numberRow)->get();
    // }

    // static function getAccountSearchResult($keyword){
    //     return Account::select('username', 'selfie_path', 'id', 'full_name')
    //             ->where('username', 'LIKE', '%'.$keyword.'%')
    //             ->orWhere('full_name', 'LIKE', '%'.$keyword.'%')
    //             ->get();
    // }
}
