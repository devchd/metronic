<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Appbenefits;

class AppbenefitsController extends Controller {
	public function index(){
		$appbenefits = Appbenefits::all();

        return View::make('appbenefits.index')->with("appbenefits", $appbenefits);
	}

	public function create(){
		return View::make('appbenefits.new');
	}

	public function store(){
	    $category = Input::has("category") ? Input::get("category") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";
		if($category == "" || $description == ""){
            Session::flash("error", trans("appbenefits.notifications.field_name_missing"));

            return Redirect::to("/appbenefits/create")->withInput();
        }
        $appbenefits = Appbenefits::all()->last()->id;
        
		Appbenefits::create(
			array(
                'establishment_id' => $appbenefits+1,
				'category' => $category,
                'description'=>$description,
                'single_use'=>$single_use
			)
		);

		Session::flash('success', trans("appbenefits.notifications.register_successful"));

		return Redirect::to("/appbenefits");
	}

	public function edit($id){
        $appbenefits = Appbenefits::find($id);

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        return View::make('appbenefits.edit')->with("appbenefits", $appbenefits);
	}

	public function update(){
        $appbenefits = Appbenefits::find(Input::get("id"));

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        $category = Input::has("category") ? Input::get("category") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";
        
        if($category == "" || $description == ""){
            Session::flash("error", trans("appbenefits.notifications.field_name_missing"));

            return Redirect::to("/appbenefits/$appbenefits->id/edit")->withInput();
        }

        $appbenefits->category = $category;
        $appbenefits->description = $description;
        $appbenefits->single_use = $single_use;

        $appbenefits->save();

        Session::flash('success', trans("appbenefits.notifications.update_successful"));

        return Redirect::to("/appbenefits");
	}

	public function active($id){
        $appbenefits = Appbenefits::find($id);

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        $appbenefits->status = 1;
        $appbenefits->save();

        Session::flash('success', trans("appbenefits.notifications.activated_successful"));

        return Redirect::to("/appbenefits");
	}

	public function deactive($id){
        $appbenefits = Appbenefits::find($id);

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        $appbenefits->status = 0;
        $appbenefits->save();

        Session::flash('success', trans("appbenefits.notifications.deactivated_successful"));

        return Redirect::to("/appbenefits");
    }

    public function destroy(){
        $appbenefits = Appbenefits::find(Input::get("id"));

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        $appbenefits->delete();

        Session::flash('success', trans("appbenefits.notifications.delete_successful"));

        return Redirect::to("/appbenefits");
    }
}