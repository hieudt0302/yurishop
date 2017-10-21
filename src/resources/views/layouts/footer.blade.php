<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="sub-heading">
                    <h1>@lang('footer.newsletter-message')</h1>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="form">
                    <input class="email" type="text" name="email" placeholder="{{ __('profile.email') }}">
                    <div class="subscribe-mes">@lang('footer.subscribe-success')</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="sub-button">
                    <a class="subscribe1" href="javascript:void(0);">@lang('footer.subscribe')</a>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="ht-footer">
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="ft-contact">
                <div class="ft-heading">
                    <h6>@lang('footer.about-us')</h6>
                </div>
                <ul class="ct-it">
                    <li>
                        <i class="ion-ios-home"></i>
                        <a href="#">@lang('common.headquarter-address')</a>
                    </li>
                    <li>
                        <i class="ion-ios-telephone"></i>
                        <a href="#">024 6253 1666</a>
                    </li>
                    <li>
                        <i class="ion-ios-email"></i>
                        <a href="#">pokofarms@pokofarms.com.vn</a>
                    </li>
                    <li>
                        <i class="ion-android-globe"></i>
                        <a href="#">pokofarms.com.vn</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="ft-infor">
                <div class="ft-heading">
                    <h6>@lang('footer.customer-support')</h6>
                </div>
                <ul class="infor-it">
                    <li>
                        <a href="{{ url('/purchase-flow') }}">@lang('footer.purchase-flow')</a>
                    </li>
                    <li>
                        <a href="{{ url('/returns') }}">@lang('footer.returns')</a>
                    </li>
                    <li>
                        <a href="{{ url('/faqs') }}">@lang('footer.faq')</a>
                    </li>
                    <li>
                        <a href="{{ url('/showrooms') }}">@lang('footer.showroom-locations')</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="ft-account">
                <div class="ft-heading">
                    <h6>@lang('footer.my-account')</h6>
                </div>

                @if (Auth::guest())
                <ul class="acc-it">
                    <li>
                        <a href="{{ url('/login') }}">@lang('footer.sign-in')</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">@lang('auth.register')</i></a>
                    </li>
                </ul>
                @else                                    
                <ul class="acc-it">
                    <li>
                        <a href="{{ url('/logout') }}">@lang('auth.logout')</i></a>
                    </li>
                    <li>
                        <a href="{{ url('/cart') }}">@lang('footer.view-cart')</i></a>
                    </li>
                    <li>
                        <a href="{{ url('/wishlist') }}">@lang('footer.my-wishlist')</i></a>
                    </li>
                    <li>
                        <a href="{{ url('/Account/Orders') }}">@lang('footer.order-history')</i></a>
                    </li>
                </ul>
                @endif                
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="ft-contact">
                <div class="ft-heading">
                    <h6>@lang('footer.follow-us')</h6>
                </div>
                <div class="ct-icon">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Youtube"></i></a>
                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vimeo"></i></a>
                </div>
            </div>
        </div>                
    </div>
</div>
</footer>

<script type="text/javascript">
    $('a.subscribe1').click(function() {  
        $.ajax({
            type: "POST",
            url: "{{url('/subscribe')}}" ,
            data: {
                "email": $("input[name='email']").val(),
            },
            success: function(res){
                $(".subscribe-mes").show();
            },
            error:function(res){
                console.log("xay ra loi" + JSON.stringify(res));  
            }
        });            
    });
</script>