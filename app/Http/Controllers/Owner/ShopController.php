<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\ImageFile;
use InterventionImage;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next){
            // dd($request->route()->parameter('shop'));
            // dd(Auth::id());

            $id = $request->route()->parameter('shop');
            if(!is_null($id)){
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (Int)$shopsOwnerId;
                $ownerId = Auth::id();
                if($shopId !== $ownerId){
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $ownerId = Auth::id();
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        // dd(Shop::findOrFail($id));

        return view('owner.shops.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $imageFile = $request->image; //一時保存
        if(!is_null($imageFile) && $imageFile->isValid() ){
            // Storage::putFile('public/shops', $imageFile); リサイズなしの場合
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName. '.' . $extension;
            $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            // dd($imageFile, $resizedImage);

            Storage::put('public/shops/' . $fileNameToStore,$resizedImage );
        }
        return redirect()->route('owner.shops.index');
    }
}
