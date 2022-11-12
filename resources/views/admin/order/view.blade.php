@extends('admin.main')

@section('content')
<div class="container" style="margin-top:50px ; margin-bottom: 50px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                    <h4 class="px-2">
                        Total : {{ $orders->total }}
                    </h4>
                    <div class="mt-5 px-2">
                        <label for="">Tình trạng đơn hàng</label>
                    <form action="{{ url('admin/update-order/'.$orders->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        <select class="form-select" name="order_status">
                            <option selected>Mở</option>
                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Chưa duyệt</option>
                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Đã duyệt</option>
                        </select>
                        <button type="submit" class="btn btn-primary float-end mt-3">Sửa</button>
                        </form>
                        
                    </div>
                    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


