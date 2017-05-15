<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeviceCatsAPIRequest;
use App\Http\Requests\API\UpdateDeviceCatsAPIRequest;
use App\Models\DeviceCats;
use App\Repositories\DeviceCatsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DeviceCatsController
 * @package App\Http\Controllers\API
 */

class DeviceCatsAPIController extends AppBaseController
{
    /** @var  DeviceCatsRepository */
    private $deviceCatsRepository;

    public function __construct(DeviceCatsRepository $deviceCatsRepo)
    {
        $this->deviceCatsRepository = $deviceCatsRepo;
    }

    /**
     * Display a listing of the DeviceCats.
     * GET|HEAD /deviceCats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceCatsRepository->pushCriteria(new RequestCriteria($request));
        $this->deviceCatsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $deviceCats = $this->deviceCatsRepository->all();

        return $this->sendResponse($deviceCats->toArray(), 'Device Cats retrieved successfully');
    }

    /**
     * Store a newly created DeviceCats in storage.
     * POST /deviceCats
     *
     * @param CreateDeviceCatsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceCatsAPIRequest $request)
    {
        $input = $request->all();

        $deviceCats = $this->deviceCatsRepository->create($input);

        return $this->sendResponse($deviceCats->toArray(), 'Device Cats saved successfully');
    }

    /**
     * Display the specified DeviceCats.
     * GET|HEAD /deviceCats/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DeviceCats $deviceCats */
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            return $this->sendError('Device Cats not found');
        }

        return $this->sendResponse($deviceCats->toArray(), 'Device Cats retrieved successfully');
    }

    /**
     * Update the specified DeviceCats in storage.
     * PUT/PATCH /deviceCats/{id}
     *
     * @param  int $id
     * @param UpdateDeviceCatsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceCatsAPIRequest $request)
    {
        $input = $request->all();

        /** @var DeviceCats $deviceCats */
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            return $this->sendError('Device Cats not found');
        }

        $deviceCats = $this->deviceCatsRepository->update($input, $id);

        return $this->sendResponse($deviceCats->toArray(), 'DeviceCats updated successfully');
    }

    /**
     * Remove the specified DeviceCats from storage.
     * DELETE /deviceCats/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DeviceCats $deviceCats */
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            return $this->sendError('Device Cats not found');
        }

        $deviceCats->delete();

        return $this->sendResponse($id, 'Device Cats deleted successfully');
    }
}
