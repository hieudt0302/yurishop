<div class="row">
	<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-farm" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
		<!-- START REVOLUTION SLIDER 5.3.1.5 fullwidth mode -->
		<div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.1.5">


			<ul>	<!-- SLIDE  -->
				@foreach($sliders as $slider)
				<li data-index="rs-1{{$slider->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="assets/slider-home-farm-slide-01-bg-100x50.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
					<!-- MAIN IMAGE -->
					<img src="{{asset('/storage/'.$slider->image) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption   tp-resizeme" 
						 id="slide-{{$slider->id}}-layer-1" 
						 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
						 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
									data-fontsize="['64','64','64','30']"
						data-lineheight="['64','64','64','30']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
			 
						data-type="text" 
						data-responsive_offset="on" 

						data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":740,"to":"o:1;","delay":510,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
						data-textAlign="['left','left','left','left']"
						data-paddingtop="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"

						style="z-index: {{$slider->id}}5; white-space: nowrap; font-size: 64px; line-height: 64px; font-weight: 700; color: rgba(255, 255, 255, 1.00);font-family:Playfair Display;">{{$slider->translation->description??""}}</div>

					<!-- LAYER NR. 6 -->
					<div class="tp-caption btn-line rev-btn " 
						 id="slide-{{$slider->id}}-layer-2" 
						 data-x="['center','center','center','center']" data-hoffset="['-1','-1','-1','0']" 
						 data-y="['middle','middle','middle','middle']" data-voffset="['167','167','167','167']" 
									data-width="none"
						data-height="none"
						data-whitespace="nowrap"
			 
						data-type="button" 
						data-responsive_offset="on" 
						data-responsive="off"
						data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":1400,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(142, 179, 90, 1.00);bw:1px 1px 1px 1px;"}]'
						data-textAlign="['left','left','left','left']"
						data-paddingtop="[14,14,14,14]"
						data-paddingright="[35,35,35,35]"
						data-paddingbottom="[14,14,14,14]"
						data-paddingleft="[35,35,35,35]"

						style="z-index: {{$slider->id}}6; white-space: nowrap; font-size: 17px; line-height: 17px; font-weight: 400; color: rgba(142, 179, 90, 1.00);font-family:Lato;text-transform:uppercase;background-color:rgba(255, 255, 255, 1.00);border-color:rgba(142, 179, 90, 0);border-style:solid;border-width:1px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;letter-spacing:0.1em;cursor:pointer;"><a href="/{{$slider->url}}" style="text-decoration:none">@lang('common.more-details')</a></div>
				</li>
				@endforeach
			</ul>


			<div class="tp-bannertimer" style="height: 5px; background-color: rgba(0, 0, 0, 0.15);"></div>	
		</div>
	</div><!-- END REVOLUTION SLIDER -->
</div>