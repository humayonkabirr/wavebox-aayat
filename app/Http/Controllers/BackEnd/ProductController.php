<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $data['products']  = Product::all();
            return view('backend.product.index', $data);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return view('backend.product.create');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
                'sale_price' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
            }

            $product = new Product();

            $product->name          = $request->name;
            $product->sub_title     = $request->sub_title;
            $product->price         = $request->price;
            $product->sale_price    = $request->sale_price;
            $product->discount      = $request->discount;
            $product->discount_type = $request->discount_type;
            $product->save();

            $image =  new ProductImage();
            if ($request->thumbnail) {

                $thumbnailName      = $request->price .time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->storeAs('images/thumbnail', $thumbnailName);
                $image->image       = $thumbnailName;

                $image->product_id     = $product->id;
                $image->image_position = 1;
                $image->save();
            }

            if ($request->image1) {
                $thumbnailName      = $request->price .time() . '.' . $request->image1->extension();
                $request->thumbnail->storeAs('images/products', $thumbnailName);
                $image->image1       = $thumbnailName;
                $image->details1       = $request->forImageOne;

                $image->product_id     = $product->id;
                $image->image_position = 2;
            }

            if ($request->image2) {
                $thumbnailName      = $request->sale_price . time() . '.' . $request->image2->extension();
                $request->thumbnail->storeAs('images/products', $thumbnailName);
                $image->image2       = $thumbnailName;
                $image->details2       = $request->forImageTwo;
                $image->product_id     = $product->id;
                $image->image_position = 2;
            }

            if ($request->image3) {
                $thumbnailName      = $request->price . time() . '.' . $request->image3->extension();
                $request->thumbnail->storeAs('images/products', $thumbnailName);
                $image->image3       = $thumbnailName;
                $image->details3       = $request->forImageThree;
                $image->product_id     = $product->id;
                $image->image_position = 3;

            }
            $image->save();

            return redirect()->route('product.index');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Auth::check()) {
            $data['product'] = Product::find($id);
            return view('backend.product.create', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
