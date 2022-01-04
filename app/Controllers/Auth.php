<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Request;
use App\Libraries\Hash;
class Auth extends BaseController
{
  
    public function __construct()
	{
         helper(['Form','url']);
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
               $last_id=$userModel->insertID();
               session()->set("loggedUserId",$last_id);
               session()->set("username",$name);
               return redirect()->to("/dashboard");
           }
        
       }
    }

    public function check(){
        $validation=$this->validate([
            "email"=>[
                "rules"=>"required|valid_email",
                "errors"=>["required"=>"Email is required","valid_email"=>"Email is not valid"],
            ],
            "password"=>[
                "rules"=>"required",
                "errors"=>["required"=>"Password is required"],
            ],
         ]);
         $data["validation"]=$this->validator;
         if(!$validation){
             return view("auth/login",$data);
         }else{
             
                $email=$this->request->getPost("email");
                $password=$this->request->getPost("password");
                $userModel= new \App\Models\UserModal();
                $user_info=$userModel->where("email",$email)->first();
                $check_password=Hash::check($password,$user_info["password"]);
                if(!$check_password){
                    session()->setFlashdata("fail","incorrect password or email");
                    return redirect()->to("/auth")->withInput();
 
                }else{
                    session()->set("loggedUserId",$user_info["id"]);
                    session()->set("username",$user_info["name"]);
                    return redirect()->to("/dashboard");
                }
                
            }
     }


     public function logout(){
         if(session()->has("loggedUserId")){
             session()->remove("loggedUserId");
             session()->remove("username");
             return redirect()->to("/auth")->with("fail","you logged out!");
         }
     }
   
}