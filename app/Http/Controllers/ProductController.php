<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller {


	public function __construct()
    {
       $this->middleware('jwt.auth', ['only' => ['store', 'update', 'delete']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($categorySlug)
	{
		$category = \App\Category::where('slug', $categorySlug)->first();
		$allCategories = $category->getDescendants();
		$ids[] = $category->id;
		foreach ($allCategories as $c) {
			$ids[] = $c->id;
		}

		return \App\Product::with('category', 'user')->whereIn('category_id', $ids)->get();
		
	}


	public function allProducts(){
		$products = \App\Product::with('category', 'user')->get();
		return $products;
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = [
			'title' => 'required',
			'main_category' => 'required|numeric',
			'sub_category' => 'numeric',
			'price' => 'required|numeric',
			'pricing_type' => 'required',
			'quantity' => 'required|numeric',
			'unit' => 'required',
			'expiry_date' => 'required|date|date_format:m/d/Y',
			'file' => 'mimes:jpeg,bmp,png'
		];
		$date  = date('m/d/Y', strtotime($request->expiry_date));
		
		$data = [
			'title' => $request->title,
			'main_category' => $request->main_category,
			'sub_category' => $request->sub_category,
			'price' => $request->price,
			'pricing_type' => $request->pricing_type,
			'quantity' => $request->quantity,
			'unit' => $request->unit,
			'expiry_date'=> $date,
			'file' => $request->file('file')
		];

		$valid = \Validator::make($data, $validator);
		if($valid->fails()) return response()->json(['errors' => $valid->errors()->all()], 400);

		$product = new \App\Product;
		$product->title= $request->title;
		$product->category_id= (isset($request->sub_category)) ? $request->sub_category : $request->main_category;
		$product->price= $request->price;
		$product->pricing_type= $request->pricing_type;
		$product->quantity= $request->quantity;
		$product->unit= $request->unit;
		$product->expiry_date= strtotime($request->expiry_date);

		if (\File::exists($request->file('file')))
		{	
			$image = \Input::file('file');
			$filename = date('Y-m-d-H:i:s') .".". $image->getClientOriginalExtension();
			
		    $request->file('file')->move(public_path().'/pictures/', $filename);
		    $product->picture = $filename;
		}

		$product->user_id = \Auth::user()->id;
		$product->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return \App\Product::with('user', 'category')->find($id); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
