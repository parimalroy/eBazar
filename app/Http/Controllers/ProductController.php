<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Manufacture;
use App\Productt;
Use Image;
use DB;

class ProductController extends Controller {

    public function index() {
        $categoriesById = Categorie::where('publication_status', 1)->get();
        $manufacturesById = Manufacture::where('publication_status', 1)->get();
        return view('admin.product.addProduct', ['categoriesById' => $categoriesById, 'manufacturesById' => $manufacturesById]);
    }

    public function saveProduct(Request $request) {
        $this->validation($request);
        
        $productMainImage = $this->productImage($request, 'product_main_image', 'product_name', 'product_image/mainImage/');
        $productImage1 = $this->productImage($request, 'product_image1', 'product_name', 'product_image/subImage1/');
        $productImage2 = $this->productImage($request, 'product_image2', 'product_name', 'product_image/subImage2/');

        $this->createSave($request, $productMainImage, $productImage1, $productImage2);
        return redirect('product/add')->with('message', 'Product Save Sucessfully');
    }

    public function manageProduct(){
        $products = DB::table('productts')
            ->join('categories', 'productts.categorie_id', '=', 'categories.id')
            ->join('manufactures', 'productts.manufacture_id', '=', 'manufactures.id')
            ->select('productts.*', 'categories.categorie_name', 'manufactures.manufacture_name')
            ->get();
        return view('admin.product.manageProduct',['products'=>$products]);
    }

    public function unPublishProduct(Request $request){
        $productById= Productt::find($request->product_id);
        $productById->publication_status=0;
        $productById->save();
        return redirect('product/manage')->with('message','Unpublish Sucessfully');
    }
    
    public function publishProduct(Request $request){
        $productById= Productt::find($request->product_id);
        $productById->publication_status=1;
        $productById->save();
        return redirect('product/manage')->with('message','Publish Sucessfully');
    }
    
    public function deleteProduct(Request $request){
        $productById= Productt::find($request->product_id);
        unlink($productById->product_main_image);
        unlink($productById->product_image1);
        unlink($productById->product_image2);
        $productById->delete();
        return redirect('product/manage')->with('message','Delete Sucessfully');
    }

    //function
    private function validation($request) {
        $this->validate($request, [
            'product_name' => 'required|Unique:productts|max:100',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_description' => 'required',
            'product_main_image' => 'required',
            'product_image1' => 'required',
            'product_image2' => 'required',
        ]);
    }

    private function productImage($request, $imageType, $productName, $ImageFolder) {
        $productImage = $request->file($imageType);
        $ImageExtension = $productImage->getClientOriginalExtension();
        $uploadPath = $ImageFolder;
        $imageName = $request->$productName . '.' . $ImageExtension;
        $imageUrl = $uploadPath . $imageName;
        Image::make($productImage)->resize(210, 285)->save($uploadPath . $imageName);
        return $imageUrl;
    }

    private function createSave($request, $productMainImage, $productImage1, $productImage2) {
        $products = new Productt();
        $products->product_name = $request->product_name;
        $products->categorie_id = $request->categorie_id;
        $products->manufacture_id = $request->manufacture_id;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->product_short_description = $request->product_short_description;
        $products->product_description = $request->product_description;
        $products->product_main_image = $productMainImage;
        $products->product_image1 = $productImage1;
        $products->product_image2 = $productImage2;
        $products->publication_status = $request->publication_status;
        $products->save();
    }

}
