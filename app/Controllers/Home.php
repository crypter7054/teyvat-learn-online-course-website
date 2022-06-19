<?php

namespace App\Controllers;

use \App\Models\courseModel;
use \App\Models\userModel;

class Home extends BaseController
{
    protected $courseModel; 
    protected $userModel; 

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

        // dd($userNow);

        // simpan data ke var.
        $data = [
            'course' => $course,
            'user' => $user,
        ];

        // tampilkan halaman
        return view('user-side/home', $data);
    }

}
?>