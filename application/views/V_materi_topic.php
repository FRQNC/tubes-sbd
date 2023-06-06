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

.our-room .section-title > h2::after {
  left: 0;
  width: 45px;
}
.section-title > p {
  color: #4a4a4a;
  line-height: 15px;
  margin-top: 35px;
}
.our-room-show .single-room {
  background: #fff none repeat scroll 0 0;
  border-bottom: 2px solid #b8b8b8;
  margin: 5px 0;
  transition: all 0.3s ease 0s;
}
.single-room .room-desc {
  padding: 34px 20px 25px;
  text-align: left;
}
.room-desc .room-book {
  display: inline-block;
  float: right;
  margin-top: -52px;
}
.single-room.mb-70 {
  margin-bottom: 70px;
}
.room-desc .room-book a,.static2 .services-desc-inner .room-book > a:hover {
    background: #4a4a4a none repeat scroll 0 0;
    color: #fff;
}
.room-desc .room-book a, .static2 .services-desc-inner .room-book > a {
  display: inline-block;
  font-size: 14px;
  padding: 10px 20px;
  text-transform: uppercase;
}
.room-desc .room-book a {
  font-family: "Montserrat",sans-serif;
  font-weight: 400;
}
.room-desc .room-book a:hover,.static2 .services-desc-inner .room-book > a {
    background: #212a3e none repeat scroll 0 0;
    color: #fff
}
.room-section .single-room .room-desc {
  background: #f1f1f1 none repeat scroll 0 0;
}
.room-desc .room-name h3 {
  color: #4a4a4a;
  font-family: "Poppins",sans-serif;
  font-size: 20px;
  font-weight: 500;
  margin-bottom: 7px;
  text-transform: capitalize;
}
.room-rent > h5 {
    color: #6d6d6d;
    text-transform: capitalize;
}
.room-rent > h5 span {
  font-family: "Poppins",sans-serif;
  font-size: 12px;
}
.our-room-show .single-room:hover,.single_news-post:hover {
  box-shadow: 0 0px 5px rgba(0, 0, 0, 0.35);
}
.carousel-list .col-md-4 {
  width: 390px;
}
.carousel-list.owl-theme .owl-controls .owl-page span,.our-room-list.owl-theme .owl-controls .owl-page span,.our-news-list.owl-theme .owl-controls .owl-page span,.team_brand.style2.owl-theme .owl-controls .owl-page span {
    background: #cbcbcb none repeat scroll 0 0;
    height: 8px;
    opacity: 1;
    transition: all 0.3s ease 0s;
    width: 26px;
}
.carousel-list.owl-theme .owl-controls .owl-page.active span,.our-room-list.owl-theme .owl-controls .owl-page.active span,.our-news-list.owl-theme .owl-controls .owl-page.active span,.team_brand.style2.owl-theme .owl-controls .owl-page.active span {
    background: #212a3e none repeat scroll 0 0;
    width: 40px;
}
.our-room .our-room-list.owl-theme .owl-controls,.our-room .our-news-list.owl-theme .owl-controls,.team_brand.style2.owl-theme .owl-controls {
  margin-top: 30px;
  text-align: center;
}
.our-room .carousel-list.owl-theme .owl-controls{
  margin-top: 40px;
}
.owl-pagination.owl-theme .owl-controls {
  margin-top: 40px;
}
.our-room-list .single-room.mb-80 {
  margin-bottom: 75px;
}

</style>

<center>
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
                <div class="our-room-show">
                    <div class="row">
                        <div class="carousel-list">
                        <?php 
                        if(!empty($topic)){
                        foreach($topic as $p) {?>
                                <a href="<?php echo site_url('C_StudySociety/seePost/?post_id=').$p->post_id;?>">
                            <div class="col-md-4">
                                <div class="single-room">
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3> <?=$p->post_title?></h3>
                                        </div>
                                        <div class="room-rent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                           <?php 
                            }
                          } 
                            else{
                              echo "<h4>Data tidak ditemukan</h4>";
                            }
                          ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <br>
    <br>
        
<?php include "templates/V_footer.php"; ?>