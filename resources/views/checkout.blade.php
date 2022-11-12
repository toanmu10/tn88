@extends('main')
  
@section('content')

<table id="cart" class="table table-hover table-condensed" style="margin-top:150px; width: 70%; margin-left: 12%; margin-right: 15%">
    <thead>
        <tr">
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua</a>
                <button class="btn btn-success text-white"><a href="{{ url('checkout') }}" style="color:white">Đặt hàng</a></button>
            </td>
        </tr>
    </tfoot>
</table>

<div style="margin-top:150px; width: 70%; margin-left: 12%; margin-right: 15%">
    <h4>Thông tin đặt hàng</h4>
    <form method="POST" action="{{ url('place-order')}}">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="name" placeholder="Name" value="" style="margin-top: 20px" />
        <input type="text" class="form-control" name="email" placeholder="Email" style="margin-top: 20px" />
        <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" style="margin-top: 20px" />
        <input type="text" class="form-control" name="address" placeholder="Address" style="margin-top: 20px" />
        <input type="text" class="form-control" name="message" placeholder="Message" style="margin-top: 20px" />
        <input type="hidden" class="form-control" name="total" />
        <button type="submit" style="margin-top: 20px" class="btn btn-success">Submit</button>
    </form>
</div>



@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection