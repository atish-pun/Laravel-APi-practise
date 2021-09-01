<?php

namespace App\Http\Controllers;
use App\Http\Resources\ReviewResources;
use App\Models\reviews;
use App\Models\Product;
use App\Http\Requests\ReviewRequest;


use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResources::collection($product->reviews);
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
    public function store(ReviewRequest $request, Product $product)
    {
        $reviewProduct = new reviews($request->all());
        // $reviewProduct->customer_name = $request->customer;
        // $reviewProduct->star = $request->star;
        // $reviewProduct->review = $request->review;
    
        $product->reviews()->save($reviewProduct);
        return response([
            'data' => new ReviewResources($reviewProduct)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(reviews $reviews)

    {
        return $reviews;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product, reviews $review)
    {
        $review->update($request->all());
        return response([
            'data' => new ReviewResources($review)
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, reviews $review)
    {
        $review->delete();
        return response(null,204);
    }
}
