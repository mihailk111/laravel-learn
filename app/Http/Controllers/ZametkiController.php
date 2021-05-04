<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Zametka;
use Illuminate\Http\Request;

class ZametkiController extends Controller
{

    private $emptyImgUrl = "https://steamuserimages-a.akamaihd.net/ugc/644374753312153149/5E6920279A80734500AA85DC7B12399091D8689D/";

    public function show_main ()
    {
        return view('main', [
            "zametki" => Zametka::all()->sortBy("created_at", descending:true),
            "emptyImgUrl" => $this->emptyImgUrl 
        ]);

    }

    public function show_create (Request $request)
    {
        return view("create.zametku");
    }

    public function show_zametku($id)
    {
        $zametka = Zametka::where('id', $id)->get()[0];
        return view("zametka", ['zametka' => $zametka, 'emptyImgUrl' => $this->emptyImgUrl]);    
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => "required|max:250",
            'text' => "max:5000",
        ]);
        

        //TODO ZAMETKA TEXXT NULLABLE 
        //TODO FIND OUT HOW TO CHECK EXCEPTIONS IN LARAVEL
        
        $new_zametka = Zametka::create(['title' => $request->title, 'text' => $request->text]);

        $urls []= $request->all()["url-1"];
        foreach ($request->urls as $url) {
            $urls []= $url;
        }


        foreach ($urls as $url) {
            Url::create(['url' => $url, 'zametka_id' => $new_zametka->id ]);
        }

        return redirect(route("show_main"));

    }

}
