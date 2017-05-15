<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeviceCatsRequest;
use App\Http\Requests\UpdateDeviceCatsRequest;
use App\Repositories\DeviceCatsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DeviceCatsController extends AppBaseController
{
    /** @var  DeviceCatsRepository */
    private $deviceCatsRepository;

    public function __construct(DeviceCatsRepository $deviceCatsRepo)
    {
        $this->middleware('auth');
        $this->deviceCatsRepository = $deviceCatsRepo;
    }

    /**
     * Display a listing of the DeviceCats.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceCatsRepository->pushCriteria(new RequestCriteria($request));
        $deviceCats = $this->deviceCatsRepository->all();

        return view('device_cats.index')
            ->with('deviceCats', $deviceCats);
    }

    /**
     * Show the form for creating a new DeviceCats.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_cats.create');
    }

    /**
     * Store a newly created DeviceCats in storage.
     *
     * @param CreateDeviceCatsRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceCatsRequest $request)
    {
        $input = $request->all();

        $deviceCats = $this->deviceCatsRepository->create($input);

        Flash::success('Device Cats saved successfully.');

        return redirect(route('deviceCats.index'));
    }

    /**
     * Display the specified DeviceCats.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            Flash::error('Device Cats not found');

            return redirect(route('deviceCats.index'));
        }

        return view('device_cats.show')->with('deviceCats', $deviceCats);
    }

    /**
     * Show the form for editing the specified DeviceCats.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            Flash::error('Device Cats not found');

            return redirect(route('deviceCats.index'));
        }

        return view('device_cats.edit')->with('deviceCats', $deviceCats);
    }

    /**
     * Update the specified DeviceCats in storage.
     *
     * @param  int              $id
     * @param UpdateDeviceCatsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceCatsRequest $request)
    {
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            Flash::error('Device Cats not found');

            return redirect(route('deviceCats.index'));
        }

        $deviceCats = $this->deviceCatsRepository->update($request->all(), $id);

        Flash::success('Device Cats updated successfully.');

        return redirect(route('deviceCats.index'));
    }

    /**
     * Remove the specified DeviceCats from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceCats = $this->deviceCatsRepository->findWithoutFail($id);

        if (empty($deviceCats)) {
            Flash::error('Device Cats not found');

            return redirect(route('deviceCats.index'));
        }

        $this->deviceCatsRepository->delete($id);

        Flash::success('Device Cats deleted successfully.');

        return redirect(route('deviceCats.index'));
    }
}
