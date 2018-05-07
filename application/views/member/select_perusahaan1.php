<?php
	$this->load->view('member/template/header3');
?>

<div class="container">
	<?php foreach ($perusahaan as $key): ?>
	<div class="blog">
        <div class="row">
            <div class="blog-item">
                <div class="row">
                	<div class="col-xs-12 col-sm-2 text-center">
                        <div class="entry-meta">
                            <span>Jenis Perusahaan</span>
            				<?php foreach ($jenis as $a): ?>
                            <span><a href="#"><?php echo $a->jenis_perusahaan; ?></a></span>
                            <?php endforeach ?>
                        </div>
                    </div>
					<div class="col-xs-12 col-sm-10 blog-content text-justify">
				        <a href="#"><img class="img-responsive img-blog" src="../upload/<?php echo $key->foto;?>" width="60%" alt="" /></a>
				        <h4><?php echo $key->nama_perusahaan; ?></h4>
				        <p>Visi : <?php echo $key->visi; ?></p>
				        <p>Misi : <?php echo $key->visi; ?></p>
				        <a class="btn btn-primary readmore" href="blog-item.html">Lihat Detail <i class="fa fa-angle-right"></i></a>
				    </div>
				</div>
			</div>
			<!-- <aside class="col-md-3">
	            <div class="widget search">
	                <form role="form">
	                    <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
	                </form>
	            </div><!--/.search-->
	        </aside> -->
		</div>
	</div>
    <?php endforeach ?>
</div>