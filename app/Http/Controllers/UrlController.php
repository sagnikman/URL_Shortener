<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request; 
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UrlController extends Controller
{
    public function getHome() {
        // $createdUrl = [
        //     "url" => NULL
        // ];
        // $data = compact('createdUrl');
        return view('home');
    }
    
    
    public function all() {
        $url = Url::all();
        if($url) {
            return response()->json([
                "code" => 200,
                "success" => true,
                "message" => "successfully found url data",
                "data" => $url
            ],200);
        }
        return response()->json([
            "code" => 400,
            "success" => false,
            "message" => "url data not found"
        ],400);
    }
    
    public function index($id) {
        $url = Url::find($id);
        if($url) {
            return response()->json([
                "code" => 200,
                "success" => true,
                "message" => "successfully found url data with id = $id",
                "data" => $url
            ],200);
        }
        return response()->json([
            "code" => 400,
            "success" => false,
            "message" => "url data not found"
        ],400);
    }
    
    public function redirectToUrl($slug) {
        $url = Url::where('slug','=',$slug)->get()->first();
        if($url != NULL) {
            return redirect($url->url);
        }
        $data = [
            'notFound' => true
        ];
        return view('404');
    }
    
    public function store(Request $request) {

        if($request->slug === null) {
            $str = "";
            while(1) {
                $str = substr(str_shuffle(str_repeat("VTf81cv7AtwUH1oO88oB3hvWIgfDu2Oa2X9VtiqYDOBngFThBhzX01cA7ClaslbAq6I2gz37fk6gCtYvhkPZ9nI26quN3djri9bsi5qd9F8ebVs80dSgYN3qR2v1PuxnaEyYGySYQ38g5uWk", 5)), 0, 5);
                $findExistingSlug = Url::where('slug','=',$str)->get()->count();
                if($findExistingSlug === 0) {
                    $request->slug = $str;
                    break;
                }
            }
            $request->merge(['slug' => $str]);
        }
        
        $rules = [
            'url' => 'required|url',
            'slug' => 'unique:urls|regex:/^[A-Za-z0-9 ]+$/|max:8'
        ];
        $validated= Validator::make($request->all(),$rules);
        
        if($validated->fails()) {
            return redirect()->back()->withErrors($validated);
        }

        $url = Url::create($request->all());

        $createdUrl = (string)(route('home')) . '/' . $request->slug;
        
        if($url) {
            return redirect('')->with('createdUrl',$createdUrl); 
        }
        return redirect('');
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
