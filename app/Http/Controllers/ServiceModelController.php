<?php

namespace App\Http\Controllers;

use App\Models\ServiceModel;
use App\Http\Requests\StoreServiceModelRequest;
use App\Http\Requests\UpdateServiceModelRequest;
use App\Http\Resources\ServiceResource;

class ServiceModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($serviceModel)
    {
        $serviceDetails = ServiceModel::where('bicycle_id', $serviceModel)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($serviceDetails->count() > 0) {
            return response()->json([
                'status' => 200,
                'serviceDetails' => $serviceDetails
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No service Details Found for this bicycle id'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceModelRequest $request)
    {

        $service = ServiceModel::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'service created successfully',
            'service' => new ServiceResource($service)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceModel $serviceModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceModel $serviceModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceModelRequest $request, $serviceModel)
    {
         $service = ServiceModel::where('bicycle_id', $serviceModel)->first();

        if ($service) {
            $service->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'service Updated Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => ' service Record Not Found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($serviceModel)
    {
        $service = ServiceModel::where('bicycle_id', $serviceModel)->first();

        if ($service) {
            $service->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Service Deleted Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Service Record Not Found'
            ], 404);
        }
    }
}
