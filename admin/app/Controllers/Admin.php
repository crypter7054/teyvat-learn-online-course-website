<?php

namespace App\Controllers;

use \App\Models\adminModel;
use \App\Models\courseModel;

class Admin extends BaseController
{

    protected $adminModel; 
    protected $courseModel; 

    // konstruktor
    public function __construct(){

        // instansi objek investor
        $this->adminModel = new adminModel();
        $this->courseModel = new courseModel();
    }
    
    public function login()
    {
        // tampilkan halaman
        return view('login_admin');
    }

    public function index()
    {
        $course = $this->courseModel->getCourse();

        // simpan data ke var.
        $data = [
            'course' => $course,
        ];

        // tampilkan halaman
        return view('home_admin', $data);
    }

    // method untuk menampilkan form tambah
    public function create()
    {
       
        // tampilkan halaman
        return view('form_course');
    }

    public function account()
    {
       
        // tampilkan halaman
        return view('account');
    }   

    // method untuk create
    public function save($id_course = null)
    {
        $file = $this->request->getFile('fupload');
        
		// dd($file);

        $session = session();
        $id = $session->get('id');

        // if ($file->isValid() && ! $file->hasMoved()) {
        //     $filename = $file->getName();
        //     $file->move('./filee', $filename);
        // }
        
        $data = [
			'nama_course' => $this->request->getVar('nama_course'),
			// 'photo_course' => $filename,
			'description' => $this->request->getVar('description'),
			'price' => $this->request->getVar('price'),
			'category' => $this->request->getVar('category'),
			'videos' => $this->request->getVar('videos'),
			'instructor' => $this->request->getVar('instructor'),
            'course' => $this->courseModel->getCourse($id),
		];

		if ($id_course == null) {
            $this->courseModel->saveCourse($data);
        } else {
			$this->courseModel->updateCourse($id_course, $data);
		}

		return redirect()->to('/');
    }  

    // method untuk login
    public function process_admin(){
        $session = session();
        dd($session);
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataAdmin = $this->userModel->getAdminLogin($username);
        
        // $data = $dataAdmin['fname'];
        // dd($dataAdmin);
        if ($dataAdmin) {
            if ($password == $dataAdmin['password']) {
                session()->set([
                    'username' => $dataAdmin['username'],
                    'id_admin' => $dataAdmin['id'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/home'));
            }
            else {
                session()->setFlashdata('error', 'Username & Password Salah 1');
                return redirect()->back();
            }
        }
        else {
            session()->setFlashdata('error', 'Username & Password Salah 2');
            return redirect()->back();
        }

        dd($dataAdmin);
    }

    // method untuk logout
    public function logout(){
        $session = session();
        $session->destroy();
        // echo "ini keluar";
        return redirect()->to('/login_admin');
    }

    // method untuk delete
    public function delete($id){

        $this->courseModel->deleteCourse($id);
        return redirect()->to('/admin');
    }

    // method untuk update
    public function update($id){

        $data = [
			'course' => $this->courseModel->getCourse($id),
		];

		return view('update_course', $data);
    }
}
?>