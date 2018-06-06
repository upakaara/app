<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use \Validator;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->input();
      
        $comments = Comment::where('job_id', $data["job_id"])
          ->with(array('user'=>function ($query) {
              $query->select('id', 'first_name', 'last_name');
          }))->get();

        $view = view("jobs/jobComponents/jobComments", compact('comments'))->render();
        return response()->json(['html'=>$view]);
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = Validator::make($request->all(), [
          'comment' => 'required|string',
          'job_id' => 'required|integer',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['success'=>false, 'message'=>$validatedData->messages()]);
        }
        
        try {
            $data = $request->input();
            $comment = new Comment;
            $comment->job_id = $data['job_id'];
            $comment->comment = $data['comment'];
            $comment->author = $user->id;
            $comment->save();
            return response()->json(['success'=>true]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $comment = Comment::find($id)
                ->delete();
            return response()->json(['success'=>true]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }
}
