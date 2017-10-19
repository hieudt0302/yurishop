@extends('layouts.master')
@section('title','Thông Tin Tài Khoản - Pokofarms')
@section('header')
@parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="{{ asset('css/custom-order.css') }}">
@stop


@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div id="content-body" class="row row-hardcode mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page page-myaccount page-myaccount-info">
                    <div class="page-body">
                        <div class="row row-hardcode">
                            <div class="col-md-4 col-lg-3">
                                @include('front.myaccount.myaccount_sidebar')
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <div class="page-title pt-4 pt-md-0">
                                    <h1 class="h3">@lang('account.customer-info')</h1>
                                </div>
                                <form action="{{url('Account/Info/Update')}}" class="form-horizontal" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                    <fieldset class="content-group">
                                        <legend><span>@lang('account.personal-details')</span></legend>
                                        <div class="form-group row row-hardcode">
                                            <label class="col-lg-3 col-form-label">@lang('account.gender')</label>
                                            <div class="col-lg-9">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input  class="form-check-input" id="gender-male" name="gender" type="radio" value="M">
                                                    <span>&nbsp;&nbsp;&nbsp;&nbsp;@lang('account.male')</span>
                                                </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" id="gender-female" name="gender" type="radio" value="F">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;@lang('account.female')</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label required" for="FirstName" aria-required="true">@lang('profile.first-name')</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" data-val="true" data-val-required="First name is required." id="FirstName" name="first_name" type="text" value="{{Auth::user()->first_name}}">
                                                <span class="field-validation-valid" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label required" for="LastName" aria-required="true">@lang('profile.last-name')</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" data-val="true" data-val-required="Last name is required." id="LastName" name="last_name" type="text" value="{{Auth::user()->last_name}}">
                                                <span class="field-validation-valid" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode">
                                            <label class="col-lg-3 col-form-label" for="DateOfBirthDay">@lang('account.birthday')</label>
                                            <div class="col-lg-9">
                                                <div class="row row-hardcode xs-gutters">
                                                    <div class="col"><select class="date-part form-control noskin" data-native-menu="false" data-select-min-results-for-search="100" name="DateOfBirthDay"><option value="">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div>
                                                    <div class="col"><select class="date-part form-control noskin" data-native-menu="false" data-select-min-results-for-search="100" name="DateOfBirthMonth"><option value="">Month</option><option value="1">January</option><option value="2">February</option><option value="3" selected="selected">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></div>
                                                    <div class="col"><select class="date-part form-control noskin" data-native-menu="false" name="DateOfBirthYear"><option value="">Year</option><option value="1907">1907</option><option value="1908">1908</option><option value="1909">1909</option><option value="1910">1910</option><option value="1911">1911</option><option value="1912">1912</option><option value="1913">1913</option><option value="1914">1914</option><option value="1915">1915</option><option value="1916">1916</option><option value="1917">1917</option><option value="1918">1918</option><option value="1919">1919</option><option value="1920">1920</option><option value="1921">1921</option><option value="1922">1922</option><option value="1923">1923</option><option value="1924">1924</option><option value="1925">1925</option><option value="1926">1926</option><option value="1927">1927</option><option value="1928">1928</option><option value="1929">1929</option><option value="1930">1930</option><option value="1931">1931</option><option value="1932">1932</option><option value="1933">1933</option><option value="1934">1934</option><option value="1935">1935</option><option value="1936">1936</option><option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960" selected="selected">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option></select></div>
                                                </div>
                                                <span class="field-validation-valid" data-valmsg-for="DateOfBirthDay" data-valmsg-replace="true"></span>
                                                <span class="field-validation-valid" data-valmsg-for="DateOfBirthMonth" data-valmsg-replace="true"></span>
                                                <span class="field-validation-valid" data-valmsg-for="DateOfBirthYear" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label required" for="Email" aria-required="true">Email</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" data-val="true" data-val-email="Wrong email" data-val-required="Email is required." id="Email" name="email" type="email" value="{{Auth::user()->email}}">
                                                <span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label" for="Phone" aria-required="true">Phone</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" data-val="true"  id="Phone" name="phone" type="text" value="{{Auth::user()->phone}}">
                                                <span class="field-validation-valid" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode">
                                            <label class="col-lg-3 col-form-label required" for="Username" aria-required="true">Username</label>
                                            <div class="col-lg-9">
                                                <p class="form-control-static">{{Auth::user()->username}}</p>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="content-group">
                                        <legend><span>@lang('checkout.optional')</span></legend>
                                        <div class="form-group row row-hardcode">
                                            <div class="col-lg-9">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('newsletter', 1 , Auth::user()->newsletter ? true : false, array('class' => 'name')) }}
                                                        Newsletter
                                                    </label>
                                                    <span class="field-validation-valid" data-valmsg-for="Newsletter" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row row-hardcode">
                                        <div class="col">
                                            <button type="submit" name="save-info-button" class="btn btn-primary btn-lg save-customer-info-button">
                                                <i class="fa fa-check"></i>
                                                <span>@lang('common.update')</span>
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
        if({{Auth::user()->gender}}){
            radiobtn = document.getElementById("gender-male");
            radiobtn.checked = true;
        }else{
            radiobtn = document.getElementById("gender-female");
            radiobtn.checked = true;
        }
    });
</script>
@endsection
