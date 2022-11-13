@extends('main')

@section('content')
<div class="container" style="margin-top:100px; margin-bottom: 300px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Đơn hàng</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                        {{$item->status == '0' ? 'Chờ duyệt' : 'Đã xác nhận'}}
                                    </td>
                                    <td>
                                        <a href="{{ url('view-order/'.$item->id) }}"class="btn btn-primary">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


