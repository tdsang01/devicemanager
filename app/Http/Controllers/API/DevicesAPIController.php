<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDevicesAPIRequest;
use App\Http\Requests\API\UpdateDevicesAPIRequest;
use App\Models\Devices;
use App\Repositories\DevicesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DevicesController
 * @package App\Http\Controllers\API
 */

class DevicesAPIController extends AppBaseController
{
    /** @var  DevicesRepository */
    private $devicesRepository;

    public function __construct(DevicesRepository $devicesRepo)
    {
        $this->devicesRepository = $devicesRepo;
    }

    /**
     * Display a listing of the Devices.
     * GET|HEAD /devices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->devicesRepository->pushCriteria(new RequestCriteria($request));
        $this->devicesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $devices = $this->devicesRepository->all();

        return $this->sendResponse($devices->toArray(), 'Devices retrieved successfully');
    }

    /**
     * Store a newly created Devices in storage.
     * POST /devices
     *
     * @param CreateDevicesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDevicesAPIRequest $request)
    {
        $input = $request->all();

        $devices = $this->devicesRepository->create($input);

        return $this->sendResponse($devices->toArray(), 'Devices saved successfully');
    }

    /**
     * Display the specified Devices.
     * GET|HEAD /devices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Devices $devices */
        $devices = $this->devicesRepository->findWithoutFail($id);

        if (empty($devices)) {
            return $this->sendError('Devices not found');
        }

        return $this->sendResponse($devices->toArray(), 'Devices retrieved successfully');
    }

    /**
     * Update the specified Devices in storage.
     * PUT/PATCH /devices/{id}
     *
     * @param  int $id
     * @param UpdateDevicesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDevicesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Devices $devices */
        $devices = $this->devicesRepository->findWithoutFail($id);

        if (empty($devices)) {
            return $this->sendError('Devices not found');
        }

        $devices = $this->devicesRepository->update($input, $id);

        return $this->sendResponse($devices->toArray(), 'Devices updated successfully');
    }

    /**
     * Remove the specified Devices from storage.
     * DELETE /devices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Devices $devices */
        $devices = $this->devicesRepository->findWithoutFail($id);

        if (empty($devices)) {
            return $this->sendError('Devices not found');
        }

        $devices->delete();

        return $this->sendResponse($id, 'Devices deleted successfully');
    }
}
