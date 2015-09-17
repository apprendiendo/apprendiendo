<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuggestionRequest;
use App\Level;
use App\Scrap;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Suggestion;

class SuggestionController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Despliega todas las sugerencias hechas por el usuario
	 * pagination link https://laracasts.com/discuss/channels/general-discussion/problems-of-links-generated-by-laravel-5-paginator
	 * @return Response
	 */
	public function index()
	{
        $suggestions = Auth::user()->suggestions()->latest()->paginate(5);
        $suggestions->setPath('suggestions');
        return view('suggestions.all')->with('suggestions',$suggestions);
	}

	/**
	 * Despliega la forma para crear una sugerencia
	 *
	 * @return Response
	 */
	public function create()
	{
        $levels = Level::all();
		return view('suggestions.create')->with('levels',$levels);
	}

	/**
	 * Guarda la nueva sugerencia
	 * @param SuggestionRequest $request
	 * @return Response
	 */
	public function store(SuggestionRequest $request)
	{
		$suggestion = new Suggestion($request->all());
        Auth::user()->suggestions()->save($suggestion);
        return redirect('suggestions');
	}

	/**
	 * Despliega una sugerencia específica, basados en el id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $suggestion = Suggestion::find($id);
        return view('suggestions.show')->with('suggestion',$suggestion);
	}

	/**
	 * Despliega la forma para editar una sugerencia específica, basados en el id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $levels = Level::all();
        $suggestion = Suggestion::find($id);
        //dd($suggestion->level);
        //return view('suggestions.edit')->with('suggestion',$suggestion);
        return view('suggestions.edit')->with(['suggestion'=>$suggestion,'levels'=>$levels]);
	}

	/**
	 * Actualiza la sugerencia
	 *
	 * @param  int  $id
     * @param SuggestionRequest $request
	 * @return Response
	 */
	public function update($id, SuggestionRequest $request)
	{
        $suggestion = Suggestion::find($id);
        $suggestion->update($request->all());
        return redirect('suggestions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
