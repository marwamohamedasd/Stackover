<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\questions_tags;
use App\Models\Tag;
use Illuminate\Http\Request;

class Tagscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $tags =  Tag::select('id','name')->get();
        return  view('tags.show' ,['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tag = Tag::findOrFail($id);
        $questions = $tag->questions()->paginate(3);

//$tag = Tag::with('questions')->findOrFail($id)->paginate(2);

    return view('tags.showquestion',compact('tag', 'questions'));




      /*  $tag =  Tag::findOrFail($id);
        $question = Question::findOrFail($id);

*/
        /*
        $question = Question::findOrFail($id);
        $tag =  Tag::findOrFail($id);

        $question_tag= questions_tags::select('tag_id' ,'question_id')->where('question_id',$question->id,'tag_id',$id)->get();

        return view('tags.showquestion',['question_tag'=>$question_tag]);*/


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
