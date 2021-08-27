<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe, App\Image_recipe, App\Step, App\Ingredient,App\User;
use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\Auth;
use App;
use App\Type;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class UserController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
   }

   public function user_recipe()
   {
       /***********************************filter getdata *************************************/
    //  put that in route::::::  {filter?}
    //   put that like parametre in function:::::  $filter = null
    /***********************************getdata *************************************/
      $type=Type::all();
       $user_recipes =Recipe::orderBy('id','desc')->with('image_recipe')->get()->toArray();
       /***********************************getdata *************************************/
    // $user_recipes =FacadesDB::table('types')
    //   ->select('recipes.id','recipes.type_id','recipes.recipe_name','recipes.recipe_description','recipes.created_at','image_recipes.photo','image_recipes.recipe_id')
    //   ->join('recipes','recipes.type_id','=','types.id')
    //   ->join('image_recipes','image_recipes.recipe_id','=','recipes.id')
    //   ->where('recipes.deleted_at',null)
    //   ->where('image_recipes.deleted_at',null)
    //   ->groupBy('image_recipes.recipe_id')
    //   ->get();
    /*********************************** filter getdata *************************************/
    //    if($filter !== null) {
    //        $user_recipes = Recipe::with('image_recipe')->=here('type_id',$filter)->get();
    //    } else {
    //        $user_recipes = Recipe::with('image_recipe')->get();
    //    }

   return Response()->json([
   'user_recipes' => $user_recipes,
   'types'=>$type
   ]);
//        $user_recipes = Recipe::with('image_recipe')->get();
//        if($request->input('ramadan'))
//        {
//            $recipe_ramadan=Recipe::with('image_recipe')->where('type_recipes','رمضان')->get();
//        }
//    return Response()->json([
//    'user_recipes' => $user_recipes,
//    'ramadans'=>$recipe_ramadan
//    ]);
   }
   public function Show_recipe($id)
   {
      $recipe = Recipe::find($id);
      $images = $recipe->image_recipe()->get();
      $ingredients = $recipe->ingredient()->get();
      $steps=$recipe->step()->get();
      return response()->json([
      'images' => $images,
      'ingredients' => $ingredients,
      'steps'=>$steps
      ]);
   }
   public function showtype($id){


    $type=Type::find($id);
    $recipe=$type->recipe()->with('image_recipe')->get();
    // $imagetype=FacadesDB::table('image_recipes')->where('recipe_id',)->get();
    /**************************************************** */
    // Image_recipe::find($request->id)->get();
    /********************************************* */
    //  $recipe=$type->with(['recipe','image_recipe'])->get();
    // $image=$recipe->image_recipe()->get();
    /******************************************************************* */
    //    $recipe = FacadesDB::table('types')
    //    ->join('recipes','recipes.type_id','=','types.id')
    //    ->join('image_recipes','image_recipes.recipe_id','=','recipes.id')
    //    ->select('recipes.id','recipes.type_id','recipes.recipe_name','recipes.recipe_description','recipes.created_at','image_recipes.photo')
    //    ->groupBy('recipes.id')
    //    ->where('recipes.deleted_at',null)
    //    ->where('image_recipes.deleted_at',null)
    //    ->where('types.id','=',$id)
    //    ->take(count($recipe))
    //    ->get();
    //    ->first();
    /******************************************************** */
       return response()->json([
           'typerecipes'=>$recipe,
        //    'imagetypes'=>$imagetype
        //    'typeimages'=>$image
       ]);
   }
   public function search($search,Request $request){
      $user_recipes="";
       if($request->filled('search')){
           $user_recipes =Recipe::orderBy('id','desc')->with('image_recipe')->get()->toArray();

       }else{

       $user_recipes=Recipe::where('recipe_name','like','%'.$search.'%')
   ->orderBy('id','desc')
 ->with('image_recipe')
 ->get()
 ->toArray();
       }
return response()->json([
'searchRecipes'=>$user_recipes
]);

   }
}