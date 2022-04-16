<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempProduct;
use Illuminate\Support\Facades\Auth;

class TempProductController extends Controller
{
    public function tempCreate(Request $request){
        $request->validate([
            'product_name' => 'required',
            'p_price'      => 'required|integer',
            'ws_price'     => 'required',
            's_price'      => 'required',
            'quantity'     => 'required',
            'category_id'     => 'required',
        ]);

        $tempProduct = new TempProduct;
        $tempProduct->product_name = $request->input('product_name');
        $tempProduct->p_code       = $request->input('p_code');
        $tempProduct->p_price      = $request->input('p_price');
        $tempProduct->ws_price     = $request->input('ws_price');
        $tempProduct->s_price      = $request->input('s_price');
        $tempProduct->quantity     = $request->input('quantity');
        $tempProduct->user_id      = Auth::User()->id;
        $tempProduct->category_id  = $request->category_id;
        $tempProduct->save();
        return redirect('purchase')->with('success_response','Saved Successfully...');

    }

    public function tempUpdate(Request $request){
        $request->validate([
            'p_id'         => 'required',
            'product_name' => 'required',
            'p_price'      => 'required',
            'ws_price'     => 'required',
            's_price'      => 'required',
            'quantity'     => 'required',
            'category_id'     => 'required',
        ]);
        // dd($request->all)->toArray();
        $tempProduct = TempProduct::find($request->p_id);
        $tempProduct->product_name    = $request->product_name;
        $tempProduct->p_code          = $request->p_code;
        $tempProduct->p_price         = $request->p_price;
        $tempProduct->ws_price        = $request->ws_price;
        $tempProduct->s_price         = $request->s_price;
        $tempProduct->quantity        = $request->quantity;
        // $tempProduct->category_id     = $request->category_id;
        $tempProduct->user_id         = Auth::User()->id;
        $tempProduct->save();
        return redirect('purchase')->with('success_response','Updated Successfully...');
    }

    public function destroy($id){
        // $id = Auth::User()->id;
        $product = TempProduct::find($id);
        if($product->user_id !== Auth::User()->id)
            return back()->with('invalid_response','You Cannot Delete this Product...');

        $product->delete();
        return back()->with('success_response','Product Deleted...');


    }



}
