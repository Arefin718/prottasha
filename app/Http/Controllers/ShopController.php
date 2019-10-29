<?php

namespace App\Http\Controllers;
use App\Admins;
use App\Product;
use App\Sell;
use App\SellDetail;
use App\Shop;
use app\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;
use function Sodium\add;

class ShopController extends Controller
{
    public function Invoice(){
        return view('shop.invoice');
    }




    public function ShopPost(Request $request){
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $unit_price = $request->input('selling_price');
        $total_price = $request->input('total_price');

        $invoice_number=$request->input('invoice_number');
        $sub_amount=$request->input('sub_amount');
        $vat=$request->input('vat');
        $discount=$request->input('discount');
        $total_amount=$request->input('total_amount');

        $payment_type=$request->input('payment_type');
        $payment_amount=$request->input('payment_amount');
        $due_amount=$request->input('due_amount');
       // $return_amount=$request->input('return_amount');

        $member_id=$request->input('member_id');
        $customer_name=$request->input('customer_name');
        $customer_contact=$request->input('customer_contact');


        $sell=new Sell();

        $sell->invoice_number   =$invoice_number;

        $sell->sub_amount   =$sub_amount;
        $sell->vat   =$vat;
        $sell->discount   =$discount;
        $sell->total_amount   =$total_amount;

        $sell->payment_type   =$payment_type;
        $sell->payment_amount   =$payment_amount;
        $sell->payment_due   =$due_amount;
        $sell->member_id   =$member_id;
        $sell->customer_name   =$customer_name;
        $sell->customer_contact   =$customer_contact;

        $sell->save();



        for ($i = 0; $i < count($product_id); $i++) {
            $sell_detail=new SellDetail();
            $sell_detail->invoice_number   =$invoice_number;
            $sell_detail->product_id   =$product_id[$i];
            $sell_detail->quantity   =$quantity[$i];
            $sell_detail->unit_price   =$unit_price[$i];
            $sell_detail->total_price   =$total_price[$i];;


            $sell_detail->save();

        }
        $bills=SellDetail::Bill($sell->invoice_number);

 return view('shop.invoice',['bills'=>$bills,'sell'=> $sell]);
    }

    public function SellList(){
$sells = Sell::orderBy('id','desc')->get();
$user = Session::get('user');

return view ('shop.sellList',['sells'=>$sells,'user'=>$user]);
    }

    public function ShopDetailsByInvoice(Request $request){
        $shop_details=Shop::ShopDetails($request->invoice_number);

        return $shop_details;
    }

}
