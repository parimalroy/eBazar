<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller {

    public function index() {
        return view('admin.categories.addCategorie');
    }

    public function saveCategorie(Request $request) {

        $this->createValidation($request);
        $this->createCategorie($request);

        return redirect('/categorie/add')->with('message', 'Categorie Save Sucessfully');
    }
    
    public function manageCategorie(Request $request){
        $getAllCategories= Categorie::all();
        return view('admin.categories.manaageCategorie',['getAllCategories'=>$getAllCategories]);
    }
    
    public function unPublishCategorie(Request $request){
        $categorieById= Categorie::find($request->categore_id);
        $categorieById->publication_status=0;
        $categorieById->save();
        return redirect('categorie/manage')->with('message','Unpublish Sucessfully');
    }
    
    public function publishCategorie(Request $request){
        $categorieById= Categorie::find($request->categore_id);
        $categorieById->publication_status=1;
        $categorieById->save();
        return redirect('categorie/manage')->with('message','Publish Sucessfully');
    }

    public function deleteCategorie(Request $request){
        $categorieById= Categorie::find($request->categore_id);
        $categorieById->delete();
        return redirect('categorie/manage')->with('message','Delete Sucessfully');
    }
    
    public function editCategorie(Request $request){
        $categoriesById= Categorie::find($request->categore_id);
        return view('admin.categories.editCategorie',['categoriesById'=>$categoriesById]);
    }

    
    public function updateCategorie(Request $request){
        $categoriesByID= Categorie::find($request->categore_id);
        $categoriesByID->categorie_name=$request->categorie_name;
        $categoriesByID->categoire_description=$request->categoire_description;
        $categoriesByID->publication_status=$request->publication_status;
        $categoriesByID->save();
        return redirect('categorie/manage')->with('message','Update Sucessfully');
    }

    

    //function
    private function createValidation($request) {
        $this->validate($request, [
            'categorie_name' => 'required|unique:categories|max:100',
            'categoire_description' => 'required',
        ]);
    }

    private function createCategorie($request) {
        $categories = new Categorie();
        $categories->categorie_name = $request->categorie_name;
        $categories->categoire_description = $request->categoire_description;
        $categories->publication_status = $request->publication_status;
        $categories->save();
    }

}
