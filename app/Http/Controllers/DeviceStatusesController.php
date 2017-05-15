<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeviceStatusesRequest;
use App\Http\Requests\UpdateDeviceStatusesRequest;
use App\Repositories\DeviceStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DeviceStatusesController extends AppBaseController
{
    /** @var  DeviceStatusesRepository */
    private $deviceStatusesRepository;

    public function __construct(DeviceStatusesRepository $deviceStatusesRepo)
    {
        $this->middleware('auth');
        $this->deviceStatusesRepository = $deviceStatusesRepo;
    }

    /**
     * Display a listing of the DeviceStatuses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceStatusesRepository->pushCriteria(new RequestCriteria($request));
        $deviceStatuses = $this->deviceStatusesRepository->all();

        return view('device_statuses.index')
            ->with('deviceStatuses', $deviceStatuses);
    }

    /**
     * Show the form for creating a new DeviceStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_statuses.create');
    }

    /**
     * Store a newly created DeviceStatuses in storage.
     *
     * @param CreateDeviceStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceStatusesRequest $request)
    {
        $input = $request->all();

        $deviceStatuses = $this->deviceStatusesRepository->create($input);

        Flash::success('Device Statuses saved successfully.');

        return redirect(route('deviceStatuses.index'));
    }

    /**
     * Display the specified DeviceStatuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            Flash::error('Device Statuses not found');

            return redirect(route('deviceStatuses.index'));
        }

        return view('device_statuses.show')->with('deviceStatuses', $deviceStatuses);
    }

    /**
     * Show the form for editing the specified DeviceStatuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            Flash::error('Device Statuses not found');

            return redirect(route('deviceStatuses.index'));
        }

        return view('device_statuses.edit')->with('deviceStatuses', $deviceStatuses);
    }

    /**
     * Update the specified DeviceStatuses in storage.
     *
     * @param  int              $id
     * @param UpdateDeviceStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceStatusesRequest $request)
    {
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            Flash::error('Device Statuses not found');

            return redirect(route('deviceStatuses.index'));
        }

        $deviceStatuses = $this->deviceStatusesRepository->update($request->all(), $id);

        Flash::success('Device Statuses updated successfully.');

        return redirect(route('deviceStatuses.index'));
    }

    /**
     * Remove the specified DeviceStatuses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceStatuses = $this->deviceStatusesRepository->findWithoutFail($id);

        if (empty($deviceStatuses)) {
            Flash::error('Device Statuses not found');

            return redirect(route('deviceStatuses.index'));
        }

        $this->deviceStatusesRepository->delete($id);

        Flash::success('Device Statuses deleted successfully.');

        return redirect(route('deviceStatuses.index'));
    }
}
