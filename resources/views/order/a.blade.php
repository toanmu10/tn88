@extends('main')

@section('content')
<div class="container" style="margin-top:100px ; margin-bottom: 100px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Chi tiết đơn hàng</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Họ tên</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="">SDT</label>
                            <div class="border p-2">{{$orders->phone_number}}</div>
                            <label for="">Địa chỉ</label>
                            <div class="border p-2">{{$orders->address}}</div>
                        </div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->orderDetails as $item)
                                <tr>
                                    <td>{{ $item->products->name}}</td>
                                    <td>{{ $item->price}}</td>
                                    <td>{{ $item->qty}}</td>
                                    <td><img src="{{ $item->products->thumb}}" width="50px" alt=""></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>
                        Tổng tiền : {{ $orders->total }}
                    </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


