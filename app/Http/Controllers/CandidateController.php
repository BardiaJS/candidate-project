<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{
    //show the result
    public function showResult(){
        $numberOfVotes = Vote::count();
        
        $id = 1;
        $numberOfCandidates = array(Candidate::count());
        $namesOfCandidates = array(Candidate::count());
        for($id =1 ; $id <= Candidate::count() ; $id++){
            $numberOfCandidates[$id -1] = DB::table('votes')->where('candidate_id', $id)->get()->count();
            
            $numberOfCandidates[$id -1] = ($numberOfCandidates[$id -1]/$numberOfVotes) * 100;
            $namesOfCandidates[$id - 1] = DB::table('candidates')->where('id', $id)->pluck('username');
            $piece =  explode('[', $namesOfCandidates[$id - 1]);
            $piece =  explode(']', $piece[1]);
            $piece =  explode('"', $piece[0]);
            $namesOfCandidates[$id - 1] =$piece[1];
        }

        $length = count($numberOfCandidates);
        $id = 0;
        return view('result-page' , ['percantages' =>$numberOfCandidates , 'candidates' => $namesOfCandidates , 'lenghtOfCandidatesId' => $length , 'id'=>$id]);
    }

    //search the candidate
    public function search(Request $request){
        $search = $request->search;
        $candidates = Candidate::where(function ($query) use ($search){
            $query->where('username' , 'like' , "%$search%")
            ->orWhere('faction' , 'like' , "%$search%")
            ->orWhere('slogan' , 'like' , "%$search%")
            ->orWhere('description' , 'like' , "%$search%");
        })->get();
        
        return view('candidate-list-page' , ['candidates' => $candidates]);
    }
    //show the  vote page
    public function showVoteCandidate(Candidate $candidate){
        
        return view('vote-page' , ['candidate'=>$candidate]);
    }

    //show the candidate list 
    public function showCandidateList(){
        $candidates = Candidate::all();
        return view('candidate-list-page' , ['candidates' => $candidates]);
    }
        
    //show view for being the candidate
    public function showCandidateInfo(){
        return view('candidate-info-page');
    }

    //checking the condition of being the candidate
    public function registerCandidate(Request $request){
        $incomingFields = $request->validate([
            'faction'=>'required',
            'slogan'=>'required',
            'description'=>'required',
            'nationalId'=>['required',Rule::unique('candidates' , 'nationalId')]
        ]);
        $fullName = auth()->user()->fullName;
        
        if((str_contains($incomingFields['slogan'] , 'fuck') || str_contains($incomingFields['slogan'] , 'dick')||str_contains($incomingFields['slogan'] , 'ass')) || (str_contains($incomingFields['description'] , 'fuck') || str_contains($incomingFields['description'] , 'dick') || str_contains($incomingFields['slogan'] , 'ass'))){
            return redirect('/candidate-info') -> with('alert' , 'You are using cencored words!');
        }else{
            if(auth()->user()->nationalId == $incomingFields['nationalId']){
                $incomingFields['username'] =  $fullName;
                Candidate::create($incomingFields);
                $id = auth()->user()->id;
                $user = User::find($id);
                if($user) {
                    $user->isCandidate = 1;
                    $user->save();
                }
                return redirect('/')->with('success' , 'Conguragulation, You are a candidate now!');
            }else{
                return redirect('/')->with('alert' , 'You are using different naional id!');
            }
         
        }
    }
}
