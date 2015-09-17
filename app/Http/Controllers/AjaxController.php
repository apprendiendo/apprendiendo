<?php namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\OpenGraph;
use App\Scrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller {
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Obtiene los grados de un respectivo nivel
     * @param $level_id
     * @return Response
     */
    public function getGrades(){
        $level_id = Input::get('level');
        $grades = DB::table('grades')->where('level_id',$level_id)->get();
        return Response::json($grades);
    }

    /**
     * Obtiene los grados de un respectivo nivel
     * @param $grade_id
     * @return Response
     */
    public function getSubjects(){
        $grade_id = Input::get('grade');
        $subjects = DB::table('subjects')->where('grade_id','=',$grade_id)->get();
        return Response::json($subjects);
    }

    /**
     * Obtiene los grados de un respectivo nivel
     * @param $subject_id
     * @return Response
     */
    public function getTopics(){
        $subject_id = Input::get('subject');
        $topics = DB::table('topics')->where('subject_id','=',$subject_id)->get();
        return Response::json($topics);
    }

    public function getAppOpenGraph(){
        $scrap = new Scrap();
        $url = Input::get('app_url');
        $scrap::setUrl($url);
        $title = $scrap::getOpenGraphTitle();
        $description = $scrap::getOpenGraphDescription();
        $image = $scrap::getOpenGraphImg();
        $openGraph = [['title'=>$title,'description'=>$description,'image'=>$image]];
        return Response::json($openGraph);

    }
    public function getEbookOpenGraph(){
        $scrap = new Scrap();
        $url = Input::get('ebook_url');
        $scrap::setUrl($url);
        $title = $scrap::getOpenGraphTitle();
        $description = $scrap::getOpenGraphDescription();
        $image = $scrap::getOpenGraphImg();
        $openGraph = [['title'=>$title,'description'=>$description,'image'=>$image]];
        return Response::json($openGraph);
    }
    public function getVideoOpenGraph(){
        $scrap = new Scrap();
        $url = Input::get('video_url');
        $scrap::setUrl($url);
        $title = $scrap::getOpenGraphTitle();
        $description = $scrap::getOpenGraphDescription();
        $image = $scrap::getOpenGraphImg();
        $openGraph = [['title'=>$title,'description'=>$description,'image'=>$image]];
        return Response::json($openGraph);
    }
}
