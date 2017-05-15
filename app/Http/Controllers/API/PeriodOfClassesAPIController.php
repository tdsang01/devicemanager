<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePeriodOfClassesAPIRequest;
use App\Http\Requests\API\UpdatePeriodOfClassesAPIRequest;
use App\Models\PeriodOfClasses;
use App\Repositories\PeriodOfClassesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PeriodOfClassesController
 * @package App\Http\Controllers\API
 */

class PeriodOfClassesAPIController extends AppBaseController
{
    /** @var  PeriodOfClassesRepository */
    private $periodOfClassesRepository;

    public function __construct(PeriodOfClassesRepository $periodOfClassesRepo)
    {
        $this->periodOfClassesRepository = $periodOfClassesRepo;
    }

    /**
     * Display a listing of the PeriodOfClasses.
     * GET|HEAD /periodOfClasses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodOfClassesRepository->pushCriteria(new RequestCriteria($request));
        $this->periodOfClassesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $periodOfClasses = $this->periodOfClassesRepository->all();

        return $this->sendResponse($periodOfClasses->toArray(), 'Period Of Classes retrieved successfully');
    }

    /**
     * Store a newly created PeriodOfClasses in storage.
     * POST /periodOfClasses
     *
     * @param CreatePeriodOfClassesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodOfClassesAPIRequest $request)
    {
        $input = $request->all();

        $periodOfClasses = $this->periodOfClassesRepository->create($input);

        return $this->sendResponse($periodOfClasses->toArray(), 'Period Of Classes saved successfully');
    }

    /**
     * Display the specified PeriodOfClasses.
     * GET|HEAD /periodOfClasses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PeriodOfClasses $periodOfClasses */
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            return $this->sendError('Period Of Classes not found');
        }

        return $this->sendResponse($periodOfClasses->toArray(), 'Period Of Classes retrieved successfully');
    }

    /**
     * Update the specified PeriodOfClasses in storage.
     * PUT/PATCH /periodOfClasses/{id}
     *
     * @param  int $id
     * @param UpdatePeriodOfClassesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodOfClassesAPIRequest $request)
    {
        $input = $request->all();

        /** @var PeriodOfClasses $periodOfClasses */
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            return $this->sendError('Period Of Classes not found');
        }

        $periodOfClasses = $this->periodOfClassesRepository->update($input, $id);

        return $this->sendResponse($periodOfClasses->toArray(), 'PeriodOfClasses updated successfully');
    }

    /**
     * Remove the specified PeriodOfClasses from storage.
     * DELETE /periodOfClasses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PeriodOfClasses $periodOfClasses */
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            return $this->sendError('Period Of Classes not found');
        }

        $periodOfClasses->delete();

        return $this->sendResponse($id, 'Period Of Classes deleted successfully');
    }
}
