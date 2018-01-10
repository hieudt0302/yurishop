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
                        <a href="javascript:void(0)">{{ Setting::config('address') }}</a>
                    </li>
                    <li>
                        <i class="ion-ios-telephone"></i>
                        <a href="javascript:void(0)">{{ Setting::config('phone') }}</a>
                    </li>
                    <li>
                        <i class="ion-ios-email"></i>
                        <a href="mailto:{{ Setting::config('email') }}">{{ Setting::config('email') }}</a>
                    </li>
                    <li>
                        <i class="ion-android-globe"></i>
                        <a href="{{ Setting::config('website')}}" target="blank">{{ Setting::config('website') }}</a>
                    </li>
                </ul>
                <div class="ct-icon">
                    <a target="_blank" href="http://www.facebbook.com/{{ Setting::config('facebook') }}"><i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                    <a target="_blank" href="http://www.twitter.com/{{ Setting::config('twitter') }}"><i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                    <a target="_blank" href="skype:{{ Setting::config('skype')}}?chat"><i class="fa fa-skype" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Skype"></i></a>
                    <a target="_blank" href="http://www.youtube.com/{{ Setting::config('youtube') }}"><i class="fa fa-youtube-play" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Youtube"></i></a>
                </div>                
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
            <div class="ft-photo">
                <div class="ft-heading">
                    <h6>@lang('common.our-gallery')</h6>
                </div>
                <div class="photo-it">
                    @foreach($latestMediaOfGallery as $m)                    
                        <div class="img-ft">
                            <a href="/galleries"><img class="img-ft" src="{{asset('/storage')}}/{{$m->source}}" alt=""></a>
                        </div>
                    @endforeach
                </div>
                <ul class="infor-it">
                    <li>
                        <a href="{{ url('/galleries') }}">@lang('common.see-more')</a>
                    </li>
                </ul>                
            </div>
            <div class="langchoose btn-group dropup">
                <button type="button" class="btn btn-default"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ strtoupper(app()->getLocale()) }}</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ strtoupper(app()->getLocale()) }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li>
                        <a href="{{URL::asset('')}}language/vi">Tiếng Việt</a>
                    </li>
                    <li>
                        <a href="{{URL::asset('')}}language/en">English</a>
                    </li>
                    <li>
                        <a href="{{URL::asset('')}}language/cn">中文</a>
                    </li>
                    <li>
                        <a href="{{URL::asset('')}}language/jp">日本語</a>
                    </li>
                    <li>
                        <a href="{{URL::asset('')}}language/kr">한국어</a>
                    </li>
                </ul>
            </div>

        </div>                
        <img class="ft-line" src="frontend/images/uploads/div-line.png" alt="line">   
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="ft-below-left">
                <p>Copyright © 2018 <a href="#">Pokofarms</a> - All Rights Reserved</p>
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
                "email": $("input[name='subscribe_email']").val(),
            },
            success: function(res){
                if(res.success){
                    $(".subscribe-success").show();
                    $(".subscribe-failed").hide();
                }
                else{
                    $(".subscribe-success").hide();
                    $(".subscribe-failed").show();
                }
                
            },
            error:function(res){
                console.log("Error!");  
            }
        });            
    });
</script>