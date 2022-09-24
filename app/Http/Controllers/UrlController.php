<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function all() {
        return Url::all();
    }
    
    public function index($id) {
        return Url::find($id);
    }
    
    public function redirectToUrl($slug) {
        $url = Url::where('slug','=',$slug)->get()->first();
        if($url != NULL) {
            return redirect($url->url);
        }
        return "wrong short code";
    }
    
    public function store(Request $request) {
        $url = Url::create($request->all());
        if($url) {
            return response()->json([
                "code" => 201,
                "success" => true,
                "message" => "successfully saved url data",
                "data" => $url
            ],201);
        }
    }
    
    public function update(Request $request, $id) {
        $url = Url::find($id)->update($request->all());
        if($url) {
            return response()->json([
                "code" => 200,
                "success" => true,
                "message" => "successfully updated url data",
                "data" => $url
            ],200);
        }
    }
    
    public function destroy($id) {
        $url = Url::destroy($id);
        if($url) {
            return response()->json([
                "code" => 200,
                "success" => true,
                "message" => "successfully deleted url data with id equal to $id",
            ],200);
        }
    }
    
}
