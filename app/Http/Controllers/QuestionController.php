<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\questions_tags;
use App\Models\Tag;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBY('id','DESC')->paginate(5);
        return view('questions.index',['questions'=>  $questions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::select('id','name')->get();
        return view('questions.create',
            ['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
           'description'=>'required|string|max:255',

        ]);

        $question = Question::create([
            'description'=> $request->description,

        ]);
        $question->tags()->sync($request->name,false);

        $request->session()->flash("success","Question created successfuly");
       // dd($question);
        return redirect(url('question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return  view('questions.show',['question'=>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $original_tags_ids = questions_tags::where('question_id', $question->id)->select('tag_id')->get()->toArray();
        $tags=Tag::select('id','name')->get();
        $tags_ids = [];
        foreach ($original_tags_ids as $tag_id) {
            $tags_ids[] = array_values($tag_id)[0];
        }


        return  view('questions.edite', compact('question', 'tags', 'tags_ids'));
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
//        dd($request->all());
        $request->validate([

            'description'=>'required|string|max:255',
        ]);


       $question = Question::findOrFail($id);
       $question->update([
           'description'=>$request->description,

       ]);

        $question->tags()->sync($request->name,false);

        return redirect()->route('question');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return back();


    }
}
