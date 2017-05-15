<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHistoriesAPIRequest;
use App\Http\Requests\API\UpdateHistoriesAPIRequest;
use App\Models\Histories;
use App\Repositories\HistoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HistoriesController
 * @package App\Http\Controllers\API
 */

class HistoriesAPIController extends AppBaseController
{
    /** @var  HistoriesRepository */
    private $historiesRepository;

    public function __construct(HistoriesRepository $historiesRepo)
    {
        $this->historiesRepository = $historiesRepo;
    }

    /**
     * Display a listing of the Histories.
     * GET|HEAD /histories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historiesRepository->pushCriteria(new RequestCriteria($request));
        $this->historiesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $histories = $this->historiesRepository->all();

        return $this->sendResponse($histories->toArray(), 'Histories retrieved successfully');
    }

    /**
     * Store a newly created Histories in storage.
     * POST /histories
     *
     * @param CreateHistoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoriesAPIRequest $request)
    {
        $input = $request->all();

        $histories = $this->historiesRepository->create($input);

        return $this->sendResponse($histories->toArray(), 'Histories saved successfully');
    }

    /**
     * Display the specified Histories.
     * GET|HEAD /histories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Histories $histories */
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            return $this->sendError('Histories not found');
        }

        return $this->sendResponse($histories->toArray(), 'Histories retrieved successfully');
    }

    /**
     * Update the specified Histories in storage.
     * PUT/PATCH /histories/{id}
     *
     * @param  int $id
     * @param UpdateHistoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Histories $histories */
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            return $this->sendError('Histories not found');
        }

        $histories = $this->historiesRepository->update($input, $id);

        return $this->sendResponse($histories->toArray(), 'Histories updated successfully');
    }

    /**
     * Remove the specified Histories from storage.
     * DELETE /histories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Histories $histories */
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            return $this->sendError('Histories not found');
        }

        $histories->delete();

        return $this->sendResponse($id, 'Histories deleted successfully');
    }
}
