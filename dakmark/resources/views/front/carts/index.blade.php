@extends('layouts.master') @section('content')
<hr>
<div class="container">
    <div class="row">
        <h1>Giỏ Hàng Của Bạn</h1>
        @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
        @endif @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
        @endif
    </div>

    @if (sizeof(Cart::count()) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Tên Sản Phẩm</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Số Lượng</th>
                <th>Giá Tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $key => $cart)
            <tr>
                <td><a href="{{ $cart->url }}"><img src="{{ $cart->image }}" alt="" class="img-rounded img-inside" style="width:100px; height:100px;"></a></td>
                <td>{{ $cart->productname }}</td>
                <td>$cart->color</td>
                <td>{{$cart->size}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->total}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['front.carts.destroy', $cart->id],'style'=>'display:inline']) !!} {!! Form::submit('Delete',
                    ['class' => 'btn btn-danger']) !!} {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Xem Sản Phẩm Khác</a> &nbsp;
    <a href="#" class="btn btn-success btn-lg">Đặt Hàng</a> -->
    <!-- <div style="float:right">
        <form action="{{ url('/emptyCart') }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-danger btn-lg" value="Xóa Giỏ Hàng">
        </form>
    </div> -->
    @else
    <!-- <h3>@lang('shoppings.cart_noitems')</h3>
    <div>
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Tra Sản Phẩm Khác</a>
    </div> -->
    @endif
</div>
<br> @endsection @section('extra-js')
<script>
    (function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('.quantity').on('change', function () {
        //     var id = $(this).attr('data-id')
        //     $.ajax({
        //         type: "PATCH",
        //         url: '{{ url("/cart") }}' + '/' + id,
        //         data: {
        //             'quantity': this.value,
        //         },
        //         success: function (data) {
        //             window.location.href = '{{ url(' / cart ') }}';
        //         }
        //     });
        // });
    })();
</script>
@endsection