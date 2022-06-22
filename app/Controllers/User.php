<?php

namespace App\Controllers;

use \App\Models\userModel;
use \App\Models\courseModel;
use \App\Models\enrollmentModel;

class User extends BaseController
{

    protected $userModel; 
    protected $courseModel; 
    protected $enrollmentModel; 

    // konstruktor
    public function __construct(){

        // instansi objek investor
        $this->userModel = new userModel();
        $this->courseModel = new courseModel();
        $this->enrollmentModel = new enrollmentModel();
    }
    
    public function index()
    {
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);

        $data = [
            'user' => $user,
        ];

        // tampilkan halaman
        return view('user-side/profile_user', $data);
    }

    // method index
    public function register()
    {

        // tampilkan halaman
        return view('user-side/register');
    }
    
    // method index
    public function login()
    {

        // tampilkan halaman
        return view('user-side/login');
    }


    // method untuk create
    public function save($id_user = null)
    {
        $data = [
			'fname' => $this->request->getVar('fname'),
			'lname' => $this->request->getVar('lname'),
			'email' => $this->request->getVar('email'),
			'password' => $this->request->getVar('password'),
		];
		
		if ($id_user == null) {
            $this->userModel->saveUser($data);
        } else {
			$this->userModel->updateUser($id_user, $data);
		}

        return redirect()->to('/home');
    }  

    // method untuk login
    public function process(){

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $this->userModel->getUserLogin($email);
        
        $data = $dataUser['fname'];
        // dd($dataUser);
        if ($dataUser) {
            if ($password == $dataUser['password']) {
                session()->set([
                    'email' => $dataUser['email'],
                    'id' => $dataUser['id_user'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/home'));
            }
            else {
                session()->setFlashdata('error', 'Email & Password Salah 1');
                return redirect()->back();
            }
        }
        else {
            session()->setFlashdata('error', 'Email & Password Salah 2');
            return redirect()->back();
        }
    }

    // method untuk logout
    public function logout(){
        $session = session();
        $session->destroy();
        // echo "ini keluar";
        return redirect()->to('/');
    }

    // method index
    public function displayProfile($id_user)
    {
        $user = $this->userModel->getUser($id_user);

        $session = session();
        $userNow = $session->get('id');

        $enroll = $this->enrollmentModel->getEnroll($userNow);
        $sign = $this->enrollmentModel->checkUser($id_user);

        // dd($enroll);
        
        // simpan data ke var.
        $data = [
            'user' => $user,
            'enroll' => $enroll,
            'sign' => $sign,
        ];

        // // tampilkan halaman
        return view('user-side/profile_user', $data);
    }   


    // photo
    public function storePhoto(){

        $file = $this->request->getFile('fupload');
        
        $session = session();
        $id = $session->get('id');
        
        dd($file);
        
        if ($file->isValid() && ! $file->hasMoved()) {
            $filename = $file->getName();
            $file->move('public/file', $filename);
        }

        $fname = 'ini';
        $lname = 'ini';
        $password = 'ini';
        $email = 'yos11@gmail.com';

        $data = [
			'photo' => $filename,
            'user' => $this->userModel->getUser($id),
        ];
        
        $this->userModel->updateUser($id, $data);

        return redirect()->to('/home');
    }

}
?>