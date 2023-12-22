<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;



class PostController extends Controller
{
    //
    public static  $products,$product,$dateFilter;

    public function addProduct(){
        return view('admin.product.add-product');
    }
    public function manageProduct(){
        self::$products=post::all();
        return view('admin.product.manage-product',[
            'products'=>self::$products
        ]);

    }
    public function saveProduct(Request $request){
        post::saveProduct($request);
        return back()->with('message', 'Info saved');
    }
    public function productDelete(Request $request){
        post::deleteProduct($request->id);
        return back()->with('message', 'Info deleted');

    }
    public function productEdit($id){
        self::$product=post::find($id);
        return view('admin.product.product-edit',[
            'product'=>self::$product
        ]);
    }
    public function productUpdate(Request $request){
        post::productUpdate($request);
        return back()->with('message', 'Info updated');
    }
    public function productStatus($id){
        post::productStatus($id);
        return back()->with('message', 'Info updated');
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $students = post::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $students = post::latest()->get();
                }
            } else {
                $students = post::latest()->get();
            }

            return response()->json([
                'students' => $students
            ]);
        } else {
            abort(403);
        }
    }


}
