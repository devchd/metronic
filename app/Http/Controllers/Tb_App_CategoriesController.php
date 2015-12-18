<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Tb_App_Categories;

class Tb_App_CategoriesController extends Controller {
	public function index(){
		$tb_app_categories = Tb_App_Categories::all();

        return View::make('tb_app_categories.index')->with("tb_app_categories", $tb_app_categories);
	}

	public function create(){
		return View::make('tb_app_categories.new');
	}

	public function store(){
	    $name = Input::has("name") ? Input::get("name") : "";
        
		if($name == ""){
            Session::flash("error", trans("tb_app_categories.notifications.field_name_missing"));

            return Redirect::to("/tb_app_categories/create")->withInput();
        }

		Tb_App_Categories::create(
			array(
				'name' => $name
			)
		);

		Session::flash('success', trans("tb_app_categories.notifications.register_successful"));

		return Redirect::to("/tb_app_categories");
	}

	public function edit($id){
        $tb_app_categories = Tb_App_Categories::find($id);

        if(!$tb_app_categories){
            Session::flash('error', trans("tb_app_categories.notifications.no_exists"));

            return Redirect::to("/tb_app_categories");
        }

        return View::make('tb_app_categories.edit')->with("tb_app_categories", $tb_app_categories);
	}

	public function update(){
        $tb_app_categories = Tb_App_Categories::find(Input::get("id"));

        if(!$tb_app_categories){
            Session::flash('error', trans("tb_app_categories.notifications.no_exists"));

            return Redirect::to("/tb_app_categories");
        }

        $name = Input::has("name") ? Input::get("name") : "";
        
        if($name == ""){
            Session::flash("error", trans("tb_app_categories.notifications.field_name_missing"));

            return Redirect::to("/tb_app_categories/$tb_app_categories->id/edit")->withInput();
        }

        $tb_app_categories->name = $name;

        $tb_app_categories->save();

        Session::flash('success', trans("tb_app_categories.notifications.update_successful"));

        return Redirect::to("/tb_app_categories");
	}

	public function active($id){
        $tb_app_categories = Tb_App_Categories::find($id);

        if(!$tb_app_categories){
            Session::flash('error', trans("tb_app_categories.notifications.no_exists"));

            return Redirect::to("/tb_app_categories");
        }

        $tb_app_categories->active = 1;
        $tb_app_categories->save();

        Session::flash('success', trans("tb_app_categories.notifications.activated_successful"));

        return Redirect::to("/tb_app_categories");
	}

	public function deactive($id){
        $tb_app_categories = Tb_App_Categories::find($id);

        if(!$tb_app_categories){
            Session::flash('error', trans("tb_app_categories.notifications.no_exists"));

            return Redirect::to("/tb_app_categories");
        }

        $tb_app_categories->active = 0;
        $tb_app_categories->save();

        Session::flash('success', trans("tb_app_categories.notifications.deactivated_successful"));

        return Redirect::to("/tb_app_categories");
    }

    public function destroy(){
        $tb_app_categories = Tb_App_Categories::find(Input::get("id"));

        if(!$tb_app_categories){
            Session::flash('error', trans("tb_app_categories.notifications.no_exists"));

            return Redirect::to("/tb_app_categories");
        }

        $tb_app_categories->delete();

        Session::flash('success', trans("tb_app_categories.notifications.delete_successful"));

        return Redirect::to("/tb_app_categories");
    }
}