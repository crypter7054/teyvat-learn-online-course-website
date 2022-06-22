<?php

namespace App\Models;

use CodeIgniter\Model;

class paymentModel extends Model
{
    protected $table      = 'payment';
    protected $primaryKey = 'id_payment';
    protected $allowedFields = ['id_payment', 'photo_payment'];

    // read
    public function getPayment($id_payment = false)
    {
        if ($id_payment == false) {
            return $this->findAll();
        }

        return $this->where(['id_payment' => $id_payment])->first();
    }

    function checkPayment($id_user){
        return $this->db->table('enrollment')
        ->join('user', 'user.id_user = enrollment.id_user')
        ->join('course', 'course.id_course = enrollment.id_course')
        ->where('enrollment.id_user', $id_user)
        ->get()->getResultArray();
    }

    // create
    public function savePayment($data)
    {
        return $this->insert($data);
    }

}   