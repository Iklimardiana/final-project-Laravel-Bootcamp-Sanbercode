<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $question = Question::all();
        return view('question.view', compact('question', 'users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category= kategori::all();
        return view('question.create',compact('category'));
        // return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'question' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'category_id' => 'required',
            
        ]);

        $id = Auth::id();
  
        $namaGambar = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $namaGambar);

        $question = new question;
 
        $question ->question = $request->question;
        $question ->image= $namaGambar;
        $question ->category_id = $request->category_id;
        $question ->user_id = $id;
        

        $question->save();
        return redirect('/question');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = question::find($id);

        return view('question.detail',['question'=>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $cast = DB::table('cast')->find($id);
        $question = Question::find($id);
        $category= kategori::all();
        return view('question.edit', compact('question', 'category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'question' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'category_id' => 'required',
        ]);
        $question = Question::find($id);
        $namaGambar = $question->image;

        if($request->has('image')) {
            $path = "images/";
            file::delete($path . $question->image);
        
            $namaGambar = time().'.'.$request->image->extension();  
           
            $request->image->move(public_path('images'), $namaGambar);  
        
            $question->image = $namaGambar;
        }        
        $question ->question = $request->question;
        $question ->image= $namaGambar;
        $question ->category_id = $request->category_id;
       
        $question->save();

        
        return redirect('/question');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $question = Question::find($id);
        $path = "images/";
            file::delete($path . $question->image);
        $question->delete();
        return redirect('/question');

    }
}
