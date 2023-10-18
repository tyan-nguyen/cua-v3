<?php
use app\modules\admin\models\NewsQuery;
use app\modules\admin\models\Catelogies;
?>
 <ul id="navbar" class="navbar-nav text-uppercase justify-content-center align-items-center flex-grow-1 pe-3">
                <li class="nav-item dropdown">
                  <a class="nav-link me-4 active dropdown-toggle" href="#billboard" id="dropdownPages" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Trang chủ</a><ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownPages">
                    <li>
                      <a href="<?= Yii::getAlias('@web/') ?>" class="dropdown-item item-anchor">Trang chủ</a>
                    </li>
                    <li>
                      <a href="http://nguyentrinhtravinh.com.vn" class="dropdown-item item-anchor">Trang chủ Nguyễn Trình</a>
                    </li>
                  </ul>
                </li>
               <!--  <li class="nav-item">
                  <a class="nav-link me-4" href="#about-us">Về chúng tôi</a>
                </li> -->
                
                <li class="nav-item dropdown me-4">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownPages" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Hệ cửa</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownPages">
                    <li class="has-menu-sub2">
                    	<!-- <div style="width:200px;">
                    		<div style="width:50%;float:left;">fdsafasf 1
                    			fsdfdsaf <br/>
                    			fdsfsaf
                    		</div>
                    		<div style="width:50%;float:left">fdsafasf 2
                    			đầ<br/>
                    			fdsfsaf<br/>
                    		</div>
                    	</div> -->
                    	
                    	
                    		<?php 
                    		$catalogLists = Catelogies::find()->where('pid IS NULL OR pid = 0')->andFilterWhere([
                    		    'type' => 'PRODUCT',
                    		])->all();
                    		
                    		foreach ($catalogLists as $cat){
                    		?>
                    		<ul class="list-unstyled menu-sub2" aria-labelledby="dropdownPages">
                    		<li><?= $cat->name ?></li>
                    		<?php 
                    		$catalogChildLists = Catelogies::find()->andFilterWhere([
                    		    'pid' => $cat->id,
                    		    'type' => 'PRODUCT',
                    		])->all();
                    		
                    		foreach ($catalogChildLists as $catChild):
                    		?>
                    		 <li>
                              <a href="<?= Yii::getAlias('@web/product-cat/'.$catChild->slug) ?>" class="dropdown-item item-anchor"><?= $catChild->name ?></a>
                            </li>
                    		<?php 
                    		endforeach;
                    		?>
                    		</ul>
                    		<?php 
                    		}
                    		?>

                    	
                    	
                    		<!-- <li>Hệ cửa nhôm</li>
                            <li>
                              <a href="<?= Yii::getAlias('@web/site/productss?id=1') ?>" class="dropdown-item item-anchor">Cửa đi</a>
                            </li>
                            <li>
                              <a href="<?= Yii::getAlias('@web/site/productss?id=2') ?>" class="dropdown-item item-anchor">Cửa sổ</a>
                            </li> 
                          </ul>-->
                          
                          <!-- <ul class="list-unstyled  menu-sub2" aria-labelledby="dropdownPages">
                          	<li>Hệ cửa thép vân gỗ</li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa đi</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa sổ</a>
                            </li>
                            
                          </ul>
                          
                          <ul class="list-unstyled  menu-sub2" aria-labelledby="dropdownPages">
                          	<li>Hệ cửa nhựa</li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa đi</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa sổ</a>
                            </li>
                            
                          </ul>-->
                          
                    	
                    	<!-- <ul class="list-unstyled menu-sub2" aria-labelledby="dropdownPages">
                    		<li>Hệ cửa đi</li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa nhôm</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa thép vân gỗ</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa nhựa</a>
                            </li>
                          </ul>
                          
                          <ul class="list-unstyled  menu-sub2" aria-labelledby="dropdownPages">
                          	<li>Hệ cửa sổ</li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa nhôm</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa thép vân gỗ</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item item-anchor">Cửa nhựa</a>
                            </li>
                          </ul> -->
                    	
                    </li>
                  </ul>
                </li>
                
                <!-- <li class="nav-item dropdown me-4">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownPages" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Hệ cửa đi</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownPages">
                    <li>
                      <a href="#" class="dropdown-item item-anchor">Cửa đi một cánh</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown-item item-anchor">Cửa đi hai cánh</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown-item item-anchor">Cửa đi bốn cánh</a>
                    </li>
                  </ul>
                </li>
                
                <li class="nav-item dropdown me-4">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownPages" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Hệ cửa sổ</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownPages">
                    <li>
                      <a href="#" class="dropdown-item item-anchor">Cửa sổ một cánh</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown-item item-anchor">Cửa sổ hai cánh</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown-item item-anchor">Cửa sổ ba cánh</a>
                    </li>
                  </ul>
                </li> -->
                
                <li class="nav-item">
                  <a class="nav-link me-4" href="<?= Yii::getAlias('@web/page/catalogue-cua-nhom-nguyen-trinh') ?>">Catalogue</a>
                </li>
                
                
                <li class="nav-item">
                  <a class="nav-link me-4" href="<?= Yii::getAlias('@web/blog') ?>">Blogs</a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownPages" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Báo giá</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownPages">
                  <?php 
                  $listBaoGia = NewsQuery::getLastNewsByCat('bao-gia');
                  foreach ($listBaoGia as $blog):
                  ?>
                  <li>
                      <a href="<?= $blog->url ?>" class="dropdown-item item-anchor"><?= $blog->title ?></a>
                    </li>
                  <?php endforeach;?>
                    
                  </ul>
                </li>
                
                 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownPages" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Đại lý</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownPages">
                    <?php 
                      $listDaiLy = NewsQuery::getLastNewsByCat('dai-ly');
                      foreach ($listDaiLy as $blog):
                      ?>
                      <li>
                          <a href="<?= $blog->url ?>" class="dropdown-item item-anchor"><?= $blog->title ?></a>
                        </li>
                      <?php endforeach;?>
                  </ul>
                </li>
                
                <!--  <li class="nav-item">
                  <a class="nav-link me-4" href="#">Liên hệ</a>
                </li> -->
                
                <li class="nav-item">
                  <div class="user-items ps-5">
                    <ul class="d-flex justify-content-end list-unstyled">
                      <li class="search-item pe-3" data-bs-toggle="collapse" data-bs-target="#search-box" aria-controls="search-box" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <svg class="search" width="18" height="18">
                          <use xlink:href="#search"></use>
                        </svg> -->
                        
                        <i class="fa-solid fa-magnifying-glass"></i>
                        
                      </li>
                      <!-- <li class="pe-3">
                        <a href="#">
                          <svg class="user" width="18" height="18">
                            <use xlink:href="#user"></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg class="cart" width="18" height="18">
                            <use xlink:href="#cart"></use>
                          </svg>
                        </a>
                      </li> -->
                    </ul>
                  </div>
                </li>
              </ul>