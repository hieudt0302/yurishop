            
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
                                        
                                            <b>Công ty TNHH Dakmark Foods.</b><br>
                                            Tầng 1, tòa nhà Vinaconex D, đường số 1, Trần Thái Tông, Cầu Giấy, Hà Nội.<br><br>
                                        
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
                                            <a href="{{ url('/faqs') }}">@lang('footer.faqs') <i class="fa fa-angle-right right"></i></a>
                                        </li>                                        
                                        <li>
                                            <a href="{{ url('/purchase-flow') }}">@lang('footer.purchase-flow') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/returns') }}">@lang('footer.returns') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/faqs') }}">@lang('footer.faq') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/showrooms') }}">@lang('footer.showroom-locations') <i class="fa fa-angle-right right"></i></a>
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
                                    @if (Auth::guest())
                                    <ul class="clearlist widget-menu">
                                        <li>
                                            <a href="{{ url('/login') }}">@lang('footer.sign-in') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/register') }}">@lang('auth.register') <i class="fa fa-angle-right right"></i></a>
                                        </li>
                                    </ul>
                                    @else                                    
                                    <ul class="clearlist widget-menu">
                                        <li>
                                            <a href="{{ url('/logout') }}">@lang('auth.logout') <i class="fa fa-angle-right right"></i></a>
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
                                    @endif
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
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            <!-- End Foter -->