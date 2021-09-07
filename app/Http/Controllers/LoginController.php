<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
   public function index()
   {
       return view('login',['name' => request('name')]);
   }

   public function login(Request $request)
   {
      //dd($request->all());
      $user = User::where('cUsername',$request->username)->firstOrFail();
      // $user = DB::table('bsr_usertypemember')
      // ->join('bsr_users', 'bsr_usertypemember.nUserId', '=', 'bsr_users.id')
      // ->join('bsr_usertype', 'bsr_usertypemember.nUserTypeId', '=', 'bsr_usertype.nUserTypeId')
      
      // ->select('bsr_users.*','bsr_users.cPassword', 'bsr_usertype.cUserTypeName')
      // ->where('bsr_users.cUsername',$request->username)
      // ->get();
      if($user)
       {
           if(Hash::check($request->password, $user->cPassword))
           {
             session(['session_username'=>$user->Fullname]);
             session(['userid'=>$user->id]);
             session(['session_foto'=>$user->filepic]);
             session(['status_login'=>'loginberhasil']);
             session(['usertype'=>$user->cAdmin]);
            
             if($user->cAdmin==3)
             {
              return redirect()->to('membercompany/'); 
             }
             elseif($user->cAdmin==4)
             {
              return redirect()->to('membercompany/'); 
             }
             elseif($user->cAdmin==5)
             {
              return redirect()->to('membercompanybuilding/'); 
             }
              elseif($user->cAdmin==6)
             {
              return redirect()->to('Dhasboard/')->with('message', 'Silahkan isi biodata diri lengkap anda! Abaikan jika sudah mengisi.'); 
             }
             else{
              return redirect()->to('admin/'); 
             }
            
           }
       }
      
      return redirect('/')->with('message','Email Salah');
    }

    public function logout(Request $request){
   
      $request->session()->flush();
      return redirect('/');
  }

    public function create(){
      $name="Oktavianus Programmer";
     //$location = Location::where('id','1')->firstOrFail();
    // $location = Location::all();
      //dd($location);
      return view('settings.useradd');
      //return $slug;
  }

  public function forgot(){
    $name="Oktavianus Programmer";
   //$location = Location::where('id','1')->firstOrFail();
  // $location = Location::all();
    //dd($location);
    return view('forgotpassword');
    //return $slug;
}
}   