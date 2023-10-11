 <?php
 	use webvimark\modules\UserManagement\models\User;
 ?>
      <ul class="sidebar-menu" data-widget="tree">
      	<li>
          <a href="<?= Yii::getAlias('@web') ?>/" target="_blank">
            <i class="fa fa-home" aria-hidden="true"></i> <span>Home Page</span>
          </a>
        </li>
        
         <li class="header">PRODUCTS GROUP</li>
        
          <?php if(User::hasRole('bientapvien')) { ?> 
          	<li><a href="<?= Yii::getAlias('@web') ?>/admin/product"><i class="fa fa-circle-o"></i> Manage Products</a></li> 
            <?php } ?>
            <?php if(User::hasRole('bientapvien')) { ?> 
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/catelogies?type=PRODUCT"><i class="fa fa-circle-o"></i> Products Catelogies</a></li> 
            <?php } ?>
            
        
        <li class="header">POSTS GROUP</li>
        
          <?php if(User::hasRole('bientapvien')) { ?> 
          	<li><a href="<?= Yii::getAlias('@web') ?>/admin/news?page=true"><i class="fa fa-circle-o"></i> Manage Pages</a></li> 
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/news"><i class="fa fa-circle-o"></i> Manage Posts</a></li> 
            <?php } ?>
            <?php if(User::hasRole('bientapvien')) { ?> 
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/catelogies"><i class="fa fa-circle-o"></i> Catelogies</a></li> 
            <?php } ?>
             <?php if(User::hasRole('bientapvien')) { ?> 
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/tag-list"><i class="fa fa-circle-o"></i> Tags</a></li> 
            <?php } ?>
        
           <!--  <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Posts</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
        		<ul class="treeview-menu">
                <?php if(User::hasRole('bientapvien')) { ?> 
                <li><a href="<?= Yii::getAlias('@web') ?>/admin/news"><i class="fa fa-circle-o"></i> Manage Posts</a></li> 
                <?php } ?>
                <?php if(User::hasRole('bientapvien')) { ?> 
                <li><a href="<?= Yii::getAlias('@web') ?>/admin/catelogies"><i class="fa fa-circle-o"></i> Catelogies</a></li> 
                <?php } ?>
                 <?php if(User::hasRole('bientapvien')) { ?> 
                <li><a href="<?= Yii::getAlias('@web') ?>/admin/tag-list"><i class="fa fa-circle-o"></i> Tags</a></li> 
                <?php } ?>
               
              </ul>
            </li> -->
        
       
        
        <li class="header">SETTING</li>
        <li><a href="<?= Yii::getAlias('@web') ?>/admin/socials"><i class="fa fa-circle-o"></i> Socials</a></li>
          <li><a href="<?= Yii::getAlias('@web') ?>/admin/links"><i class="fa fa-circle-o"></i> Links</a></li>
          <li><a href="<?= Yii::getAlias('@web') ?>/admin/settings"><i class="fa fa-circle-o"></i> Settings</a></li>
          
          <?php if(User::hasRole('bientapvien')) { ?>
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>SETTINGS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?= Yii::getAlias('@web') ?>/admin/socials"><i class="fa fa-circle-o"></i> Socials</a></li>
          <li><a href="<?= Yii::getAlias('@web') ?>/admin/links"><i class="fa fa-circle-o"></i> Links</a></li>
          <li><a href="<?= Yii::getAlias('@web') ?>/admin/settings"><i class="fa fa-circle-o"></i> Settings</a></li>
          
          
          
          	<?php /* ?><li><a href="<?= Yii::getAlias('@web') ?>/admin/c-setting"><i class="fa fa-circle-o"></i> SETTING</a></li>        	
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/dm"><i class="fa fa-circle-o"></i> Quản lý Menu</a></li>
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/dich-vu"><i class="fa fa-circle-o"></i> Dịch vụ</a></li>
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/c-slide"><i class="fa fa-circle-o"></i> Quản lý Slide</a></li>
            <li><a href="<?= Yii::getAlias('@web') ?>/admin/link"><i class="fa fa-circle-o"></i> Liên kết cuối trang</a></li> 
            <?php */ ?>
          </ul>
        </li> -->
        <?php } ?>
          <?php /*if(User::hasRole('lienhe')) { ?>
        <li>
          <a href="<?= Yii::getAlias('@web') ?>/admin/c-lien-he">
            <i class="fa fa-th"></i> <span>Liên hệ</span>
            <span class="pull-right-container">
              <small class="label pull-right label-primary"><?= \app\models\CLienHe::find()->where(['trang_thai'=>'moi'])->count() ?></small>
            </span>
          </a>
        </li>
        <?php }*/ ?>
     
        
         <?php if(User::hasRole('thongketruycap')) { ?>
          <li>
          <a href="<?= Yii::getAlias('@web') ?>/admin/thong-ke-truy-cap">
            <i class="fa fa-line-chart"></i> <span>USER ACCESS</span>
          </a>
        </li>
        <?php } ?>
         <li class="header">ACCOUNT</li>
        <?php if(User::hasRole('Admin')) { ?> <li><a href="<?= Yii::getAlias('@web') ?>/user-management/user"><i class="fa fa-circle-o text-red"></i> <span>Manage Account</span></a></li> <?php } ?>
        <li><a href="<?= Yii::getAlias('@web') ?>/user-management/auth/change-own-password"><i class="fa fa-circle-o text-yellow"></i> <span>Change Password</span></a></li>
        <li><a href="<?= Yii::getAlias('@web') ?>/user-management/auth/logout"><i class="fa fa-circle-o text-aqua"></i> <span>Log out</span></a></li>
      </ul>



