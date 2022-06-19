<?php

namespace App\Controllers;

use \App\Models\userModel;

class Contact extends BaseController
{
    protected $userModel; 

    // konstruktor
    public function __construct(){

        // instansi objek investor
        $this->userModel = new userModel();
    }

    // method index
    public function index()
    {
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);

        $data = [
            'user' => $user,
        ];

        // tampilkan halaman
        return view('contact', $data);
    }

}
?>