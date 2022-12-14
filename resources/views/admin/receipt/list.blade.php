@extends('admin.main')

@section('content')

<form action="{{url('admin/receipts/add')}}" method="POST">
{{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="form-group">
                    <label>Nhà cung cấp</label>
                    <select class="form-control" name="supplier_id">
                        <option value="0"> Nhà cung cấp </option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
    <button type="submit" class="btn btn-success text-white">Tao phieu nhap kho</button>
</form>

<table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Ngày tạo</th>
                                <th style="text-align: center">Người tạo</th>
                                <th style="text-align: center">Nhà cung cấp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receipts as $index => $receipt)
                                <tr>
                                <td style="text-align: center">
                                    <div class="">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 4) + ($index + 1)) : ($index + 1) }}</div>
                                    </td>
                                    <td style="text-align: center">{{ date('d-m-Y', strtotime($receipt->created_at)) }}</td>

                                    
                                    <td style="text-align: center">
                                        {{ $receipt->user->name}}
                                    </td>
                                    <td style="text-align: center">
                                    {{ $receipt->supplier->name ?? 'None' }}
                                    </td>
                                    <td style="text-align: center">
                                    <a href="{{ url('admin/view-receipt/'.$receipt->id) }}"class="btn btn-primary">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
        {!! $receipts->links() !!}
    </div>
@endsection


