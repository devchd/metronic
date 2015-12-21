<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Appbenefits;
use App\Models\AppBenefitI18n;
use DB;
class AppbenefitsController extends Controller {
	public function index(){
		$appbenefits = Appbenefits::with('establishment')->get();

        return View::make('appbenefits.index')->with("appbenefits", $appbenefits);
	}

	public function create(){
        $establishments = DB::table('tb_app_establishments')->get();
		return View::make('appbenefits.new')->with("establishments", $establishments);
	}

	public function store(){
	    $category = Input::has("category") ? Input::get("category") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";
        $establishment_id= Input::has("establishment_id") ? Input::get("establishment_id") : "";
		
        if($category == "" || $description == "" || $establishment_id == ""){
            Session::flash("error", trans("appbenefits.notifications.field_name_missing"));

            return Redirect::to("/appbenefits/create")->withInput();
        }
        
        
		Appbenefits::create(
			array(
                'establishment_id' => $establishment_id,
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

        $establishments = DB::table('tb_app_establishments')->get();
        return View::make('appbenefits.edit')->with("appbenefits", $appbenefits)
                    ->with("establishments", $establishments);
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
        $establishment_id= Input::has("establishment_id") ? Input::get("establishment_id") : "";

        if($category == "" || $description == "" || $establishment_id == ""){
            Session::flash("error", trans("appbenefits.notifications.field_name_missing"));

            return Redirect::to("/appbenefits/$appbenefits->id/edit")->withInput();
        }
        
        $appbenefits->establishment_id = $establishment_id;
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

    public function translations($id){
        $appbenefits = AppBenefitI18n::where('benefit_id', $id)->get();

        return View::make('appbenefits.langindex')->with("appbenefits", $appbenefits)->with("id",$id);
    }

    public function langcreate($id){
        
        return View::make('appbenefits.langnew')->with("id",$id);
    }

    public function langstore(){
        $lang = Input::has("lang") ? Input::get("lang") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $benefit_id = Input::has("benefit_id") ? Input::get("benefit_id") : "";
        
        if($lang == "" || $description == "" ){
            Session::flash("error", trans("appbenefits.notifications.field_name_missing"));

            return Redirect::to("/appbenefits/create/".$id."/lang")->withInput();
        }
        
        
        AppBenefitI18n::create(
            array(
                'benefit_id' => $benefit_id,
                'lang' => $lang,
                'description'=>$description
            )
        );

       
        Session::flash('success', trans("appbenefits.notifications.register_successful"));

        return Redirect::to("/appbenefits/translations/".$benefit_id);
    }

    public function langedit($id){
        $appbenefits = AppBenefitI18n::find($id);

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits/translations/".$appbenefits->benefit_id);
        }

        return View::make('appbenefits.langedit')->with("appbenefits", $appbenefits);
    }

    public function langupdate(){
        $appbenefits = AppBenefitI18n::find(Input::get("id"));

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        $lang = Input::has("lang") ? Input::get("lang") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        
        if($lang == "" || $description == ""){
            Session::flash("error", trans("appbenefits.notifications.field_name_missing"));

            return Redirect::to("/appbenefits/$appbenefits->id/editlang")->withInput();
        }
        
        $appbenefits->lang = $lang;
        $appbenefits->description = $description;
       
        $appbenefits->save();

        Session::flash('success', trans("appbenefits.notifications.update_successful"));

        return Redirect::to("/appbenefits/translations/".$appbenefits->benefit_id);
    }

    public function langdestroy(){
        $appbenefits = AppBenefitI18n::find(Input::get("id"));

        if(!$appbenefits){
            Session::flash('error', trans("appbenefits.notifications.no_exists"));

            return Redirect::to("/appbenefits");
        }

        $appbenefits->delete();

        Session::flash('success', trans("appbenefits.notifications.delete_successful"));

        return Redirect::to("/appbenefits");
    }
}