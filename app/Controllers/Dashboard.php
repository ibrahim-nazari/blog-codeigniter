<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel= new \App\Models\UserModal();
        $userId=session()->get("loggedUserId");
        $user=$userModel->find($userId);
        return view("dashboard/index",["user"=>$user]);
    }
    public function comment()
    {
        echo 'I am not flat!';
        echo $request->getIPAddress();
    }
    public function shoes($sandals, $id)
    {
        echo $sandals;
        echo $id;
    }
}