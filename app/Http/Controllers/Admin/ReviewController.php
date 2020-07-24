<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Review;
use App\Model\Product;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {   
        
        $reviews = Review::all();
        // dd($reviews);
        return view("Admin.Reviews.index",compact('reviews'));
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
        $this->validate($request,[
            'customer' => 'required',
            'review' => 'required',
            'star' =>'required|numeric',
        ]);

        $review = new Review;
        $review->customer = $request->customer;
        $review->review = $request->review;
        $review->star = $request->star;
        // $review->product_id = reviews()->product()->id;

        $review->save();
        return redirect('/reviews-all')->with('success','Your Review is Added For this Product');
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
        $review = Review::findOrFail($id);

        return view('Admin.Reviews.edit-review',compact('review'));
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
        $review = Review::findOrFail($id);

        $this->validate($request,[
            'customer' => 'required',
            'review' => 'required',
            'star' =>'required|numeric',
        ]);

        $review->update($request->all());
        return redirect('/reviews-all')->with('success','Your Review is Updated');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();
        return redirect('/reviews-all')->with('success','Your Review is Deleted');
    }
}
