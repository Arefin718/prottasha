<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// All Users Group
Route::group(['middleware' => 'UserLoginCheck'], function (){
    Route::get('/home', 'UserController@Home')->name('home');
    Route::get('/inventory', 'UserController@Inventory')->name('inventory');

    //User related Routes
    Route::get('/user/profile', 'UserController@UserProfile')->name('user.profile');

    Route::get('/user/profile/edit', 'UserController@ProfileEdit')->name('user.profileEdit');
    Route::post('/user/profile/edit', 'UserController@ProfileEditPost');
    Route::get('/user/changepassword', 'UserController@ChangePassword')->name('user.changePassword');
    Route::post('/user/changepassword', 'UserController@ChangePasswordPost');
    Route::get('/user/myloginhistory', 'UserController@MyLoginHistory')->name('user.myLoginHistory');

    //Member related Routes
    Route::get('/member', 'UserController@Member')->name('member.home');
    Route::get('/member/memberlist', 'MemberController@MemberList')->name('member.memberlist');
    Route::get('/member/deletedmemberlist', 'MemberController@DeletedMemberList')->name('member.deletedmemberlist');
    Route::get('/member/getmember', 'MemberController@GetMember')->name('member.getMember');
    Route::get('/member/searchmemberfromshop', 'MemberController@SearchMemberFromShop')->name('member.membershop');

    Route::get('/member/addmember', 'MemberController@AddMember')->name('member.addmember');
    Route::post('/member/addmember', 'MemberController@AddMemberPost');

    Route::get('/member/deposit', 'MemberController@MemberDeposit')->name('member.deposit');
    Route::post('/member/deposit', 'MemberController@MemberDepositPost');

    Route::get('/member/deposit/history/{id}', 'MemberController@DepositHistoryByID')->name('member.deposithistorybyid');
    Route::get('/member/deposit/alldeposits', 'MemberController@DepositHistory')->name('member.deposithistory');
    Route::get('/member/edit/{id}', 'MemberController@EditMember')->name('member.editmember');
    Route::post('/member/edit/{id}', 'MemberController@EditMemberPost');
    Route::post('/member/changestatus', 'MemberController@ChangeMemberStatus');

    //Product related Routes
    Route::get('/product/addnewproduct', 'ProductController@AddNewProduct')->name('product.addnewproduct');
    Route::post('/product/addnewproduct', 'ProductController@AddNewProductPost');

    Route::get('/product/productlist', 'ProductController@ProductList')->name('product.productlist');
    Route::get('/product/productdetails/{id}', 'ProductController@ProductDetails')->name('product.productdetails');
    Route::get('/product/productedit/{id}', 'ProductController@ProductEdit')->name('product.productedit');
    Route::post('/product/productedit/{id}', 'ProductController@ProductEditPost');

    Route::get('/product/getproducts', 'ProductController@GetProducts')->name('product.getproduct');
    Route::post('/product/deleteproduct', 'ProductController@DeleteProduct');

    Route::get('/product/addproducttype', 'ProductController@AddProductType')->name('product.addproducttype');
    Route::post('/product/addproducttype', 'ProductController@AddProductTypePost');

    Route::get('/product/producttypelist', 'ProductController@ProductTypeList')->name('product.producttypelist');

    Route::get('/product/editproducttype/{id}', 'ProductController@EditProductType')->name('product.editproducttype');
    Route::post('/product/editproducttype/{id}', 'ProductController@EditProductTypePost');

    Route::get('/product/searchproduct', 'ProductController@SearchProductFromShop')->name('product.searchproductfromshop');
    //Inventory Purchase Routes
    Route::get('/purchase/newpurchase/{id}', 'PurchaseController@NewPurchase')->name('purchase.newpurchase');
    Route::post('/purchase/newpurchase/{id}', 'PurchaseController@NewPurchasePost');

    Route::get('/purchase/editpurchase/{id}', 'PurchaseController@EditPurchase')->name('purchase.editpurchase');
    Route::post('/purchase/editpurchase/{id}', 'PurchaseController@EditPurchasePost');

    Route::get('/purchase/purchaselist', 'PurchaseController@PurchaseList')->name('purchase.purchaselist');
    Route::post('/purchase/deletepurchase', 'PurchaseController@DeletePurchase');

    //Shop Routes
    Route::get('/shop', 'UserController@Shop')->name('shop');
    Route::post('/shop', 'ShopController@ShopPost')->name('shop.post');

    Route::get('/shop/invoice', 'ShopController@Invoice')->name('invoice');
    Route::get('/shop/details', 'ShopController@ShopDetailsByInvoice')->name('shop.details');
    Route::get('/shop/selllist', 'ShopController@SellList')->name('shop.selllist');





});


//Admin Group
Route::group(['middleware' => 'AdminLoginCheck'], function (){

    Route::get('/Admin/dashboard', 'UserController@Dashboard')->name('dashboard');
    Route::get('/admin/admins', 'AdminController@AdminList')->name('admin.adminList');
    Route::get('/admin/employees', 'AdminController@EmployeeList')->name('admin.employeeList');
    Route::get('/admin/deltedemployees', 'AdminController@DeletedEmployeeList')->name('admin.deletedemployeelist');
    Route::get('/admin/loginhistory', 'AdminController@LoginHistory')->name('admin.loginHistory');

    Route::get('/admin/addadmin', 'AdminController@AddAdmin')->name('admin.addAdmin');
    Route::post('/admin/addadmin', 'AdminController@AddAdminPost');

    Route::get('/admin/addemployee', 'AdminController@AddEmployee')->name('admin.addEmployee');
    Route::post('/admin/addemployee', 'AdminController@AddEmployeePost');
    Route::post('/admin/deleteemployee', 'AdminController@ChangeEmployeeStatus')->name('admin.deleteEmployee');

    Route::get('/user/details/{id}', 'UserController@UserDetails')->name('user.details');
    Route::get('/report/sells', 'ReportController@SellReportAll')->name('report.sell');
    Route::get('/report/sellbyrange', 'ReportController@SellReportByRange')->name('report.sellrange');






//Route::get('/user/delete/{id}', 'AdminController@DeleteUser')->name('home');
//Route::post('/user/delete/{id}', 'AdminController@DeleteUserPost');
});

// All Users Group
Route::group(['middleware' => 'SalesLoginCheck'], function (){
    Route::get('/sales/dashboard', 'UserController@Dashboard')->name('dashboard');
});

Route::group(['middleware' => 'ManagerLoginCheck'], function (){
    Route::get('/manager/dashboard', 'UserController@Dashboard')->name('dashboard');
});








//Login Route
Route::get('/', function () {
 return redirect('login');
});

Route::get('/login', 'UserController@UserLogin')->name('userLogin');
Route::post('/login','UserController@Login');


 Route::get('/logout','UserController@Logout')->name('logout');
//User
