<?php

if(!function_exists("responseCustom")) {
    function responseCustom($data = [], $status = false) {
        return [
            "status" => $status,
            "data"   => $data
        ];
    }
}

if(! function_exists('alertNotify')){
    function alertNotify($isSuccess  = true, $message = '', $request = ''){
        if($isSuccess){
            $request->session()->flash('alert-class','success');
            $request->session()->flash('status', $message);
        }else{
            $request->session()->flash('alert-class','error');
            $request->session()->flash('status', $message);
        }
    }
}

// if(! function_exists('cartTotal')) {
//     function cartTotal() {
//         $total = 0;
//         if(\Auth::check()) {
//             $total = App\Models\Cart::where("user_id", \Auth::user()->id)->count();
//         }
//         return $total;
//     }
// }

// if(! function_exists('listProvinces')) {
//     function listProvinces() {
//         $data = '[{"provinsi_id":"11","provinsi_nama":"Aceh"},{"provinsi_id":"51","provinsi_nama":"Bali"},{"provinsi_id":"36","provinsi_nama":"Banten"},{"provinsi_id":"17","provinsi_nama":"Bengkulu"},{"provinsi_id":"34","provinsi_nama":"Di Yogyakarta"},{"provinsi_id":"31","provinsi_nama":"Dki Jakarta"},{"provinsi_id":"75","provinsi_nama":"Gorontalo"},{"provinsi_id":"15","provinsi_nama":"Jambi"},{"provinsi_id":"32","provinsi_nama":"Jawa Barat"},{"provinsi_id":"33","provinsi_nama":"Jawa Tengah"},{"provinsi_id":"35","provinsi_nama":"Jawa Timur"},{"provinsi_id":"61","provinsi_nama":"Kalimantan Barat"},{"provinsi_id":"63","provinsi_nama":"Kalimantan Selatan"},{"provinsi_id":"62","provinsi_nama":"Kalimantan Tengah"},{"provinsi_id":"64","provinsi_nama":"Kalimantan Timur"},{"provinsi_id":"65","provinsi_nama":"Kalimantan Utara"},{"provinsi_id":"19","provinsi_nama":"Kepulauan Bangka Belitung"},{"provinsi_id":"21","provinsi_nama":"Kepulauan Riau"},{"provinsi_id":"18","provinsi_nama":"Lampung"},{"provinsi_id":"81","provinsi_nama":"Maluku"},{"provinsi_id":"82","provinsi_nama":"Maluku Utara"},{"provinsi_id":"52","provinsi_nama":"Nusa Tenggara Barat"},{"provinsi_id":"53","provinsi_nama":"Nusa Tenggara Timur"},{"provinsi_id":"92","provinsi_nama":"Papua"},{"provinsi_id":"91","provinsi_nama":"Papua Barat"},{"provinsi_id":"14","provinsi_nama":"Riau"},{"provinsi_id":"76","provinsi_nama":"Sulawesi Barat"},{"provinsi_id":"73","provinsi_nama":"Sulawesi Selatan"},{"provinsi_id":"72","provinsi_nama":"Sulawesi Tengah"},{"provinsi_id":"74","provinsi_nama":"Sulawesi Tenggara"},{"provinsi_id":"71","provinsi_nama":"Sulawesi Utara"},{"provinsi_id":"13","provinsi_nama":"Sumatera Barat"},{"provinsi_id":"16","provinsi_nama":"Sumatera Selatan"},{"provinsi_id":"12","provinsi_nama":"Sumatera Utara"}]';

//         return json_decode($data, true);
//     }
}