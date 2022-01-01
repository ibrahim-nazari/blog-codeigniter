<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModal extends Model
{
   protected $table="user";
   protected $primaryKey="id";
   protected $allowedFields=["name","email","password"];

}
