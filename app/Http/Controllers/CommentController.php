<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommentRequest;
use App\Suggestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }



	/**
	 * Crea el comentario que se hizo en una sugerencia
     * @param $suggestionId
	 * @param CommentRequest $request
	 * @return Response
	 */
	public function store(CommentRequest $request,$suggestionId)
	{
        $newComment  = new Comment($request->all());
        Suggestion::find($suggestionId)->comments()->save($newComment);
        return redirect('results/'.$suggestionId);
        //return Redirector->refresh(['suggestionsId' => $suggestionId]);
	}









}
