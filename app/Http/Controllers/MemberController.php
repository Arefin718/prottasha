<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Deposit;
use App\Logins;
use App\Sell;
use App\Users;
use App\Member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    public function AddMember(){

        return view('member.addMember');
    }

    public function AddMemberPost(Request $request){
        $member_id=$request->input('member_id');
        $name=$request->input('name');
        $contact=$request->input('contact');
        $current_address=$request->input('caddress');
        $parmanent_address=$request->input('paddress');
        $registration_date=$request->input('reg_date');
        $registration_fee=$request->input('registration_fee');
        $bookissue_date=$request->input('bookissue_date');

        $this
            ->validate($request,[
                'member_id'       =>'required|unique:members,member_id',
                'name'            =>'required',

            ],
                [
                    'name.required'         => 'Please provide name',
                    'member_id.required'         => 'Please provide member id',
                    'member_id.unique'         => 'Please provide unique member id',

                ]);


        $member=new Member();
        $addedBy=session()->get('user');
        $member->member_id           =$member_id;
        $member->name                =$name;
        $member->contact_number      =$contact;
        $member->added_by            =$addedBy->id;
        $member->parmanent_address   =$current_address;
        $member->current_address     =$parmanent_address;
        $member->registration_date   =$registration_date;
        $member->registration_fee    =$registration_fee;
        $member->bookissue_date      =$bookissue_date;

        if($member->save()){
            return redirect()->route('member.memberList');
        }else{
            return 'Sorry! Registration failed.';
        }

    }

    public function MemberList(){
        $members=Member::where('status',1)->get();

        return view('member.memberlist')->with('members',$members);
    }

    public function DeletedMemberList(){
        $members=Member::where('status',0)->get();

        return view('member.deletedMemberlist')->with('members',$members);
    }

    public function MemberDeposit(){
        return view('member.memberDeposit');
    }

    public function MemberDepositPost(Request $request){
        $member_id=$request->input('member_id');
        $member=Member::where('member_id', $member_id)->first();

        $deposit_date=$request->input('deposit_date');
        $amount=$request->input('deposit_amount');
        $addedBy=session()->get('user');

        $deposit=new Deposit();
        $deposit->member_id     =$member->id;
        $deposit->amount        =$amount;
        $deposit->deposit_date  =$deposit_date;
        $deposit->added_by      =$addedBy->id;

        $deposit->save();

        return redirect()->route('member.deposithistory');

    }

    public function DepositHistory(){

        $deposits=Deposit::DepositHistory();

        return view('member.allDepositHistory')->with('deposits',$deposits);
    }

    public function DepositHistoryByID($id){
        $deposits=Deposit::DepositHistoryByID($id);
        $member=Member::GetMemberByID($id);
        $purchases=Sell::GetMemberPurchaseByID($id);

        return view('member.memberDepositDetails',['deposits'=>$deposits,'member'=>$member,'purchases'=>$purchases]);
    }

    public function GetMember(Request $request){
        $member = Member::where('member_id', 'like', $request->id . '%')->get();
        return $member;
    }
    public function SearchMemberFromShop(Request $request){
        $member = Member::SearchMemberFromShop($request->member_id);
        return $member;
    }

    public function EditMember($id){
        $member=Member::find($id)->first();

        return view("member.editMember")->with('member',$member);
    }
    public function EditMemberPost(Request $request){
        $member_id=$request->input('member_id');
        $name=$request->input('name');
        $contact=$request->input('contact');
        $current_address=$request->input('caddress');
        $parmanent_address=$request->input('paddress');



        $this
            ->validate($request,[
                'name'            =>'required',
            ],
                [
                    'name.required'         => 'Please provide name',
                ]);


        $member=Member::where('member_id',$member_id)->first();
        $updatedBy=session()->get('user');

        $member->member_id           =$member_id;
        $member->name                =$name;
        $member->contact_number      =$contact;
        $member->updated_by          =$updatedBy->id;
        $member->parmanent_address   =$current_address;
        $member->current_address     =$parmanent_address;

        $member->save();
        return redirect('/member/memberlist');


    }

    public function ChangeMemberStatus(Request $request){
        $member = Member::find($request->id);
        $updatedBy=session()->get('user');
        if($member->status==0){
            $member->status=1;
        }
        else if($member->status==1){
            $member->status=0;
        }
$member->updated_by =   $updatedBy->id;
        $member->save();

        return "Status Changed";
    }
}
