<?php include "templates/V_header.php"; ?>

<style>
.card {
    width: 250px;
    height: 400px;
    background: #fff;
    border-radius: 30px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .25s ease;
    backface-visibility: hidden;
}
.card:hover {
    transform: scale(.9);
}
.card:hover::after {
    height: 280px;
}
.card:hover .con-text p {
    margin-bottom: 0px;
    opacity: 1;
}
.card:hover img {
    transform: scale(1.25);
}
.card:hover .ul {
    transform: translate(0);
    opacity: 1;
}
.card::after {
    width: 100%;
    content: '';
    left: 0px;
    bottom: 0px;
    height: 150px;
    position: absolute;
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,66,112,1)100%);
    z-index: 20;
    transition: all .25s ease;
}
.card .con-text {
    z-index: 30;
    position: absolute;
    bottom: 0px;
    color: #fff;
    padding: 20px;
    padding-bottom: 30px;
}

.card .con-text a {
    font-size: 12px;
    opacity: 0;
    margin-bottom: -110px;
    transition: all .25s ease;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-direction: column;
}
.card .con-text p button {
    padding: 7px 17px;
    border-radius: 12px;
    background: transparent;
    border: 2px solid #fff;
    color: #fff;
    margin-top: 10px;
    margin-left: auto;
    cursor: pointer;
    transition: all .25s ease;
    font-family: poppins;
    font-size: 12px;
    outline: none;
}
.card .con-text p button:hover {
    background: #fff;
    color: #000;
}

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:300,400,500,600|Raleway:300,400,500,600,700');
@font-face {
	font-family: 'Montserrat';
	src: url('fonts/Montserrat-Light.eot');
	src: url('fonts/Montserrat-Light.eot?#iefix') format('embedded-opentype'),
		url('fonts/Montserrat-Light.woff') format('woff'),
		url('fonts/Montserrat-Light.ttf') format('truetype');
	font-weight: 300;
	font-style: normal;
}


@font-face {
	font-family: 'Montserrat';
	src: url('fonts/Montserrat-SemiBold.eot');
	src: url('fonts/Montserrat-SemiBold.eot?#iefix') format('embedded-opentype'),
		url('fonts/Montserrat-SemiBold.woff') format('woff'),
		url('fonts/Montserrat-SemiBold.ttf') format('truetype');
	font-weight: 600;
	font-style: normal;
}

</style>

<div class="container">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb-75">
                        <br>
                          <br>
                          <h2>Daftar <span>MATERI</span></h2>
                        </div>
                    </div>
                </div>
                <table >
                  <tr>
                    <td style="width: 80%;" ><h3>Judul</h3></td>
                    <td style="width: 20%;">Grade</td>
                    <td style="width: 30%;">like</td>
                  </tr>
                  <?php foreach($topic as $p) {?>
                  <tr>
                    <td style="width: 50%;" ><a href="<?php echo site_url('C_StudySociety/seePost/?post_id=').$p->post_id;?>"><h3> <?=$p->post_title?></h3></a></td>
                    <td> <?=$p->grade_name?></td>
                    <td> <i class="fa fa-thumbs-up fa-1x"><?=$p->post_like_count?></i>
                  </td>
                  <td>
                    <i class="fa fa-thumbs-down fa-1x"><?=$p->post_dislike_count?></i>
                  </td>
                </tr>
                <?php } ?>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <br>
    <br>
        
<?php include "templates/V_footer.php"; ?>