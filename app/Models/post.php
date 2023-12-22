<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class post extends Model
{
    use HasFactory;

    private static $product,$image,$imageNewName,$directory,$imgUrl;
    public static function saveProduct($request){
        self::$product = new post();
        self::$product->title = $request->title;
        if($request->file('image')){
            self::$product->image = self::saveImage($request);
        }
        self::$product->save();
    }
    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName='stu-'.rand().'.' .self::$image->getClientOriginalExtension();
        self::$directory='admin-asset/product-image/product/';
        self::$imgUrl= self::$directory.self::$imageNewName;
        self::$image->move( self::$directory,self::$imageNewName);

        return  self::$imgUrl;
    }
    public static function deleteProduct($id){
        self::$product=post::find($id);
        if(self::$product->image){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
                self::$product->delete();
            }
        }
        else{
            self::$product->delete();
        }
    }
    public static  function productUpdate($request){
        self::$product=post::find($request->id);
        self::$product->title = $request->title;
        if( $request->file('image')){
            if(  self::$product->image){
                if(file_exists(  self::$product->image)){
                    unlink(  self::$product->image);
                    self::$product->image =self::saveImage($request);
                }
            }
            else{
                self::$product->image =self::saveImage($request);
            }
        }
        self::$product->save();
    }
    public static function productStatus($id){
        self::$product=post::find($id);

        if(self::$product->status == 1)
        {
            self::$product->status = 0;
        }else{
            self::$product->status = 1;
        }
        self::$product->save();
    }



}
