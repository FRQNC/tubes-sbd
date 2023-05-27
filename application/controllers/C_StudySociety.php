<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_StudySociety extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('V_landing');
	}

    public function register(){
        $this->load->view('V_register');
    }

    public function login(){
        $this->load->view('V_login');
    }

    public function confirmRegistration()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
    $this->form_validation->set_rules('user_login_email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('user_login_password', 'Password', 'required|min_length[8]');

    if ($this->form_validation->run() == false) {
        redirect('C_StudySociety/register');
    }

    $username = $this->input->post('username');
    $email = $this->input->post('user_login_email');
    $password = password_hash($this->input->post('user_login_password'), PASSWORD_BCRYPT);
    $data = [
        'username' => $username,
        'email' => $email,
        'password' => $password
    ];
    $this->load->model('M_StudySociety');
    $result = $this->M_StudySociety->addUser($data);
    if ($result > 0) {
        redirect('C_StudySociety');
    } else {
        redirect('C_StudySociety/register');
    }
}

public function confirmLogin()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('user_login_password', 'Password', 'required');

    if ($this->form_validation->run() == false) {
        redirect('C_StudySociety/login');
    }

    $username = $this->input->post('username');
    $form_password = $this->input->post('user_login_password');
    $this->load->model('M_StudySociety');
    $stored_password = $this->M_StudySociety->getUserPassword($username)[0];
    // $data['password'] = $stored_password;
    // $this->load->view("V_Test",$data);
    $result = password_verify($form_password, $stored_password->user_login_password);
    if ($result) {
        redirect('C_StudySociety');
    } else {
        redirect('C_StudySociety/login');
    }
}

}
