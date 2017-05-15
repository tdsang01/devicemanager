<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDevicesRequest;
use App\Http\Requests\UpdateDevicesRequest;
use App\Repositories\DevicesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DeviceCats;
use App\Models\DeviceLocation;
use App\Models\Classrooms;
use App\Models\DeviceStatuses;



class DevicesController extends AppBaseController
{
    /** @var  DevicesRepository */
    private $devicesRepository;

    public function __construct(DevicesRepository $devicesRepo)
    {
        $this->middleware('auth');
        $this->devicesRepository = $devicesRepo;
    }

    /**
     * Display a listing of the Devices.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->devicesRepository->pushCriteria(new RequestCriteria($request));
        $devices = $this->devicesRepository->all();
        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new Devices.
     *
     * @return Response
     */
    public function create()
    {
        $devicecats = DeviceCats::all();
        $devicelocations = DeviceLocation::all();
        $classrooms = Classrooms::all();
        $devicestatuses = DeviceStatuses::all();
        return view('devices.create', compact('devicecats', 'devicelocations', 'classrooms','devicestatuses')); 
    }

    /**
     * Store a newly created Devices in storage.
     *
     * @param CreateDevicesRequest $request
     *
     * @return Response
     */
    public function store(CreateDevicesRequest $request)
    {
        $input = $request->all();
        $devices = $this->devicesRepository->create($input);

        Flash::success('Devices saved successfully.');

        return redirect(route('devices.index'));
    }

    /**
     * Display the specified Devices.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $devices = $this->devicesRepository->findWithoutFail($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        return view('devices.show')->with('devices', $devices);
    }

    /**
     * Show the form for editing the specified Devices.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $devices = $this->devicesRepository->findWithoutFail($id);
        $devicecats = DeviceCats::all();
        $devicelocations = DeviceLocation::all();
        $classrooms = Classrooms::all();
        $devicestatuses = DeviceStatuses::all();
        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        return view('devices.edit', compact('devices','devicecats','devicelocations','classrooms','devicestatuses'));
    }

    /**
     * Update the specified Devices in storage.
     *
     * @param  int              $id
     * @param UpdateDevicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDevicesRequest $request)
    {
        $devices = $this->devicesRepository->findWithoutFail($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        $devices = $this->devicesRepository->update($request->all(), $id);

        Flash::success('Devices updated successfully.');

        return redirect(route('devices.index'));
    }

    /**
     * Remove the specified Devices from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $devices = $this->devicesRepository->findWithoutFail($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        $this->devicesRepository->delete($id);

        Flash::success('Devices deleted successfully.');

        return redirect(route('devices.index'));
    }
}
