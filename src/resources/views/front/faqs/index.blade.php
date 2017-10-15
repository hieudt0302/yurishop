

@extends('layouts.master')
@section('title','Dakmark Foods - FAQ')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<!-- Head Section -->
            <section class="small-section bg-dark-alfa-30 pt-30 pb-30" data-background="images/full-width-images/section-bg-6.jpg">
                <div class="relative container align-left">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">FAQ</h1>
                        </div>
                        
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="#">Home</a>&nbsp;/&nbsp;<span>FAQ</span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section -->
            
            
            <!-- Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <div class="row section-text">
                        <div class="col-md-8 col-md-offset-2">
                            
                            <!-- Accordion -->
                            <dl class="accordion">

                                @foreach ($faqs as $faq)
                                <dt>
                                    <a href="">{{$faq->question}}</a>
                                </dt>
                                <dd>
                                    {{$faq->answer}}
                                </dd>
                                @endforeach

                            </dl>
                            <!-- End Accordion -->                           
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Section -->
@endsection
