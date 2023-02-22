<?php

namespace App\Repositories;


use Illuminate\Support\Arr;
use App\Models\Project;
use App\Models\FloorPlanAmenity;
use App\Models\FloorPlan;
use App\Models\FloorPlanType;
use App\Models\ProjectAmenity;
use App\Models\FloorPlanFeature;
use App\Models\UnitFeature;
use App\Models\Unit;
use Carbon\Carbon;
use Validator;
use DB;
use Rule;

class DeveloperRepository
{
    public function createProject($request){
        // Auth::guard('web');
        $attr = Validator::make($request->all(), [
            'name' => 'required|string',
            'statuses_id' => 'required',
            'mode' => 'required',
            'modes_id' => 'required_if:mode,true',
            'completed_date' => 'required',
            'permit_number' => 'required|string',
            'deed' => 'required|array',
            'escrow' => 'required|array',
            'cities_id' => 'required',
            'location' => 'required',
            'brief_desctiption' => 'required',
            'no_of_units' => 'required',
            'no_of_floors' => 'required',
            'amenities' => 'required|array',
            'images' => 'required',
            'videos' => 'required',
            'cover' => 'required',
            'brouchers' => 'required',
            'minimum_price' => 'required',
            'maximum_price' => 'required',
            'main_features' => 'required|array',
            'business_com' => 'required|array',
            'community_feat' => 'required|array',
            'healthcare' => 'required|array',
            'floor_plans' => 'required|array',
            'payment_plans' => 'required'
        ]);
        if ($attr->fails()) {
            return [
                'status' => 300,
                'msg' => $attr->messages()->first()
            ];
        } else {
            $attr = $request->all();
        }

        $attr['developers_id'] = 1;
        $upload_folder = 'projects';
        // dd($attr['mode']);
        if($attr['mode'] == "true"){
            $modes_id = $attr['modes_id'];
        } else {
            $modes_id = null;
        }
        $input_data = [
            'developers_id' => $attr['developers_id'],
            'name' => $attr['name'],
            'statuses_id' => $attr['statuses_id'],
            'modes_id' => $modes_id,
            'modes_id' => $attr['modes_id'],
            'completion_date' => $attr['completed_date'],
            'permit_number' => $attr['permit_number'],
            'deed' => [
                'name' => $attr['deed']['title']
            ],
            'escrow' => json_encode($attr['escrow']),
            'cities_id' => $attr['cities_id'],
            'location' => json_encode($attr['location']),
            'brief_desctiption' => $attr['brief_desctiption'],
            'no_of_units' => $attr['no_of_units'],
            'no_of_floors' => $attr['no_of_floors'],
            'images' => [],
            'videos' => $attr['videos'],
            'cover' => '',
            'brouchers' => [],
            'main_features' => json_encode($attr['main_features']),
            'business_com' => json_encode($attr['business_com']),
            'community_feat' => json_encode($attr['community_feat']),
            'healthcare' => json_encode($attr['healthcare']),
            'minimum_price' => $attr['minimum_price'],
            'maximum_price' => $attr['maximum_price'],
            'payment_plans' => [],
        ];
        // dd($input_data);

        $deed_path = $attr['deed']['deed_pdf']->store($upload_folder, 'public');
        $input_data['deed']['pdf'] = $deed_path;
        $input_data['deed'] = $input_data['deed'];

        $images = [];
        foreach ($attr['images'] as $imagefile) {
            $path = $imagefile->store($upload_folder, 'public');
            array_push($images, $path);
        }
        $input_data['images'] = $images;

        $cover_path = $attr['cover']->store($upload_folder, 'public');
        $input_data['cover'] = $cover_path;

        $brouchers = [];
        foreach ($attr['brouchers'] as $imagefile) {
            $path = $imagefile->store($upload_folder, 'public');
            array_push($brouchers, $path);
        }
        $input_data['brouchers'] = $brouchers;

        $payment_plans = [];
        foreach ($attr['payment_plans'] as $imagefile) {
            $path = $imagefile->store($upload_folder, 'public');
            array_push($payment_plans, $path);
        }
        $input_data['payment_plans'] = $payment_plans;
        $project = Project::create($input_data);
        $id = $project->id;
        $floor_plan_folder = $upload_folder.str($id).'/floorplans';
        $array_of_floor_plans = [];
        foreach($attr['floor_plans'] as $floor_plan){
            $floorplan_path = $floor_plan['image']->store($floor_plan_folder, 'public');
            $inputFloorPlans = [
                'projects_id' => $id,
                'name' => $floor_plan['name'],
                'image' => $floorplan_path
            ];
            array_push($array_of_floor_plans, $inputFloorPlans);
        }
        $floor_plans_ids = [];
        $floor_plan_types = [];
        for($i=0; $i<sizeof($array_of_floor_plans); $i++){
            $floor_plan = FloorPlan::create($array_of_floor_plans[$i]);
            foreach($attr['floor_plans'][$i]['property_type_id'] as $floorPlanType){
                $floor_plan_type = [
                    'floor_plans_id' => $floor_plan->id,
                    'property_types_id' => $floorPlanType
                ];
                FloorPlanType::create($floor_plan_type);
                // array_push($floor_plan_types, $floor_plan_type);
            }
        }
        $project_amenities = [];
        foreach($attr['amenities'] as $amenity){
            $amen = [
                'amenities_id' => $amenity,
                'projects_id' => $id
            ];
            ProjectAmenity::create($amen);
        }



        return [
            'status' => 200,
            'msg' => 'Project created successfuly'
        ];
    }

    public function createFloorPlan($request){
        $attr = Validator::make($request->all(), [
            'project_id' => 'required',
            'name' => 'required',
            'property_type_id' => 'required|array',
            'image' => 'required'
        ]);
        if ($attr->fails()) {
            return [
                'status' => 300,
                'msg' => $attr->messages()->first(),
                'data' => null
            ];
        } else {
            $attr = $request->all();
        }
        $upload_folder = 'projects';
        $id = $attr['project_id'];
        $floor_plan_folder = $upload_folder.str($id).'/floorplans';
        $array_of_floor_plans = [];
        $floorplan_path = $attr['image']->store($floor_plan_folder, 'public');
        $inputFloorPlans = [
            'projects_id' => $id,
            'name' => $attr['name'],
            'image' => $floorplan_path
        ];
        $floor_plans_ids = [];
        $floor_plan_types = [];
        $floor_plan = FloorPlan::create($inputFloorPlans);
        foreach($attr['property_type_id'] as $floorPlanType){
            $floor_plan_type = [
                'floor_plans_id' => $floor_plan->id,
                'property_types_id' => $floorPlanType
            ];
            FloorPlanType::create($floor_plan_type);
        }
        return [
            'status' => 200,
            'msg' => 'Floor Plan added successfuly',
            'data' => null
        ];
    }

    public function editFloorPlan($request){
        $attr = Validator::make($request->all(), [
            'floor_plan_id' => 'required',
            'bedroom_id' => 'required',
            'bathroom_id' => 'required',
            'features' => 'required',
            'unit_size' => 'required',
            'unit_size_id' => 'required',
            'info' => 'required',
            'video' => 'required',
            'unit_images' => 'required',
            'payment_schedule' => 'required',
        ]);
        if ($attr->fails()) {
            return [
                'status' => 300,
                'msg' => $attr->messages()->first(),
                'data' => null
            ];
        } else {
            $attr = $request->all();
        }
        try{
            $inputs = [
                'bedrooms_id' => $attr['bedroom_id'],
                'bathrooms_id' => $attr['bathroom_id'],
                'size' => $attr['unit_size'],
                'sizes_id' => $attr['unit_size_id'],
                'brief_description' => $attr['info'],
                'videos' => $attr['video'],
                'unit_images' => [],
                'payment_plan' => '',
                'features' =>$attr['features']
            ];
            $upload_folder = 'projects';
            $fp = FloorPlan::where('id', $attr['floor_plan_id'])->first();
            $floor_plan_id = $attr['floor_plan_id'];
            $id = $fp['project_id'];
            $floor_plan_folder = $upload_folder.str($id).'/floorplans';
            $array_of_floor_plans = [];
            $unit_images = [];
            foreach($attr['unit_images'] as $img){
                $floorplan_path = $img->store($floor_plan_folder, 'public');
                array_push($unit_images, $floorplan_path);
            }
            $inputs['unit_images'] = $unit_images;
            $payment_plan_path = $attr['payment_schedule']->store($floor_plan_folder, 'public');
            $inputs['payment_plan'] = $payment_plan_path;
            $fp = FloorPlan::where('id', $floor_plan_id)->update($inputs);
            return [
                'status' => 200,
                'msg' => 'Successfuly updated',
                'data' => null
            ];
        } catch (\Throwable $rex){
            return [
                'status' => 300,
                'msg' => $rex->getMessage()." @ line# ".$rex->getLine(),
                'data' => null
            ];
        }
    }
    
    public function createUnit($request){
        $attr = Validator::make($request->all(), [
            'floor_plans_id' => 'required',
            'unit_number' => 'required',
            'unit_statuses_id' => 'required',
            'floor' => 'required',
            'price' => 'required',
            'features' => 'required',
            'extra_feature_description' => 'required'
        ]);
        if ($attr->fails()) {
            return [
                'status' => 300,
                'msg' => $attr->messages()->first(),
                'data' => null
            ];
        } else {
            $attr = $request->all();
        }
        try{
            $input = [
                'floor_plans_id' => $attr['floor_plans_id'],
                'unit_number' => $attr['unit_number'],
                'unit_statuses_id' => $attr['unit_statuses_id'],
                'floor' => $attr['floor'],
                'price' => $attr['price'],
                'features' => json_encode($attr['features']),
                'extra_feature_description' => $attr['extra_feature_description']
            ];
            $unit = Unit::create($input);
            return [
                'status' => 200,
                'msg' => "Unit added successfuly",
                'data' => null
            ];
        } catch (\Throwable $rex){
            return [
                'status' => 300,
                'msg' => $rex->getMessage()." @ line# ".$rex->getLine(),
                'data' => null
            ];
        }
    }

    public function createUnitFeature($request){
        $attr = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($attr->fails()) {
            return [
                'status' => 300,
                'msg' => $attr->messages()->first(),
                'data' => null
            ];
        } else {
            $attr = $request->all();
        }
        $input = [
            'name' => $attr['name'],
            'developers_id' => rand(1, 4)
        ];
        $feature = UnitFeature::create($input);
        return [
            'status' => 200,
            'msg' => "Feature added to unit Successfuly",
            'data' => null
        ];
    }

    public function createFloorPlanFeature($request){
        $attr = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($attr->fails()) {
            return [
                'status' => 300,
                'msg' => $attr->messages()->first(),
                'data' => null
            ];
        } else {
            $attr = $request->all();
        }
        $input = [
            'name' => $attr['name'],
            'developers_id' => rand(1, 4)
        ];
        $feature = FloorPlanFeature::create($input);
        return [
            'status' => 200,
            'msg' => "Feature added to Floor Plan Successfuly",
            'data' => null
        ];
    }
}