<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'fname', 'lname', 'email', 'password', 'photo'];

    // read
    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id_user])->first();
    }

    public function getUserLogin($email)
    {
        return $this->where(['email' => $email])->first();
    }

    // create
    public function saveUser($data)
    {
        return $this->insert($data);
    }

    // update
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

}   