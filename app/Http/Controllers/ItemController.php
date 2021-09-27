<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Str;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
    //   dd($category->parameters);
        return view('item.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $item->category_id = $request->category_id;
        $item->discount = $request->discount;
        $item->manufacturer = $request->manufacturer;
        $item->save();
        $category = Category::find($request->category_id);
        foreach ($category->parameters as $parameter) {
            $item->parameters()->attach($parameter,['data' => $request->input($parameter->id)]);


         }

         if ($request->has('photos')) {
            foreach ($request->file('photos') as  $photo) {
                //  var_dump($photo);
                $img = Image::make($photo); //bitu kratinys, be jokios info
                $fileName = Str::random(5).'.jpg';// random sugalvojau
                $folder = public_path('images/items');     
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($folder.'/big/'.$fileName, 80, 'jpg');

                // $img = Image::make($photo);
                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($folder.'/small/'.$fileName, 80, 'jpg');
                $photo = new Photo();
                $photo->name = $fileName;
                $photo->item_id =  $item->id;
                $photo->save();
            }
        }

        return redirect()->route('category.map',$request->category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
      return view("item.show",['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
