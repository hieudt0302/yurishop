

@extends('layouts.master')
@section('title','Đặt hàng')
@section('content')
<div>
    <a href="{{ url('/test') }}">Test</a>
</div>
<div class="order-info-address">
    <div class="address">
        <span>Địa chỉ nhận hàng: </span>Thang Le Duc, SĐT: 0935334983, 
         ----       
        <a class="edit-info-address" href="javascript:;" data-reveal-id="edit-info-address" id="edit-order-address">Sửa địa chỉ nhận hàng</a>
    </div>
</div>
<div class="order-float-bar-block" id="order-bar">
    <div class="tab-btn block-get-info" data-tab="tab-product-info">
        <input type="text" class="input-link" id="product-link">
        <a class="remove-link-input" href="javascript:;"><i class="fa fa-times-circle"></i></a>
        <a id="get-product-info" class="btn-get-info">Lấy thông tin sản phẩm</a>
        <input type="hidden" id="link-hidden" value="">
    </div>
</div>  

<div id="loading" style="display: none">
    <img src="{{url('/')}}/public/assets/img/loading.gif" alt="Loading..." />
</div>

<div class="row" id="product-info" style="display: none;">
    <div class="col-md-4 product-img">
        <img class="img-resposive" src="{{url('/')}}/public/assets/img/sp-test.jpg" alt="Hình sản phẩm" />
    </div>
    <div class="col-md-8">
        <span class="product-name"></span>
        <div class="shop-box">
            <div class="col-md-2 detail-label">Cửa hàng</div>
            <div class="col-md-10 shop-name"></div>
        </div>    
        <div class="price-box">
            <div class="col-md-2 detail-label">Giá sản phẩm</div>
            <div class="col-md-10">
                <span class="cur-price"></span>
                <span class="org-price"></span>
            </div>
        </div>
        <div class="color-box">
            <div class="col-md-2 detail-label">Màu sắc</div>
            <div class="col-md-10">
                <span class="color"></span>
            </div>
        </div>
        <div class="size-box">
            <div class="col-md-2 detail-label">Kích cỡ</div>
            <div class="col-md-10">
                <span class="size"></span>
            </div>
        </div>
        <div class="pay-box">
            <div>
                <span class="pay-label">Số sản phẩm đã chọn</span>
                <span class="total-quantity">3</span>
            </div>
            <div>
                <span class="pay-label">Số tiền phải thanh toán</span>
                <span class="total-amount">360.00 tệ</span>
            </div>
        </div>
        <div>
            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
<div id="product-des" class="col-md-12">
    <h3>CHI TIẾT SẢN PHẨM</h3>
</div>
<div id="null-shop" class="null-shop">
    Chưa có sản phẩm nào trong đơn hàng
</div>
<script>
    $(document).ready(function(){
        $("#get-product-info").click(function() {
            $("#loading").show();
            $("#null-shop").hide();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{url('/get-product-info')}}" ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    product_url: $("#product-link").val()
                },
                success: function(res){
                    $("#loading").hide();
                    //alert("ghkjhklhjl");
                    $("#product-info").show();
                    
                    $(".product-img").html("<img class='img-resposive' src='"+res.image+"' alt='Hình sản phẩm' />");
                    $(".product-name").html(res.name);
                    $(".shop-name").html(res.shop_name);

                    

                    if(res.page.localeCompare('1688') != 0){  // if page is taobao.com, tmall.com
                        $(".cur-price").html(res.current_price + " Tệ");
                        if(res.origin_price)  // if has origin price
                            $(".org-price").html(res.origin_price + " Tệ");
                    }
                    else{  // if page is 1688.com
                        $("#price").html("<table>"
                                          +"<tr>"
                                            +"<td>Giá</td>"
                                        );
                        for(var i=0; i<res.current_price.length; i++){
                            $("#price").append("<td>"+res.current_price[i]+"</td>");
                        }
                        $("#price").append("</tr>");
                        if(res.origin_price){
                            $("#price").append("<tr>"
                                                +"<td></td>");
                            for(var j=0; j<res.origin_price.length; j++){
                                $("#price").append("<td>"+res.origin_price[j]+"</td>");
                            }
                            $("#price").append("</tr>");
                        }
                        if(res.amount){
                            $("#price").append("<tr>"
                                                +"<td>Số lượng mua</td>");
                            for(var k=0; k<res.amount.length; k++){
                                $("#price").append("<td>"+amount[k]+"</td>");
                            }
                            $("#price").append("</tr>");
                        }
                        $("#price").append("</table>");
                    }

                    if(res.color){
                        for(var k=0; k<res.color.length; k++){
                             $(".color").append("<img class='color-img' src='"+res.color[k]['colorImg']+"' alt='"+res.color[k]['colorName']+"' />");
                        }
                    }

                    if(res.size){
                        for(var l=0; l<res.size.length; l++){
                             $(".size").append("<div class='size-"+l+"'>"
                                                + "<span class='size-name'>"+res.size[l]['sizeName'] +"</span>"
                                                + "<span class='size-price'>999 Tệ</span>"
                                                + "<span class='size-quantity'>Còn 1000</span>"
                                                + "<span>"
                                                  + "<button type='button' class='btn btn-default btn-number' data-type='minus'" 
                                                            +"data-field='size_"+l+"' disabled>"
                                                    + "<span class='glyphicon glyphicon-minus'></span>"
                                                  + "</button>"
                                                  + "<input type='text' class='form-control input-number' name='size_"+l+"' value='0' min='0'>"
                                                  + "<button type='button' class='btn btn-default btn-number' data-type='plus'"
                                                            +"data-field='size_"+l+"'>"
                                                    + "<span class='glyphicon glyphicon-plus'></span>"
                                                  + "</button>"
                                                + "</span>"
                                               + "</div>");
                        }
                        
                    }
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " - " + thrownError);
                }
            });

        });
        $('.btn-number').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if(!isNaN(currentVal)) {
                if(type == 'minus') {           
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }
                }
                else if(type == 'plus') {
                    input.val(currentVal + 1).change();
                }
            } 
            else {
                input.val(0);
            }
        });
        $('.input-number').change(function() {   
            minValue =  parseInt($(this).attr('min'));
            valueCurrent = parseInt($(this).val());
            name = $(this).attr('name');
            if(valueCurrent > minValue) {
                $(".btn-number[data-field='"+name+"']").removeAttr('disabled')
            } 
        });
    });
</script>   
@endsection
