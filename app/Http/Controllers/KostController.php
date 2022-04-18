<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Kost;
use App\Models\KostPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KostController extends Controller
{
    public function index()
    {
        $kost = Kost::with(['kriteria', 'photo'])->get();

        return view('backend.pages.kost.index', compact('kost'));
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

            $validator = \Validator::make($request->all(), [
                "upload_image"      => "required",
                "upload_image.*"    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if($validator->fails()) {
                return responseCustom("Err PR-SP(Val) : " . implode(" - ", $validator->messages()->all()));
            }

            $kost = new Kost();
            $kost->name = $request->name;
            $kost->address = $request->address;
            $kost->city = $request->city;
            $kost->province = $request->province;
            $kost->phone = $request->phone;
            $kost->description = $request->description;
            $kost->price = $request->price;
            $kost->save();

            foreach($request->file("upload_image") as $image) {
                $pathFile = Storage::putFile("public/images/products", $image);
                $kostPhotos              = new KostPhoto();
                $kostPhotos->kost_id     = $kost['id'];
                $kostPhotos->image       = $pathFile;
                $kostPhotos->save();
            }

            $criteria = new Criteria();
            $criteria->kost_id = $kost->id;
            $criteria->luas_bangunan = $request->luas_bangunan;
            $criteria->kamar_mandi = $request->kamar_mandi;
            $criteria['fasilitas'] = $request->fasilitas;
            $criteria->rating = $request->rating;
            $criteria->save();

            return redirect()->back()->with('success', 'Berhasil menambahkan Kost');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function show(Kost $kost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kost = Kost::find($id);
        return view('backend.pages.kost.edit', compact('kost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            $validator = \Validator::make($params, [
                'name' => 'required',
                'address' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'required',
                'city' => 'required',
                'province' => 'required',
                'phone' => 'required',
            ]);



            if($image = $request->file('image')) {
                $destinationPath = 'image/';
                $imageKost = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageKost);
                $params['image'] = $imageKost;
            }else{
                unset($params['image']);
            }



            Kost::find($id)->update($params);
            return redirect()->route('kost.index')->with('success', 'Berhasil mengubah Kost');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $kost = Kost::find($id);
            $kost->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Kost');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function indexFrontend(){
        $kost = Kost::with(['kriteria', 'photo'])->get();

        return view('frontend.pages.index', compact('kost'));
    }
}
