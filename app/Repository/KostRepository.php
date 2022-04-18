<?php

namespace App\Repository;

use App\Models\Kost;
use Illuminate\Support\Facades\Storage;

class KostRepostory
{
    public function savekost($request){
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

            if($validator->fails()) {
                return responseCustom("Err KR-SK(Val) : " . implode(" - ", $validator->messages()->all()));
            }
            $pathFile = Storage::putFile("public/images/products", $image);

            $kost = new Kost();
            $kost->name = $params['name'];
            $kost->address = $params['address'];
            $kost->description = $params['description'];
            $kost->price = $params['price'];
                
            $kost->image = $pathFile;
            $kost->city = $params['city'];
            $kost->province = $params['province'];
            $kost->phone = $params['phone'];
            $kost->save();

            return responseCustom("Berhasil menambahkan Kost ", true, $kost);
        } catch (\Exception $e) {
            return responseCustom($e->getMessage());
        }
    }
}