<?php

namespace App\Models;

use CodeIgniter\Model;

class courseModel extends Model
{
    protected $table      = 'course';
    protected $primaryKey = 'id_course';
    protected $allowedFields = ['id_course', 'nama_course', 'photo_course', 'description', 'price', 'category', 'videos', 'instructor'];

    // read
    public function getCourse($id_course = false)
    {
        if ($id_course == false) {
            return $this->findAll();
        }

        return $this->where(['id_course' => $id_course])->first();
    }

    public function getCourseLogin($username)
    {
        return $this->where(['username' => $username])->first();
    }

    // create
    public function saveCourse($data)
    {
        return $this->insert($data);
    }

    // delete
    public function deleteCourse($id)
    {
        return $this->where('id_course', $id)->delete();
    }

    // update
    public function updateCourse($id, $data)
    {
        return $this->update($id, $data);
    }
}   