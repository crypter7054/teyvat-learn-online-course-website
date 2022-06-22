<?php

namespace App\Models;

use CodeIgniter\Model;

class enrollmentModel extends Model
{
    protected $table      = 'enrollment';
    protected $primaryKey = 'id_enroll';
    // protected $returnType = 'opject';
    protected $allowedFields = ['id_enroll', 'nama_course', 'photo_course', 'category', 'videos', 'price', 'id_course', 'id_user'];

    function getEnroll($id_user){
        return $this->db->table('enrollment')
        ->join('user', 'user.id_user = enrollment.id_user')
        ->join('course', 'course.id_course = enrollment.id_course')
        ->where('enrollment.id_user', $id_user)
        ->get()->getResultArray();
    }

    function checkCourse($id_course){
        return $this->db->table('enrollment')
        ->join('user', 'user.id_user = enrollment.id_user')
        ->join('course', 'course.id_course = enrollment.id_course')
        ->where('enrollment.id_course', $id_course)
        ->get()->getResultArray();
    }

    function checkUser($id_user){
        return $this->db->table('enrollment')
        ->join('user', 'user.id_user = enrollment.id_user')
        ->join('course', 'course.id_course = enrollment.id_course')
        ->where('enrollment.id_user', $id_user)
        ->get()->getResultArray();
    }

    // update
    public function updateEnroll($id, $data)
    {
        return $this->update($id, $data);
    }

    // delete
    public function deleteEnroll($id)
    {
        return $this->where('id_enroll', $id)->delete();
    }

    // create
    public function saveEnroll($data)
    {
        return $this->insert($data);
    }
}

