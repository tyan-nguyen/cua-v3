<div class="site-footer">
    <div class="container">
        <div class="row justify-content-center copyright">
            <div class="col-lg-7 text-center">
                <div class="widget">
                    <ul class="social list-unstyled">
                    		<?php 
                        	   foreach ($socials as $indexSocial => $social){
                        	?>
                        	<li><a rel="nofollow" href="<?= $social->link ?>"><?= $social->icon ?></a></li>
                        	<?php 
                        	   }
                        	?>
                    </ul>
                </div>
                <div class="widget">
                    <?= $setting->site_copyright ?>
                    <div class="d-block">
                    <?php 
                        foreach ($links as $indexLink => $link){
                    ?>
                     <a rel="nofollow" <?= $link->open_new_tab ? 'target="_blank"': '' ?> href="<?= $link->link ?>" class="m-2"><?= $link->name ?></a>
                    <?php 
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div> <!-- site footer -->