<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-ribbon">
                <span>Kết nối với chúng tôi</span>
            </div>
            
            <div class="col-md-3">
                <h4>Tài khoản</h4>
                <ul class="links">
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="{{ url('/about')}}">Về chúng tôi</a>
                    </li>                 
                    @guest
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="{{ url('/login') }}">Đăng nhập</a>
                    </li>
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="{{ url('/register') }}">Đăng kí</a>
                    </li>

                    @else
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="{{ url('/Account') }}">Tài khoản</a>
                    </li>
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="{{ url('/Account/Orders') }}">Lịch sử mua hàng</a>
                    </li>
                    @endguest
                </ul>
            </div>
            <div class="col-md-3">
                <div class="contact-details">
                    <h4>Thông tin liên hệ</h4>
                    <ul class="contact">
                        <li><p><i class="fa fa-map-marker"></i> <strong>Địa chỉ:</strong><br> 1234 Street Name, City, US</p></li>
                        <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong><br> (123) 456-7890</p></li>
                        <li><p><i class="fa fa-envelope-o"></i> <strong>Email:</strong><br> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
                        <li><p><i class="fa fa-clock-o"></i> <strong>Thời gian làm việc:</strong><br> T.Hai - C.Nhật / 9:00AM - 8:00PM</p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Vì sao chọn shop ML</h4>
                <ul class="features">
                    <li>
                        <i class="fa fa-check text-color-primary"></i>
                        <a href="#">Nguồn gốc hàng rõ ràng</a>
                    </li>
                    <li>
                        <i class="fa fa-check text-color-primary"></i>
                        <a href="#">Giá cạnh tranh nhất thị trường</a>
                    </li>
                    <li>
                        <i class="fa fa-check text-color-primary"></i>
                        <a href="#">Chia sẻ kinh nghiệm sử dụng</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="newsletter">
                    <h4>Hãy là người đầu tiên</h4>
                    <p class="newsletter-info">Nhận thông tin về Sự kiện,<br> Sales và Ưu tiên. Đăng ký nhận thông tin ngay hôm nay.</p>

                    <div class="alert alert-success hidden" id="newsletterSuccess">
                        <strong>Thành công!</strong> Bạn đã được thêm vào danh sách nhận mail.
                    </div>

                    <div class="alert alert-danger hidden" id="newsletterError"></div>


                    <p>Nhập thông tin email của bạn:</p>
                    <form id="newsletterForm" action="{{asset('frontend/php/newsletter-subscribe.php')}}" method="POST">
                        <div class="input-group">
                            <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Gửi yêu cầu</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <a href="index.html" class="logo">
                <img alt="Porto Website Template" class="img-responsive" src="{{asset('frontend/img/demos/shop/logo-footer.png')}}">
            </a>
            <ul class="social-icons">
                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
            <p class="copyright-text">© Copyright 2018. All Rights Reserved.</p>
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