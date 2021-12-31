<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Request;

class Home extends BaseController
{
    public function index()
    {
        echo view('welcome_message');
    }
  
}