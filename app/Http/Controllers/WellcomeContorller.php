<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productt;

class WellcomeContorller extends Controller {

    public function index() {
        $products= Productt::where('publication_status',1)->take(6)->get();
        return view('frontEnd.home.homeContent',['products'=>$products]);
    }

    public function categoriesDisplay($id) {
        $productsByCategorieId = Productt::where('categorie_id', $id)->where('publication_status', 1)->take(12)->get();
        return view('frontEnd.categories.categoriesContent',['productsByCategorieId' =>$productsByCategorieId]);
    }

    public function productContent($id) {
        $products= Productt::where('id',$id)->where('publication_status',1)->get();
//        $categoriesId=$products->categorie_id;
        $productsByCategorieId= Productt::where('publication_status',1)->orderBy('id','Desc')->take(5)->get();
        return view('frontEnd.product.productContent',['products'=>$products,'productsByCategorieId'=>$productsByCategorieId]);
    }

}
