<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Purchase;
use App\Models\Backend\Product;
use App\Models\Backend\Branch;
use App\Models\Backend\Stock;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    // Showing the purchase page
    public function manage(){
        $branches = Branch::all();

        return view('backend.pages.purchase.add', compact('branches'));
    }

    // Find Product with id
    public function find($product_id, $br_id){
        $product = Product::find($product_id);

        $stock = Stock::where('product_id', $product_id)->where('br_id', $br_id)->first();
        
        $qty = '0';
        if($stock!=null){
            $qty = $stock->quantity;
        }else{
            $qty = '0';
        }


        if($product!=null){
            if($br_id != 0){
                return response()->json([
                    'msg'=>'success',
                    'product'=>$product,
                    'available_stock'=>$qty
                ]);
            }else{
                return response()->json([
                    'msg'=>'success',
                    'product'=>$product
                ]);
            }
        
            
        }else{
            return response()->json([
                'msg'=>'No product found'
            ]);
        }

        
    }

    // Store purchase data to database
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            "date"          =>  "required",
            "br_id"         =>  "required",
            "company_name"  =>  "required",
            'invoice'       =>  "required",
            'product_id'    =>  "required",
            'dis'           =>  "required",
        ]);

        if($validator->fails()) {
            // return as appropriate
            return response()->json($validator->errors());
        }


        // Retrieve the validated input...
        $validatedInput = $validator->validated();

        // Store purchase data
        $purchase = new Purchase();

        $purchase->date         = $validatedInput['date'];
        $purchase->br_id        = $validatedInput['br_id'];
        $purchase->company_name = $validatedInput['company_name'];
        $purchase->invoice      = $validatedInput['invoice'];
        $purchase->product_id   = $validatedInput['product_id'];
        $purchase->dis          = $validatedInput['dis'];
        $purchase->dis_amount   = $request->dis_amount;
        $purchase->total_amount = $request->total_amount;

        $purchase->save();


        // check for available stocks
        $stock = Stock::where('product_id', $request->product_id)->where('br_id', $request->br_id)->first();
        // if stock already there then update stock else store new stock
        if($stock != null){
            $stock->quantity += $request->qty;
            $stock->update();
        }else{
            $newStock = new Stock();
            $newStock->br_id = $request->br_id;
            $newStock->product_id = $request->product_id;
            $newStock->quantity = $request->qty;

            $newStock->save();
        }

        return response()->json('success');
    }


    // Product Stock Report
    public function stock(){
        $stocks = Stock::all();
        
        return view('backend.pages.stock.product_report', compact('stocks'));
    }
}
