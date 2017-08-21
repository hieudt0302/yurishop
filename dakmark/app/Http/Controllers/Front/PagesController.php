<?php

namespace App\Http\Controllers\Front;

header('Content-Type: text/html; charset=utf-8');
include 'public/assets/simple_html_dom/simple_html_dom.php';

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home(){
        return view('front.pages.home');
    }
    public function validInput(Request $request){
    	$this->validate($request,['product_url'=>'required']);
    }
    public function order_list(){
        return view('front/pages/order_list');
    }
    public function product_info(Request $request){
    	$start_time = microtime(TRUE);

    	$this->validate($request,['product_url'=>'required'],['required' => 'Hãy nhập link sản phẩm']);
    	$url = $request->input('product_url');
        $product_url = escapeshellarg($url);
		$response =  exec("phantomjs public/assets/js/main.js ".$product_url." > public/assets/simple_html_dom/page_content.txt");
		//$str_file = file_get_contents("public/assets/simple_html_dom/page_content.txt");
		$html = file_get_html("public/assets/simple_html_dom/page_content.txt");
		
		
		// Khởi tạo các thuộc tính sản phẩm
		$state = 0;   // Website có lấy được thông tin sản phẩm từ js hay không (Nếu state = 0 -> không lấy được)
		$name = '';
		$image = '';
		$origin_price = 0;
		$current_price = 0;
		$amount = array();  // số lượng sp cần mua (chỉ có trong 1688.com)
		$arraySize = array();
		$arrayColor = array();
		$skuMap = array();  // Mảng kết hợp : size + color + price + quantity
		$description = array();
		$shop_name = '';

		if(strpos($product_url,'.taobao.com')){  // nếu sp thuộc trang taobao.com
			$page = 'taobao';
			if($html->find("span[itemprop='name']"))
				$name =  $html->find("span[itemprop='name']",0)->plaintext;

			if($html->find('#J_ThumbView'))
				$image = $html->find('#J_ThumbView',0)->src;

			if($html->find("#J_PromoWrap")){
				if($html->find("#J_PromoWrap",0)->find("#J_PromoPrice")){
					if($html->find("#J_PromoWrap",0)->find("#J_PromoPrice",0)->find(".tb-rmb-num"))
						$current_price = $html->find("#J_PromoWrap",0)->find("#J_PromoPrice",0)->find(".tb-rmb-num",0)->plaintext;
						//$current_price = '1 trieu';
				}
				if($html->find("#J_PromoWrap",0)->find("#J_PromoPrice")){
					if($html->find("#J_PromoWrap",0)->find("#J_priceStd",0)->find(".tb-rmb-num"))
						$origin_price = $html->find("#J_PromoWrap",0)->find("#J_priceStd",0)->find(".tb-rmb-num",0)->plaintext;
				}
				
				if(!$current_price){
					$current_price = $origin_price;
					$origin_price = '';
				}
				
			}

			$colors = '';
			$sizes = '';
			if($html->find('#J_SKU')){ 
				$sku_box = $html->find('#J_SKU',0);
				if($sku_box->find('dl')){
					$sizes = $sku_box->find('dl',0);
					$colors = $sku_box->find('dl',1);
				}
			}

			if($colors){
				foreach($colors->find('li') as $c) {
					$data_pv = 'data-pv';
					$colorId = $c->$data_pv;
					$colorName = $c->plaintext;
					$colorImg = '';
					// Lấy background nếu có
					if($c->find('a',0)->style){
						$bg = $c->find('a',0)->style;
						$start = strpos($bg,'(');
						$end = strpos($bg,')');
						$img_url = substr($bg, $start+1, $end-1-$start);  // Chú ý : sau "$bg,"" phải có khoảng trống
						$colorImg = $img_url;
					}
					$arrayColor[] = array('colorName' => $colorName, 'colorImg' => $colorImg, 'colorId' => $colorId);
				}
			}

			if($sizes){
				foreach ($sizes->find('li') as $s) {  
					$data_pv = 'data-pv';
					$arraySize[] = array('sizeName' => $s->plaintext , 'sizeId' => $s->$data_pv);
				}
			}

			$start_pos = strpos($html, 'skuMap');  // lấy skuMap trong chuỗi string json
			if($start_pos != false){
				$state = 1;
				$sub_str = substr($html,$start_pos + 7);  // lấy chuỗi string bắt đầu từ phần tử json đầu tiên
				$end_pos = strpos($sub_str,'}}');    // lấy vị trí kết thúc mảng json
				$str_json = trim(substr($sub_str, 0, $end_pos+2));   // chuỗi string của mảng json
				$skuMap = json_decode($str_json,true);  // chuyển string thành json
			}

			if(!empty($skuMap)){
				if(!empty($arrayColor) && !empty($arraySize)){  // trường hợp sp có nhiều size và color khác nhau
					// Lấy giá và số lượng sản phẩm mặc định theo kích thước và màu sắc mặc định (màu đầu tiên trong dánh sách)
					$default_color_id = $arrayColor[0]['colorId'];
					foreach ($arraySize as $k => $size) {
						$pvs = ";".$size['sizeId'].";".$default_color_id.";";  // Lấy pvs trong array skuList
						foreach ($skuMap as $key => $value) {
							if($pvs == $key){
								$arraySize[$k]['sizePrice'] = $value['price'];
								$arraySize[$k]['sizeQuantity'] = $value['stock'];
							}
						}
					}
				}
				elseif(!empty($arrayColor)){  // trường hợp sản phẩm có size giống nhau, color khác nhau
					echo "chi co mau sac";
					foreach ($arrayColor as $k => $color) {
						$pvs = ";".$color['colorId'].";";  // Lấy pvs
						foreach($skuMap as $key => $value) {
							if($pvs == $key){
								$arrayColor[$k]['colorPrice'] = $value['price'];
								$arrayColor[$k]['colorQuantity'] = $value['stock'];
							}
						}
					}
				}
				elseif(!empty($arraySize)){  // trường hợp sản phẩm có color giống nhau, size khác nhau
					echo "chi co kich thuoc";
					foreach ($arraySize as $k => $size) {
						$pvs = ";".$size['sizeId'].";";  // Lấy pvs
						foreach ($skuMap as $key => $value) {
							if($pvs == $key){
								$arraySize[$k]['sizePrice'] = $value['price'];
								$arraySize[$k]['sizeQuantity'] = $value['stock'];
							}
						}
					}
				}
			}

			
			if($html->find('.extra-desc-info')){
				$des =  $html->find('.extra-desc-info',0)->find('li');
				if($des){
					foreach ($des as $d) {
						$description[] = $d->plaintext;
					}
				}
			}
			
			if($html->find('.tb-shop-name'))
				$shop_name =  $html->find('.tb-shop-name',0)->plaintext;
		}
		elseif(strpos($product_url,'.tmall.com')){
			$page = 'tmall';

			if($html->find('.tb-detail-hd')){
				if($html->find('.tb-detail-hd',0)->find('h1'))
					$name = $html->find('.tb-detail-hd',0)->find('h1',0)->plaintext;
			}

			if($html->find('#J_ImgBooth'))
				$image = $html->find('#J_ImgBooth',0)->src;

			if($price_box = $html->find('.tm-price')){
				if(count($price_box)==1)
					$current_price = $html->find('.tm-price',0)->plaintext;
				else{
					$origin_price = $html->find('.tm-price',0)->plaintext;
					$current_price = $html->find('.tm-price',1)->plaintext;
				}		
			}

			$colors = '';
			$sizes = '';
			$first = '';  // thứ tự xuất hiện của color và size (cái nào xuất hiện trước)
			if($html->find('.tm-sale-prop')){  // phải đảm bảo rằng chỉ có 2 class "tm-sale-prop"
				if($html->find('.tm-sale-prop',0)->find('.tb-img')){
					$colors = $html->find('.tm-sale-prop',0);
					$sizes = $html->find('.tm-sale-prop',1);
					$first = 'color';
				}	
				else{
					$sizes = $html->find('.tm-sale-prop',0);
					$colors = $html->find('.tm-sale-prop',1);
					$first = 'size';
				}	
			}
			
			if($colors){
				foreach($colors->find('li') as $c) {
					$data_value = 'data-value';
					$colorId = $c->$data_value;
					$colorName = $c->plaintext;
					$colorImg = '';
					// Lấy background nếu có
					if($c->find('a',0)->style){
						$bg = $c->find('a',0)->style;
						$start = strpos($bg,'(');
						$end = strpos($bg,')');
						$img_url = substr($bg, $start+1, $end-1-$start);  // Chú ý : sau "$bg,"" phải có khoảng trống
						$colorImg = $img_url;
					}
					$arrayColor[] = array('colorName' => $colorName, 'colorImg' => $colorImg, 'colorId' => $colorId);
				}
			}

			if($sizes){
				foreach ($sizes->find('li') as $s) {  
					$data_value = 'data-value';
					$arraySize[] = array('sizeName' => $s->plaintext , 'sizeId' => $s->$data_value);
				}
			}

			$start_pos = strpos($html, 'skuMap');  // lấy skuMap từ chuỗi string json
			if($start_pos != false){
				$state = 1;
				$sub_str = substr($html,$start_pos + 8);  // chuỗi string bắt đầu từ phần tử json đầu tiên
				$end_pos = strpos($sub_str,'}}');    // vị trí kết thúc mảng json
				$str_json = trim(substr($sub_str, 0, $end_pos+2));   // chuỗi string của mảng json
				$skuMap = json_decode($str_json,true);  // chuyển string thành json
			}

			if(!empty($skuMap)){
				if(!empty($arrayColor) && !empty($arraySize)){  // trường hợp sp có nhiều size và color khác nhau
					// Lấy giá và số lượng sản phẩm mặc định theo kích thước và màu sắc mặc định (màu đầu tiên trong dánh sách)
					$default_color_id = $arrayColor[0]['colorId'];
					foreach ($arraySize as $k => $size) {
						if($first=="size")
							$pvs = ";".$size['sizeId'].";".$default_color_id.";";  // Lấy pvs trong array skuList
						elseif($first=="color")
							$pvs = ";".$default_color_id.";".$size['sizeId'].";";
						foreach ($skuMap as $key => $value) {
							if($pvs == $key){
								$arraySize[$k]['sizePrice'] = $value['price'];
								$arraySize[$k]['sizeQuantity'] = $value['stock'];
							}
						}
					}
					//var_dump($arraySize); die();
				}
				elseif(!empty($arrayColor)){  // trường hợp sản phẩm có size giống nhau, color khác nhau
					foreach ($arrayColor as $k => $color) {
						$pvs = ";".$color['colorId'].";";  // Lấy pvs
						foreach($skuMap as $key => $value) {
							if($pvs == $key){
								$arrayColor[$k]['colorPrice'] = $value['price'];
								$arrayColor[$k]['colorQuantity'] = $value['stock'];
							}
						}
					}
				}
				elseif(!empty($arraySize)){  // trường hợp sản phẩm có color giống nhau, size khác nhau
					foreach ($arraySize as $k => $size) {
						$pvs = ";".$size['sizeId'].";";  // Lấy pvs
						foreach ($skuMap as $key => $value) {
							if($pvs == $key){
								$arraySize[$k]['sizePrice'] = $value['price'];
								$arraySize[$k]['sizeQuantity'] = $value['stock'];
							}
						}
					}
				}
			}
			
			if($html->find('#J_AttrUL')){
				$des =  $html->find('#J_AttrUL',0)->find('li');
				if($des){
					foreach ($des as $d) {
						$description[] = $d->plaintext;
					}
				}
			}

			if($html->find('input[name="seller_nickname"]'))
				$shop_name =  $html->find('input[name="seller_nickname"]',0)->value;
		}
		else{
			$page = '1688';
			$name =  $html->find('h1[class="d-title"]',0)->plaintext;
			$image = '';
			if($html->find('.box-img')){
				$image = $html->find('.box-img',0)->find('img',0)->src;
			}
			/* Get current price */
			$current_price = array();
			if($html->find('div.mod-detail-price')){
				$current_price_tr = $html->find('div.mod-detail-price',0)->find('tr.price',0);
				if($current_price_tr){
					foreach($current_price_tr->find('td') as $p){
						if($p->find('span')){
							$cur_price = $p->find('span',1)->plaintext;
							$currency = $p->find('span',0)->plaintext;
							$current_price[] = $cur_price.' '.$currency;
						}
					}
				}
			}
			/* Get origin price (if has) */
			$origin_price = array();
			if($html->find('div.mod-detail-price')){
				$origin_price_tr = $html->find('div.mod-detail-price',0)->find('tr.original-price',0);
				if($origin_price_tr){
					foreach($origin_price_tr->find('td') as $p){
						$org_price = $p->find('span',1)->plaintext;
						$currency = $p->find('span',0)->plaintext;
						$origin_price[] = $org_price.' '.$currency;
					}
				}
			}
			/* Get amount products to buy */
			$amount = array();
			if($html->find('div.mod-detail-price')){
				$amount_tr = $html->find('div.mod-detail-price',0)->find('tr.amount',0);
				if($amount_tr){
					foreach($amount_tr->find('td') as $a){
						if($a->find('span')){
							$value = $a->find('span',0)->plaintext;
							$unit = $a->find('span',1)->plaintext;
							$amount[] = $value.' '.$unit;
						}
					}
				}
			}
	
			$arrayColor = array();
			if($html->find('.list-leading')){
				$colors = $html->find('.list-leading',0)->find('a');
				if($colors){
					foreach($colors as $c) {
						$colorText = $c->find('span',0)->plaintext;
						$colorImg = '';
						// Get image if has
						if($c->find('img')){
							$img_src = $c->find('img',0)->src;
							$colorImg = $img_src;
						}
						$arrayColor[] = array('text' => $colorText, 'img' => $colorImg);
					}
				}
			}
	
			/* Get size */
			$arraySize = array();
			$tableSize = $html->find('table[class="table-sku"]',0);
			if($tableSize){
				foreach($tableSize->find('tr') as $trSize){
					$sizeName = '';
					if($trSize->find('td[class="name"]'))
						$sizeName = $trSize->find('td[class="name"]',0)->find('span',0)->plaintext;
					$sizePrice = '';
					if($trSize->find('td[class="price"]'))
						$sizePrice = $trSize->find('td[class="price"]',0)->find('span',0)->innertext;
					$sizeCount = '';
					if($trSize->find('td[class="count"]'))
						$sizeCount = $trSize->find('td[class="count"]',0)->find('span',0)->innertext;
					$arraySize[] = array('name' => $sizeName, 'price' => $sizePrice, 'count' => $sizeCount);
				}
			}
	
			/* Get description features */
			$arrayFeature = array();
			if($html->find('.offerdetail_ditto_attributes')){
				$features = $html->find('.offerdetail_ditto_attributes',0)->find('td.de-feature');
				if($features){
					foreach($features as $f){
						$arrayFeature[] = $f->plaintext;		
					}
				}
			}
			/* Get description values */
			$arrayValue = array();
			if($html->find('.offerdetail_ditto_attributes')){
				$values = $html->find('.offerdetail_ditto_attributes',0)->find('td.de-value');
				if($values){
					foreach($values as $v){
						$arrayValue[] = $v->plaintext;		
					}
				}
			}
			$description = array();
			if(!empty($arrayFeature) && !empty($arrayValue) && count($arrayFeature)==count($arrayValue)){
				//$arrayDes = array_combine($arrayFeature, $arrayValue);
				foreach($arrayFeature as $key => $feature){
					$description[] = $feature .' : '. $arrayValue[$key];
				}
			}
	
			/* Get shop name */
			$shop_name = '';
			if($html->find('a.company-name')){
				$shop_name = $html->find('a.company-name',0)->innertext;
			}
		}

		// Tính thời gian load trang (test)
		$end_time = microtime(TRUE);
		$time_taken = $end_time - $start_time;
		$time_taken = round($time_taken,5);

		return view('front.pages.order')->with(["product_url" => $url,
												"page" => "taobao", 
					 							"name" => $name, 
					 							"image" => $image, 
					 							"origin_price" => $origin_price, 
					 							"current_price" => $current_price,
					 							"amount" => $amount,
					 							"skuMap" => $skuMap,
					 							"sizes" => $arraySize, 
					 							"colors" => $arrayColor, 
												"first" => $first,
					 							"description" => $description, 
					 							"shop_name" => $shop_name,
					 							"load_time" => $time_taken]);
    } 

    // Ajax function dùng để lấy giá và số lượng sp theo kích thước và màu sắc
    function get_prop(){
    	$sizes = unserialize($_POST['sizes']);
    	$skuMap = unserialize($_POST['skuMap']);
		$first = $_POST['first'];
		$color_id = $_POST['colorId'];
		foreach ($sizes as $k => $size) {
			if($first=="size")
				$pvs = ";".$size['sizeId'].";".$color_id.";";  // Lấy pvs trong array skuList
			elseif($first=="color")
				$pvs = ";".$color_id.";".$size['sizeId'].";";
			foreach ($skuMap as $key => $value) {
				if($pvs == $key){
					$sizes[$k]['sizePrice'] = $value['price'];
					$sizes[$k]['sizeQuantity'] = $value['stock'];
				}
			}
		}
		echo json_encode($sizes);
    }
}
