@extends('layouts.master') 
@section('title','Địa Chỉ Nhận Hàng - Giỏ Hàng') 
@section('header') @parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}"> 
@endsection 

@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div class="costeps row no-gutters">
            <div class="col-2 costep visited" data-step="cart">
                <a class="costep-link" href="/frontend/en/cart">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Cart</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="address">
                <a class="costep-link" href="/frontend/en/Checkout/BillingAddress">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Address</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="shipping">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Shipping</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="payment">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Payment</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="confirm">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Confirm</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="complete">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Complete</span>
                </a>
            </div>
		</div>
		
        <div id="content-body" class="row mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page billing-address-page">
                    <div class="page-title">
                        <h1 class="h3">Shipping address</h1>
                    </div>
                    <div class="page-body checkout-data">
						@if(count(Auth::user()->bookaddresses()) > 0)
                        <fieldset class="content-group mb-3">
                            <legend><span>Select shipping address</span></legend>
                            <div class="card-deck card-cols-sm-1 card-cols-md-2 card-cols-lg-3 address-list">
								@foreach(Auth::user()->bookaddresses as $bookaddress)
                                <div class="card card-block address-list-item">
                                    <div class="address-item">
                                        <button class="btn btn-warning btn-block select-billing-address-button" onclick="setLocation('/Checkout/SelectShippingAddress?addressId={{$bookaddress->id}}')">
											<span>Ship to this address</span>
											<i class="fa fa-angle-right"></i>
										</button>
                                        <div class="address-data mt-3">
                                            <div class="name pb-2">
                                                <strong>{{$bookaddress->last_name}} {{$bookaddress->first_name}}</strong>
                                            </div>
                                            <div class="email">Email: {{$bookaddress->email}}</div>
                                            <div class="phone">
                                                Phone number: {{$bookaddress->phone}}
                                            </div>
                                            <div class="company">
												{{$bookaddress->company}}
                                            </div>
                                            <div class="address1">
												{{$bookaddress->address1}}
                                            </div>
                                            <div class="address2">
												{{$bookaddress->address2}}
                                            </div>
                                            <div class="city-state-zip">
												{{$bookaddress->city}}, {{$bookaddress->zipcode}}</div>
                                            <div class="country">
												{{$bookaddress->country}}
                                            </div>
                                        </div>
                                    </div>
								</div>
								@endforeach
                            </div>
						</fieldset>
						@endif
                        <fieldset class="content-group">
                            <legend>
								<span>
									@if(count(Auth::user()->bookaddresses()) > 0)
									Or enter
									@else 
									Enter
									@endif
									new address
                                </span>
							</legend>
                            <div class="enter-address">
                                <form action="{{url('/Checkout/ShippingAddress')}}" method="POST" novalidate="novalidate">
								{{ csrf_field() }}	
									<div class="enter-address-body">
                                        <input data-val="true" data-val-number="The field 'ID' must be a number." data-val-required="'Id' must not be empty." id="NewAddress_Id" name="NewAddress.Id" type="hidden" value="0">

                                        <div class="form-horizontal">

                                            <div class="form-group row"><label class="col-sm-3 col-form-label" for="NewAddress_Company">Company</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="NewAddress_Company" name="NewAddress.Company" placeholder="Optional" type="text" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.Company" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div>
                                                <hr>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-3 col-form-label required" for="NewAddress_FirstName" aria-required="true">First name</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" data-val="true" data-val-required="First name is required." id="NewAddress_FirstName" name="NewAddress.FirstName" type="text" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.FirstName" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-3 col-form-label required" for="NewAddress_LastName" aria-required="true">Last name</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" data-val="true" data-val-required="Last name is required." id="NewAddress_LastName" name="NewAddress.LastName" type="text" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.LastName" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-sm-3 col-form-label required" for="NewAddress_Address1" aria-required="true">Address 1</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" data-val="true" data-val-required="Street address is required" id="NewAddress_Address1" name="NewAddress.Address1" type="text" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.Address1" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-sm-3 col-form-label" for="NewAddress_Address2">Address 2</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="NewAddress_Address2" name="NewAddress.Address2" placeholder="Optional" type="text" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.Address2" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label required" for="NewAddress_City" aria-required="true">City</label>
                                                <div class="col-sm-9">
                                                    <div class="row sm-gutters d-flex">
                                                        <div class="col">
                                                            <input class="form-control" data-val="true" data-val-required="City is required" id="NewAddress_City" name="NewAddress.City" placeholder="" type="text" value="">
                                                        </div>
                                                        <div class="col col-auto">
                                                            <label class="text-right col-form-label required" for="NewAddress_ZipPostalCode" aria-required="true">Zip / postal code</label>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <input class="form-control" data-val="true" data-val-required="Zip / postal code is required" id="NewAddress_ZipPostalCode" name="NewAddress.ZipPostalCode" placeholder="" style="width: 6rem" type="text" value="">
                                                        </div>
                                                    </div>
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.City" data-valmsg-replace="true"></span>
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.ZipPostalCode" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label required" for="NewAddress_CountryId" aria-required="true">Country</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2-hidden-accessible" data-val="true" data-val-number="The field 'Country' must be a number." data-val-required="Country is required." id="NewAddress_CountryId" name="NewAddress.CountryId" tabindex="-1" aria-hidden="true"><option value="0">Select country</option>
<option value="1">Deutschland</option>
</select><span class="select2 select2-container select2-container--bootstrap" dir="ltr"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NewAddress_CountryId-container"><span class="select2-selection__rendered" id="select2-NewAddress_CountryId-container" title="Select country">Select country</span>
                                                    <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                                    </span>
                                                    </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.CountryId" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="NewAddress_StateProvinceId">State / province</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2-hidden-accessible" data-val="true" data-val-number="The field 'State / province' must be a number." id="NewAddress_StateProvinceId" name="NewAddress.StateProvinceId" tabindex="-1" aria-hidden="true"><option value="0">Other (Non US)</option>
</select><span class="select2 select2-container select2-container--bootstrap" dir="ltr"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-NewAddress_StateProvinceId-container"><span class="select2-selection__rendered" id="select2-NewAddress_StateProvinceId-container" title="Other (Non US)">Other (Non US)</span>
                                                    <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                                    </span>
                                                    </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.StateProvinceId" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div>
                                                <hr>
                                            </div>

                                            <div class="form-group row"><label class="col-sm-3 col-form-label required" for="NewAddress_Email" aria-required="true">Email</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" data-val="true" data-val-email="Wrong email" data-val-required="Email is required." id="NewAddress_Email" name="NewAddress.Email" type="email" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.Email" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>



                                            <div class="form-group row"><label class="col-sm-3 col-form-label required" for="NewAddress_PhoneNumber" aria-required="true">Phone number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" data-val="true" data-val-required="Phone is required" id="NewAddress_PhoneNumber" name="NewAddress.PhoneNumber" type="tel" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.PhoneNumber" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-sm-3 col-form-label" for="NewAddress_FaxNumber">Fax number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="NewAddress_FaxNumber" name="NewAddress.FaxNumber" placeholder="Optional" type="tel" value="">
                                                    <span class="field-validation-valid" data-valmsg-for="NewAddress.FaxNumber" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-3 col-sm-9 text-muted address-required-hint">
                                                    * Input elements with asterisk are required and have to be filled out.
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="buttons">
                                        <a class="btn btn-secondary btn-lg" href="{{url('/Checkout/BillingAddress')}}">
                                            <i class="fa fa-angle-left"></i>
                                            <span>Back</span>
                                        </a>
                                        <input type="submit" id="nextstep" name="nextstep" class="d-none">

                                        <button class="btn btn-warning btn-lg new-address-next-step-button" onclick="$('#nextstep').trigger('click');return false;">
							<span>Next</span>
							<i class="fa fa-angle-right"></i>
						</button>
                                    </div>
                                </form>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> 
<script type="text/javascript" src="{{ asset('js/viewport.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/eventbroker.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/underscore.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/underscore.mixins.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/underscore.string.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/system.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/system.common.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/public.common.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/throbber.js') }}"></script>     
<script type="text/javascript" src="{{ asset('js/doAjax.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/jquery.bootstrap-touchspin.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/offcanvas.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/offcanvas-cart.js') }}"></script> 
    <!-- Select2 -->
	<script src="{{asset('adminlte/js/select2.full.min.js')}}"></script>
	<script type="text/javascript">
                                            $(function() {
                                                $("#NewAddress_CountryId").change(function() {
                                                    var selectedItem = $(this).val();
                                                    var ddlStates = $("#NewAddress_StateProvinceId");
                                                    $.ajax({
                                                        cache: false,
                                                        type: "GET",
                                                        url: "/frontend/en/Country/GetStatesByCountryId",
                                                        data: {
                                                            "countryId": selectedItem,
                                                            "addEmptyStateIfRequired": "true"
                                                        },
                                                        success: function(data) {
                                                            ddlStates.html('');
                                                            $.each(data, function(id, option) {
                                                                ddlStates.append($('<option></option>').val(option.id).html(option.name));
                                                            });
                                                            ddlStates.trigger("change");
                                                        },
                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                            alert('Failed to retrieve states.');
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
@endsection