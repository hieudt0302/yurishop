@extends('layouts.master')
@section('title','Dakmark Foods - Home')
@section('header')
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
@endsection

@section('top')
<div class="row">
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="home-01" data-source="gallery"
                style="background-color:transparent;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.3.1.5 fullscreen mode -->
                <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.1.5">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"
                            data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off"
                            data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="frontend/frontend/images/uploadsslider-home-01-slide-01-background.jpg" alt="" data-bgposition="center bottom" data-bgfit="cover"
                                data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="['right','right','right','right']" data-hoffset="['-127','10','5','10']"
                                data-y="['middle','middle','middle','bottom']" data-voffset="['-28','0','133','10']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;">
                                <img src="frontend/frontend/images/uploadsslider-home-01-slide-01-object-01.png" alt="" data-ww="['905','605','471','286']" data-hh="['824','588','438','307']"
                                    width="930" height="876" data-no-retina> </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="['left','left','left','left']" data-hoffset="['10','10','10','10']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-231','-231','-231','-231']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 24px; line-height: 24px; font-weight: 400; color: rgba(142, 179, 90, 1.00);font-family:Playfair Display;font-style:italic;letter-spacing:0.2em;">Good for nature, </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption   tp-resizeme" id="slide-1-layer-3" data-x="['left','left','left','left']" data-hoffset="['10','10','10','10']"
                                data-y="['middle','middle','middle','top']" data-voffset="['-157','-157','-157','166']" data-fontsize="['80','80','80','70']"
                                data-fontweight="['700','700','700','400']" data-width="none" data-height="none" data-whitespace="nowrap"
                                data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 700; color: rgba(51, 51, 51, 1.00);font-family:Playfair Display;">good for you </div>

                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption   tp-resizeme" id="slide-1-layer-4" data-x="['left','left','left','left']" data-hoffset="['9','9','9','10']"
                                data-y="['middle','middle','middle','top']" data-voffset="['-16','-16','-16','299']" data-width="['470','470','470','355']"
                                data-height="['123','123','123','122']" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; min-width: 470px; max-width: 470px; max-width: 123px; max-width: 123px; white-space: normal; font-size: 15px; line-height: 26px; font-weight: 400; color: rgba(121, 117, 117, 1.00);font-family:Lato;">We don’t just bring organic produce to your door — we nurture it from seed, we harvest it by
                                hand and we understand the responsibility entrusted to us as farmers. </div>

                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption rev-btn " id="slide-1-layer-5" data-x="['left','left','left','left']" data-hoffset="['10','10','10','10']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['62','62','62','98']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-responsive="off"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(142, 179, 90, 1.00);bw:1px 1px 1px 1px;"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[12,12,12,12]" data-paddingright="[35,35,35,35]"
                                data-paddingbottom="[12,12,12,12]" data-paddingleft="[35,35,35,35]" style="z-index: 9; white-space: nowrap; font-size: 16px; line-height: 16px; font-weight: 700; color: rgba(142, 179, 90, 1.00);font-family:Lato;background-color:rgba(142, 179, 90, 0);border-color:rgba(142, 179, 90, 1.00);border-style:solid;border-width:1px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">SHOP NOW </div>

                            <!-- LAYER NR. 6 -->
                            <div class="tp-caption insight-dots-style-2   tp-resizeme" id="slide-1-layer-6" data-x="['right','right','right','right']"
                                data-hoffset="['138','138','138','138']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['22','22','22','22']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10; white-space: nowrap;">01 </div>
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-2" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"
                            data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off"
                            data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="frontend/frontend/images/uploadsslider-home-01-slide-01-background.jpg" alt="" data-bgposition="center bottom" data-bgfit="cover"
                                data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 7 -->
                            <div class="tp-caption   tp-resizeme" id="slide-2-layer-2" data-x="['left','left','left','left']" data-hoffset="['45','45','45','16']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-163','-163','-163','-223']" data-width="449"
                                data-height="36" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; min-width: 449px; max-width: 449px; max-width: 36px; max-width: 36px; white-space: normal; font-size: 34px; line-height: 34px; font-weight: 400; color: rgba(142, 179, 90, 1.00);font-family:Playfair Display;font-style:italic;letter-spacing:0.2em;">Live Organic </div>

                            <!-- LAYER NR. 8 -->
                            <div class="tp-caption   tp-resizeme" id="slide-2-layer-3" data-x="['left','left','left','left']" data-hoffset="['47','47','47','45']"
                                data-y="['middle','middle','middle','top']" data-voffset="['-67','-67','-67','173']" data-fontsize="['80','80','80','70']"
                                data-fontweight="['700','700','700','400']" data-width="none" data-height="none" data-whitespace="nowrap"
                                data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 700; color: rgba(51, 51, 51, 1.00);font-family:Playfair Display;">Live healthy </div>

                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption rev-btn " id="slide-2-layer-5" data-x="['left','left','left','left']" data-hoffset="['181','181','181','146']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['103','103','103','4']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-responsive="off"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(142, 179, 90, 1.00);bw:1px 1px 1px 1px;"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[12,12,12,12]" data-paddingright="[35,35,35,35]"
                                data-paddingbottom="[12,12,12,12]" data-paddingleft="[35,35,35,35]" style="z-index: 13; white-space: nowrap; font-size: 16px; line-height: 16px; font-weight: 700; color: rgba(142, 179, 90, 1.00);font-family:Lato;background-color:rgba(142, 179, 90, 0);border-color:rgba(142, 179, 90, 1.00);border-style:solid;border-width:1px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">SHOP NOW </div>

                            <!-- LAYER NR. 10 -->
                            <div class="tp-caption   tp-resizeme" id="slide-2-layer-4" data-x="['left','left','left','left']" data-hoffset="['7','7','7','60']"
                                data-y="['middle','middle','middle','top']" data-voffset="['15','15','15','281']" data-fontsize="['24','24','24','15']"
                                data-lineheight="['24','24','24','26']" data-fontweight="['700','700','700','400']" data-color="['rgba(105, 105, 105, 1.00)','rgba(105, 105, 105, 1.00)','rgba(105, 105, 105, 1.00)','rgba(121, 117, 117, 1.00)']"
                                data-width="['520','520','520','356']" data-height="['29','29','29','none']" data-whitespace="normal"
                                data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14; min-width: 520px; max-width: 520px; max-width: 29px; max-width: 29px; white-space: normal; font-size: 24px; line-height: 24px; font-weight: 700; color: rgba(105, 105, 105, 1.00);font-family:Lato;text-transform:uppercase;letter-spacing:0.7em;">Trust the nature </div>

                            <!-- LAYER NR. 11 -->
                            <div class="tp-caption   tp-resizeme" id="slide-2-layer-1" data-x="['right','right','right','right']" data-hoffset="['-276','-155','-99','10']"
                                data-y="['middle','middle','middle','bottom']" data-voffset="['-3','13','266','10']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;">
                                <img src="frontend/frontend/images/uploadsslider-home-01-slide-02-object-01.png" alt="" data-ww="['995px','605','471','286']" data-hh="['859px','588','438','307']"
                                    width="995" height="859" data-no-retina> </div>

                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption   tp-resizeme" id="slide-2-layer-6" data-x="['right','right','right','right']" data-hoffset="['577','353','294','288']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['18','46','262','199']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 16;">
                                <img src="frontend/frontend/images/uploadsslider-home-01-slide-02-object-02.png" alt="" data-ww="['140px','140px','140px','140px']" data-hh="['140px','140px','140px','140px']"
                                    width="140" height="140" data-no-retina> </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption insight-dots-style-2   tp-resizeme" id="slide-2-layer-7" data-x="['right','right','right','right']"
                                data-hoffset="['138','138','138','138']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['22','22','22','22']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17; white-space: nowrap;">02 </div>
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"
                            data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off"
                            data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="frontend/frontend/images/uploadsslider-home-01-slide-03-bg.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 14 -->
                            <div class="tp-caption   tp-resizeme" id="slide-3-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-42','-42','-42','-42']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;">
                                <img src="frontend/frontend/images/uploadsslider-home-01-slide-03-object-01.png" alt="" data-ww="['1255px','1255px','1255px','1255px']" data-hh="['696px','696px','696px','696px']"
                                    width="1255" height="696" data-no-retina> </div>

                            <!-- LAYER NR. 15 -->
                            <div class="tp-caption   tp-resizeme" id="slide-3-layer-2" data-x="['right','right','right','right']" data-hoffset="['10','10','12','6']"
                                data-y="['middle','middle','bottom','bottom']" data-voffset="['0','0','10','2']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 19;">
                                <img src="frontend/frontend/images/uploadsslider-home-01-slide-03-object-02.png" alt="" data-ww="['612px','412','338px','223']" data-hh="['654px','535','394px','215']"
                                    width="612" height="654" data-no-retina> </div>

                            <!-- LAYER NR. 16 -->
                            <div class="tp-caption   tp-resizeme" id="slide-3-layer-3" data-x="['left','left','left','left']" data-hoffset="['10','10','10','10']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-156','-156','-156','-156']" data-width="['681','681','681','462']"
                                data-height="['29','29','29','30']" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 20; min-width: 681px; max-width: 681px; max-width: 29px; max-width: 29px; white-space: normal; font-size: 24px; line-height: 24px; font-weight: 900; color: rgba(142, 179, 90, 1.00);text-transform:uppercase;letter-spacing:0.5em;">Handmade </div>

                            <!-- LAYER NR. 17 -->
                            <div class="tp-caption   tp-resizeme" id="slide-3-layer-4" data-x="['left','left','left','left']" data-hoffset="['4','4','4','4']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-46','-46','-46','-46']" data-fontsize="['80','80','80','40']"
                                data-width="['710','710','710','475']" data-height="['81','81','81','82']" data-whitespace="normal"
                                data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 21; min-width: 710px; max-width: 710px; max-width: 81px; max-width: 81px; white-space: normal; font-size: 80px; line-height: 80px; font-weight: 700; color: rgba(51, 51, 51, 1.00);font-family:Playfair Display;text-transform:uppercase;letter-spacing:0.5em;">Organic </div>

                            <!-- LAYER NR. 18 -->
                            <div class="tp-caption   tp-resizeme" id="slide-3-layer-5" data-x="['left','left','left','left']" data-hoffset="['6','6','6','6']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['37','37','37','37']" data-lineheight="['22','22','22','34']"
                                data-width="['none','none','none','468']" data-height="['none','none','none','69']" data-whitespace="['nowrap','nowrap','nowrap','normal']"
                                data-type="text" data-responsive_offset="on" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 22; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 700; color: rgba(51, 51, 51, 1.00);text-transform:uppercase;letter-spacing:0.7em;">Organic extra virgin olive oil </div>

                            <!-- LAYER NR. 19 -->
                            <div class="tp-caption btn-line rev-btn " id="slide-3-layer-8" data-x="['left','left','left','center']" data-hoffset="['266','266','266','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['138','138','138','138']" data-width="none"
                                data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-responsive="off"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(142, 179, 90, 1.00);bw:1px 1px 1px 1px;"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[14,14,14,14]" data-paddingright="[35,35,35,35]"
                                data-paddingbottom="[14,14,14,14]" data-paddingleft="[35,35,35,35]" style="z-index: 23; white-space: nowrap; font-size: 17px; line-height: 17px; font-weight: 400; color: rgba(142, 179, 90, 1.00);font-family:Lato;text-transform:uppercase;background-color:rgba(142, 179, 90, 0);border-color:rgba(142, 179, 90, 1.00);border-style:solid;border-width:1px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;letter-spacing:0.1em;cursor:pointer;">shop now </div>

                            <!-- LAYER NR. 20 -->
                            <div class="tp-caption insight-dots-style-2   tp-resizeme" id="slide-3-layer-9" data-x="['right','right','right','right']"
                                data-hoffset="['138','138','138','138']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['22','22','22','22']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 24; white-space: nowrap;">03 </div>
                        </li>
                    </ul>
                    <div style="" class="tp-static-layers">

                        <!-- LAYER NR. 21 -->
                        <div class="tp-caption rev-scroll-btn  tp-static-layer" id="slider-1-layer-1" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['10','10','10','10']"
                            data-width="35" data-height="55" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":"200"}]'
                            data-responsive_offset="on" data-responsive="off" data-startslide="0" data-endslide="2" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 25; min-width: 35px; max-width: 35px; max-width: 55px; max-width: 55px; white-space: nowrap; font-size: px; line-height: px; font-weight: 100;border-color:rgba(255, 255, 255, 1.00);border-style:solid;border-width:3px;border-radius:23px 23px 23px 23px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                            <span>
                            </span>
                        </div>

                        <!-- LAYER NR. 22 -->
                        <div class="tp-caption   tp-static-layer" id="slider-1-layer-2" data-x="['right','right','right','right']" data-hoffset="['30','30','30','30']"
                            data-y="['bottom','bottom','bottom','bottom']" data-voffset="['40','40','40','40']" data-width="37"
                            data-height="none" data-whitespace="normal" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                            data-responsive_offset="on" data-responsive="off" data-startslide="0" data-endslide="2" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(142, 179, 90, 1.00);"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 26; min-width: 37px; max-width: 37px; white-space: normal; font-size: 24px; line-height: 24px; font-weight: 400; color: rgba(105, 105, 105, 1.00);border-radius:50px 50px 50px 50px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                            <i class="ion-arrow-right-b"></i>
                        </div>

                        <!-- LAYER NR. 23 -->
                        <div class="tp-caption   tp-static-layer" id="slider-1-layer-3" data-x="['right','right','right','right']" data-hoffset="['260','260','260','260']"
                            data-y="['bottom','bottom','bottom','bottom']" data-voffset="['40','40','40','40']" data-width="37"
                            data-height="none" data-whitespace="normal" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"previous","delay":""}]'
                            data-responsive_offset="on" data-responsive="off" data-startslide="0" data-endslide="2" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(142, 179, 90, 1.00);"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 27; min-width: 37px; max-width: 37px; white-space: normal; font-size: 24px; line-height: 24px; font-weight: 400; color: rgba(105, 105, 105, 1.00);border-radius:50px 50px 50px 50px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                            <i class="ion-arrow-left-b"></i>
                        </div>

                        <!-- LAYER NR. 24 -->
                        <div class="tp-caption   tp-resizeme tp-static-layer" id="slider-1-layer-5" data-x="['right','right','right','right']" data-hoffset="['96','96','96','96']"
                            data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','50','50']" data-width="none"
                            data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-startslide="0"
                            data-endslide="2" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 28; white-space: nowrap; font-size: 24px; line-height: 24px; font-weight: 700; color: rgba(51, 51, 51, 1.00);font-family:Playfair Display;">/05 </div>
                    </div>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>
@stop


@section('content')

<!-- Fullwidth Slider -->
<div class="home-section fullwidth-slider bg-dark">
    @foreach ($sliders as $slider)
    <!-- Slide Item -->
    <section class="page-section bg-scroll bg-dark bg-dark-alfa-50" style="background-image:url('{{ asset('images/slider/'.$slider->image) }}');">
        <div class="relative container">

            <!-- Hero Content -->
            <div class="home-content">
                <div class="home-text">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="hs-line-6 no-transp font-alt">{{$slider->translation->description}}
                                <a href="{{url('/menu')}}/{{$slider->url}}" class="btn btn-mod btn-w btn-round" style="margin-top:-3px;">@lang('common.more-details')</a>
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Hero Content -->

        </div>
    </section>
    <!-- End Slide Item -->
    @endforeach
</div>
<!-- End Fullwidth Slider -->

<!-- New Product Section -->
<section class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('home.new-products')
        </h2>
        <!-- Product Content -->
            <div class="col-sm-12">
            <div class="row multi-columns-row">
                 <!-- Shop Item -->
                @foreach($new_products as $product)
                <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <a href="{{url('/products')}}/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                        <div class="intro-label">
                            <span class="label label-danger bg-red">Sale</span>
                        </div>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a>
                    </div>

                    <div class="post-prev-text align-center">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                            @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    
                    <div class="post-prev-more align-center">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                        <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                        <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                    
                </div>
                @endforeach
                <!-- End Shop Item -->

            </div>
        </div>

        <div class="mt-20 align-center">
            <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
        </div>

    </div>
</section>
<!-- New Product  End Section -->

<!-- Best Sellers Product Section -->
<section class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('home.best-sellers-products')
        </h2>

        <!-- Product Content -->
        <div class="col-sm-12">
            <div class="row multi-columns-row">
                 <!-- Shop Item -->
                @foreach($new_products as $product)
                <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <a href="{{url('/products')}}/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                        <div class="intro-label">
                            <span class="label label-danger bg-red">Sale</span>
                        </div>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a>
                    </div>

                    <div class="post-prev-text align-center">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                            @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    
                    <div class="post-prev-more align-center">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                        <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                        <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                    
                </div>
                @endforeach
                <!-- End Shop Item -->

            </div>
        </div>

        <div class="mt-20 align-center">
            <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
        </div>

    </div>
</section>
<!-- Best Sellers Product  End Section -->

<!-- Sale Product Section -->
<section class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('home.sale-products')
        </h2>

        <!-- Product Content -->
        <div class="col-sm-12">
            <div class="row multi-columns-row">
                 <!-- Shop Item -->
                @foreach($new_products as $product)
                <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <a href="{{url('/products')}}/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                        <div class="intro-label">
                            <span class="label label-danger bg-red">Sale</span>
                        </div>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a>
                    </div>

                    <div class="post-prev-text align-center">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                            @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    
                    <div class="post-prev-more align-center">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                        <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                        <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                    
                </div>
                @endforeach
                <!-- End Shop Item -->

            </div>
        </div>

        <div class="mt-20 align-center">
            <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
        </div>

    </div>
</section>
<!-- Sale Product  End Section -->


<!-- Section -->
<section class="page-section bg-gray-lighter">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Bạn đang tìm đặc sản hấp dẫn nhất của từng miền?
        </h2>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-text align-center mb-70 mb-xs-40">
                    Tố tụng tìm luật sư, tìm kiếm lên Google, trời mưa mang ô dù, cần đặn sản "chất" của 3 miền thì đến với chúng tôi. Không có một cơ hỏi nhỏ nhoi cho lựa chọn sai. Mở quà ra là bạn bè biết bạn đi đâu, đưa vào miệng là bạn bè bạn cảm nhận dạt dào vùng đất
                    bạn đã đến.
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Item -->
            <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="#"><img src="{{ asset('images/foods/mienbac.jpg')}}" alt="" /></a>
                </div>

            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="#"><img src="{{ asset('images/foods/mientrung.jpg')}}" alt="" /></a>
                </div>

            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="#"><img src="{{ asset('images/foods/miennam.jpg')}}" alt="" /></a>
                </div>

            </div>
            <!-- End Item -->

        </div>

    </div>
</section>
<!-- End Section -->

<!-- Divider -->
<hr class="mt-0 mb-0 " />
<!-- End Divider -->


<!-- Section -->
<section class="page-section">
    <div class="container relative">

        <!-- Features Grid -->
        <div class="row alt-features-grid">

            <!-- Text Item -->
            <div class="col-sm-3">
                <div class="alt-features-item align-center">
                    <div class="alt-features-descr align-left">
                        <h4 class="mt-0 font-alt">Phương châm của chúng tôi?</h4>
                        Hoạt động trong lĩnh vực thực phẩm nhiều năm, chúng tôi luôn theo đuổi triêt lý chiều chuộng vị giác khách hàng. Chỉ cần bạn bước 1 bước về phía chúng tôi, 999 bước còn lại chúng tôi sẽ bước.
                    </div>
                </div>
            </div>
            <!-- End Text Item -->

            <!-- Features Item -->
            <div class="col-sm-3">
                <div class="alt-features-item align-center">
                    <div class="alt-features-icon">
                        <span class="icon-chat"></span>
                    </div>
                    <h3 class="alt-features-title font-alt">Hỗ trợ 24/7</h3>
                    <p>Luôn luôn lắng nghe.</p>
                </div>
            </div>
            <!-- End Features Item -->

            <!-- Features Item -->
            <div class="col-sm-3">
                <div class="alt-features-item align-center">
                    <div class="alt-features-icon">
                        <span class="icon-wallet"></span>
                    </div>
                    <h3 class="alt-features-title font-alt">100% hoàn tiền</h3>
                    <p>Nếu bạn thấy chất lượng không như chúng tôi giới thiệu.</p>
                </div>
            </div>
            <!-- End Features Item -->

            <!-- Features Item -->
            <div class="col-sm-3">
                <div class="alt-features-item align-center">
                    <div class="alt-features-icon">
                        <span class="icon-hotairballoon"></span>
                    </div>
                    <h3 class="alt-features-title font-alt">Ship hàng toàn quốc</h3>
                    <p>Đem cả 3 miền về ngôi nhà bạn.</p>
                </div>
            </div>
            <!-- End Features Item -->

        </div>
        <!-- End Features Grid -->

    </div>
</section>
<!-- End Section -->

<!-- Newsletter Section -->
<section class="small-section bg-dark-alfa-50 pt-30 pb-30">
    <div class="container relative">
        
        <form class="form align-center" id="mailchimp">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    
                    <div class="newsletter-label font-alt">
                        @lang('footer.newsletter-message')
                    </div>
                    
                    <div class="mb-20">
                        <input placeholder="{{ __('profile.email') }}" class="newsletter-field form-control input-md round mb-xs-10" type="email" pattern=".{5,100}" required/>
                        
                        <button type="submit" class="btn btn-mod btn-w btn-medium btn-round mb-xs-10">
                            @lang('footer.subscribe')
                        </button>
                    </div>
                    
                    <div id="subscribe-result"></div>
                    
                </div>
            </div>
        </form>
        
    </div>
</section>
<!-- End Newsletter Section -->
@endsection