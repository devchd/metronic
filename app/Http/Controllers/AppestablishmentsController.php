<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Appestablishments;
use App\Models\AppEstablishmentI18n;
use DB;
class AppestablishmentsController extends Controller {
	public function index(){
		$appestablishments = Appestablishments::all();

        return View::make('appestablishments.index')->with("appestablishments", $appestablishments);
	}

	public function create(){
        $category = DB::table('tb_app_categories')->get();
		return View::make('appestablishments.new')->with('category',$category);
	}

	public function store(){
	    $name = Input::has("name") ? Input::get("name") : "";
        $image = Input::has("image") ? Input::get("image") : "";
        $category = Input::has("category") ? Input::get("category") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $address = Input::has("address") ? Input::get("address") : "";
        $lat = Input::has("lat") ? Input::get("lat") : "";
        $lon = Input::has("lon") ? Input::get("lon") : "";
        $site = Input::has("site") ? Input::get("site") : "";
        $phone = Input::has("phone") ? Input::get("phone") : "";
        
		if($name == "" || $image=="" || $category=="" || $description=="" || $address="" || $lat=="" || $lon=""){
            Session::flash("error", trans("appestablishments.notifications.field_name_missing"));

            return Redirect::to("/appestablishments/create")->withInput();
        }

		Appestablishments::create(
			array(
				'name' => $name,
                'image'=> $image,
                'category'=> $category,
                'description'=> $description,
                'address'=> $address,
                'lat'=> $lat,
                'lon'=> $lon,
                'site'=> $site,
                'phone'=> $phone
			)
		);

		Session::flash('success', trans("appestablishments.notifications.register_successful"));

		return Redirect::to("/appestablishments");
	}

	public function edit($id){
        $appestablishments = Appestablishments::find($id);

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }
        $category = DB::table('tb_app_categories')->get();
        return View::make('appestablishments.edit')->with("appestablishments", $appestablishments)
                    ->with('category',$category);
	}

	public function update(){
        $appestablishments = Appestablishments::find(Input::get("id"));

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }

        $name = Input::has("name") ? Input::get("name") : "";
        $image = Input::has("image") ? Input::get("image") : "";
        $category = Input::has("category") ? Input::get("category") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $address = Input::has("address") ? Input::get("address") : "";
        $lat = Input::has("lat") ? Input::get("lat") : "";
        $lon = Input::has("lon") ? Input::get("lon") : "";
        $site = Input::has("site") ? Input::get("site") : "";
        $phone = Input::has("phone") ? Input::get("phone") : "";
        
        if($name == "" || $image=="" || $category=="" || $description=="" || $address="" || $lat=="" || $lon=""){
            Session::flash("error", trans("appestablishments.notifications.field_name_missing"));

            return Redirect::to("/appestablishments/$appestablishments->id/edit")->withInput();
        }

        //var_dump($address,$lon);exit;
        $appestablishments->name = $name;
        $appestablishments->image = $image;
        $appestablishments->category = $category;
        $appestablishments->description = $description;
        $appestablishments->address = $address;
        $appestablishments->lat = $lat;
        $appestablishments->lon = $lon;
        $appestablishments->site = $site;
        $appestablishments->phone = $phone;


        $appestablishments->save();

        Session::flash('success', trans("appestablishments.notifications.update_successful"));

        return Redirect::to("/appestablishments");
	}

	public function active($id){
        $appestablishments = Appestablishments::find($id);

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }

        $appestablishments->status = 1;
        $appestablishments->save();

        Session::flash('success', trans("appestablishments.notifications.activated_successful"));

        return Redirect::to("/appestablishments");
	}

	public function deactive($id){
        $appestablishments = Appestablishments::find($id);

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }

        $appestablishments->status = 0;
        $appestablishments->save();

        Session::flash('success', trans("appestablishments.notifications.deactivated_successful"));

        return Redirect::to("/appestablishments");
    }

    public function destroy(){
        $appestablishments = Appestablishments::find(Input::get("id"));

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }

        $appestablishments->delete();

        Session::flash('success', trans("appestablishments.notifications.delete_successful"));

        return Redirect::to("/appestablishments");
    }

    public function displayTranslation($id){
        $appestablishments = AppEstablishmentI18n::where('establishment_id',$id)->get();

        return View::make('appestablishments.langindex')->with("appestablishments", $appestablishments)->with('id',$id);
    }

    public function langcreate($id){
        return View::make('appestablishments.langnew')->with('id',$id);
    }

    public function langstore(){
        $name = Input::has("name") ? Input::get("name") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $lang = Input::has("lang") ? Input::get("lang") : "";
        $establishment_id = Input::has("establishment_id") ? Input::get("establishment_id") : "";
        
        if($name == "" || $description=="" || $lang="" ){
            Session::flash("error", trans("appestablishments.notifications.field_name_missing"));

            return Redirect::to("/appestablishments/create/".$establishment_id."/lang")->withInput();
        }

        AppEstablishmentI18n::create(
            array(
                'establishment_id'=> $establishment_id,
                'name' => $name,
                'description'=> $description,
                'lang'=> $lang
                
            )
        );

        Session::flash('success', trans("appestablishments.notifications.register_successful"));

        return Redirect::to("/appestablishments/translation".$establishment_id);
    }
    public function langedit($id){
        $appestablishments = AppEstablishmentI18n::find($id);

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }
        return View::make('appestablishments.langedit')->with("appestablishments", $appestablishments);
    }

    public function langupdate(){
        $appestablishments = AppEstablishmentI18n::find(Input::get("id"));

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }

        $name = Input::has("name") ? Input::get("name") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $lang = Input::has("lang") ? Input::get("lang") : "";
        $establishment_id = Input::has("establishment_id") ? Input::get("establishment_id") : "";
        
        
        if($name == "" || $description=="" || $lang="" ){
            Session::flash("error", trans("appestablishments.notifications.field_name_missing"));

            return Redirect::to("/appestablishments/$appestablishments->id/langedit")->withInput();
        }


        $appestablishments->name = $name;
        $appestablishments->lang = $lang;
        $appestablishments->description = $description;

        $appestablishments->save();

        Session::flash('success', trans("appestablishments.notifications.update_successful"));

        return Redirect::to("/appestablishments/translation/".$establishment_id);
    }

    public function langdestroy(){
        $appestablishments = AppEstablishmentI18n::find(Input::get("id"));

        if(!$appestablishments){
            Session::flash('error', trans("appestablishments.notifications.no_exists"));

            return Redirect::to("/appestablishments");
        }

        $appestablishments->delete();

        Session::flash('success', trans("appestablishments.notifications.delete_successful"));

        return Redirect::to("/appestablishments");
    }
}