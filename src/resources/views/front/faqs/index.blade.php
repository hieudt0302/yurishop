

@extends('layouts.master')
@section('title','Pô Kô Farms - FAQ')
@section('content')
<!-- Head Section -->
<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>

            <li class="active">FAQ</li>
        </ul>
    </div>
</section>
<div class="container">

  <h2>Câu hỏi thường gặp</h2>

  <div class="row">
    <div class="col-md-12">
      <p class="lead">
        Xin vui lòng tham khảo nội dung dưới cho những vấn đề thường gặp, nếu không đủ hoặc chưa thỏa mãn, vui lòng liên hệ với chúng tôi qua địa chỉ Messenger hoặc Skype ở phía dưới.
      </p>
    </div>
  </div>

  <hr>

  <div class="row">
    <div class="col-md-12">

      <div class="toggle toggle-primary" data-plugin-toggle>
        @foreach ($faqs as $faq)
        <section class="toggle">
          <label>{{$faq->translation->question}}</label>
          <p>{{$faq->translation->answer}}</p>
        </section>
        @endforeach  

      </div>

    </div>

  </div>

</div>
@endsection
