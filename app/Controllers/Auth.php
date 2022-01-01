<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Request;
use App\Libraries\Hash;
class Auth extends BaseController
{
  
    public function __construct()
	{
         helper(['Form']);
     }
    public function index()
    {
        return view("auth/login");
    }
    public function register()
    {
        return view("auth/register");
    }
    public function save()
    {
       
       $validation=$this->validate([
           "name"=>[
               "rules"=>"required",
               "errors"=>["required"=>"Name is required"],
           ],
           "email"=>[
               "rules"=>"required|valid_email|is_unique[user.email]",
               "errors"=>["required"=>"Email is required","valid_email"=>"Email is not valid","is_unique"=>"Email already taken",],
           ],
           "password"=>[
               "rules"=>"required|min_length[5]",
               "errors"=>["required"=>"Password is required","min_length"=>"Password must be at least 5 characters"],
           ],
           "cpassword"=>[
               "rules"=>"required|min_length[5]|matches[password]",
               "errors"=>["required"=>"Confirm Password is required","min_length"=>" Confirm Password must be at least 5 characters","matches"=>"Confrim password don't match with password"],
           ],
           

        ]);
       $data["validation"]=$this->validator;
       if(!$validation){
           return view("auth/register",$data);
       }else{
           $name=$this->request->getPost("name");
           $email=$this->request->getPost("email");
           $password=$this->request->getPost("password");
           $values=[
               "name"=>$name,
               "email"=>$email,
               "password"=>Hash::make($password),
               
           ];
           $userModel= new \App\Models\UserModal();
           $query=$userModel->insert($values);
           if(!$query){
               return redirect()->back()->with("fail","something went wrong");
           }else{
             return redirect()->to("register")->with("success","you are successfully registerd");
           }
       }
    }
   
}