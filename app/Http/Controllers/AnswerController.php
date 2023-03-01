<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\answer;
use App\Models\User;
use App\Models\question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answer = answer::get();
        return view('answer.index', ['answer'=>$answer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $request->validate([
            'answer'=>'required',
        ]);

        $iduser = Auth::id();

        $answer = new answer;

        $answer->user_id=$iduser;
        $answer->answer = $request->answer;
        $answer->question_id=$id;

        $answer->save();

        return redirect('/question/'. $id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = answer::find($id);

        return view('question.detail',['answer'=>$answer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('answer.update', compact('answer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'answer'=> 'required'
        ]);
        $id_user = Auth::id();

        $answer = answer::find($id);

        $answer->answer = $request->answer;
        $answer->user_id = $id_user;
        $answer->question_id = $request->question_id;

        $answer->save();

        return redirect('/question/'.$request->question_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = answer::find($id);
        $question_id = $answer->question_id;

        $answer->delete();

        return redirect('/question/'.$question_id);
    }
}
