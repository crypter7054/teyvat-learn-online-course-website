<?php

namespace App\Controllers;

use \App\Models\courseModel;
use \App\Models\userModel;
use \App\Models\enrollmentModel;
use \App\Models\paymentModel;

class Course extends BaseController
{
    protected $courseModel; 
    protected $userModel; 
    protected $enrollmentModel; 
    protected $paymentModel; 

    // konstruktor
    public function __construct(){

        // instansi objek investor
        $this->courseModel = new courseModel();
        $this->userModel = new userModel();
        $this->enrollmentModel = new enrollmentModel();
        $this->paymentModel = new paymentModel();
    }
    
    // method index
    public function index()
    {
        // cari data
        $course = $this->courseModel->getCourse();
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);
        // $sign = $this->enrollmentModel->checkCourse($id_course);

        // simpan data ke var.
        $data = [
            'course' => $this->courseModel->paginate(8, 'course'),
            'pager' => $this->courseModel->pager,
            'user' => $user,
            // 'sign' => $sign,
        ];

        // tampilkan halaman
        return view('user-side/courses', $data);
    }    

    // method detail
    public function detail($id_course)
    {
        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);
        $sign = $this->enrollmentModel->checkCourse($id_course);
        $course = $this->courseModel->getCourse($id_course);

        // dd($sign);
        // simpan data ke var.
        $data = [
            'user' => $user,
            'course' => $course,
            'enroll' => $this->courseModel->getCourse($id_course),
            'sign' => $sign,
        ];

        // dd($course);

        // tampilkan halaman
        return view('user-side/detail', $data);
    }   


    public function payment($id_course){

        $session = session();
        $userNow = $session->get('id');

        $user = $this->userModel->getUser($userNow);
        $course = $this->courseModel->getCourse($id_course);

        if ($userNow == null) {
            return redirect()->to('/login');
        }
        
        $data = [
            'user' => $user,
            'course' => $course,
        ];

        // tampilkan halaman
        return view('user-side/payment', $data);
    }

    public function checkout($id_course)
    {
        $course = $this->courseModel->getCourse($id_course);
        $user = $this->userModel->getUser();
        $session = session();
        $userNow = (int) $session->get('id');

        $user = $this->userModel->getUser($userNow);

        $id_courseTemp = (int) $id_course;
        
        // simpan data ke var.
        $data = [
            'id_user' => $userNow,
            'id_course' => $id_courseTemp,
        ];

        $data2 = [
            'user' => $user,
        ];
        // dd($data);
        
        if ($id_course != null) {
            $this->enrollmentModel->saveEnroll($data);
            
            // tampilkan halaman
            return view('user-side/success_enroll', $data2);
        } 
    }   


    // method untuk create
    public function savePay($id_course = null)
    {
        $file3 = $this->request->getFile('pupload');
        $filename3 = $file3->getName();
        
        if ($file3->isValid() && ! $file3->hasMoved()) {
            $file3->move('public/file', $filename3);
        }
        
        $data = [
			'photo_payment' => $filename3,
		];

        // dd($sign);

        // dd($course);

        if ($data != null) {
            $this->paymentModel->savePayment($data);
            return redirect()->back();
        }
    }  
}
?>