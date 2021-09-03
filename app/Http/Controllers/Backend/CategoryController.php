<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Models\Backend\Category;
use App\Services\UploadService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $uploadService;
    /**
     * Constructing global variable
     */
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Categories Management';
        $categories = Category::latest()->search()->paginate(3);
        return view('backend.categories.index', compact('page', 'categories'));
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
    public function store(StoreCategoryRequest $request)
    {

        // Upload Product Avatar Handler => ImageName
        if ($request->hasFile('category_image')) {
            $category_name = $request->name;

            $file = $request->file('category_image');

            // Method Upload
            $path = 'uploads/categories';
            $image_name = $this->uploadService->uploadImageHandler($file, $category_name, $path);
        }

        // Merge field image -> request
        $request->merge(['image' => $image_name]);

        $result = Category::create($request->all());

        return alertInsert($result, 'categories.index');
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
        $page = 'Edit Category';
        $categoryUpdate = Category::find($id);

        $categories = Category::latest()->search()->paginate(3);

        return view('backend.categories.edit', compact('page', 'categoryUpdate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {

        $category = Category::find($id);

        // Upload Product Avatar Handler => ImageName
        if ($request->hasFile('category_image')) {

            $category_name = $request->name;

            $file = $request->file('category_image');

            // Remove old file
            $path = 'uploads/categories/';
            $this->uploadService->deleteFile($category->image, $path);

            // Method Upload
            $path = 'uploads/categories/';
            $image_name = $this->uploadService->uploadImageHandler($file, $category_name, $path);

            // Merge field image -> request
            $request->merge(['image' => $image_name]);
        }


        $result = $category->update($request->all());

        return alertUpdate($result, 'categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category->productOfCategories()->get()->count() > 0) {
            $message = 'You cannot delete this category. Because it belongs to a certain product !';
            return redirect()->back()->with('error', $message);
        };

        // Remove old file
        $path = 'uploads/categories/';
        if ($category->image) {
            $this->uploadService->deleteFile($category->image, $path);
        }

        $result = $category->delete();

        return alertDelete($result, 'categories.index');
    }
}
