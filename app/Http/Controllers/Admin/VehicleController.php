<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Order;
use DataTables;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function index() 
    {
        return view('admin.vehicle.index');
    }

    public function dataTables(Request $request) 
    {
        if ($request->ajax()) {
            $data = Vehicle::latest()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="' . route('admin.vehicle.detail', ['id' => $row->id]) . '" class="detail btn btn-info btn-sm">Detail</a>
                                  <a href="' . route('admin.vehicle.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> 
                                  <a href="' . route('admin.vehicle.delete', ['id' => $row->id]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function detail($id) 
    {
        $history = Order::with(['driver', 'vehicle', 'staf_one', 'staf_two'])->where('vehicle_id', $id)->latest()->get();
        $vehicle = Vehicle::find($id);
        return view('admin.vehicle.detail', ['vehicle' => $vehicle, 'history' => $history]);
    }

    public function create()
    {
        return view('admin.vehicle.create');
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'name' => $request->input('name'),
            'police_number' => $request->input('police_number'),
            'color' => $request->input('color'),
            'vehicle_type' => $request->input('vehicle_type'),
            'ownership' => $request->input('ownership'),
            'fuel_consum' => $request->input('fuel_consum'),
            'service_date' => $request->input('service_date')
        ];

        Validator::make($request->all(), [
            'name' => 'required',
            'police_number' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
            'ownership' => 'required',
            'fuel_consum' => 'required',
            'service_date' => 'required|date',
        ])->validate();

        try {
            Vehicle::create($dataCreate);
        } catch (\Throwable $th) {
            return redirect()->route('admin.vehicle.create');
        }
        return redirect()->route('admin.vehicle.index');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.vehicle.edit', ['vehicle' => $vehicle]);
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = [
            'name' => $request->input('name'),
            'police_number' => $request->input('police_number'),
            'color' => $request->input('color'),
            'vehicle_type' => $request->input('vehicle_type'),
            'ownership' => $request->input('ownership'),
            'fuel_consum' => $request->input('fuel_consum'),
            'service_date' => $request->input('service_date')
        ];

        Validator::make($request->all(), [
            'name' => 'required',
            'police_number' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
            'ownership' => 'required',
            'fuel_consum' => 'required',
            'service_date' => 'required|date',
        ])->validate();

        try {
            Vehicle::where('id', $id)->update($dataUpdate);
        } catch (\Throwable $th) {
            return redirect()->route('admin.vehicle.edit');
        }
        return redirect()->route('admin.vehicle.index');
    }

    public function delete($id)
    {
        try {
            Vehicle::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('admin.vehicle.index');
        }
        return redirect()->route('admin.vehicle.index');
    }
}
