<?php

namespace App\Controllers;

use \App\Models\userModel;

class User extends BaseController
{

    protected $userModel; 

    // konstruktor
    public function __construct(){

        // instansi objek investor
        $this->userModel = new userModel();
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
        return view('profile_user', $data);
    }

    // method index
    public function register()
    {

        // tampilkan halaman
        return view('register');
    }
    
    // method index
    public function login()
    {

        // tampilkan halaman
        return view('login');
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
        // simpan data ke var.
        $data = [
            'user' => $this->userModel->getUser($id_user)
        ];

        // tampilkan halaman
        return view('profile_user', $data);
    }   


    // photo
    public function storePhoto(){

        $file = $this->request->getFile('fupload');
        
        $session = session();
        $id = $session->get('id');
        
        // dd($filename);
        
        if ($file->isValid() && ! $file->hasMoved()) {
            $filename = $file->getName();
            $file->move('public/file', $filename);
        }

        $data = [
			'photo' => $filename,
            'user' => $this->userModel->getUser($id),
        ];
        
        $this->userModel->updateUser($id, $data);

        return redirect()->to('/home');
    }

}
?>