<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\subject;
use App\Models\Question;

class ExamController extends Controller
{
    public function index(){

        $subject= Subject::paginate(5);
        $exam= Exam::with('subject')->get();
           return view('admin.adminexam', ['subject'=>$subject], ['exam'=>$exam]);    

    }
    public function store(Request $request ){
        $exam= new Exam;
        $exam->exam_name= $request->name;
        $exam->attempt= $request->attempt;
        
        $exam->subject_id= $request->sub_id;
        $exam->time= $request->time;
        $exam->date= $request->date;
        $exam->save();
       }
    
public function updateexam(Request $request ,$id){
    
    $exam= Exam::findorfail($id);
    $exam->exam_name= $request->editname;
        $exam->subject_id= $request->sub_id;
        $exam->time= $request->edittime;
        $exam->date= $request->editdate;
        $exam->save();


}  
public function question(){
    $question = Question::get();
    return view('admin.question', ['questions'=>$question]);
}

public function questioninsert(Request $request){

     $question =new Question;
     $question->question= $request->question;
     $question->opta= $request->opta;
     $question->optb= $request->optb;
     $question->optc= $request->optc;
     $question->optd= $request->optd;
     $question->correctans= $request->correctans;
     $question->save();
}


public function questionupdate(Request $request ,$id){


    $question =Question::findorfail($id);
    $question->question= $request->editquestion;
    $question->opta= $request->editoptas;
    $question->optb= $request->editoptbs;
    $question->optc= $request->editoptcs;
    $question->optd= $request->editoptds;
    $question->correctans= $request->editcorrectans;
    $question->save();
}



   
   
}
