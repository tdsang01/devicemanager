<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRepairsAPIRequest;
use App\Http\Requests\API\UpdateRepairsAPIRequest;
use App\Models\Repairs;
use App\Repositories\RepairsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RepairsController
 * @package App\Http\Controllers\API
 */

class RepairsAPIController extends AppBaseController
{
    /** @var  RepairsRepository */
    private $repairsRepository;

    public function __construct(RepairsRepository $repairsRepo)
    {
        $this->repairsRepository = $repairsRepo;
    }

    /**
     * Display a listing of the Repairs.
     * GET|HEAD /repairs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repairsRepository->pushCriteria(new RequestCriteria($request));
        $this->repairsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $repairs = $this->repairsRepository->all();

        return $this->sendResponse($repairs->toArray(), 'Repairs retrieved successfully');
    }

    /**
     * Store a newly created Repairs in storage.
     * POST /repairs
     *
     * @param CreateRepairsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRepairsAPIRequest $request)
    {
        $input = $request->all();

        $repairs = $this->repairsRepository->create($input);

        return $this->sendResponse($repairs->toArray(), 'Repairs saved successfully');
    }

    /**
     * Display the specified Repairs.
     * GET|HEAD /repairs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Repairs $repairs */
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            return $this->sendError('Repairs not found');
        }

        return $this->sendResponse($repairs->toArray(), 'Repairs retrieved successfully');
    }

    /**
     * Update the specified Repairs in storage.
     * PUT/PATCH /repairs/{id}
     *
     * @param  int $id
     * @param UpdateRepairsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepairsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Repairs $repairs */
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            return $this->sendError('Repairs not found');
        }

        $repairs = $this->repairsRepository->update($input, $id);

        return $this->sendResponse($repairs->toArray(), 'Repairs updated successfully');
    }

    /**
     * Remove the specified Repairs from storage.
     * DELETE /repairs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Repairs $repairs */
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            return $this->sendError('Repairs not found');
        }

        $repairs->delete();

        return $this->sendResponse($id, 'Repairs deleted successfully');
    }
}
