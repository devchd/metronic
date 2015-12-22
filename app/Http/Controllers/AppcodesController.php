<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Appcodes;
use DB;
class AppcodesController extends Controller {
	public function index($id){
		$appcodes = Appcodes::where('benefit_id', $id)->get();

        return View::make('appcodes.index')->with("appcodes", $appcodes)->with("benefit_id",$id);
	}

	public function create($benefit_id){
        //$benefits = DB::table('tb_app_establishments')->get();
		return View::make('appcodes.new')->with("benefit_id" , $benefit_id);
	}

	public function store(){
        $benefit_id = Input::has("benefit_id") ? Input::get("benefit_id") : "";
	    $number = Input::has("number") ? Input::get("number") : "";
        $bar_code = "data:image/png;base64," . \DNS1D::getBarcodePNG($number, "C39+");
        $client = Input::has("client") ? Input::get("client") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";

		if($number == "" || $bar_code == "" || $client == "" || $benefit_id == ""){
            Session::flash("error", trans("appcodes.notifications.field_name_missing"));

            return Redirect::to("/appcodes/create/".$benefit_id)->withInput();
        }

		Appcodes::create(
			array(
                'benefit_id' => $benefit_id,
				'number' => $number,
                'bar_code'=> $bar_code,
                'client'=> $client,
                'single_use'=>$single_use,
                'status' => 1
			)
		);

        

		Session::flash('success', trans("appcodes.notifications.register_successful"));

		return Redirect::to("/appcodes/".$benefit_id);
	}

	public function edit($id){
        $appcodes = Appcodes::find($id);

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes");
        }

        
        return View::make('appcodes.edit')->with("appcodes", $appcodes);
	}

	public function update(){
        $appcodes = Appcodes::find(Input::get("id"));

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes/".$appcodes->benefit_id);
        }

        $benefit_id = Input::has("benefit_id") ? Input::get("benefit_id") : "";
        $number = Input::has("number") ? Input::get("number") : "";
        $bar_code = "data:image/png;base64," . \DNS1D::getBarcodePNG($number, "C39+");
        $client = Input::has("client") ? Input::get("client") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";
        
        if($number == "" || $bar_code == "" || $client == "" || $benefit_id == ""){
            Session::flash("error", trans("appcodes.notifications.field_name_missing"));

            return Redirect::to("/appcodes/$appcodes->id/edit")->withInput();
        }

        $appcodes->benefit_id = $benefit_id;
        $appcodes->number = $number;
        $appcodes->bar_code = $bar_code;
        $appcodes->client = $client;
        $appcodes->single_use = $single_use;
        $appcodes->save();

        Session::flash('success', trans("appcodes.notifications.update_successful"));

        return Redirect::to("/appcodes/".$benefit_id);
	}

	public function active($id){
        $appcodes = Appcodes::find($id);

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes");
        }

        $appcodes->status = 1;
        $appcodes->save();

        Session::flash('success', trans("appcodes.notifications.activated_successful"));

        return Redirect::to("/appcodes");
	}

	public function deactive($id){
        $appcodes = Appcodes::find($id);

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes");
        }

        $appcodes->status = 0;
        $appcodes->save();

        Session::flash('success', trans("appcodes.notifications.deactivated_successful"));

        return Redirect::to("/appcodes");
    }

    public function destroy(){
        $appcodes = Appcodes::find(Input::get("id"));

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes/".$appcodes->benefit_id);
        }

        $appcodes->delete();

        Session::flash('success', trans("appcodes.notifications.delete_successful"));

        return Redirect::to("/appcodes/".$appcodes->benefit_id);
    }
}