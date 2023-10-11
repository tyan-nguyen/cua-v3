<?php
use app\modules\admin\models\Page;
?>
    <footer id="footer" class="overflow-hidden padding-medium">
      <div class="container">
        <div class="row">
          <div class="row d-flex flex-wrap justify-content-between">
          	<?php /* ?>
            <div class="col-lg-3 col-sm-6 pb-3 pe-4">
              <div class="footer-menu text-center">
                <img src="<?= Yii::getAlias('@web')  ?>/img/logo-bg.png?v=2" alt="logo" class="pb-3 logo logo-footer" />
                <p>
                Doanh nghiệp tư nhân Sản xuất – Thương Mại Nguyễn Trình.
                </p>
                <!-- <p>
               Doanh nghiệp tư nhân Sản xuất – Thương Mại Nguyễn Trình được thành lập theo giấy chứng nhận đăng ký doanh nghiệp công ty TNHH một thành viên. Mã số doanh nghiệp: 2100236683. Đăng ký lần đầu ngày 29 tháng 12 năm 2005 do Phòng Đăng ký kinh doanh thuộc Sở Kế hoạch và Đầu tư tỉnh Trà Vinh cấp.
                </p> -->
              </div>
              
            </div>
            <?php */ ?>
            
            <div class="col-lg-4 col-sm-6">
              <div class="footer-menu contact-item">
                <h5 class="widget-title text-uppercase pb-2">Liên hệ</h5>

                <ul class="menu-list list-unstyled mt-4">
                  <li class="menu-item pb-2">
                     <a href=""><i class="fa-solid fa-thumbtack"></i>&nbsp;<?= $setting->site_address ?></a>
                  </li>
                  <li class="menu-item pb-2 mt-2">
                    <a href=""><i class="fa-solid fa-phone"></i>&nbsp;<?= $setting->site_phone ?></a>
                  </li>
                  <li class="menu-item pb-2 mt-2">
                    <a href="mailto:"><i class="fa-solid fa-envelope"></i>&nbsp;<?= $setting->site_email ?></a>
                  </li>

                </ul>
                
              </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu">
                <h5 class="widget-title pb-2 text-uppercase">Cửa toàn cảnh</h5>
                <ul class="menu-list list-unstyled mt-4">
                  <li class="menu-item pb-2">
                    <a href="<?= $setting->getUrl('tai-sao-la-chung-toi') ?>">Tại sao là chúng tôi?</a>
                  </li>
                </ul>
              </div>
            </div>
            

            
             <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu">
                <h5 class="widget-title pb-2 text-uppercase">CHÍNH SÁCH</h5>
                <div class="social-links">
                  <ul class="list-unstyled mt-4">
                    <li class="pb-2">
                      <a href="<?= $setting->getUrl('quy-trinh-lap-dat') ?>">Quy trình lắp đặt</a>
                    </li>
                    <li class="pb-2">
                      <a href="<?= $setting->getUrl('chinh-sach-van-chuyen') ?>">Chính sách vận chuyển</a>
                    </li>
                    <li class="pb-2">
                      <a href="<?= $setting->getUrl('chinh-sach-thanh-toan') ?>">Chính sách thanh toán</a>
                    </li>
                    <li class="menu-item pb-2">
                    <a href="<?= $setting->getUrl('yeu-cau-bao-hanh') ?>">Yêu cầu bảo hành</a>
                  </li>
                  </ul>
                </div>
              </div>
            </div>
            
             <div class="col-lg-2 col-sm-6 pb-3">
              <div class="footer-menu">
                <h5 class="widget-title pb-2 text-uppercase">Liên kết</h5>
                <ul class="menu-list list-unstyled mt-4">
                  <li class="menu-item pb-2">
                    <a href="#">Trang chủ</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="#">Trang chủ Nguyễn Trình</a>
                  </li>
                  <li class="menu-item pb-2">
                    <a href="<?= Yii::getAlias('@web') ?>/admin">Đăng nhập</a>
                  </li>
                  
                </ul>
              </div>
            </div>
            
            
           
            
          </div>
        </div>
        
        <div class="row mt-5">
        	<div class="copyright text-center">
                <p>© Copyright 2023 DNTN Nguyễn Trình. All rights reserved.
                </p>
            </div>
        </div>
        
      </div>
    </footer>
    
    
    <a class="fixedButton" href="tel:<?= $setting->site_hotline ?>">
         <div class="roundedFixedBtn">
         	<img src="<?= Yii::getAlias('@web/img/call.gif?v=3') ?>" height="40px" /> 
         	<?= $setting->showHotline() ?>
         </div>
    </a>
    

    <script src="<?= Yii::getAlias('@web')  ?>/js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web')  ?>/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web')  ?>/js/plugins.js"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web')  ?>/js/script.js?v=13"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web')  ?>/js/custom.js?v=10"></script>
  </body>
</html>