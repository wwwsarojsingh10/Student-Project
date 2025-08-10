<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Studentmodel');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $students = $this->Studentmodel->get_all_students();
        $this->load->view('student_list', ['students' => $students]);
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $this->input->post('name'),
                'course' => $this->input->post('course'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => ''
            ];

            $this->Studentmodel->register($data);
            $this->index();
        } else {
            $this->load->view('register');
        }
    }

    public function profile($id = 0)
    {
        $id = $this->input->get('id');
        if (isset($id) && $id > 0) {
            $student = $this->Studentmodel->get_student($id);
            if (isset($student) && !empty($student)) {
                $this->load->view('profile', ['student' => $student]);
                return;
            }
        }
    }

    public function edit($id = 0)
    {
        $id = $this->input->get('id');
        if (isset($id) && $id > 0) {
            $student = $this->Studentmodel->get_student($id);
            if (isset($student) && !empty($student)) {
                $this->load->view('register', ['student' => $student]);
                return;
            }
        }
    }

    public function update()
    {
        $id = $this->input->post('id');

        if ($id > 0) {
            $data = [
                'name' => $this->input->post('name'),
                'course' => $this->input->post('course'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->Studentmodel->update_student($id, $data);
            $this->index();
        }
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if ($id > 0) {
            $this->Studentmodel->delete_student($id);
            $this->index();
        }
    }

    public function search()
    {
        $search_name = $this->input->get('search_name');
        if(isset($search_name) && !empty($search_name)) {
            $students = $this->Studentmodel->get_all_students($search_name);
            $this->load->view('student_list', ['students' => $students, 'search_name' => $search_name]);
        } else {
            $this->index();
        }
    }

}
