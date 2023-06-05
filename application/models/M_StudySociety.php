<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_StudySociety extends CI_Model {
    
    public function addUser($data){
        $username = $data['username'];
        $user_login_email = $data['email'];
        $user_login_password = $data['password'];
        $this->db->query("INSERT INTO user_login VALUES ('','$username','$user_login_email','$user_login_password','user')");
        return $this->db->affected_rows();
    }

    public function getUserPassword($username){
        $query = $this->db->query("SELECT user_login_password FROM user_login WHERE username = '$username'");
        return $query->result();
    }
    public function getPostAll(){
        $query = $this->db->query("SELECT * FROM post");
        return $query->result();
    }

//     public function search($keyword)
// {
// 	if(!$keyword){
// 		return null;
// 	}
//     else {
//         $query =  $this->db->query("SELECT * FROM post WHERE post_content like '%".$keyword."%'");
//         return $query->result();
//     }
// }

public function search($keyword, $searchBy)
{

    if ($searchBy === 'tag') {
        $query = $this->db->query("SELECT *
            FROM post_tags
            LEFT JOIN tag ON tag.tag_id = post_tags.tag_id
            LEFT JOIN post ON post.post_id = post_tags.post_id
            WHERE tag_name LIKE '%".$keyword."%'"
        );
    }
    elseif ($searchBy === 'topic') {
        $query = $this->db->query("SELECT *
        FROM post
        LEFT JOIN topic ON topic.topic_id = post.topic_id
        WHERE topic_name LIKE '%".$keyword."%'" 
        );
    }
    elseif ($searchBy === 'grade') {
        $query = $this->db->query("SELECT *
        FROM post
        LEFT JOIN grade ON grade.grade_id = post.grade_id
        WHERE grade_name LIKE '%".$keyword."%'" 
        );
    }
    return $query->result();
}


}