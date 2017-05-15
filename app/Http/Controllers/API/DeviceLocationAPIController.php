<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeviceLocationAPIRequest;
use App\Http\Requests\API\UpdateDeviceLocationAPIRequest;
use App\Models\DeviceLocation;
use App\Repositories\DeviceLocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DeviceLocationController
 * @package App\Http\Controllers\API
 */

class DeviceLocationAPIController extends AppBaseController
{
    /** @var  DeviceLocationRepository */
    private $deviceLocationRepository;

    public function __construct(DeviceLocationRepository $deviceLocationRepo)
    {
        $this->deviceLocationRepository = $deviceLocationRepo;
    }

    /**
     * Display a listing of the DeviceLocation.
     * GET|HEAD /deviceLocations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceLocationRepository->pushCriteria(new RequestCriteria($request));
        $this->deviceLocationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $deviceLocations = $this->deviceLocationRepository->all();

        return $this->sendResponse($deviceLocations->toArray(), 'Device Locations retrieved successfully');
    }

    /**
     * Store a newly created DeviceLocation in storage.
     * POST /deviceLocations
     *
     * @param CreateDeviceLocationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceLocationAPIRequest $request)
    {
        $input = $request->all();

        $deviceLocations = $this->deviceLocationRepository->create($input);

        return $this->sendResponse($deviceLocations->toArray(), 'Device Location saved successfully');
    }

    /**
     * Display the specified DeviceLocation.
     * GET|HEAD /deviceLocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DeviceLocation $deviceLocation */
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            return $this->sendError('Device Location not found');
        }

        return $this->sendResponse($deviceLocation->toArray(), 'Device Location retrieved successfully');
    }

    /**
     * Update the specified DeviceLocation in storage.
     * PUT/PATCH /deviceLocations/{id}
     *
     * @param  int $id
     * @param UpdateDeviceLocationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceLocationAPIRequest $request)
    {
        $input = $request->all();

        /** @var DeviceLocation $deviceLocation */
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            return $this->sendError('Device Location not found');
        }

        $deviceLocation = $this->deviceLocationRepository->update($input, $id);

        return $this->sendResponse($deviceLocation->toArray(), 'DeviceLocation updated successfully');
    }

    /**
     * Remove the specified DeviceLocation from storage.
     * DELETE /deviceLocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DeviceLocation $deviceLocation */
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            return $this->sendError('Device Location not found');
        }

        $deviceLocation->delete();

        return $this->sendResponse($id, 'Device Location deleted successfully');
    }
}
