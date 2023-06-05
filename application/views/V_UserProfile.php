<?php include "templates/V_header.php"; ?>
<img src="<?=base_url('assets/userFiles/'.$username.'/'.$user_photo)?>" alt=""> <br>
<h4>Full name : <?= $user_fullname?></h4> <br>
<p>User name : <?= $username?></p> <br>
<p>Jenis kelamin : <?= $user_sex?></p> <br>
<p>Bio : <?= $user_bio?></p> <br>
<p>Institusi : <?= $user_institution?></p> <br>
<?php
    if($username == $this->session->username){
        echo '<a href="'.site_url('C_StudySociety/V_editUserInfo').'">Edit profil</a>';
    }
?>
<h2>Daftar Post</h2>
<ul>
    <?php
        if(gettype($user_posts) != 'array'){
            echo '<p>Kosong</p>';
        }
        else{
            foreach($user_posts as $post){
    ?>
    <li><?= $post->post_title?></li>
    <?php
            }
        }
    ?>
</ul>
<?php include "templates/V_footer.php"; ?>