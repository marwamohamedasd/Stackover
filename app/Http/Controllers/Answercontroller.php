<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Answercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $question_id=Question::findOrFail($id)->id;
        return  view('answers.create',compact('question_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        $request->validate([

            'content'=> 'required|string|max:255'

        ] ,['content.required'=>'you should enter content of answer']);
//        dd($request->all());
        $answer= Answer::create([

            'content'=>$request->content,
            'question_id'=>  $id,
            'user_id' => Auth::id(), // TODO: when you create authentication, change this to Auth::id()
        ]);

        $request->session()->flash("answer","لقد تم اضافة الاجابة بنجاح");
        //$answer->question()->sync($request->id,false);

        return redirect()->route('question.show', $id);

//OR
       // return redirect()->route('question.show', $id)->with('success', 'تم اضافة الاجابة للسؤال بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
       return view('answers.edit',['answer'=>$answer]);
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

            'content'=> 'required|string|max:255'
        ]);


        $answer = Answer::findOrFail($id);
        $answer->update([
            'content'=>$request->content,

        ]);
        return  redirect()->route('question.show',$answer->question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return back();
    }
}
