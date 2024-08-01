<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectMangementDataTable;
use App\Models\City;
use App\Models\Insurer;
use App\Models\ProjectManagement;
use App\Models\Province;
//use GPBMetadata\Google\Api\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectMangementDataTable $dataTable)
    {
        return $dataTable->render('project_management.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::select('id','name')->where('status',true)->orderBY('name')->get();
        $insurers = Insurer::select('id','name')->get();
        $cities = City::select('id','name')->where('status',true)->orderBY('name')->get();
        return view('project_management.create',compact('insurers','provinces','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'bid_date' => 'required|date',
            'bid_amount' => 'required',
            'gpm' => 'required',
            'insurer' => 'required|exists:insurers,id',
            'engineer_name' => 'required',
            'project_name' => 'required',
            'project_address' => 'required',
            'province_id'      => 'required',
            'city_id'      => 'required',
            'project_zip' => 'required',
            'project_delivery_method' => 'required',
            'est_pro_start' => 'required|date',
            'est_pro_compl' => 'required|date|after:est_pro_start',
            'warranty_term' => 'required',
            'liquidated_damages' => 'required',
            'retainage_amount' => 'required',
            'current_backlog' => 'required',
        ],
        [
            'province_id' =>  'The project state field is required.',
            'city_id' =>  'The city field is required.',
            'est_pro_start' =>  'The Estimate Project Start Date field is required.',
            'est_pro_compl.required' => 'The Estimate Project Completion Date field is required.',
            'est_pro_compl.after' => 'The Estimate Project Completion Date must be after the Estimate Project Start Date.',
        ]);
        $insurer = Insurer::where('id', $request['insurer'])->first();
        $userId = Auth::id();
//        dd($insurer);
        $data = [
            'bid_date' => $request['bid_date'],
            'bid_amount' => $request['bid_amount'],
            'gpm' => $request['gpm'],

            'obligee_id' => $request['insurer'],
            'obligee_address' => $insurer['address'],
            'obligee_state' => $insurer['state_id'],
            'obligee_city' => $insurer['city_id'],
            'obligee_zip' => $insurer['zip'],

            'engineer_name' => $request['engineer_name'],
            'project_name' => $request['project_name'],
            'project_address' => $request['project_address'],
            'project_state' => $request['province_id'],
            'project_city' => $request['city_id'],
            'project_zip' => $request['project_zip'],
            'project_delivery_method' => $request['project_delivery_method'],

            'estimated_project_start_date' => $request['est_pro_start'],
            'estimated_project_completion_date' => $request['est_pro_compl'],
            'warranty_terms' => $request['warranty_term'],
            'liquidated_damages' => $request['liquidated_damages'],
            'retainage_amount' => $request['retainage_amount'],
            'current_backlog' => $request['current_backlog'],
            'customer_id' =>$userId
        ];
        ProjectManagement::create($data);

        return response()->json([
            "success" => true,
            "message" => "Project Management Created Successfully",
            'redirect' => route('project-management.index')
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $d_id= mws_encrypt('D',$id);
//        $pm = ProjectManagement::where('id',$d_id)->first();
        $pm = ProjectManagement::from(TableName(ProjectManagement::class).' as pm')
            ->join(TableName(Insurer::class).' as insurer','pm.obligee_id','=','insurer.id')
            ->join(TableName(Province::class).' as province','pm.obligee_state','=','province.id')
            ->join(TableName(City::class).' as city','pm.obligee_city','=','city.id')
            ->select('pm.*','insurer.name as insurer_name','insurer.address as insurer_address','province.name as province_name','city.name as city_name')
            ->where('pm.id',$d_id)
            ->first();

        $ps = Province::select('name')->where('id',$pm['project_state'])->first();
        $pc = City::select('name')->where('id',$pm['project_city'])->first();
        $insurers = Insurer::select('id','name')->get();
        $cities = City::select('id','name')->where('status',true)->where('province_id',$pm['project_state'])->orderBY('name')->get();
        $obligee_cities = City::select('id','name')->where('status',true)->orderBY('name')->get();
        return view('project_management.show',compact('ps','pc','pm'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $d_id= mws_encrypt('D',$id);
        $pm = ProjectManagement::where('id',$d_id)->first();
        $provinces = Province::select('id','name')->where('status',true)->orderBY('name')->get();
        $insurers = Insurer::select('id','name')->get();
        $cities = City::select('id','name')->where('status',true)->where('province_id',$pm['project_state'])->orderBY('name')->get();
        $obligee_cities = City::select('id','name')->where('status',true)->orderBY('name')->get();
        return view('project_management.edit',compact('insurers','provinces','cities','pm','obligee_cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'bid_date' => 'required|date',
            'bid_amount' => 'required',
            'gpm' => 'required',
            'insurer' => 'required|exists:insurers,id',
            'engineer_name' => 'required',
            'project_name' => 'required',
            'project_address' => 'required',
            'province_id'      => 'required',
            'city_id'      => 'required',
            'project_zip' => 'required',
            'project_delivery_method' => 'required',
            'est_pro_start' => 'required|date',
            'est_pro_compl' => 'required|date|after:est_pro_start',
            'warranty_term' => 'required',
            'liquidated_damages' => 'required',
            'retainage_amount' => 'required',
            'current_backlog' => 'required',
        ],
            [
                'province_id' =>  'The project state field is required.',
                'city_id' =>  'The city field is required.',
                'est_pro_start' =>  'The Estimate Project Start Date field is required.',
                'est_pro_compl.required' => 'The Estimate Project Completion Date field is required.',
                'est_pro_compl.after' => 'The Estimate Project Completion Date must be after the Estimate Project Start Date.',
            ]);
        $insurer = Insurer::where('id', $request['insurer'])->first();
        $userId = Auth::id();
//        dd($insurer);
        $data = [
            'bid_date' => $request['bid_date'],
            'bid_amount' => $request['bid_amount'],
            'gpm' => $request['gpm'],

            'obligee_id' => $request['insurer'],
            'obligee_address' => $insurer['address'],
            'obligee_state' => $insurer['state_id'],
            'obligee_city' => $insurer['city_id'],
            'obligee_zip' => $insurer['zip'],

            'engineer_name' => $request['engineer_name'],
            'project_name' => $request['project_name'],
            'project_address' => $request['project_address'],
            'project_state' => $request['province_id'],
            'project_city' => $request['city_id'],
            'project_zip' => $request['project_zip'],
            'project_delivery_method' => $request['project_delivery_method'],

            'estimated_project_start_date' => $request['est_pro_start'],
            'estimated_project_completion_date' => $request['est_pro_compl'],
            'warranty_terms' => $request['warranty_term'],
            'liquidated_damages' => $request['liquidated_damages'],
            'retainage_amount' => $request['retainage_amount'],
            'current_backlog' => $request['current_backlog'],
            'customer_id' =>$userId
        ];
        ProjectManagement::where('id',$request['pro_id'])->update($data);

        return response()->json([
            "success" => true,
            "message" => "Project Management Updated Successfully",
            'redirect' => route('project-management.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        $d_id= mws_encrypt('D',$id);
        ProjectManagement::where('id',$id)->delete();
        return response()->json([
            "success" => true,
            "message" => "Record Deleted Successfully",
            'close_modal' => true,
            'table' => 'project_managements'
        ]);
    }
    public function insurers($id){
        $insurer_detail = Insurer::where('id',$id)->first();
        return $insurer_detail;
    }
}
