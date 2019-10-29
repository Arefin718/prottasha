<?php

namespace App\Http\Controllers;
use App\Admins;
use App\Logins;
use App\Product;
use App\Purchase;
use App\Sell;
use App\Types;
use App\Users;
use App\Invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\New_;


class UserController extends Controller
{



public function UserLogin(){
    $message="";
 	if (session()->has('user')) {
             return redirect()->route('home');
        }else{
          
        return view('login',['message'=>$message]);
        }
        
    }

public function Login(Request $request){


    $email_or_number= $request->input('email');
        $password=$request->input('password');

        $userDb = Users::where('email', '=', $email_or_number)->orwhere('contact_number','=',$email_or_number)->first();
        $message="";

        if($userDb==null){
            $message="Email doesn't exist";
            return view('login',['message'=>$message]);
        }else {

            if($password == $userDb->password){
                session(['user' => $userDb]);

                $login=new Logins();
                $login->user_id=$userDb->id;
                $login->user_name=$userDb->name;
               // $login->created_at->timezone('Asia/Dhaka')->format('H:i');

                $login->save();

                if($userDb->status ==0){
                $message = "Your account has been blocked. please contact with author";
               // return $message;
                return view('login', ['message' => $message]);
                }

                return redirect()->route('home');
            }else {
                $message = "Email or Password is wrong";
                return view('login', ['message' => $message]);
            }
        }
        
    }

public function Home(){
        return view('home');
    }
public function Dashboard(){
        $user=session()->get('user');
           if($user->type=="Admin"){
                    return view('admin.home')->with('user',$user);
            }
            if($user->type=="Manager"){
                    return view('manager.home')->with('user',$user);
            }

            if($user->type=="sales"){
                    return view('sales.home')->with('user',$user);
            }
   
    }
public function Member(){
        return view('member.home');

    }
public function Inventory(){
        return view('inventory.home');

    }
public function Shop(){
        $currentInvoiceNumber=$this->CurrentInvoiceNumber();

        
        return view('shop.home',['invoice_number'=>$currentInvoiceNumber]);

    }

    public function CurrentInvoiceNumber(){
        $current_invoice;
        $next_invoice;
        $current_date = date('Ymd');
        $invoice=Invoice::orderBy('id', 'desc')->first();
        if($invoice==null || $invoice->status==0){
         $id=1;
         $current_invoice=$current_date . '-' . $id;
         $newInvoiceCreate=New Invoice();
            $newInvoiceCreate->invoice_number=$current_invoice;
            $newInvoiceCreate->status=0;
            $newInvoiceCreate->save();
            $nextInvoiceCreate=new Invoice();
            $id+=1;
            $next_invoice=$current_date . '-' . $id;
            $nextInvoiceCreate->invoice_number=$next_invoice;
            $nextInvoiceCreate->status=1;
            $nextInvoiceCreate->save();

        }else{
            $current_invoice=$invoice->invoice_number;
            $invoice->status=0;
            $invoice->save();
            $expNum = explode('-', $invoice->invoice_number);
            $id=(int) $expNum[1]+1;
            $next_invoice=$current_date . '-' . $id;
            $nextInvoiceCreate=new Invoice();
            $nextInvoiceCreate->invoice_number=$next_invoice;
            $nextInvoiceCreate->status=1;
            $nextInvoiceCreate->save();


        }

        return $current_invoice;
    }





public function UserDetails($id){
     $user=DB::select("SELECT u.*,a.id as added_id, a.name as added_name FROM users u INNER JOIN users a ON a.id = u.added_by WHERE u.id=$id
                ");
//return $user;
        return view('user.userDetails')->with('users',$user);
    }
public function UserProfile(){
     $user=session()->get('user');
    
        return view('user.profile')->with('user',$user);
    }

public function ProfileEdit(){
    $user=session()->get('user');
    $message="";
        return view('user.profileEdit',['user'=>$user,'message'=>$message]);
    }
public function ProfileEditPost(Request $request){
        $userEmail = $request->input('email');
        if($userEmail != $request->session()->get('user.email') )
        {
             $this->validate($request,[
        
            'email'=>'required|email|unique:users,email'
            
            
        ]);
        }
       
        $user=Users::find($request->session()->get('user.id'));

        if($user !=null){
            $user->name=$request->input('name');
            $user->email=$request->input('email');

            $user->current_address=$request->input('caddress');
            $user->parmanent_address=$request->input('paddress');
            $user->contact_number=$request->input('contact');
            $user->save();
             $userDB= Users::find($user->id);
             session(['user' => $userDB]);
            return redirect()->route('user.profile');

        }else{
        return view('user.profileEdit',['user'=>$user, 'message'=>'not updated']);
        }

    }

public function ChangePassword(){
    $error="";
        return view('user.changePassword')->with('error',$error);
    }
public function ChangePasswordPost(Request $request){

        $this->validate($request,[
            'oldPass'    =>'required',
            'newPassword'   =>'required',
            'confirmPassword'=>'required|same:newPassword'

        ]);
        $oldPass = $request->input('oldPass');

        $user=Users::where('id', '=', $request->session()->get('user.id'))->first();

        if($oldPass == $user->password){
            $newPass = $request->input('newPassword');
            $user->password=$newPass;

            $user->save();
            session(['user' => $user]);
            return redirect()->route('dashboard');
        }else{
            $error="Old Password is not correct";
            return view('user.changePassword')->with('error',$error);

        }

    }

public function MyLoginHistory(Request $request){
    $logins=Logins::where('user_id','=',$request->session()->get('user.id'))
        ->orderby('created_at', 'DESC')
        ->get();
    return view('user.myLoginHistory')->with('logins',$logins);
    }

public function logOut(){
        session()->forget('user');
        return redirect()->route('userLogin');
    }

}
