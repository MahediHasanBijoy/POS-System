<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;
use App\Models\Backend\Product;
use App\Models\Backend\Sale;
use App\Models\Backend\Stock;
use Validator;


class SaleController extends Controller
{
    public function index(){
        // All branches
        $branches = Branch::all();

        // Generate Invoice number
        $invoice = '1000000';
        $sale = new Sale();

        $last_row = $sale->orderBy('id', 'DESC')->first();


        if($last_row != null){  
            $invoice = $last_row->invoice + 1;
        }
        
        return view('backend.pages.sale.add',compact('branches', 'invoice'));

        
    }


    // Find product sale price
    public function findPrice($id){
        $product = Product::find($id);

        return response()->json([
            'product'=>$product
        ]);
    }


    // Add sale
    public function store(Request $request){
    
        $validator = Validator::make($request->all(), [
            "date"          =>  "required",
            "br_id"         =>  "required",
            "product_id"    =>  "required",
            'invoice'       =>  "required",
            'quantity'      =>  "required",
            'dis'           =>  "required"
        ]);

        if($validator->fails()) {
            // return as appropriate
            return response()->json($validator->errors());
        }

        // find available stock for this product
        $stock = Stock::where('product_id', $request->product_id)->where('br_id', $request->br_id)->first();
        // if stock available then subtract quantity from stock
        if($stock!=null){
            if($stock->quantity == 0){
                return response()->json([
                    'msg'=>'error2',
                    'error2'=>'stock is not available currently'
                ]);
            }else if($stock->quantity < $request->quantity){
                return response()->json([
                    'msg'=>'error1',
                    'error1'=>'stock has less quantity'
                ]);
            }else{
                $stock->quantity -= $request->quantity;
                $stock->update();
            }
            
        }else{
            return response()->json([
                "msg"=>"error2",
                "error2"=>"stock not available"
            ]);
        }
        

        // store all data to sales table
        $sale = new Sale();
        $sale->create($request->all());



        return response()->json([
            'msg'=>'success'
        ]);

    }

    // show product list 
    public function productshow($invoice){
        // Eager loading for accessing relationship in ajax
        $sales = Sale::where('invoice', $invoice)->with('product')->get();

        // Another way of doing this
        // $sales = Sale::where('invoice', $invoice)->get()->load('product');


        return response()->json([
            'sales'=>$sales
        ]);
    }


    // delete sale item
    public function destroy($id){
        $sale = Sale::find($id);

        // adding quantity to stock after delete
        $stock = Stock::where('product_id', $sale->product_id)->where('br_id', $sale->br_id)->first();

        $stock->quantity += $sale->quantity;
        $stock->update();

        $sale->delete();

        return response('success');
    }

    // print function
    public function print($invoice){

        $sales = Sale::where('invoice', $invoice)->get();

        return view('backend.pages.sale.print', compact('sales'));
    }
}
