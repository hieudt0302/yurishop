<div class="enter-address-body">
    <div class="row">
            <div class="col-xs-12">
                @include('notifications.status_message') 
                @include('notifications.errors_message') 
            </div>
    </div> 
    <div class="form-horizontal">
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="company">@lang('profile.company')</label>
            <div class="col-sm-9">
                <input class="form-control" id="company" name="company" placeholder="{{ __('checkout.optional')}}" type="text" value="">
            </div>
        </div>
        <div>
            <hr>
        </div>
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label required" for="first_name">@lang('profile.first-name')</label>
            <div class="col-sm-9">
                <input class="form-control" id="first_name" name="first_name" type="text" value="">
            </div>
        </div>
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label required" for="last_name">@lang('profile.last-name')</label>
            <div class="col-sm-9">
                <input class="form-control"  id="last_name" name="last_name" type="text" value="">
            </div>
        </div>

        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label required" for="address1" >@lang('profile.address') 1</label>
            <div class="col-sm-9">
                <input class="form-control" id="address1" name="address1" type="text" value="">
            </div>
        </div>

        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="address2">@lang('profile.address') 2</label>
            <div class="col-sm-9">
                <input class="form-control" id="address2" name="address2" type="text" value="">
            </div>
        </div>
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="address2">@lang('profile.district')</label>
            <div class="col-sm-9">
                <input class="form-control" id="district" name="district"  type="text" value="">
            </div>
        </div>

        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label required" for="city" >@lang('profile.city')</label>
            <div class="col-sm-9">
                <div class="row row-hardcode sm-gutters d-flex">
                    <div class="col">
                        <input class="form-control"  id="city" name="city" placeholder="" type="text" value=""></div>
                    <div class="col col-auto">
                        <label class="text-right col-form-label" for="zipcode" >@lang('profile.zipcode')</label>
                    </div>
                    <div class="col col-auto">
                        <input class="form-control"  id="zipcode" name="zipcode" placeholder="" style="width: 6rem" type="text" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="state_province">@lang('profile.province')</label>
            <div class="col-sm-9">
                <input class="form-control" id="state_province" name="state_province" placeholder="" type="text" value="">
            </div>
        </div>
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="country">@lang('profile.country')</label>
            <div class="col-sm-9">
                <input class="form-control" id="country" name="country" placeholder="" type="text" value="">
            </div>
        </div>

        <div>
            <hr>
        </div>
        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="email" >@lang('profile.email')</label>
            <div class="col-sm-9">
                <input class="form-control"   id="email" name="email" type="email" value="">
            </div>
        </div>

        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label required" for="phone" >@lang('profile.phone')</label>
            <div class="col-sm-9">
                <input class="form-control" id="phone" name="phone" type="tel" value="">
            </div>
        </div>

        <div class="form-group row row-hardcode">
            <label class="col-sm-3 col-form-label" for="fax">@lang('profile.fax')</label>
            <div class="col-sm-9">
                <input class="form-control" id="fax" name="fax"  type="tel" value="">
            </div>
        </div>

        <div class="form-group row row-hardcode">
            <div class="offset-sm-3 col-sm-9 text-muted address-required-hint">
                @lang('checkout.required-message')
            </div>
        </div>
    </div>
</div>