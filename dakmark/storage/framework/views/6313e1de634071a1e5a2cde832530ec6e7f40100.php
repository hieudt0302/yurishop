     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="col-md-6">
                <div class='row'>
                <h4><?php echo app('translator')->getFromJson('header.about-us'); ?></h4>                        
                <p>Công ty TNHH MTV Cà phê Nguyên Huy Hùng được thành lập vào năm 2005. Chúng tôi đã có 10 năm kinh nghiệm sản xuất, cung ứng và xuất khẩu cà phê. Năm 2009, chúng tôi đã đạt chứng nhận Fairtrade (FLO ID: 21968) và là một trong hai nhà xuất khẩu được chứng nhận Fairtrade đầu tiên ở Việt Nam – quốc gia đứng thứ hai thế giới về sản lượng cà phê.
Cho tới năm 2013, chúng tôi đã xuất khẩu cà phê tới châu Âu (Bỉ, Thụy Sĩ, Pháp, Tây Ban Nha), Mỹ và một số nước khác. Tổng sản lượng xuất khẩu là hơn 30.000 tấn.</p>                
                </div>
                <br><br>
                <div class='row'>                
                    <h4><?php echo app('translator')->getFromJson('header.contact'); ?></h4>                
                    <ul>                
                        <li> 
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true" style='color:white;'></i>
                              <i class="fa fa-phone-square fa-stack-1x" aria-hidden="true" style='color:white;'></i>
                            </span>
                            <span>024 6253 1666</span>                             
                        </li>
                        <li>
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true" style='color:white;'></i>
                              <i class="fa fa-mobile-phone fa-stack-1x" aria-hidden="true" style='color:white;'></i>
                            </span>                            
                            0916 322 822
                        </li>
                        <li>
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true" style='color:white;'></i>
                              <i class="fa glyphicon glyphicon-envelope fa-stack-1x" aria-hidden="true" style='color:white;'></i>
                            </span>                              
                            dakmark@dakmark.com.vn
                        </li>  
                    </ul>
                </div>
                <br><br>
                <div id="contact-box" class="row">
                    <div><h4><?php echo app('translator')->getFromJson('footer.follow-us'); ?></h4></div>
                    <div class="social-link">
                        <a href="#">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true" style='color:white;'></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter-square fa-2x" aria-hidden="true" style='color:white;'></i>  
                        </a>
                        <a href="#">
                            <i class="fa fa-google-plus-square fa-2x" aria-hidden="true" style='color:white;'></i>
                        </a>                                                
                    </div>                    
                </div>                                                 
            </div><!-- /#introduce-box -->
            <div id="navigate-box" class="col-md-6"> 
                    <div class="col-md-6">
                        <div class="introduce-title"><?php echo app('translator')->getFromJson('footer.customer-support'); ?></div>
                        <ul id = "customer-support">
                            <li><a class="footer-link" href="<?php echo e(url('/qa')); ?>"><?php echo app('translator')->getFromJson('footer.qa'); ?></a></li>
                            <li><a class="footer-link" href="<?php echo e(url('/purchase-flow')); ?>"><?php echo app('translator')->getFromJson('footer.purchase-flow'); ?></a></li>
                            <li><a class="footer-link" href="<?php echo e(url('/returns')); ?>"><?php echo app('translator')->getFromJson('footer.returns'); ?></a></li>
                        </ul>
                    </div>                        
                    <div class="col-md-6">
                        <div class="my-account"><?php echo app('translator')->getFromJson('footer.my-account'); ?></div>
                        <ul id="introduce-company">
                            <li><a class="footer-link" href="<?php echo e(url('/login')); ?>"><?php echo app('translator')->getFromJson('footer.sign-in'); ?></a></li>
                            <li><a class="footer-link" href="<?php echo e(url('/cart')); ?>"><?php echo app('translator')->getFromJson('footer.view-cart'); ?></a></li>
                            <li><a class="footer-link" href="<?php echo e(url('/wishlist')); ?>"><?php echo app('translator')->getFromJson('footer.my-wishlist'); ?></a></li>
                            <li><a class="footer-link" href="<?php echo e(url('/orders')); ?>"><?php echo app('translator')->getFromJson('footer.order-history'); ?></a></li>
                        </ul>
                    </div>                                  
            </div><!-- /#navigate-box -->                                            
        </div> 
