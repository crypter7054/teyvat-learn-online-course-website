<?php

namespace App\Controllers;

use \App\Models\courseModel;
use \App\Models\userModel;

class Course extends BaseController
{
    protected $courseModel; 

    // konstruktor
    public function __construct(){

        // instansi objek investor
        $this->courseModel = new courseModel();
        $this->userModel = new userModel();
    }
    
    // method index
    public function index()
    {
        // cari data
        $course = $this->courseModel->getCourse();
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);

        // simpan data ke var.
        $data = [
            'course' => $course,
            'user' => $user
        ];

        // tampilkan halaman
        return view('courses', $data);
    }    

    // method detail
    public function detail($id_course)
    {
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);

        // simpan data ke var.
        $data = [
            'user' => $user,
            'course' => $this->courseModel->getCourse($id_course)
        ];

        // dd($data);

        // tampilkan halaman
        return view('detail', $data);
    }   

    public function checkout()
    {
        $course = $this->courseModel->getCourse();
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);

        // simpan data ke var.
        $data = [
            'user' => $user
        ];

        // tampilkan halaman
        return view('payment', $data);
    }   
}
?>