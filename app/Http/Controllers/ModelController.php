<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$models = DB::table('model') -> get();
		$components = DB::table('model')
							-> leftJoin('consumption', 'model.mid', '=', 'consumption.mid')
							-> leftJoin('component', 'consumption.cid', '=', 'component.cid')
							-> get();

		return view('models', ['models' => $models, 'components' => $components]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified model.
	 *
	 * @param  string  $codename
	 * @return Response
	 */
	public function show($codename)
	{
		$models = DB::table('model') -> get();
		$components = DB::table('model')
							-> leftJoin('consumption', 'model.mid', '=', 'consumption.mid')
							-> leftJoin('component', 'consumption.cid', '=', 'component.cid')
							-> where('model_codename', '=', $codename)
							-> get();

		// $prev_model = $current_model = '';
		$usd = $ntd = $rmb = 0.0;
		foreach ($components as $component => $value) {
			switch ($value -> currency) {
				case 'USD':
					$usd += (floatval($value -> unit_price) * floatval($value -> amount));
					break;

				case 'NTD':
					$ntd += (floatval($value -> unit_price) * floatval($value -> amount));
					break;

				case 'RMB':
					$rmb += (floatval($value -> unit_price) * floatval($value -> amount));
					break;
				
				default:
					# code...
					break;
			}
		}
		$cost = ($usd * 31.0) + $ntd + ($rmb * 5.1);
		$info = '<p>硬體花費 NTD ' . strval($cost) . '，看來還可以再cost down呢</p>';
		return view('models', ['models' => $models, 'components' => $components, 'info' => $info]);
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
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
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
		//
	}
}
