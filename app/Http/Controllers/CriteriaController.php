<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = Criteria::with([])->get();

        return view('backend.pages.kriteria.index', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $params = $request->all();
            $validator = \Validator::make($params, [
                'luas_bangunan' => 'required',
                'fasilitas_kamar' => 'required',
                'kamar_mandi' => 'required',
            ]);

            Criteria::create($params);
            return redirect()->back()->with('success', 'Berhasil menambahkan Kriteria');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criteria = Criteria::find($id);
        return view('backend.pages.kriteria.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            $validator = \Validator::make($params, [
                'luas_bangunan' => 'required',
                'fasilitas_kamar' => 'required',
                'kamar_mandi' => 'required',
            ]);

            Criteria::find($id)->update($params);
            return redirect()->route('criteria.index')->with('success', 'Berhasil mengubah Kriteria');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Criteria::find($id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Kriteria');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
