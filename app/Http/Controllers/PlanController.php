<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PlanRequest;
use App\Plan;
use App\Scrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Muestra la lista de sugerencias agregas a tu plan
	 *
	 * @return Response
	 */
	public function index()
	{
		//$myplans = Auth::user()->plans()->latest()->get();
        $myplans = Auth::user()->plans()->latest()->paginate(10);
        $myplans->setPath('plan');
        return view('plan.all')->with('myplans',$myplans);
	}



	/**
	 * Guarda una sugerencia en el plan del usuario
	 * @param PlanRequest $request
	 * @return Response
	 */
	public function store(PlanRequest $request)
	{
		$plan = new Plan($request->all());
        Auth::user()->plans()->save($plan);
        return redirect('plan');
	}

	/**
	 * Muestra una sugerencia en específico en el plan del usuario
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$plan = Plan::find($id);
        return view('plan.show')->with('plan',$plan);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $plan = Plan::find($id);
        $plan->delete();
        return redirect('plan');
	}

}
