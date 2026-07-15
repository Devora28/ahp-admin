<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller{
    public function addProductPage(){
        $categories = Category::where('parent_id','!=',0)->get();
        return view('add-product',['categories'=>$categories]);
    }
    public function addProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|integer',
            'category' => 'required|integer',
            'description' => 'nullable|string|min:5|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $imagePath = null;
        if($request->hasFile('image')){
            $originalName = $request->file('image')->getClientOriginalName();
            $imageName = time().'_'.Str::slug(pathinfo($originalName, PATHINFO_FILENAME)).'.'.$request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('products',$imageName,'public');
        }
        $slug = make_unique_persian_slug($request->title,Product::class);
        $product = Product::create([
            'title' => $request->title,
            'slug' => $slug,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category,
            'description' => strip_tags($request->description),
            'thumbnail' => $imagePath,
        ]);
        return redirect()->back()->with('success','محصول با موفقیت اضافه شد');
    }
    public function productList(){
        $products = Product::paginate('9');
        return view('products',['products'=>$products]);
    }
    public function productDetails($id,$slug=null){
        $product = Product::findOrFail($id);
        return view('product-details',['product'=>$product]);
    }
    public function updateProduct(Request $request,$id){
        $product = Product::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|min:5|max:5000',
            'description_short' => 'nullable|string|min:5|max:2000',
            'price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|integer',
            'status' => 'required|integer',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $data = ['is_active'=>$request->status];
        if($request->filled('title')){
            $data['title'] = $request->title;
            $data['slug'] = make_unique_persian_slug($request->title,Product::class);
        }
        if($request->filled('description')){
            $data['description'] = $request->description;
        }
        if($request->filled('description_short')){
            $data['description_short'] = $request->description_short;
        }
        if($request->filled('price')){
            $data['price'] = $request->price;
        }
        if($request->filled('discount')){
            $data['discount'] = $request->discount;
        }
        if(!empty($data)){
            $product->update($data);
        }
        return redirect()->back()->with('success','محصول مورد نظر بروزرسانی شد');
    }
    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success','محصول مورد نظر حذف شد');
    }
}
