<?php include "templates/V_header.php"; ?>
<style>
.card {
    width: 250px;
    height: 400px;
    background: #dffef7;
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
    margin-bottom: -180px;
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



</style>
<section id="A" class="page-section clearfix">
      <div class="container">
        <div class="intro">
					<br>
          <center>
						<img
							class="intro-img img-fluid mb-3 mb-lg-0 rounded"
							src="<?php echo base_url('assets/logo.png'); ?>"
							alt="..." style="width:15%;"/>
						</center>
						<br>
						
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Study Society</span>
            </h2>
            <p style="text-align: justify;" class="col-sm-6">
              Pengembangan perangkat lunak berbasis web yang bertujuan untuk menjadikannya
              platform berbagi pengetahuan dalam bentuk materi ajar, catatan, video, flashcard berbasis SRS
              (spaced repetition system). <br> <br>
							Demi terwujudnya Pendidikan Berkualitas.
              Platform ini akan bersifat community driven atau dengan kata lain setiap orang mampu
              mengunggah pengetahuan/material yang mereka miliki ataupun melihat dan mengunduh material
              yang telah diberikan oleh orang lain.<br> <br>
              Konsep strategi pembelajaran menggunakan spaced repetition ini fokus pada pengulangan materi dan memberi jarak waktu belajar kamu. Adanya pemberian jeda waktu antara sesi belajar bisa membuat kamu mengingat lebih banyak materinya.<br> <br>
              Dalam keseluruhan, pengembangan platform berbagi pengetahuan dalam bentuk materi
              ajar, catatan, video, dan flashcard berbasis SRS ini bertujuan untuk meningkatkan aksesibilitas
              dan kualitas pendidikan, serta menciptakan lingkungan belajar yang lebih kolaboratif dan
              interaktif bagi setiap orang.
            </p>
            <div>
              <br>
            <img
							class=""
							src="<?php echo base_url('assets/pe.jpg'); ?>" style="width:550px;"/>
            </div>
          </div>
        </div>
      </div>
			<br>
    </section>
    <center>
    <div >
    <h2 class="section-heading mb-4">
              <span class="section-heading-upper">OUR TEAM</span>
            </h2>
            <div class="container">
            <a href="https://furqon.ilkomc1.com/" target="_blank"> 
                        <div class="card col-sm-5" style="margin:16px;">
                        <img src="<?php echo base_url('assets/FU.jpg'); ?>" alt="card-hover" style="width:400px;">
                        <div class="con-text">
                            <h2>M FURQON</h2>
                            <p>	2207207
                            </p>
                        </div>
                    </div>
            </a>
                    <div class="container">
                    <a href="https://alfi.ilkomc1.com/" target="_blank"> 
                      <div class="card col-sm-5" style="margin:16px;">
                        <img src="<?php echo base_url('assets/AL.jpg'); ?>" alt="card-hover" style="width:590px;">
                        <div class="con-text">
                          <h2>M ALFI FAIZ</h2>
                          <p>2207045
                            </p>
                          </div>
                        </div>
                        </a>
                        <div class="container">
                        <a href="https://ainun.ilkomc1.com/" target="_blank"> 
                        
                                    <div class="card col-sm-5" style="margin:16px;">
                                    <img src="<?php echo base_url('assets/NU.jpg'); ?>" alt="card-hover" style="width:250px;">
                                    <div class="con-text">
                                        <h2>NURAINUN</h2>
                                        <p>2202046
                                        </p>
                                    </div>
                                </div>
                                </a>
            <div class="container">
            <a href="https://raffi.ilkomc1.com/" target="_blank"> 
                        <div class="card col-sm-5" style="margin:16px;">
                        <img src="<?php echo base_url('assets/RA.jpg'); ?>" alt="card-hover" style="width:300px;">
                        <div class="con-text">
                            <h2>RAFFI ARDHI</h2>
                            <p>2202495
                            </p>
                        </div>
                    </div>
                    </a>
    </div>
  </div>
</center>
<?php include "templates/V_footer.php"; ?>