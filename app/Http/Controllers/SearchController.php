<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\GeneralSearchRequest;
use App\Http\Requests\SearchRequest;
use App\Level;
use App\Scrap;
use App\Suggestion;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /*public function index()
    {
        return view('search.seektest');
    }*/

    /**
     * Muestra la forma para una búsqueda específica
     * https://www.youtube.com/watch?v=FY6Pmrmz0Ws
     * @return Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('search.seek')->with('levels',$levels);
    }

    /**
     * Muestra la forma para una busqueda general
     * https://www.youtube.com/watch?v=FY6Pmrmz0Ws
     * @return Response
     */
    public function general()
    {
        $levels = Level::all();
        return view('search.general_seek')->with('levels',$levels);
    }

    /**
     * Despliega todos los resultados que hagan match con la busqueda.
     * @param Request $request
     * @return Response
     */
    public function general_results(GeneralSearchRequest $request){
        $Suggestions = Suggestion::where('level','=',$request->level,'and')
            ->where('grade','=',$request->grade)->latest()->paginate(5);
        $suggestions = $Suggestions->appends(['level' => $request->level,'grade' => $request->grade]);

        $suggestions->setPath('general_results');

        return view('search.pagination')->with('suggestions', $suggestions);
    }


    /**
     * Despliega todos los resultados que hagan match con la busqueda.
     * @param Request $request
     * @return Response
     */
    public function results(SearchRequest $request)
    {
        if($request->device == 'both'){
            $Suggestions = Suggestion::where('subject','=',$request->subject,'and')
                ->where('level','=',$request->level,'and')
                ->where('grade','=',$request->grade,'and')
                ->where('topic','=',$request->topic)->latest()->paginate(5);

            $suggestions = $Suggestions->appends(['level' => $request->level,
                'grade' => $request->grade,
                'subject' => $request->subject,
                'topic' => $request->topic,
                'device' => $request->device]);

            $suggestions->setPath('results');

            return view('search.pagination')->with('suggestions', $suggestions);
        }
        $Suggestions = Suggestion::where('subject','=',$request->subject,'and')
            ->where('level','=',$request->level,'and')
            ->where('grade','=',$request->grade,'and')
            ->where('topic','=',$request->topic,'and')
            ->where('device','=',$request->device)->latest()->paginate(5);

        $suggestions = $Suggestions->appends(['level' => $request->level,
            'grade' => $request->grade,
            'subject' => $request->subject,
            'topic' => $request->topic,
            'device' => $request->device]);
        $suggestions->setPath('results');
        return view('search.pagination')->with('suggestions', $suggestions);
    }
    /**
     * Muestra una sugerencia en específica que hizo match con la busqueda
     * @integer $id
     * @return Response
     */
    public function show($id)
    {
        $suggestion = Suggestion::find($id);
        //$suggestion_comments = $suggestion->comments()->latest()->get();
        $suggestion_comments = $suggestion->comments()->latest()->paginate(4);
        $suggestion_comments->setPath('');
        return view('search.show')->with(['suggestion'=>$suggestion,'suggestion_comments'=>$suggestion_comments]);
    }
}
