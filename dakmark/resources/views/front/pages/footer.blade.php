            <!-- Newsletter Section -->
            <section class="small-section bg-dark-lighter">
                <div class="container relative">
                    
                    <form class="form align-center" id="mailchimp">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="newsletter-label font-alt">
                                    Stay informed with our newsletter
                                </div>
                                
                                <div class="mb-20">
                                    <input placeholder="Enter Your Email" class="newsletter-field form-control input-md round mb-xs-10" type="email" pattern=".{5,100}" required/>
                                    
                                    <button type="submit" class="btn btn-mod btn-w btn-medium btn-round mb-xs-10">
                                        Subscribe
                                    </button>
                                </div>
                                
                                <div class="form-tip">
                                    <i class="fa fa-info-circle"></i> Please trust us, we will never send you spam
                                </div>
                                
                                <div id="subscribe-result"></div>
                                
                            </div>
                        </div>
                    </form>
                    
                </div>
            </section>
            <!-- End Newsletter Section -->
            
            
            <!-- Foter -->
            <footer class="small-section bg-gray-lighter footer pb-60">
                <div class="container">
                    
                    <!-- Footer Widgets -->
                    <div class="row align-left">
                        
                        <!-- Widget -->
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">@lang('header.about-us')</h5>
                                
                                <div class="widget-body">
                                    <div class="widget-text clearfix">
                                        
                                        <p>
                                            Công ty TNHH MTV Cà phê Nguyên Huy Hùng được thành lập vào năm 2005. Chúng tôi đã có 10 năm kinh nghiệm sản xuất, cung ứng và xuất khẩu cà phê.
                                            Cho tới năm 2013, chúng tôi đã xuất khẩu cà phê tới châu Âu, Mỹ và một số nước khác. 
                                            Tổng sản lượng xuất khẩu là hơn 30.000 tấn.
                                        </p>
                                        
                                        <address>
                                            <span class="fa-stack fa-lg">
                                              <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
                                              <i class="fa fa-phone-square fa-stack-1x" aria-hidden="true"></i>
                                            </span>
                                            024 6253 1666<br>                             

                                            <span class="fa-stack fa-lg">
                                              <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
                                              <i class="fa fa-mobile-phone fa-stack-1x" aria-hidden="true"></i>
                                            </span>                            
                                            0916 322 822<br>

                                            <span class="fa-stack fa-lg">
                                              <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
                                              <i class="fa glyphicon glyphicon-envelope fa-stack-1x" aria-hidden="true"></i>
                                            </span>                              
                                            dakmark@dakmark.com.vn
                                        </address>

                                        
                                    </div>
                                </div>
                                
                            </div>                            
                        </div>
                        <!-- End Widget -->
                        
                        <!-- Widget -->
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">@lang('footer.customer-support')</h5>
                                
                                <div class="widget-body">
                                    <ul class="clearlist widget-menu">
                                        <li>
                                            <a href="{{ url('/purchase-flow') }}">@lang('footer.purchase-flow') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/returns') }}">@lang('footer.returns') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/faq') }}">@lang('footer.faq') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/returns') }}">@lang('footer.showroom-locations') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>                          
                        </div>
                        <!-- End Widget -->
                        
                        <!-- Widget -->
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">@lang('footer.my-account')</h5>
                                
                                <div class="widget-body">
                                    <ul class="clearlist widget-menu">
                                        <li>
                                            <a href="{{ url('/login') }}">@lang('footer.sign-in') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/cart') }}">@lang('footer.view-cart') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/wishlist') }}">@lang('footer.my-wishlist') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/orders') }}">@lang('footer.order-history') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>                          
                        </div>
                        <!-- End Widget -->
                        
                        <!-- Widget -->
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">@lang('footer.follow-us')</h5>
                                
                                <div class="widget-body">
                                    <div class="widget-text clearfix">
                                        
                                        <!-- Social Links -->
                                        <div class="footer-social-links">
                                            <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
                                            <a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
                                            <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        <!-- End Social Links -->
                                    
                                    </div>
                                </div>
                                
                            </div>                            
                        </div>
                        <!-- End Widget -->
                        
                    </div>
                    <!-- End Footer Widgets -->
                    
                    <!-- Divider -->
                    <hr class="mt-0 mb-60 mb-xs-40"/>
                    <!-- End Divider -->
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="http://themeforest.net/user/theme-guru/portfolio" target="_blank">&copy; Rhythm 2016</a>.
                        </div>
                        <!-- End Copyright -->
                        
                        <div class="footer-made">
                            Made with love for great people.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            <!-- End Foter -->