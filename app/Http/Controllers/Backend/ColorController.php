<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreColorRequest;
use App\Http\Requests\Backend\UpdateColorRequest;
use App\Models\Backend\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page   = 'Colors Management';
        $colors = Color::latest()->paginate(3);

        return view('backend.colors.index', compact('page', 'colors'));
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
    public function store(StoreColorRequest $request)
    {

        $result = Color::create($request->all());

        return alertInsert($result, 'colors.index');
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
        $page = 'Edit Color';
        $colorUpdate = Color::find($id);

        $colors = Color::latest()->paginate(3);

        return view('backend.colors.edit', compact('page', 'colorUpdate', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColorRequest $request, $id)
    {
        $result = Color::find($id)->update($request->all());

        return alertUpdate($result, 'colors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $color = Color::find($id);

        if ($color->productOfColors()->get()->count() > 0) {
            $message = 'You cannot delete this color. Because it belongs to a certain product !';
            return redirect()->back()->with('error', $message);
        };

        $result = $color->delete();

        return alertDelete($result, 'colors.index');
    }
}
