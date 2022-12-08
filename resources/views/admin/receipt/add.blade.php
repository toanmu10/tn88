@extends('admin.main')

@section('content')

<form action="{{url('admin/receipt-detail/testt')}}" method="POST">
@csrf
    <div class="card-body">
        <div class="row">
        <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label>Sản phẩm</label>
                        <select class="form-control" name="category_id">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category">Giá nhập</label>
                        <input type="number" name="price" value=""  class="form-control" >
                    </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                    <label>Số lượng </label>
                    <input type="number" name="qty" value=""  class="form-control" >
                </div>
                </div>

        </div> -->
        <table class="table" id="table">
            <thead>
                <tr>
                    <th style="text-align: center">STT</th>
                    <th style="text-align: center">Tên Sản Phẩm</th>
                    <th style="text-align: center">Số lượng</th>
                    <th style="text-align: center">Giá nhập</th>
                    <th style="text-align: center">Thành tiền</th>
                    <th style="text-align: center">Hành động</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                <tr>
                    <td style="text-align: center">1</td>
                    <td>
                        <select class="form-control" name="product_id">
                            <option value="0"> Chọn sản phẩm </option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty" min="1" max="1000" />
                    </td>
                    <td>
                        <input type="text" name="import_price" />
                    </td>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                    @foreach($receipts as $receipt)
                    <input type="hidden" name="receipt_id" value="{{$receipt->id}}" />
                    @endforeach
                    <td>
                        <div style="font-family: 'Roboto', sans-serif; margin-top:30px">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    <button type="submmit">Lưu</button>
</form>
<!-- <button type="button" onclick="myFunction()">Try it</button>
<script>
    function myFunction() {
    var table = document.getElementById("tablebody");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = `1`;
    cell2.innerHTML = `<select class="form-control" name="product_id">
                            <option value="0"> Chọn sản phẩm </option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>`;
    cell3.innerHTML = ` <input type="number" name="qty" min="1" max="1000" />`;
    cell4.innerHTML = `<input type="text" name="import_price" />`;
    }
</script> -->
@endsection




