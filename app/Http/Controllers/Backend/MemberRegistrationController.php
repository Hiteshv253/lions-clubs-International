<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Validator;

class MemberRegistrationController extends Controller {

      public function __construct() {
//            $this->middleware('permission:Access Country', ['only' => ['show', 'index']]);
//            $this->middleware('permission:Create Country', ['only' => ['create']]);
//            $this->middleware('permission:Read Country', ['only' => ['read']]);
//            $this->middleware('permission:Edit Country', ['only' => ['edit']]);
//            $this->middleware('permission:Delete Country', ['only' => ['delete']]);
      }

      public function index() {

            return view('backend.member-registration-master.index', []);
      }

      public function create() {
            return view('backend.member-registration-master.create', []);
      }

      public function store(Request $Request) {
            $Countrys = Country::create($Request->all());
            $Countrys->save();
            redirect()->back()->with('success', 'Country Create Successfully !');
            return redirect('hrms/country/');
      }

      public function edit($id) {

            $breadcrumbs = [
                      ['link' => "/home", 'name' => "Home"],
                      ['link' => "/hrms/country/", 'name' => "Country Managment"],
                      ['name' => "Update"],
            ];
            //Pageheader set true for breadcrumbs
            $pageConfigs = ['pageHeader' => true, 'isFabButton' => true, 'isCustomizer' => true];

            $CountryMaster = DB::table('common_countries')
                  ->select('*')
                  ->where('id', '=', $id)
                  ->get();

            if ($CountryMaster) {
                  return view('backend.member-registration-master.create', []);
            }
      }

      public function update(Request $Request, $id) {
            DB::update('update common_countries set country_name = ? , is_active = ?  where id = ?', [$Request->country_name
                      , $Request->is_active, $id]);
            redirect()->back()->with('success', 'Country Update Successfully !');
            return redirect('hrms/country/');
      }

      function delete(Request $request) {

            // delete city
            $delete_city = DB::table('common_cities')
                  ->where('common_cities.country_id', '=', $request->input('id'))
                  ->get();
            if (count($delete_city) > 0) {
                  DB::table('common_cities')->where('common_cities.country_id', $request->input('id'))->delete();
            }

            //delete state
            $delete_state = DB::table('common_states')
                  ->where('common_states.country_id', '=', $request->input('id'))
                  ->get();
            if (count($delete_state) > 0) {
                  DB::table('common_states')->where('common_states.country_id', $request->input('id'))->delete();
            }


            $country_delete = DB::table('common_countries')->where('id', $request->input('id'))->delete();
      }

      function multidelete(Request $request) {
            /* multi delete */
            $Country_id_array = $request->input('id');

            foreach ($Country_id_array as $key => $Country_ids) {



                  $delete_city = DB::table('common_cities')
                        ->where('common_cities.country_id', '=', $Country_ids)
                        ->get();
                  if (count($delete_city) > 0) {
                        DB::table('common_cities')->where('common_cities.country_id', $Country_ids)->delete();
                  }

                  //delete state
                  $delete_state = DB::table('common_states')
                        ->where('common_states.country_id', '=', $Country_ids)
                        ->get();
                  if (count($delete_state) > 0) {
                        DB::table('common_states')->where('common_states.country_id', $Country_ids)->delete();
                  }


                  $country_delete = DB::table('common_countries')->where('id', $Country_ids)->delete();
            }
      }

      public function getcountrycode(Request $request) {

            if ($request->ajax()) {
                  $id = $request->input('id');
                  $common_currency = DB::table("common_countries")
                        ->where("id", '=', $id)
                        ->select("code")
//                    ->whereNull('deleted_at')->where('is_active', '=', '0')
                        ->get();
                  return response()->json($common_currency);
            }
      }

      public function validname(Request $request) {
            /* Validaiton of the batch */

            if ($request->input('country_name') !== '') {
                  $rule = array(
                            'country_name' => 'required|unique:common_countries,country_name,NULL,id,deleted_at,NULL',
                  );
                  $validator = Validator::make($request->all(), $rule);
                  if (!$validator->fails()) {
                        die('true');
                  }
            }
            die('false');
      }

      public function editvalidname(Request $request) {
            $id = $request->id;
            $rule = array(
                      'country_name' => Rule::unique('common_countries', 'country_name')->ignore($id),
            );
            $validator = Validator::make($request->all(), $rule);
            if (!$validator->fails()) {
                  die('true');
            }
            die('false');
      }
}
