<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReceiptDetail;
use App\Models\Receipt;
use App\Models\Supplier;

use App\Models\Product;



class ReceiptDetailController extends Controller
{
    public function testt(Request $request)
    {
        $receiptDetail = new ReceiptDetail();
        $receiptDetail->product_id = $request->input('product_id');
        $receiptDetail->receipt_id = $request->input('receipt_id');
        $receiptDetail->qty = $request->input('qty');
        $receiptDetail->import_price = $request->input('import_price');
        $receiptDetail->total = $request->input('qty') * $request->input('import_price');

        $products = Product::where('id',$receiptDetail->product_id)->get();
        foreach($products as $product) {
            $product->update([
                'qty' => $product->qty + $receiptDetail->qty,
                'price'=> $receiptDetail->import_price * 20/100,
            ]);
        }
        
    
        $receiptDetail->save();

        $receipts = Receipt::get();
        $suppliers = Supplier::get();
        return view('admin.receipt.list', [
           'title' => 'Danh sach phiếu nhập kho',
           'receipts' => $receipts,
           'suppliers' => $suppliers,
        ]);
    }
}
