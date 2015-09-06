<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ComponentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$components = DB::table('component') 
							-> leftJoin('manufacturer', 'component.maid', '=', 'manufacturer.maid')
							-> leftJoin('supplier', 'component.suid', '=', 'supplier.suid')
							-> where('component.is_deleted', '<>', 1)
							-> get();
		
		return view('components', ['components' => $components]);
	}

    /**
     * Display a listing of the deleted resource.
     *
     * @return Response
     */
    public function deleted()
    {
        $components = DB::table('component') 
                            -> leftJoin('manufacturer', 'component.maid', '=', 'manufacturer.maid')
                            -> leftJoin('supplier', 'component.suid', '=', 'supplier.suid')
                            -> where('component.is_deleted', '=', 1)
                            -> get();
        
        return view('deleted-components', ['components' => $components]);
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cid)
	{
		 $component = DB::table('component') 
							-> leftJoin('manufacturer', 'component.maid', '=', 'manufacturer.maid')
							-> leftJoin('supplier', 'component.suid', '=', 'supplier.suid')
							-> where('component.is_deleted', '<>', 1)
							-> where('component.cid', $cid)
							-> get();
		
		return response() -> json($component);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		return 'ok';
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  string  $cid
	 * @return Response
	 */
	public function update(Request $request, $cid)
	{
		return 'ok';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $cid
	 * @return Response
	 */
	public function destroy($cid)
	{
		DB::table('component')
			-> where('cid', $cid)
			-> update(['is_deleted' => 1]);

		return response() -> json(['result' => 'ok']);
	}

	/**
	 * Undo removing the specified resource from storage.
	 *
	 * @param  int  $cid
	 * @return Response
	 */
	public function undestroy($cid)
	{
		DB::table('component')
			-> where('cid', $cid)
			-> update(['is_deleted' => 0]);

		return response() -> json(['result' => 'ok']);
	}
}
