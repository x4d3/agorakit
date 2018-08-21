<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use \App\Reaction;
use Auth;

class CommentReactionController extends Controller
{


  /**
   * Form to choose a reaction
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request, Comment $comment)
  {
      return view('reactions.create')
      ->with('comment', $comment);

  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment, $context)
    {
        //$comment->reaction($context, Auth::user());
        Reaction::reactTo($comment, $context);
        return redirect(route('groups.discussions.show', [$comment->discussion->group, $comment->discussion]));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($model)
    {
        Reaction::unReactTo($model);
    }
}
