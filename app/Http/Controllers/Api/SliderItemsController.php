<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderItems;
use App\Http\Requests\SliderItemsRequest;

class SliderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SliderItems::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderItemsRequest $request)
    {
        $validated = $request->validated();

        $sliderItem = SliderItems::create($validated);

        return $sliderItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return SliderItems:: findOrfail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SliderItemsRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $sliderItem = SliderItems::findOrfail($id);
        
        $sliderItem->update($validated);
        
        return $sliderItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sliderItem = SliderItems::findOrfail($id);

      $sliderItem->delete();

      return $sliderItem;
    }
}
