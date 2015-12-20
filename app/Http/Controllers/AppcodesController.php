<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Appcodes;
use DB;
class AppcodesController extends Controller {
	public function index(){
		$appcodes = Appcodes::all();

        return View::make('appcodes.index')->with("appcodes", $appcodes);
	}

	public function create(){
        $benefits = DB::table('tb_app_establishments')->get();
		return View::make('appcodes.new')->with("benefits" , $benefits);
	}

	public function store(){
        //$benefit_id = Input::has("benefit_id") ? Input::get("benefit_id") : "";
	    $number = Input::has("number") ? Input::get("number") : "";
        $bar_code = Input::has("bar_code") ? Input::get("bar_code") : "";
        $client = Input::has("client") ? Input::get("client") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";

		if($number == "" || $bar_code == "" || $client == "" || $benefit_id == ""){
            Session::flash("error", trans("appcodes.notifications.field_name_missing"));

            return Redirect::to("/appcodes/create")->withInput();
        }

		Appcodes::create(
			array(
                //'benefit_id' => $benefit_id,
				'number' => $number,
                'bar_code'=> $bar_code,
                'client'=> $client,
                'single_use'=>$single_use,
                'status' => 1
			)
		);

        

		Session::flash('success', trans("appcodes.notifications.register_successful"));

		return Redirect::to("/appcodes");
	}

	public function edit($id){
        $appcodes = Appcodes::find($id);

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes");
        }

        $benefits = DB::table('tb_app_establishments')->get();
        return View::make('appcodes.edit')->with("appcodes", $appcodes)
                    ->with("benefits" , $benefits);
	}

	public function update(){
        $appcodes = Appcodes::find(Input::get("id"));

        if(!$appcodes){
            Session::flash('error', trans("appcodes.notifications.no_exists"));

            return Redirect::to("/appcodes");
        }

        //$benefit_id = Input::has("benefit_id") ? Input::get("benefit_id") : "";
        $number = Input::has("number") ? Input::get("number") : "";
        $bar_code = Input::has("bar_code") ? Input::get("bar_code") : "";
        $client = Input::has("client") ? Input::get("client") : "";
        $single_use = Input::has("single_use") ? Input::get("single_use") : "";
        
        if($number == "" || $bar_code == "" || $client == "" || $benefit_id == ""){
            Session::flash("error", trans("appcodes.notifications.field_name_missing"));

            return Redirect::to("/appcodes/$appcodes->id/edit")->withInput();
        }

        //$appcodes->benefit_id = $benefit_id;
        $appcodes->number = $number;
        $appcodes->bar_code = $bar_code;
        $appcodes->client = $client;
        $appcodes->single_use = $single_use;
        $appcodes->save();

        Session::flash('success', trans("appcodes.notifications.update_successful"));

        return Redirect::to("/appcodes");
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

            return Redirect::to("/appcodes");
        }

        $appcodes->delete();

        Session::flash('success', trans("appcodes.notifications.delete_successful"));

        return Redirect::to("/appcodes");
    }
}