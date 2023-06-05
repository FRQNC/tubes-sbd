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

    public function editUserInfo($data){
        $user_login_id = $data["user_login_id"];
        $user_fullname = $data["user_fullname"];
        $user_birthday = $data["user_birthday"];
        $user_sex = $data["user_sex"];
        $user_type = $data["user_type"];
        $user_institution = $data["user_institution"];
        $user_bio = $data["user_bio"];
        $user_photo = $data["user_photo"];

        $query = $this->db->query("SELECT user_id FROM user_info WHERE user_login_id = '$user_login_id'");
        $isExist = $query->result();
        if(!empty($isExist)){
            $query = $this->db->query("UPDATE user_info SET user_fullname = '$user_fullname', user_birthday = '$user_birthday', user_sex = '$user_sex', user_type = '$user_type', user_institution = '$user_institution', user_bio = '$user_bio', user_photo = '$user_photo' WHERE user_login_id = '$user_login_id'");
        }
        else{
            $query = $this->db->query("INSERT INTO user_info VALUES('','$user_login_id','$user_fullname','$user_birthday','$user_sex','$user_type','$user_institution','$user_bio','$user_photo')");
        }
        return $this->db->affected_rows();
    }

    public function getUserPassword($username){
        $query = $this->db->query("SELECT user_login_password FROM user_login WHERE username = '$username'");
        return $query->result();
    }
    public function getUserLogin($username){
        $query = $this->db->query("SELECT user_login_id, username, user_login_privilege FROM user_login WHERE username = '$username'");
        return $query->result();
    }
    public function getUserInfo($username){
        $query = $this->db->query("SELECT * FROM user_info INNER JOIN user_login ON user_info.user_login_id = user_login.user_login_id WHERE user_login.username = '$username'");
        return $query->result();
    }
    public function getUserInfoById($user_id){
        $query = $this->db->query("SELECT * FROM user_info JOIN user_login ON user_info.user_login_id = user_login.user_login_id WHERE user_id = '$user_id'");
        return $query->result();
    }
    public function getUserPosts($user_id){
        $query = $this->db->query("SELECT post_id, post_title FROM post WHERE user_id = '$user_id'");
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

    $query = "";
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

    public function getAllGrade(){
        $query = $this->db->query("SELECT * FROM grade");
        return $query->result();
    }
    
    public function getAllTopic(){
        $query = $this->db->query("SELECT * FROM topic");
        return $query->result();
    }

    public function addPostData($data){
        $user_id = $data['user_id'];
        $post_title = $data['post_title'];
        $post_content = $data['post_content'];
        $topic_id = $data['topic_id'];
        $grade_id = $data['grade_id'];
        $resource_name = $data['resource_name'];
        $query = "INSERT INTO post VALUES (?, ?, ?, ?, 0, 0, ?, ?)";
        $this->db->query($query, array('', $user_id, $post_title, $post_content, $topic_id, $grade_id));
        $result["post_inserted"] = $this->db->affected_rows();
        $insert_id = $this->db->insert_id();
        $query = $this->db->query("INSERT INTO resource VALUES('','$resource_name','0','$user_id','$insert_id')");
        $result["resource_inserted"] = $this->db->affected_rows();
        foreach($data['tags'] as $tag){
            $tag_found = $this->findTag($tag);
            if(!empty($tag_found)){
                $result['tag_increased'] = $this->updateTagCount($tag_found[0]->tag_id);
                $this->addPostTags($tag_found[0]->tag_id,$insert_id);
            }
            else{
                if($tag != ''){
                    $tag_insert_id = $this->addTag($tag);
                    $result['tags_inserted'] = $this->addPostTags($tag_insert_id,$insert_id);
                }
            }
        }
        return $result;
    }

    public function findTag($tag_name){
        $query = $this->db->query("SELECT tag_id FROM tag WHERE tag_name='$tag_name'");
        return $query->result();
    }

    public function addTag($tag_name){
        $query = $this->db->query("INSERT INTO tag VALUES('','$tag_name',1)");
        return $this->db->insert_id();
    }

    public function addPostTags($tag_id,$post_id){
        $query = $this->db->query("INSERT INTO post_tags VALUES('','$post_id','$tag_id')");
        return $this->db->affected_rows();
    }

    public function updateTagCount($tag_id){
        $query = $this->db->query("UPDATE tag SET tag_count=tag_count+1 WHERE tag_id = '$tag_id'");
        return $this->db->affected_rows();
    }

    public function getPostData($post_id){
        $query = $this->db->query("SELECT * FROM post 
        INNER JOIN topic ON post.topic_id = topic.topic_id
        INNER JOIN grade ON post.grade_id = grade.grade_id
        WHERE post.post_id = '$post_id'");
        return $query->result();
    }

    public function getPostTags($post_id){
        $query = $this->db->query("SELECT tag.tag_name FROM post_tags
        INNER JOIN tag ON post_tags.tag_id = tag.tag_id
        WHERE post_id = '$post_id'");
        return $query->result();
    }

    public function changePostRating($data){
        $post_id = $data['post_id'];
        $user_id = $data['user_id'];
        $user_has_liked = $data['user_has_liked'];
        $user_has_disliked = $data['user_has_disliked'];
        $query = $this->db->query("SELECT post_like_data_id FROM post_like_data WHERE post_id = '$post_id' AND user_id = '$user_id'");
        $post_like_data_id = $query->result();
        if(!empty($post_like_data_id)){
            $id = $post_like_data_id[0]->post_like_data_id;
            $query = $this->db->query("UPDATE post_like_data SET user_has_liked = '$user_has_liked', user_has_disliked = '$user_has_disliked' WHERE post_like_data_id = '$id'");
            $result['data_updated'] = $this->db->affected_rows();
            if($result['data_updated'] > 0){
                if($user_has_liked){
                    $query = $this->db->query("UPDATE post SET
                    post_like_count = post_like_count + 1,
                    post_dislike_count = post_dislike_count - 1  WHERE post_id = '$post_id'");
                    $result['like_count_add'] = 1; 
                    $result['dislike_count_add'] = -1; 
                }
                else if($user_has_disliked){
                    $query = $this->db->query("UPDATE post SET
                    post_like_count = post_like_count - 1,
                    post_dislike_count = post_dislike_count + 1  WHERE post_id = '$post_id'");
                    $result['like_count_add'] = - 1; 
                    $result['dislike_count_add'] = + 1;
                }
            }
            $result['post_data_updated'] = $this->db->affected_rows();
        }
        else{
            $query = $this->db->query("INSERT INTO post_like_data VALUES('','$user_id','$post_id','$user_has_liked','$user_has_disliked')");
            $result['data_inserted'] = $this->db->affected_rows();
            if($result['data_inserted'] > 0){
                if($user_has_liked){
                    $query = $this->db->query("UPDATE post SET post_like_count = post_like_count + 1 WHERE post_id = '$post_id'");
                    $result['like_count_add'] = 1; 
                    $result['dislike_count_add'] = 0;
                }
                else if($user_has_disliked){
                    $query = $this->db->query("UPDATE post SET post_dislike_count = post_dislike_count + 1 WHERE post_id = '$post_id'");
                    $result['like_count_add'] = 0; 
                    $result['dislike_count_add'] = 1;
                }
                $result['post_data_updated'] = $this->db->affected_rows();
            }
        }
        return $result;
    }

}
