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
        return view('admin-side/login_admin');
    }

    public function index()
    {
        $course = $this->courseModel->getCourse();

        // simpan data ke var.
        $data = [
            'course' => $course,
        ];

        // tampilkan halaman
        return view('admin-side/home_admin', $data);
    }

    // method untuk menampilkan form tambah
    public function create()
    {
       
        // tampilkan halaman
        return view('admin-side/form_course');
    }

    public function account()
    {
       
        // tampilkan halaman
        return view('admin-side/account');
    }   

    // method untuk create
    public function save($id_course = null)
    {
        $file2 = $this->request->getFile('cupload');
        
		// dd($file2);

        if ($file2->isValid() && ! $file2->hasMoved()) {
            $filename2 = $file2->getName();
            $file2->move('public/file', $filename2);
        }
        
        $data = [
			'nama_course' => $this->request->getVar('nama_course'),
			'photo_course' => $filename2,
			'description' => $this->request->getVar('description'),
			'price' => $this->request->getVar('price'),
			'category' => $this->request->getVar('category'),
			'videos' => $this->request->getVar('videos'),
			'instructor' => $this->request->getVar('instructor'),
		];

		if ($id_course == null) {
            $this->courseModel->saveCourse($data);
        } else {
			$this->courseModel->updateCourse($id_course, $data);
		}

		return redirect()->to('/admin/home');
    }  


    // method untuk login
    public function process_admin(){
        $session = session();
        // dd($username);
        $username = $this->request->getVar('username');
        $password_admin = $this->request->getVar('password_admin');
        $dataAdmin = $this->adminModel->getAdminLogin($username);
        
        if ($dataAdmin) {
            if ($password_admin == $dataAdmin['password_admin']) {
                session()->set([
                    'username' => $dataAdmin['username'],
                    'id_admin' => $dataAdmin['id_admin'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/admin/home'));
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

        // dd($dataAdmin);
    }

    // method untuk logout
    public function logout(){
        $session = session();
        $session->destroy();
        // echo "ini keluar";
        return redirect()->to('/admin/login_admin');
    }

    // method untuk delete
    public function delete($id){

        $this->courseModel->deleteCourse($id);
        return redirect()->to('/admin/home');
    }

    // method untuk update
    public function update($id){

        $data = [
			'course' => $this->courseModel->getCourse($id),
		];

		return view('admin-side/update_course', $data);
    }
}
?>