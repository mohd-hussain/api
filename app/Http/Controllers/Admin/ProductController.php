<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.Products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'detail' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'discount' => 'required',
            // 'product_image' => 'image|max:1999',

        ]);

        // if($request->hasFile('product_image')){
        //     //Get filename with the extension
        //     $filenameWithExt = $request->file('product_image')->getClientOriginalName();
        //     //Get Just filename
        //     $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //     //Get just Ext
        //     $extention = $request->file('product_image')->getClientOriginalExtension();
        //     //Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extention;
        //     //Upload Image
        //     $path = $request->file('product_image')->storeAs('public/product_image',$fileNameToStore);
        // }else{
        //     $fileNameToStore = 'noimage.jpg';
        // }

        // dd($fileNameToStore);
        
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        // $product->image = $request->$fileNameToStore;
        $product->user_id = auth()->user()->id;

        $product->save();
        return redirect('/products-all')->with('success','Your Product is succesfully added in the product list');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.Products.edit-product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('/products-all')->with('success','Your Data is Updated is Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products-all')->with('success','Your Data is Deleted Succesfully');
    }
}
