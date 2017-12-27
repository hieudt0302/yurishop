<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="sub-heading">
                    <h1 style="color: #fff">@lang('footer.newsletter-message')</h1>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="form">
                    <input class="email" type="text" name="subscribe_email" placeholder="{{ __('profile.email') }}">
                    <div class="subscribe-success">@lang('footer.subscribe-success')</div>
                    <div class="subscribe-failed">@lang('footer.subscribe-failed')</div>
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