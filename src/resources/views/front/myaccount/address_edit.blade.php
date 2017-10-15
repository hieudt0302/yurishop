@extends('layouts.master')
@section('title','Danh Sách Đơn Hàng - Cà Phê Đăk Hà')
@section('header') @parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}"> 
@endsection 

@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div id="content-body" class="row mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page page-myaccount page-myaccount-addresses">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                                @include('front.myaccount.myaccount_sidebar')
                            </div>
                            <div class="col-md-8 col-lg-9">
                            <div class="page-title pt-4 pt-md-0">
                                <h1 class="h3">Edit address</h1>
                            </div>
                            <form action="/frontend/en/Customer/AddressEdit/12896" method="post" novalidate="novalidate">
                                <input data-val="true" data-val-number="The field 'ID' must be a number." data-val-required="'Id' must not be empty." id="Address_Id" name="Address.Id" type="hidden" value="12896">
                                <div class="form-horizontal">
                                    <div class="form-group row"><label class="col-lg-3 col-form-label" for="Address_Company">Company</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="Address_Company" name="Address.Company" placeholder="Optional" type="text" value="jj">
                                            <span class="field-validation-valid" data-valmsg-for="Address.Company" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-3 col-form-label required" for="Address_FirstName" aria-required="true">First name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" data-val="true" data-val-required="First name is required." id="Address_FirstName" name="Address.FirstName" type="text" value="dasd">
                                            <span class="field-validation-valid" data-valmsg-for="Address.FirstName" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-3 col-form-label required" for="Address_LastName" aria-required="true">Last name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" data-val="true" data-val-required="Last name is required." id="Address_LastName" name="Address.LastName" type="text" value="asdasd">
                                            <span class="field-validation-valid" data-valmsg-for="Address.LastName" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-3 col-form-label required" for="Address_Address1" aria-required="true">Address 1</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" data-val="true" data-val-required="Street address is required" id="Address_Address1" name="Address.Address1" type="text" value="asdasd">
                                            <span class="field-validation-valid" data-valmsg-for="Address.Address1" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-3 col-form-label" for="Address_Address2">Address 2</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="Address_Address2" name="Address.Address2" placeholder="Optional" type="text" value="asdasd">
                                            <span class="field-validation-valid" data-valmsg-for="Address.Address2" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label required" for="Address_City" aria-required="true">City</label>
                                        <div class="col-lg-9">
                                            <div class="row sm-gutters d-flex">
                                                <div class="col">
                                                    <input class="form-control" data-val="true" data-val-required="City is required" id="Address_City" name="Address.City" placeholder="" type="text" value="dasd">
                                                </div>
                                                <div class="col col-auto">
                                                    <label class="text-right col-form-label required" for="Address_ZipPostalCode" aria-required="true">Zip / postal code</label>
                                                </div>
                                                <div class="col col-auto">
                                                    <input class="form-control" data-val="true" data-val-required="Zip / postal code is required" id="Address_ZipPostalCode" name="Address.ZipPostalCode" placeholder="" style="width: 6rem" type="text" value="31232132">
                                                </div>
                                            </div>
                                            <span class="field-validation-valid" data-valmsg-for="Address.City" data-valmsg-replace="true"></span>
                                            <span class="field-validation-valid" data-valmsg-for="Address.ZipPostalCode" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label required" for="Address_CountryId" aria-required="true">Country</label>
                                        <div class="col-lg-9">
                                            <select class="form-control select2-hidden-accessible" data-val="true" data-val-number="The field 'Country' must be a number." data-val-required="Country is required." id="Address_CountryId" name="Address.CountryId" tabindex="-1" aria-hidden="true"><option value="0">Select country</option>
                                                <option selected="selected" value="1">Deutschland</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Address_CountryId-container"><span class="select2-selection__rendered" id="select2-Address_CountryId-container" title="Deutschland">Deutschland</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                            </span>
                                            </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <span class="field-validation-valid" data-valmsg-for="Address.CountryId" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="Address_StateProvinceId">State / province</label>
                                        <div class="col-lg-9">
                                            <select class="form-control select2-hidden-accessible" data-val="true" data-val-number="The field 'State / province' must be a number." id="Address_StateProvinceId" name="Address.StateProvinceId" tabindex="-1" aria-hidden="true"><option selected="selected" value="1">Baden-Württemberg</option>
                                                <option value="2">Bayern</option>
                                                <option value="3">Berlin</option>
                                                <option value="4">Brandenburg</option>
                                                <option value="5">Bremen</option>
                                                <option value="6">Hamburg</option>
                                                <option value="7">Hessen</option>
                                                <option value="8">Mecklenburg-Vorpommern</option>
                                                <option value="9">Niedersachsen</option>
                                                <option value="10">Nordrhein-Westfalen</option>
                                                <option value="11">Rheinland-Pfalz</option>
                                                <option value="12">Saarland</option>
                                                <option value="13">Sachsen</option>
                                                <option value="14">Sachsen-Anhalt</option>
                                                <option value="15">Schleswig-Holstein</option>
                                                <option value="16">Thüringen</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap select2-container--above" dir="ltr"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-Address_StateProvinceId-container"><span class="select2-selection__rendered" id="select2-Address_StateProvinceId-container" title="Baden-Württemberg">Baden-Württemberg</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                            </span>
                                            </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <span class="field-validation-valid" data-valmsg-for="Address.StateProvinceId" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-3 col-form-label required" for="Address_Email" aria-required="true">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" data-val="true" data-val-email="Wrong email" data-val-required="Email is required." id="Address_Email" name="Address.Email" type="email" value="sadad@dadasd.com">
                                            <span class="field-validation-valid" data-valmsg-for="Address.Email" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-3 col-form-label required" for="Address_PhoneNumber" aria-required="true">Phone number</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" data-val="true" data-val-required="Phone is required" id="Address_PhoneNumber" name="Address.PhoneNumber" type="tel" value="123456789">
                                            <span class="field-validation-valid" data-valmsg-for="Address.PhoneNumber" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row"><label class="col-lg-3 col-form-label" for="Address_FaxNumber">Fax number</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="Address_FaxNumber" name="Address.FaxNumber" placeholder="Optional" type="tel" value="">
                                            <span class="field-validation-valid" data-valmsg-for="Address.FaxNumber" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-lg-3 col-lg-9 text-muted address-required-hint">
                                            * Input elements with asterisk are required and have to be filled out.
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-lg save-address-button">
                                            <i class="fa fa-check"></i>
                                            <span>Save</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
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
<script>
    $(function () {
        $('#account-addresses').addClass("active");   
    });
</script>
@endsection
