<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TempProduct;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class TempProductController extends Controller
{
    public function tempCreate(Request $request){

        $request->validate([
            'product_name'  => 'required',
            'p_price'       => 'required|integer',
            'ws_price'      => 'required|integer',
            's_price'       => 'required|integer',
            'quantity'      => 'required|integer',
            'category_id'   => 'required|integer',
            'supplier_id'   => 'required|integer',
        ]);

        $tempProduct = new TempProduct;
        if($request->input('p_code') == '')
            $tempProduct->p_code = 'N/A';
        else
        $tempProduct->p_code       = $request->input('p_code');
        $tempProduct->product_name = $request->input('product_name');
        $tempProduct->p_price      = $request->input('p_price');
        $tempProduct->ws_price     = $request->input('ws_price');
        $tempProduct->s_price      = $request->input('s_price');
        $tempProduct->quantity     = $request->input('quantity');
        $tempProduct->category_id  = $request->input('category_id');
        $tempProduct->supplier_id  = $request->input('supplier_id');
        $tempProduct->user_id      = Auth::User()->id;
        $tempProduct->save();

        if($tempProduct){
            return response()->json([
                'status' => 200,
                'message' => 'Saved Successfully...!'
            ]);
        }
        else{
            return response()->json([
            'status' => 400
            ]);
        }

        // return redirect('purchase')->with('success_response','Saved Successfully...');

    }

    public function refresh(){
        $user = User::find(Auth::user()->id);
        $products = $user->temp_products;
        // $products = TempProduct::with('categories')->where('user_id',Auth::user()->id)->get();
        // $category = Category::w('id', $products->category_id);
        return response()->json([
            'status'     => 200,
            'message'    => 'data get successfully',
            'products'   => $products,
            // 'categories' => $category,
        ]);
    }

    public function tempUpdate(Request $request){
        // return response()->json([
        //     'status' => 200
        // ]);
        // $request->validate([
        //     'p_id'         => 'required',
        //     'product_name' => 'required',
        //     'p_price'      => 'required',
        //     'ws_price'     => 'required',
        //     's_price'      => 'required',
        //     'quantity'     => 'required',
        //     'category_id'     => 'required',
        // ]);
        // dd($request->all)->toArray();
        $tempProduct = TempProduct::find($request->id);
        // return response()->json([
        //     'status' => 200,
        //     'id' => $tempProduct->product_name
        // ]);
        $tempProduct->product_name = $request->product_name;
        $tempProduct->p_code       = $request->p_code;
        $tempProduct->p_price      = $request->p_price;
        $tempProduct->ws_price     = $request->ws_price;
        $tempProduct->s_price      = $request->s_price;
        $tempProduct->quantity     = $request->quantity;
        $tempProduct->category_id  = $request->category_id;
        // $tempProduct->user_id      = Auth::User()->id;
        $tempProduct->save();
        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully..!'
        ]);
        // return redirect('purchase')->with('success_response','Updated Successfully...');
    }

    public function destroy($id){
        $product = TempProduct::find($id);
        if($product->user_id !== Auth::User()->id){
            return response()->json([
                'status' => 400,
                'message' => 'You Cannot Delete this Product...',
            ]);
        }
        $product->delete();
        return response()->json([
            'status' => 200,
            'message'=> 'Product Deleted...!'
        ]);


        // $product = TempProduct::find($id);
        // if($product->user_id !== Auth::User()->id)
        //     return back()->with('invalid_response','You Cannot Delete this Product...');

        // $product->delete();
        // return back()->with('success_response','Product Deleted...');


    }



}
