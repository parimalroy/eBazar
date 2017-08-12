<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;

class ManufactureController extends Controller {

    public function index() {
        return view('admin.manufacture.addManufacture');
    }

    public function saveManufacture(Request $request) {

        $this->manufactureValidation($request);
        $this->createManufacture($request);
        return redirect('manufacture/add')->with('message', 'Save Sucessfully');
    }
    
    public function manageManufacture(Request $request){
        $manufactures= Manufacture::all();
        return view('admin.manufacture.manageManufacture',['manufactures'=>$manufactures]);
    }
    
    public function unpublishManufacture(Request $request){
        $manufactureById= Manufacture::find($request->manufacture_id);
        $manufactureById->publication_status=0;
        $manufactureById->save();
        return redirect('manufacture/manage')->with('message','Unpublish Sucessfully');
    }
    
    public function PublishManufacture(Request $request){
        $manufactureById= Manufacture::find($request->manufacture_id);
        $manufactureById->publication_status=1;
        $manufactureById->save();
        return redirect('manufacture/manage')->with('message','Publish Sucessfully');
    }
    
    public function deleteManufacture(Request $request){
        $manufactureById= Manufacture::find($request->manufacture_id);
        $manufactureById->delete();
        return redirect('manufacture/manage')->with('message','Delete Sucessfully');
    }
    
    public function editManufacture(Request $request){
        $manufactureById= Manufacture::find($request->manufacture_id);
        $manufactureById->all();
        return view('admin.manufacture.editManufacture',['manufactureById'=>$manufactureById]);
    }

    public function updateManufacture(Request $request){
      $manufactureById= Manufacture::find($request->manufacture_id);
      $manufactureById->manufacture_name=$request->manufacture_name;
      $manufactureById->manufacture_description=$request->manufacture_description;
      $manufactureById->publication_status=$request->publication_status;
      $manufactureById->save();
      return redirect('manufacture/manage')->with('message','Update Sucessfully');
    }

    //function

    private function manufactureValidation($request) {
        $this->validate($request, [
            'manufacture_name' => 'required|unique:manufactures|max:100',
            'manufacture_description' => 'required'
        ]);
    }

    private function createManufacture($request) {
        $manufacture = new Manufacture ();
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->manufacture_description = $request->manufacture_description;
        $manufacture->publication_status = $request->publication_status;
        $manufacture->save();
    }

}
