<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_StudySociety extends CI_Controller
{

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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_StudySociety');
    }
    public function index()
    {
        $data['keyword'] = $this->input->get('keyword');
        $data['searchby'] = $this->input->get('searchby');
        $this->load->model('M_StudySociety');
        $data['search_result'] = $this->M_StudySociety->search($data['keyword'],$data['searchby']);
        $gradeData = $this->M_StudySociety->getAllGrade();
            $topicData = $this->M_StudySociety->getAllTopic();
            $data = ["grade" => $gradeData, "topic" => $topicData];
        
        $this->load->view('V_landing', $data);
    }
    public function admin()
    {   
        $this->load->view('admin/index');
    }
    public function topic()
    {   $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic();
        $data = ["grade" => $gradeData, "topic" => $topicData];
        $this->load->view('V_topic', $data);
    }
    public function materitopic($id)
    {  
        $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getTopic($id);
        $data = ["grade" => $gradeData,"topic" => $topicData];
        $this->load->view('V_materi_topic', $data);
    }
    public function materigrade($id)
    {  
        $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getgrade($id);
        $data = ["topic" => $topicData,"grade" => $gradeData];
        $this->load->view('V_materi_grade', $data);
    }

    public function register()
    {
        $data['keyword'] = $this->input->get('keyword');
        $data['searchby'] = $this->input->get('searchby');
        $this->load->model('M_StudySociety');
        $data['search_result'] = $this->M_StudySociety->search($data['keyword'],$data['searchby']);
        $gradeData = $this->M_StudySociety->getAllGrade();
            $topicData = $this->M_StudySociety->getAllTopic();
            $data = ["grade" => $gradeData, "topic" => $topicData];
        $this->load->view('V_register', $data);
    }

    public function login()
    {
        $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic();
        $data = ["grade" => $gradeData, "topic" => $topicData];
        $this->load->view('V_login', $data);
    }
    // public function home(){
    //     $data['keyword'] = $this->input->get('keyword');
	// 	$this->load->model('M_StudySociety');
	// 	$data['search_result'] = $this->M_StudySociety->search($data['keyword']);
    //     $this->load->view('V_Home', $data);
    // }

    public function home()
    {
        $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic();
        $postdata = $this->M_StudySociety->getAllpost();
        $data = ["grade" => $gradeData, "topic" => $topicData, "all" => $postdata];
        $data['search_result'] = array();
        $data['keyword'] = '';
        $data['searchBy'] = '';
        $data['searchValue'] = '';
        $this->load->view('V_Home',$data);
    }
    
    public function search() {
        $keyword = $this->input->get('keyword');
        $searchBy = $this->input->get('search_by');
        $searchValue = $this->input->get('search_value');
        $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic();
        $postdata = $this->M_StudySociety->getAllpost();
        $data = ["grade" => $gradeData, "topic" => $topicData, "all" => $postdata];
        $this->load->model('M_StudySociety');
        $data['search_result'] = $this->M_StudySociety->search($keyword, $searchBy, $searchValue);
        $data['keyword'] = $keyword;
        $data['searchBy'] = $searchBy;
        $data['searchValue'] = $searchValue;
        $this->load->view('V_Home',$data);
    }

    public function confirmRegistration()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('user_login_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_login_password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg', '<p style="color:red;">gagal mendaftar!</p>');
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

            $folderPath = FCPATH . 'assets/userFiles/' . $username . '/';

            if (!file_exists($folderPath)) {
                if (mkdir($folderPath, 0777, true)) {
                    mkdir($folderPath . 'post_images/', 0777, true);
                    mkdir($folderPath . 'resource/pdf/', 0777, true);
                    mkdir($folderPath . 'resource/apkg/', 0777, true);
                    mkdir($folderPath . 'resource/pptx/', 0777, true);
                    mkdir($folderPath . 'resource/docx/', 0777, true);
                    mkdir($folderPath . 'resource/xlsx/', 0777, true);
                    mkdir($folderPath . 'resource/other/', 0777, true);
                } else {
                    echo 'Unable to create the folder. ' . $folderPath;
                }
            } else {
                echo 'Folder already exists.';
            }
            $this->session->set_flashdata('msg', '<p style="color:green">Berhasil mendaftar</p>');
            redirect('C_StudySociety/login');
        } else {
            $this->session->set_flashdata('msg', '<p style="color:red;">gagal mendaftar!</p>');
            redirect('C_StudySociety/register');
        }
    }

    public function confirmLogin()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('user_login_password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg', '<p style="color:red;">Invalid Username or Password!</p>');
            redirect('C_StudySociety/login');
        }

        $username = $this->input->post('username');
        $form_password = $this->input->post('user_login_password');
        $this->load->model('M_StudySociety');
        $stored_password = $this->M_StudySociety->getUserPassword($username)[0];
        $result = password_verify($form_password, $stored_password->user_login_password);
        if ($result) {
            $user_login_data = $this->M_StudySociety->getUserLogin($username)[0];
            $user_info = $this->M_StudySociety->getUserInfo($username)[0];
            $data = [
                "user_login_id" => $user_login_data->user_login_id,
                "username" => $user_login_data->username,
                "user_login_privilege" => $user_login_data->user_login_privilege,
                "user_id" => $user_info->user_id,
                "is_logged_in" => true
            ];
            $this->session->set_userdata($data);
            redirect('C_StudySociety/V_userProfile/?username=' . $username);
        } else {
            $this->session->set_flashdata('msg', '<p style="color:red;">Invalid Username or Password!</p>');
            redirect('C_StudySociety/login');
        }
    }

    public function V_editUserInfo()
    {
        if (!$this->session->is_logged_in) {
            redirect(site_url('C_StudySociety/login'));
        } else {
            $dt = $this->M_StudySociety->getUserInfo($this->session->username);
            $data = array();
            $user_fullname = "";
            $user_birthday = "";
            $user_sex = "";
            $user_type = "";
            $user_institution = "";
            $user_bio = "";
            $user_photo = "default.jpg";
            if (!empty($dt)) {
                $user_fullname = $dt[0]->user_fullname;
                $user_birthday = $dt[0]->user_birthday;
                $user_sex = $dt[0]->user_sex;
                $user_type = $dt[0]->user_type;
                $user_institution = $dt[0]->user_institution;
                $user_bio = $dt[0]->user_bio;
                $user_photo = $dt[0]->user_photo;
            }
            $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic(); 
            $data = [
                "user_fullname" => $user_fullname,
                "user_birthday" => $user_birthday,
                "user_sex" => $user_sex,
                "user_type" => $user_type,
                "user_institution" => $user_institution,
                "user_bio" => $user_bio,
                "user_photo" => $user_photo,
                "grade" => $gradeData,
                "topic" => $topicData
            ];
            
            $this->load->view("V_EditUserInfo", $data);
        }
    }

    public function editUserInfo()
    {
        $user_login_id = $this->input->post("user_login_id");
        $user_fullname = $this->input->post("user_fullname");
        $user_birthday = $this->input->post("user_birthday");
        $user_sex = $this->input->post("user_sex");
        $user_type = $this->input->post("user_type");
        $user_institution = $this->input->post("user_institution");
        $user_bio = $this->input->post("user_bio");
        $user_photo = $_FILES['user_photo']['name'];
        $user_photo_tmp = $_FILES['user_photo']['tmp_name'];

        $relativePath = '../../assets/userFiles/' . $this->session->username . '/';
        $uploadPath = realpath(__DIR__ . '/' . $relativePath) . '/';
        $filePath = $uploadPath . $user_photo;

        $data = [
            "user_login_id" => $user_login_id,
            "user_fullname" => $user_fullname,
            "user_birthday" => $user_birthday,
            "user_sex" => $user_sex,
            "user_type" => $user_type,
            "user_institution" => $user_institution,
            "user_bio" => $user_bio,
            "user_photo" => $user_photo
        ];
        $success = $this->M_StudySociety->editUserInfo($data);
        if ($success > 0) {
            $old_photo = $this->input->post("user_photo_old");
            if ($user_photo != $old_photo) {
                $oldFilePath = $uploadPath . $old_photo;
                unlink($oldFilePath);
            }
            move_uploaded_file($user_photo_tmp, $filePath);

            redirect(site_url('C_StudySociety/V_userProfile/?username=' . $this->session->username));
        } else {
            echo "Edit Failed";
        }
    }

    public function V_userProfile()
    {
        $username = $_GET['username'];
        $user_data = $this->M_StudySociety->getUserInfo($username);
        if (!empty($user_data)) {
            $user_id = $user_data[0]->user_id;
            $user_posts = $this->M_StudySociety->getUserPosts($user_id);
            $gradeData = $this->M_StudySociety->getAllGrade();
            $data = [
                "username" => $username,
                "user_fullname" => $user_data[0]->user_fullname,
                "user_birthday" => $user_data[0]->user_birthday,
                "user_sex" => $user_data[0]->user_sex,
                "user_type" => $user_data[0]->user_type,
                "user_institution" => $user_data[0]->user_institution,
                "user_bio" => $user_data[0]->user_bio,
                "user_photo" => $user_data[0]->user_photo,"grade" => $gradeData
            ];
            if (!empty($user_posts)) {
                $data['user_posts'] = $user_posts;
            } else {
                $data['user_posts'] = "Kosong";
            }
            $this->load->view('V_userProfile', $data);
        } else {
            if ($username == $this->session->username) {
                redirect(site_url('C_StudySociety/V_editUserInfo'));
            } else {
                echo $username;
            }
        }
    }


    public function V_addPost()
    {
        if (!$this->session->is_logged_in) {
            redirect(site_url('C_StudySociety/login'));
        } else {
            $gradeData = $this->M_StudySociety->getAllGrade();
            $topicData = $this->M_StudySociety->getAllTopic();
            $userData = $this->M_StudySociety->getUserInfo($this->session->username)[0];
            $data = ["grade" => $gradeData, "topic" => $topicData, "userdata" => $userData];
            $this->load->view("V_addPost", $data);
        }
    }

    public function upload_image_to_post()
    {
        // Check if the request contains an uploaded image file
        if (!empty($_FILES['image']['name'])) {
            // Define the relative upload directory path
            $relativePath = '../../assets/userFiles/' . $this->session->username . '/post_images/';

            // Construct the absolute file system path
            $uploadPath = realpath(__DIR__ . '/' . $relativePath) . '/';

            // Generate a unique file name
            $fileName = uniqid() . '_' . $_FILES['image']['name'];

            // Construct the file system path
            $filePath = $uploadPath . $fileName;

            // Upload the file to the specified directory
            move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

            // Construct the image URL
            $imageUrl = base_url('assets/userFiles/' . $this->session->username . '/post_images/' . $fileName);

            // Prepare the response with the image URL
            $response = array(
                'success' => 1,
                'file' => array(
                    'url' => $imageUrl,
                ),
            );

            // Send the JSON response
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }

        // Handle error if no image file was found
        $response = array(
            'success' => 0,
            'message' => 'No image file received.',
        );

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function delete_image_from_post()
    {
        $imageUrl = $this->input->post('imageUrl');

        // Process the image URL to get the image filename
        $filename = basename($imageUrl);

        // Define the path to the image file
        $filePath = FCPATH . 'assets/userFiles/' . $this->session->username . '/post_images/' . $filename;

        // Check if the file exists and delete it
        if (file_exists($filePath)) {
            unlink($filePath);

            // Send a success response back to the editor
            $response = array(
                'success' => true,
                'message' => 'Image deleted successfully.'
            );
        } else {
            // Send an error response if the file does not exist
            $response = array(
                'success' => false,
                'message' => 'Image file not found.'
            );
        }

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function addPost()
    {
        $user_id = $this->input->post('user_id');
        $post_title = $this->input->post('post_title');
        $post_content = $this->input->post('post_content');
        $topic_id = $this->input->post('topic');
        $grade_id = $this->input->post('grade');
        $tags = explode(",", $this->input->post('tags'));

        $resource_name = $_FILES['resource']['name'];
        $resource_type = pathinfo($resource_name, PATHINFO_EXTENSION);

        $extensions = array('pdf', 'docx', 'xlsx', 'pptx', 'apkg');
        $not_other = 0;
        foreach($extensions as $x){
            if($resource_type == $x) $not_other = 1;
        }
        if($not_other == 0) $resource_type = 'other';
        $resource_type_id = -1;
        switch($resource_type){
            case 'other':
                $resource_type_id = 0;
                break;
            case 'pdf':
                $resource_type_id = 1;
                break;
            case 'docx':
                $resource_type_id = 2;
                break;
            case 'xlsx':
                $resource_type_id = 3;
                break;
            case 'pptx':
                $resource_type_id = 4;
                break;
            case 'apkg':
                $resource_type_id = 5;
                break;
        }
        
        $resource_tmp_name = $_FILES['resource']['tmp_name'];
        $data = [
            "user_id" => $user_id,
            "post_title" => $post_title,
            "post_content" => $post_content,
            "topic_id" => $topic_id,
            "grade_id" => $grade_id,
            "tags" => $tags,
            "resource_name" => $resource_name,
            "resource_tmp_name" => $resource_tmp_name,
            "resource_type_id" => $resource_type_id,
            "resource_type_name" => $resource_type
        ];
        $success = $this->M_StudySociety->addPostData($data);
        if ($success['post_inserted'] > 0) {
            if ($success['resource_inserted'] > 0) {

                $relativePath = '../../assets/userFiles/' . $this->session->username . '/resource/'.$resource_type.'/';
                $uploadPath = realpath(__DIR__ . '/' . $relativePath) . '/';
                $filePath = $uploadPath . $resource_name;

                move_uploaded_file($resource_tmp_name, $filePath);
            }
            redirect(site_url('C_StudySociety/home'));
        }
    }

    public function seePost()
    {
        $post_id = $_GET['post_id'];
        $post_data = $this->M_StudySociety->getPostData($post_id);
        if (!empty($post_data)) {
            $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic();
        $data = ["grade" => $gradeData, "topic" => $topicData];
            $data['post_data'] = $post_data[0];
            $data['post_blocks'] = json_decode($post_data[0]->post_content, true)['blocks'];
            $data['user_data'] = $this->M_StudySociety->getUserInfoById($post_data[0]->user_id)[0];
            $data['viewer_like_data'] = $this->M_StudySociety->getPostLikeData($post_id,$this->session->user_id);
            $data['post_comments'] = $this->M_StudySociety->getPostComments($post_id);
            $data['resource_data'] = $this->M_StudySociety->getResourceData($post_id);
            if(!empty($data['resource_data'])){
                $data['resource_data'] = $data['resource_data'][0];
                $resource_type = $data['resource_data']->resource_type_id;
                switch($resource_type){
                    case 0;
                        $resource_type = 'other';
                    break;
                    case 1;
                        $resource_type = 'pdf';
                    break;
                    case 2;
                        $resource_type = 'docx';
                    break;
                    case 3;
                        $resource_type = 'xlsx';
                    break;
                    case 4;
                        $resource_type = 'pptx';
                    break;
                    case 5;
                        $resource_type = 'apkg';
                    break;
                }
                $data['resource_type'] = $resource_type;
            }
            $tags = $this->M_StudySociety->getPostTags($post_id);
            $data['keyword'] = $this->input->get('keyword');
            $data['searchby'] = $this->input->get('searchby');
            $this->load->model('M_StudySociety');
            $data['search_result'] = $this->M_StudySociety->search($data['keyword'],$data['searchby']);
            if (!empty($tags)) {
                $data['post_tags'] = $tags;
            }
            $this->load->view('V_Post', $data);
        } else {
        }
    }

    // public function seePostData()
    // {
    //     $post_id = $_GET['post_id'];
    //     $post_data = $this->M_StudySociety->getPostData($post_id);
    //     if (!empty($post_data)) {
    //         $data['post_data'] = $post_data[0];
    //         $data['user_data'] = $this->M_StudySociety->getUserInfoById($post_data[0]->user_id)[0];
    //         $this->load->view('V_Test', $data);
    //     }
    // }

    public function ratePost()
    {
        $rating = $this->input->post('rating');
        $data['user_id'] = $this->input->post('user_id');
        $data['post_id'] = $this->input->post('post_id');
        $data['user_has_liked'] = 0;
        $data['user_has_disliked'] = 0;

        if ($rating == 1) {
            $data['user_has_liked'] = 1;
            $data['user_has_disliked'] = 0;
        } elseif ($rating == -1) {
            $data['user_has_liked'] = 0;
            $data['user_has_disliked'] = 1;
        }

        $result = $this->M_StudySociety->changePostRating($data);

        if ($result) {
            $response = array(
                "success" => 1,
                "liked" => $result['like_count_add'],
                "disliked" => $result['dislike_count_add']
            );
        } else {
            $response = array(
                "success" => 0
            );
        }

        // $this->load->library('output');
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function addComment(){
        $data['post_id'] = $this->input->post('post_id');
        $data['user_id'] = $this->input->post('user_id');
        $data['comment_content'] = htmlspecialchars($this->input->post('comment_content'));
        $success = $this->M_StudySociety->addComment($data);
        if($success > 0){
            redirect('C_StudySociety/seePost/?post_id='.$data['post_id']);
        }
    }

    public function deleteComment(){
        $id = $this->input->get('comment_id');
        $post_id = $this->input->get('post_id');
        $success = $this->M_StudySociety->deleteComment($id);
        if($success > 0){
            redirect('C_StudySociety/seePost/?post_id='.$post_id);
        }
    }

    public function logout()
	{
	    $this->session->sess_destroy();
		redirect('C_StudySociety/');
	}

    public function navbarcari()
	{
        $gradeData = $this->M_StudySociety->getAllGrade();
            $topicData = $this->M_StudySociety->getAllTopic();
            $data = ["grade" => $gradeData, "topic" => $topicData];
	    $cari = $this->input->post('cari');
        $data['cari'] = $this->M_StudySociety->getPost($cari);
        $this->load->view('V_Materi_cari', $data);
	}

}

/* 
- Halaman list materi dari search
- Styling view post
- Upload photo issue
- Sort uploaded user file
*/