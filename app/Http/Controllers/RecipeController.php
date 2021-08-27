<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe, App\Image_recipe, App\Step, App\Ingredient,App\Type;
use Illuminate\Http\UploadFile;
use App;
use App\User;
use auth;
use DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB as FacadesDB;

class RecipeController extends Controller
{

    public function getRecipe()
    {
        if(FacadesAuth::user()->is_admin){
              $type=Type::all();
            //   $recipe = Recipe::all();
              $recipe=FacadesDB::table('types')
              ->select('types.id as typeId','types.name','types.name_ar','recipes.id','recipes.type_id','recipes.recipe_name','recipes.recipe_description')
              ->join('recipes','recipes.type_id','=','types.id')
              ->where('recipes.deleted_at',null)
              ->get();
              $user=User::where('is_admin',false)->get();
              return Response()->json([
              'recipes' => $recipe,
              'users'=>$user,
              'userCount'=>User::where('is_admin',false)->count(),
              'recipeCount'=>FacadesDB::table('recipes')->where('deleted_at',null)->count(),
              'typeCount'=>FacadesDB::table('types')->where('deleted_at',null)->count(),
              'types'=>$type,
            //   'tests'=>$test,
              ]);
             return view('recipes.dashboard');
        }else{
            return view('welcome');
        }

    }
    public function addRecipe(Request $request)
    {
        $this->validate($request, [
            'recipe_name' => 'required|max:400|min:2',
            'recipe_description' => 'required|max:1500',
            // 'type_id' => 'required'
        ]);
        // $type=Type::find($request->typeId);
        $recipe = new Recipe();
        $recipe->recipe_name = $request->recipe_name;
        $recipe->recipe_description = $request->recipe_description;
        $recipe->type_id=$request->type_id;
        $recipe->save();
        $recipe = Recipe::find($recipe->id);
        $images = $recipe->image_recipe()->get();
        $ingredients = $recipe->ingredient()->get();
        $steps=$recipe->step()->get();
        return response()->json([
            'etat' => true,
            'images' => $images,
            'ingredients' => $ingredients,
            'steps'=>$steps,
            'recipeid' => $recipe->id,
        ]);
    }
    public function updateRecipe(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->recipe_name = $request->recipe_name;
        $recipe->recipe_description = $request->recipe_description;
        $recipe->type_id=$request->type_id;
        $recipe->save();
        return response()->json(['etat' => true]);
    }
    public function deleteRecipe($id)
    {
        $recipe = Recipe::find($id);
        $irecipe = $recipe->image_recipe()->delete();
        $ingredient = $recipe->ingredient()->delete();
        $step=$recipe->step()->delete();
        $recipe->delete();
        return response()->json(['etat' => true]);
    }
    public function show($id)
    {
        $recipe = Recipe::find($id);
        $images = $recipe->image_recipe()->get();
        $ingredients = $recipe->ingredient()->get();
        $steps=$recipe->step()->get();
        return response()->json([
            'images' => $images,
            'recipeid' => $id,
            'ingredients' => $ingredients,
            'steps'=>$steps
        ]);
    }
    public function addImage(Request $request, $recipeid)
    {
        $irecipe = new Image_recipe();
        foreach ($request->photos as $photo) {
            $name = $photo->getClientOriginalName();
            $photo->move(public_path() . '/files/', $name);
            $data[] = $name;
            $irecipe::create([
                'photo' => $name,
                'recipe_id' => $recipeid
            ]);
        }
        return response()->json([
            'etat' => true,
            'id_image' => $irecipe->id,
        ]);
    }
    public function deleteImage($id)
    {
        $image = Image_recipe::find($id);
        $image->delete();
        return response()->json(['etat' => true]);
    }

    public function addIngredient(Request $request, $id)
    {
        $ingredient = new Ingredient();
        foreach ($request->desc_integeredients as $name) {
            $data[] = $name;
            $ingredient::create([
                'desc_integeredient' => $name,
                'recipe_id' => $id
            ]);
        }
        return response()->json(['etat' => true]);
    }
    public function deleteIngredient($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return response()->json(['etat' => true]);
    }
    public function updateIngredient(Request $request)
    {
        $ingredient = Ingredient::find($request->id);
        $ingredient->desc_integeredient = $request->desc_integeredient;
        $ingredient->save();
        return response()->json(['etat' => true]);
    }
    public function addSteps(Request $request, $id)
    {
        $step = new Step();
            foreach ($request->desc_steps as $name) {
            $data[] = $name;
            $step::create([
            'desc_steps' => $name,
            'recipe_id' => $id
            ]);
            }
        return response()->json(['etat' => true]);
    }
    public function deletestep($id)
    {
    $step = Step::find($id);
    $step->delete();
    return response()->json(['etat' => true]);
    }
      public function updatesteps(Request $request)
      {
      $step = Step::find($request->id);
      $step->desc_steps = $request->desc_steps;
      $step->save();
      return response()->json(['etat' => true]);
      }
       public function deleteUser($id)
       {
       $user = User::find($id);
       $user->delete();
       return response()->json(['etat' => true]);
       }
       public function UpdateUser(Request $request){
           $user=User::find($request->id);
           $user->is_admin=$request->is_admin;
           $user->save();
           return response()->json([
               'etat'=>true
           ]);
       }
}