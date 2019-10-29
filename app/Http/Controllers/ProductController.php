<?php

namespace App\Http\Controllers;
use App\Admins;
use App\Logins;
use App\Product;
use App\Purchase;
use App\Sell;
use App\Types;
use App\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class ProductController extends Controller
{
    public function AddNewProduct(){
        $types=Types::all();
        return view('inventory.product.addNewProduct')->with('types',$types);
    }
    public function AddNewProductPost(Request $request){

        $product_id=$request->input('product_id');
        $product_name=$request->input('product_name');
        $product_description=$request->input('p_description');
        $product_type=$request->input('p_type');
        $start_quantity=$request->input('p_quantity');
        $buying_price=$request->input('buying_price');
        $selling_price=$request->input('selling_price');



        $this
            ->validate($request,[
                'product_id'       =>'required|unique:products,product_id',
                'product_name'      =>'required',

            ],
                [
                    'product_id.required'         => 'Please provide product id',
                    'product_id.unique'          => 'This product id already exist ',
                    'product_name.required'         => 'Please provide product name',
                ]);

        $product=new Product();
        $addedBy=Session::get('user');
        $product->product_id            =$product_id;
        $product->product_name          =$product_name;
        $product->product_description   =$product_description;
        $product->product_type          =$product_type;

        $product->start_quantity        =$start_quantity;
        $product->buying_price          =$buying_price;
        $product->selling_price         =$selling_price;
        $product->added_by              =$addedBy->id;
        $product->save();

        return redirect()->route('product.productlist');

    }

    public function ProductList(){

        $products=Product::where('status','=','1')->get();

        return view('inventory.product.productList')->with('products',$products);
    }

    public function GetProducts(Request $request){
        $products = Product::where('status','=','1')
            ->where('product_name','like','%'.$request->keyword . '%')
            ->orwhere('product_id','like','%'.$request->keyword . '%')

            ->get();


        return $products;
    }

    public function DeleteProduct(Request $request){
        $product = Product::find($request->product_id);
        $updatedBy=session()->get('user');
        if($product->status==0){
            $product->status=1;
        }
        else if($product->status==1){
            $product->status=0;
        }
        $product->updated_by =   $updatedBy->id;
        $product->save();

        return "Status Changed";
    }

    public function ProductDetails($id){
        $purchaseDetails=Purchase::where('product_id','=',$id)->get();
        $totalPurchase=Purchase::TotalPurchaseByProductID($id);

        $productDetails=Product::GetProductByID($id);

       return view('inventory.product.productDetails',['products'=>$productDetails,'purchases'=>$purchaseDetails,'total_purchase'=>$totalPurchase]);
    }

    public function ProductEdit($id){
        $product=Product::find($id);
        $types=Types::all();
       // return $product;
       // return view('inventory.product.productEdit')->with('product',$product);
        return view('inventory.product.productEdit',['product'=>$product,'types'=>$types]);
    }
    public function ProductEditPost(Request $request){

        $product_id=$request->input('product_id');
        $product_name=$request->input('product_name');
        $product_description=$request->input('p_description');
        $product_type=$request->input('p_type');

        $available_quantity=$request->input('p_quantity');
        $buying_price=$request->input('buying_price');
        $selling_price=$request->input('selling_price');


        $this
            ->validate($request,[

                'product_name'      =>'required',

            ],
                [

                    'product_name.required'         => 'Please provide product name',
                ]);

        $product=Product::where('product_id','=',$product_id)->first();
        $updatedBy=Session::get('user');
        $product->product_id            =$product_id;
        $product->product_name          =$product_name;
        $product->product_description   =$product_description;
        $product->product_type          =$product_type;
        $product->available_quantity    =$available_quantity;
        $product->buying_price          =$buying_price;
        $product->selling_price         =$selling_price;
        $product->updated_by            =$updatedBy->id;
        $product->save();

        return redirect()->route('product.productdetails', ['id' => $product->id]);

    }

    public function AddProductType(){
        return view('inventory.product.addProductType');
    }
    public function AddProductTypePost(Request $request){
        $product_type=$request->input('product_type');

        $this
            ->validate($request,[
                'product_type'       =>'required|unique:types,product_type',
            ],
                [
                    'product_type.required'         => 'Please provide product type',
                    'product_type.unique'          => 'This product type already exist ',
                ]);

        $updated_by=Session::get('user.id');
        $type=New Types();
        $type->product_type  =$product_type;
        $type->updated_by    =$updated_by;
        $type->save();
        return $type;
        return redirect()->route('product.producttypelist');
    }

    public function ProductTypeList(){
        $types=Types::all();
        return view('inventory.product.productTypeList')->with('types',$types);
    }

    public function EditProductType($id){
        $type=Types::find($id);

        return view('inventory.product.editProductType')->with('type',$type);
    }
    public function EditProductTypePost(Request $request){
        $type_id=$request->input('product_type_id');
        $product_type=$request->input('product_type');
        $updated_by=Session::get('user.id');
        $type=Types::find($type_id);

        $type->product_type  =$product_type;
        $type->updated_by    =$updated_by;
        $type->save();
       // return $type;

        return redirect()->route('product.producttypelist');

    }


    public function SearchProductFromShop(Request $request){
        $products = Product::SearchProductFromShop($request->keyword);

        return $products;
    }

}
