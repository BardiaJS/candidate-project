<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //change the password
    public function changeTheForgetPassword(Request $request){
        $incomingFields = $request->validate([
            'nationalId'=>'required',
            'password'=>'required|confirmed|min:6'
        ]);
        $nationalId = $incomingFields['nationalId'];

        
        $nationalId = User::where('nationalId', $incomingFields['nationalId'])->value('nationalId');
        
        
        
        if($nationalId == $incomingFields['nationalId']){
            $incomingFields['password'] = bcrypt($incomingFields['password']);
            DB::table('users')
            ->where('nationalId', $incomingFields['nationalId'])
            ->update(['password' => $incomingFields['password']]);
           
            return redirect('/')->with( 'success' ,'Password reseted!');
        }else{
            return redirect('/')->with('alert' , 'cannot reset the password! This user is not exist in the site!');
        }
       
    }
    //show the change password form
    public function changeTheForgetPasswordForm(){
        return view('change-password');
    }
    //change the info
    public function update(Request $request , User $user){ 
        $incomingFields = $request->validate([
            'username'=>'required|min:3|max:12',
            'password'=>'required|confirmed|min:6',
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user->username = $incomingFields['username'];
        $user->password = $incomingFields['password'];
        $user->save();
        return redirect('/')->with( 'success' ,'User updated successfully');
        
    }
    //show the profile info form
    public function showChangeSettingForm(){
        return view('change-setting-form');
    }
    //show the profile page
    public function showProfile(User $user){
        return view('profile-page' , ['user' => $user]);
    }
    //check if the user voted or not
    public function checkVote(User $user , Candidate $candidate){
        if($user->isVoted == 0){
            $vote = new Vote();
            $vote->user_id = $user->id;
            $vote->candidate_id = $candidate->id;
            $vote->save();
            $user->isVoted = 1;
            $user->save();
            return back()->with('success' , 'You are voted successfully!');
        }else{
            return back()->with('success' , 'You are already voted. You cannot do it again!');
        }
    }

    //signing out the user
    public function signout(){
        auth()->logout();
        return redirect('/')->with('success' , 'You are logged out successfully!');
    }


    //show the correct page for the user
    public function showCorrectpage(){
        if(auth()->check()){
            return view('user-logged-in-page');
        }else{
            return view('home-page');
        }
       
    }

    //registering the user
    public function register(Request $request){
        $incomingFields = $request->validate([
            'username'=>'required|min:3|max:12',
            'password'=>'required|confirmed|min:6',
            'fullName'=>'required',
            'nationalId'=>['required','min:10','max:10' , Rule::unique('users' , 'nationalId')]
        ]);

        $checkedId = $this->check_national_code($incomingFields['nationalId']);
        if($checkedId == true){
            $incomingFields['nationalId'] = $incomingFields['nationalId'];
        }else{
            return redirect('/')->with('alert' ,'Nation ID is not valid!');  
        }
          
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success' , 'Thank you for creating account and welcome!');
        
    }


    //check the nation id is valid or not
    function check_national_code($value){
    if(!preg_match('/^[0-9]{10}$/',$value)) {
        return (bool) false;
    }
 
    for($i=0;$i<10;$i++)
        if(preg_match('/^'.$i.'{10}$/',$value)) {
            return (bool) false;
        }
 
    for($i=0,$sum=0;$i<9;$i++)
        $sum+=((10-$i)*intval(substr($value, $i,1)));
        $ret=$sum%11;
        $parity=intval(substr($value, 9,1));
        if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity)) {
            return (bool) true;
        }
 
    return (bool) false;
 
}





    //logging in the user
    public function login(Request $request){
        $incomingFields = $request->validate([
            'nationalId'=>'required',
            'password'=>'required'
        ]);
       
        if(auth()->attempt($incomingFields)){
            $request->session()->regenerate();
            return redirect('/')->with('success' , 'You are logged in successfully');
        }else{
            return redirect('/')->with('alert' , 'Invalid data!');
        }
    }
}



 