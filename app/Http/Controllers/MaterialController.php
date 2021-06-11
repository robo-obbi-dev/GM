<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function addMaterial(Request $request)
    {
       $material = Material::create($request->all());

       return response()->json([
            'message' => 'Location save !!',
            'Material' => $material

       ]);

        
    }


    public function ListMaterial()
    {
      // Category::orderByDesc('created_at')->get(); pour le tri

       return response()->json(Material::all(), 200);
    }


     public function ListMaterialById($id)
    { 
            $material = Material::find($id);
               if(is_null($material)){

                 return response()->json([
                     'message' => 'Material not found !!'
                  ]);


                }
       return response()->json($material, 200);
    }



    public function UpdateMaterial(Request $request, $id)
    {
      $material = Material::find($id);

               if(is_null($material)){

                 return response()->json([
                     'message' => 'Material not found !!'
                  ]);

                }

       $material->update($request->all());

       return response()->json([
                  'message' => 'update success',
                  'Material' => $material
        ], 200);

        
    }


    public function DeleteMaterial(Request $request, $id)
    {

      $material = Material::find($id);

               if(is_null($material)){

                  return response()->json([
                     'message' => 'material not found !!'
                  ]);

                }

       $material->delete();

       return response()->json([
                  'message' => 'deleted success',
       ], 200);

        
    }




   
}
