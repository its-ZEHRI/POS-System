<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SupplierController extends Controller
{
    public function index()
    {
        return view('app.supplier');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $supplier = new Supplier;
        $supplier->name = $request->input('name');
        if($request->input('contact') == '')
            $supplier->contact = 'N/A';
        else
            $supplier->contact = $request->input('contact');
        if($request->input('address') == '')
            $supplier->address = 'N/A';
        else
            $supplier->address = $request->input('address');
        $supplier->user_id = Auth::user()->id;
        $supplier->save();

        if($supplier){
            return response()->json([
                'status' => 200,
                'message' => 'Supplier Created Successfully...!'
            ]);
        }
        return response()->json([
            'status' => 400,
            'message' => 'Error...!'
        ]);
    }
    public function refresh(){
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 200,
            'suppliers' => $user->suppliers
        ]);
    }
}
