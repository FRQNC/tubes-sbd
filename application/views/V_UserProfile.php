<?php include "templates/V_header.php"; ?>

<div class="container">
<style>
.wrap{
width: 800px;
color:black;
margin: 20px auto;
padding:15px;
}
</style>
</head>
<body style="background-size:cover;background-attachment: fixed;">
<div class="wrap">
<h2 class="class" align="center">INFORMASI DATA DIRI</h2><hr align="center" width="100%" style="border-top: 3px double #8c8b8b;">
<table style="padding: 5%;" class="table">
<tr><td rowspan="10" width="100px">
<img src="<?=base_url('assets/userFiles/'.$username.'/'.$user_photo)?>" style="display: block;border-radius: 5%;border-color:white;margin-right:30px; width:300px;" border="2px" ></td></tr>
<tr style="padding: 2px;"><td><b>Nama </b></td><td>:</td> <td> <?= $user_fullname?></td></tr>
<tr><td><b>Username </b></td><td>:</td> <td> <?= $username?></td></tr>
<tr><td><b>Jenis Kelamin </b></td><td>:</td> <td> <?= $user_sex?></td></tr>
<tr><td><b>TTL </b></td><td>:</td> <td> <?= $user_birthday?></td></tr>
<tr><td><b>Bio </b></td><td>:</td> <td> <?= $user_bio?></td></tr>
<tr><td><b>Institusi </b></td><td>:</td> <td> <?= $user_institution?></td></tr>
<tr><td><b>Type</b></td><td>:</td> <td><?= $user_type?></td></tr></table>
    <br>
    <br>
<center>
<h2>Daftar Post</h2>
<?php
        if(gettype($user_posts) != 'array'){
            echo '<p>Kosong</p>';
        }
        else{ ?>

            <table class="table">
                <thead>
                    <th>Judul post</th>
                    <th>Topik</th>
                    <th>Tingkat</th>
                </thead>
                <tbody>
            <?php foreach($user_posts as $post){
    ?>
            <tr>
                <td><a href="<?= site_url('C_StudySociety/seePost?post_id='.$post->post_id)?>"><?= $post->post_title?></a></td>
                <td><?= $post->topic_name?></td>
                <td><?= $post->grade_name?></td>
            </tr>
    <?php
            }
        }
    ?>
    </tbody>
    </table>
<br>
</center>
</div>
</div>
</div>
<?php include "templates/V_footer.php"; ?>