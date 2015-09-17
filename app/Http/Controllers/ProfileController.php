<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileRequest;
use App\Suggestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Despliega el perfil del usuario
     *
     *
     * @return Response
     */
    public function index()
    {
        $myprofile = Auth::user();
        return view('profile.myprofile')->with('myprofile',$myprofile);
    }


    /**
     * Despliega el perfil de otro usuario
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $userprofile = User::find($id);
        $suggestions = Suggestion::where('user_id','=',$id)->latest()->paginate(5);
        //$suggestions = $userprofile->suggestions()->latest()->paginate(5);
        $suggestions->setPath('');
        return view('profile.userinfo')->with(['userprofile' => $userprofile,'suggestions' => $suggestions]);
    }

    /**
     * Despliega la forma para editar la información del usuario
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $myprofile = User::find($id);
        return view('profile.editprofile')->with('myprofile',$myprofile);
    }

    /**
     * Actualiza la información del usuario
     *
     * @param  int  $id
     * @param ProfileRequest $request
     * @return Response
     */
    public function update($id, ProfileRequest $request)
    {
        $myprofile = User::find($id);
        $myprofile->update($request->all());
        return redirect('profile');
    }
}
