<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Categories;

class CategoriesController extends Controller {
	public function index(){
		$categories = Categories::all();

        return View::make('categories.index')->with("categories", $categories);
	}

	public function create(){
		return View::make('categories.new');
	}

	public function store(){
	    $name = Input::has("name") ? Input::get("name") : "";
        
		if($name == ""){
            Session::flash("error", trans("categories.notifications.field_name_missing"));

            return Redirect::to("/categories/create")->withInput();
        }

		Categories::create(
			array(
				'name' => $name
			)
		);

		Session::flash('success', trans("categories.notifications.register_successful"));

		return Redirect::to("/categories");
	}

	public function edit($id){
        $categories = Categories::find($id);

        if(!$categories){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/categories");
        }

        return View::make('categories.edit')->with("categories", $categories);
	}

	public function update(){
        $categories = Categories::find(Input::get("id"));

        if(!$categories){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/categories");
        }

        $name = Input::has("name") ? Input::get("name") : "";
        
        if($name == ""){
            Session::flash("error", trans("categories.notifications.field_name_missing"));

            return Redirect::to("/categories/$categories->id/edit")->withInput();
        }

        $categories->name = $name;

        $categories->save();

        Session::flash('success', trans("categories.notifications.update_successful"));

        return Redirect::to("/categories");
	}

	public function active($id){
        $categories = Categories::find($id);

        if(!$categories){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/categories");
        }

        $categories->active = 1;
        $categories->save();

        Session::flash('success', trans("categories.notifications.activated_successful"));

        return Redirect::to("/categories");
	}

	public function deactive($id){
        $categories = Categories::find($id);

        if(!$categories){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/categories");
        }

        $categories->active = 0;
        $categories->save();

        Session::flash('success', trans("categories.notifications.deactivated_successful"));

        return Redirect::to("/categories");
    }

    public function destroy(){
        $categories = Categories::find(Input::get("id"));

        if(!$categories){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/categories");
        }

        $categories->delete();

        Session::flash('success', trans("categories.notifications.delete_successful"));

        return Redirect::to("/categories");
    }
}