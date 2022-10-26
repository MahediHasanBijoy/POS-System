<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
     * Display  manage.blade.php .
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        return view('backend.pages.product.manage');
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
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'des' => 'required',
            'size' => 'required',
            'color' => 'required',
            'product_code' => 'required',
            'cost_price' => 'required|numeric',
            'sale_price' => 'required|numeric'
        ]);
 
        if ($validator->fails()) {

            // return redirect()->route('product.manage')
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json([
                'msg' => 'error',
                'errors'=> $validator->errors()
            ]);
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();

    
        $product = new Product;

        $product->name = $validated['name'];
        $product->des = $validated['des'];
        $product->size = $validated['size'];
        $product->color = $validated['color'];
        $product->product_code = $validated['product_code'];
        $product->cost_price = $validated['cost_price'];
        $product->sale_price = $validated['sale_price'];

        $product->save();

        return response()->json([
            'message'=>'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::all();
        return response()->json([
            'msg' => 'success',
            'data' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->get();

        return response()->json([
            'msg'=>'success',
            'data'=>$product
        ]);
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
        $product = Product::find($id);

        $product->name = $request->name;
        $product->des = $request->des;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->product_code = $request->product_code;
        $product->cost_price = $request->cost_price;
        $product->sale_price = $request->sale_price;

        $product->save();

        return response()->json([
            'msg'=>'updated successful'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return response()->json([
            'msg'=>'deleted'
        ]);
    }
}
