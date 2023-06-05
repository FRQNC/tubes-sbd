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

.card .con-text p {
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
          </div>
        </div>
      </div>
    </section>
    <center>


<div class="container">
    <center>
<h2 class="section-heading mb-4">
              <span class="section-heading-upper">Cari Materi</span>
            </h2>
            <p>Tuliskan kata kunci materi yang ingin kamu cari</p>
<form action="<?=site_url('C_StudySociety/search')?>" method="get" style="flex-direction: row; align-items:center">
    <div>
        <input type="search" name="keyword" style="width: 360px;" placeholder="Keyword.." />
        <select name="search_by">
            <option value="topic" <?php if ($searchBy === 'topic') echo 'selected'; ?>>Search by Topic</option>
            <option value="tag" <?php if ($searchBy === 'tag') echo 'selected'; ?>>Search by Tag</option>
            <option value="grade" <?php if ($searchBy === 'grade') echo 'selected'; ?>>Search by Grade</option>
        </select>
        <input type="submit" class="button button-primary" value="Cari">
    </div>
</form>
<br />

<?php if ($search_result) : ?>
    <div class="search-result">
        <hr>
        <?php foreach ($search_result as $post) : ?>
            <a href="<?php echo site_url('C_StudySociety/seePost/?post_id=').$post->post_id;?>">
                <div class="card col-sm-5" style="margin: 15px;">
                    <img src="<?php echo base_url('assets/2.jpg'); ?>" alt="card-hover">
                    <div class="con-text">
                        <h2><?php echo $post->post_title; ?></h2>
                        <p>
                            <?php echo $post->post_content; ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <?php if ($keyword) : ?>
        <div style="height: 400px;">
            <br>
            <br>
            <h4>Tidak ada data yang ditemukan dari kata kunci <b><?php //echo $keyword; ?></b></h4>
            <p>Coba dengan kata kunci yang lain</p>
        </div>
    <?php endif ?>
<?php endif ?>
                </div>
                
                
            </center>
            
            <br />
        <br />

<?php include "templates/V_footer.php"; ?>