<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CategoryRequest;
use App\Traits\JsonResponseTrait;
use Illuminate\Auth\Events\Validated;

class CategoryController
{
    use JsonResponseTrait ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return $this->sendSuccess( 'all categories retrieved successfully !' , $categories );
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request->validated());
      
        
        $category = Category::create($request->validated());
        return $this->sendSuccess('category created successfully ! ' , $category , 201);

    }

    /**
     * Display the specified resource.
     */
    public function show( Category $category)
    {
    
        $category =Category::findOrFail($category->id) ;
        return $this->sendSuccess('category retrieved succssfully !' , $category) ;
        
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
         $category->update($request->Validated());
        return $this->sendSuccess('category updated successfully ' ,  $category->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendSuccess('category deleted successfully');
    }
}
