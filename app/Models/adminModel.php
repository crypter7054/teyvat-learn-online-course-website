<?php

namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['id_admin', 'username', 'password'];

    // read
    public function getAdmin($id_admin = false)
    {
        if ($id_admin == false) {
            return $this->findAll();
        }

        return $this->where(['id_admin' => $id_admin])->first();
    }

    public function getAdminLogin($username)
    {
        return $this->where(['username' => $username])->first();
    }

    // create
    public function saveAdmin($data)
    {
        return $this->insert($data);
    }

    // update
    public function updateAdmin($id, $data)
    {
        return $this->update($id, $data);
    }

}   