<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeviceLocationRequest;
use App\Http\Requests\UpdateDeviceLocationRequest;
use App\Repositories\DeviceLocationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DeviceLocationController extends AppBaseController
{
    /** @var  DeviceLocationRepository */
    private $deviceLocationRepository;

    public function __construct(DeviceLocationRepository $deviceLocationRepo)
    {
        $this->middleware('auth');
        $this->deviceLocationRepository = $deviceLocationRepo;
    }

    /**
     * Display a listing of the DeviceLocation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceLocationRepository->pushCriteria(new RequestCriteria($request));
        $deviceLocations = $this->deviceLocationRepository->all();

        return view('device_locations.index')
            ->with('deviceLocations', $deviceLocations);
    }

    /**
     * Show the form for creating a new DeviceLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_locations.create');
    }

    /**
     * Store a newly created DeviceLocation in storage.
     *
     * @param CreateDeviceLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceLocationRequest $request)
    {
        $input = $request->all();

        $deviceLocation = $this->deviceLocationRepository->create($input);

        Flash::success('Device Location saved successfully.');

        return redirect(route('deviceLocations.index'));
    }

    /**
     * Display the specified DeviceLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            Flash::error('Device Location not found');

            return redirect(route('deviceLocations.index'));
        }

        return view('device_locations.show')->with('deviceLocation', $deviceLocation);
    }

    /**
     * Show the form for editing the specified DeviceLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            Flash::error('Device Location not found');

            return redirect(route('deviceLocations.index'));
        }

        return view('device_locations.edit')->with('deviceLocation', $deviceLocation);
    }

    /**
     * Update the specified DeviceLocation in storage.
     *
     * @param  int              $id
     * @param UpdateDeviceLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceLocationRequest $request)
    {
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            Flash::error('Device Location not found');

            return redirect(route('deviceLocations.index'));
        }

        $deviceLocation = $this->deviceLocationRepository->update($request->all(), $id);

        Flash::success('Device Location updated successfully.');

        return redirect(route('deviceLocations.index'));
    }

    /**
     * Remove the specified DeviceLocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceLocation = $this->deviceLocationRepository->findWithoutFail($id);

        if (empty($deviceLocation)) {
            Flash::error('Device Location not found');

            return redirect(route('deviceLocations.index'));
        }

        $this->deviceLocationRepository->delete($id);

        Flash::success('Device Location deleted successfully.');

        return redirect(route('deviceLocations.index'));
    }
}
