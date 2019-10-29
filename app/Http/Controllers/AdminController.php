<?php

namespace App\Http\Controllers;
use App\Admins;
use App\Logins;
use App\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


public function AddAdmin(){
        $user=session()->get('user');
        if($user->type=="Admin"){
                    return view('admin.addAdmin');
            }
    }

public function AddAdminPost(Request $request){
        $name=$request->input('name');
        $contact=$request->input('contact');
        $email=$request->input('email');
        $password=$request->input('password');
        $current_address=$request->input('caddress');
        $parmanent_address=$request->input('paddress');

        $this
            ->validate($request,[
                'name'       =>'required',
                'email'      =>'required|email|unique:users,email',
                'password'   =>'required|min:5|max:15',
                'cnpassword' =>'required|min:5|max:15|same:password'
            ],
                [
                    'name.required'         => 'Please provide name',
                    'email.required'        => 'You must Provide an email address',
                    'email.email'           => 'You must Provide an email address',
                    'email.unique'          => 'This email already exist ',
                    'password.required'     => 'Please provide your Password',
                    'cnpassword.required'   => 'Please provide your Password again',
                    'cnpassword.same'       => 'Password and confirm password does not match',
                ]);

        $admin=new Users();
        $addedBy=session()->get('user');
        $admin->name                =$name;
        $admin->email               =$email;
        $admin->password            =$password;
        $admin->type                ="Admin";
        $admin->added_by            =$addedBy->id;
        $admin->parmanent_address   ="";
        $admin->current_address     ="";

        if($admin->save()){
            return redirect()->route('admin.adminList');
        }else{
            return 'Sorry! Registration failed.';
        }
    }



public function AdminList(){
    	$user=session()->get('user');
    	if($user->type=="Admin"){

            $admins= DB::select("
                SELECT users.*, logins.created_at as last_login FROM users  LEFT JOIN logins ON logins.user_id = users.id WHERE logins.created_at= ( SELECT MAX(created_at) FROM logins WHERE user_id = users.id ) AND users.type LIKE 'Admin'AND users.status NOT LIKE 0
                ");

           return view('admin.admins')->with('admins',$admins);
            }else{
                  return redirect()->route('home');
            }
    }


public function AddEmployee(){
        $user=session()->get('user');
        if($user->type=="Admin"){
                    return view('admin.addEmployee');
            }
    }

public function AddEmployeePost(Request $request){
        $name=$request->input('name');
        $contact=$request->input('contact');
        $email=$request->input('email');
        $password=$request->input('password');
        $current_address=$request->input('caddress');
        $parmanent_address=$request->input('paddress');
        $type=$request->input('type');


        $this
            ->validate($request,[
                'name'       =>'required',
                'email'      =>'required|email|unique:users,email',
                'password'   =>'required|min:5|max:15',
                'cnpassword' =>'required|min:5|max:15|same:password'
            ],
                [
                    'name.required'         => 'Please provide name',
                    'email.required'        => 'You must Provide an email address',
                    'email.email'           => 'You must Provide an email address',
                    'email.unique'          => 'This email already exist ',
                    'password.required'     => 'Please provide your Password',
                    'cnpassword.required'   => 'Please provide your Password again',
                    'cnpassword.same'       => 'Password and confirm password does not match',
                ]);

        $admin=new Users();
        $addedBy=session()->get('user');
        $admin->name                =$name;
        $admin->contact_number      =$contact;
        $admin->email               =$email;
        $admin->password            =$password;
        $admin->type                =$type;
        $admin->added_by            =$addedBy->id;
        $admin->parmanent_address   =$parmanent_address;
        $admin->current_address     =$current_address;

        if($admin->save()){
            return redirect()->route('admin.employeeList');
        }else{
            return 'Sorry! Registration failed.';
        }
    }

public function EmployeeList(){
    	$user=session()->get('user');
        
    	if($user->type=="Admin"){
                 $employees= Users::GetActiveEmployees();

                    return view('admin.employees')->with('employees',$employees);
            }else{
                  return redirect()->route('home');
            }
    }
    public function DeletedEmployeeList(){
        $user=session()->get('user');

        if($user->type=="Admin"){
            $employees= Users::GetDeletedEmployees();

            return view('admin.deletedEmployees')->with('employees',$employees);
        }else{
            return redirect()->route('home');
        }
    }

public function LoginHistory(){
    	$user=session()->get('user');
    	if($user->type=="Admin"){

            $login=DB::table('logins')
            
            ->join('users', 'users.id', '=', 'logins.user_id')
            ->select(DB::raw('DATE_FORMAT(logins.created_at, "%W %M %e %Y %r") as created_at'), 'logins.id','logins.user_id','logins.user_name', 'users.type')
            
            ->orderBy('id', 'DESC')
            ->get();
         //   return $login;
            //return $login;
        return view('admin.loginHistory')->with('logins',$login);
                    //return view('admin.loginHistory');
            }
    }

public function ChangeEmployeeStatus(Request $request){
        $employee = Users::find($request->id);
        $deletedBy=session()->get('user');
        if($employee->status==0){
            $employee->status=1;
        }
        else if($employee->status==1){
            $employee->status=0;
        }
        $employee->deleted_by = $deletedBy->id;
        $employee->save();

        return "Status Changed";
    }



}
