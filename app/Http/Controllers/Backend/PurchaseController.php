<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Purchase;
use App\Models\Backend\Product;
use App\Models\Backend\Branch;

class PurchaseController extends Controller
{
    // Showing the purchase page
    public function manage(){
        $branches = Branch::all();

        return view('backend.pages.purchase.add', compact('branches'));
    }

    // Find Product with id
    public function find($id){
        $product = Product::find($id);

        if($product!=null){
            return response()->json([
                'msg'=>'success',
                'product'=>$product
            ]);
        }else{
            return response()->json([
                'msg'=>'No product found'
            ]);
        }

        
    }
}
