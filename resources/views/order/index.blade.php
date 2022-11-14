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
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Ngày đặt hàng</th>
                                <th style="text-align: center">Tổng tiền</th>
                                <th style="text-align: center">Tình trạng</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key => $item)
                                <tr>
                                    <td style="text-align: center">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 5) + ($key + 1)) : ($key + 1) }}</td>
                                    <td style="text-align: center">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td style="text-align: center">{{number_format($item->total)}}</td>
                                    <td style="text-align: center">
                                        {{$item->status == '0' ? 'Chờ duyệt' : 'Đã xác nhận'}}
                                    </td style="text-align: center">
                                    <td style="text-align: center">
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


