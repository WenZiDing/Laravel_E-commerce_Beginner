<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$data = DB::table('products')->get();
			return response($data, 200);
        //
//	    $data = $this->getData();
//	    DB::table()
//			return response($data, 200);
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
      $input = $request->all();
      $Product = Product::create([
        'title'=>$request['title'],
        'content'=>$request['content'],
        'price'=>$request['price'],
        'quantity'=>$request['quantity']

        ]);
        //
//	    $arrData = $this->getData();
//			$arrRequestData = collect($request->all());
//			$arrData->push($arrRequestData);
			return response($Product, 200);
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
        //
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
        //
			$data = $this->getData();
			$arrRequestData = collect($request->all());
			$data = $data->where('id',$id)->first()->merge($arrRequestData);

			return response($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
	    $data = $this->getData();
			$data = $data->filter(function ($product) use ($id){
				return $product['id'] != $id;
			});
			$data = $data->values();
			return response($data, 200);
    }
    public function getData(){
        return collect([
            collect([
                'id'=>0,
                'title'=>'??????1',
                'content'=>'???',
                'price'=>50
            ]),collect([
                'id'=>1,
                'title'=>'??????2',
                'content'=>'???',
                'price'=>100
            ])
        ]);
    }
}
