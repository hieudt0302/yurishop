<div id="adsv2">
    <div class="row">
        @if (Setting::config('banner-style')=='1')
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="ads-center">
                <a href="/"></a>
                <div class="ads-text">
                    <h2>Autumn</h2>
                    <h1>Sale</h1>
                    <p>
                        Sale up to 40% off
                    </p>                    
                </div>  
            </div>
        </div>
        @else
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="ads-left">
                <a href="/"></a>
                <div class="ads-text">
                    <h2>Autumn</h2>
                    <h1>Sale</h1>
                    <p>
                        Sale up to 40% off
                    </p>                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="ads-right">
                <a href="#"></a>
                <div class="ads-text ad-r">
                    <h2 class="ad-r">New products</h2>                    
                    <h1 class="ad-r">Winged bean tea</h1>
                    <p class="ad-r">
                        Coming next week
                    </p>                    
                </div>
            </div>
        </div>        
        @endif        
    </div>
</div>