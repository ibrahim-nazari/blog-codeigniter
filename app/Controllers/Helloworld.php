<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Request;

class Helloworld extends BaseController
{
    public function index()
    {
        echo 'Hello World!';
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