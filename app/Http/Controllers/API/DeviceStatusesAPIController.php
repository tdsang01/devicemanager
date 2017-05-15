<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeviceStatusesAPIRequest;
use App\Http\Requests\API\UpdateDeviceStatusesAPIRequest;
use App\Models\DeviceStatuses;
use App\Repositories\DeviceStatusesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DeviceStatusesController
 * @package App\Http\Controllers\API
 */

class DeviceStatusesAPIController extends AppBaseController
{
    /** @var  DeviceStatusesRepository */
    private $deviceStatusesRepository;

    public function __construct(DeviceStatusesRepository $deviceStatusesRepo)
    {
        $this->deviceStatusesRepository = $deviceStatusesRepo;
    }

    /**
     * Display a listing of the DeviceStatuses.
     * GET|HEAD /deviceStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceStatusesRepository->pushCriteria(new RequestCriteria($request));
        $this->deviceStatusesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $deviceStatuses = $this->deviceStatusesRepository->all();

        return $this->sendResponse($deviceStatuses->toArray(), 'Device Statuses retrieved successfully');
    }

    /**
     * Store a newly created DeviceStatuses in storage.
     * POST /deviceStatuses
     *
     * @param CreateDeviceStatusesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceStatusesAPIRequest $request)
    {
        $input = $request->all();

        $deviceStatuses = $this->deviceStatusesRepository->create($input);

        return $this->sendResponse($deviceStatuses->toArray(), 'Device Statuses saved successfully');
    }

    /**
     * Display the specified DeviceStatuses.
     * GET|HEAD /deviceStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DeviceStatuses $deviceStatuses */
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            return $this->sendError('Device Statuses not found');
        }

        return $this->sendResponse($deviceStatuses->toArray(), 'Device Statuses retrieved successfully');
    }

    /**
     * Update the specified DeviceStatuses in storage.
     * PUT/PATCH /deviceStatuses/{id}
     *
     * @param  int $id
     * @param UpdateDeviceStatusesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceStatusesAPIRequest $request)
    {
        $input = $request->all();

        /** @var DeviceStatuses $deviceStatuses */
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            return $this->sendError('Device Statuses not found');
        }

        $deviceStatuses = $this->deviceStatusesRepository->update($input, $id);

        return $this->sendResponse($deviceStatuses->toArray(), 'DeviceStatuses updated successfully');
    }

    /**
     * Remove the specified DeviceStatuses from storage.
     * DELETE /deviceStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DeviceStatuses $deviceStatuses */
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            return $this->sendError('Device Statuses not found');
        }

        $deviceStatuses->delete();

        return $this->sendResponse($id, 'Device Statuses deleted successfully');
    }
}
