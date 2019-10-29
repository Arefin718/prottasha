<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Logins;
use App\Product;
use App\Purchase;
use App\Types;
use App\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function NewPurchase($id){
        $product=Product::find($id);
       return view('inventory.purchase.newPurchase')->with('product',$product);

    }
    public function NewPurchasePost(Request $request){
        $id=$request->input('product_table_id');
        $product_id=$request->input('product_id');
        $product_name=$request->input('product_name');

        $added_quantity=$request->input('p_quantity');
        $buying_price=$request->input('buying_price');
        $selling_price=$request->input('selling_price');

        $added_by=Session::get('user');
        $product=Product::find($id);
        $purchase=new Purchase();

        $purchase->product_id = $id;
        $purchase->added_quantity = $added_quantity;
        $purchase->buying_price = $buying_price;
        $purchase->selling_price = $selling_price;
        $purchase->added_by = $added_by->id;

        $product->buying_price=$buying_price;
        $product->selling_price=$selling_price;

        $purchase->save();
        $product->save();

        return redirect()->route('purchase.purchaselist');

    }

    public function PurchaseList(){
        $purchases=Purchase::GetPurchaseList();
        //return view('inventory.purchase.test')->with('purchases',$purchases);
        return view('inventory.purchase.purchaseList')->with('purchases',$purchases);
    }

    public function DeletePurchase(Request $request){
        $purchase = Purchase::find($request->purchase_id);
        $updatedBy=session()->get('user');
        if($purchase->status==0){
            $purchase->status=1;
        }
        else if($purchase->status==1){
            $purchase->status=0;
        }
        $purchase->updated_by =   $updatedBy->id;
        $purchase->save();

        return "Status Changed";
    }

    public function EditPurchase($id){

        $purchases=Purchase::FindPurchaseByID($id);
        return view('inventory.purchase.editPurchase')->with('purchases',$purchases);

    }
    public function EditPurchasePost(Request $request){
        $purchase_id=$request->input('purchase_id');

        $id=$request->input('product_table_id');
        $product_id=$request->input('product_id');
        $product_name=$request->input('product_name');

        $added_quantity=$request->input('p_quantity');
        $buying_price=$request->input('buying_price');
        $selling_price=$request->input('selling_price');

        $updated_by=Session::get('user');
        $product=Product::find($id);
        $purchase=Purchase::find($purchase_id);

        $purchase->product_id = $id;
        $purchase->added_quantity = $added_quantity;
        $purchase->buying_price = $buying_price;
        $purchase->selling_price = $selling_price;
        $purchase->added_by = $updated_by->id;

        $product->buying_price=$buying_price;
        $product->selling_price=$selling_price;
        $purchase->save();
        $product->save();
        return redirect()->route('purchase.purchaselist');

    }
}
