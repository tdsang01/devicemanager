<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodOfClassesRequest;
use App\Http\Requests\UpdatePeriodOfClassesRequest;
use App\Repositories\PeriodOfClassesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PeriodOfClassesController extends AppBaseController
{
    /** @var  PeriodOfClassesRepository */
    private $periodOfClassesRepository;

    public function __construct(PeriodOfClassesRepository $periodOfClassesRepo)
    {
        $this->middleware('auth');
        $this->periodOfClassesRepository = $periodOfClassesRepo;
    }

    /**
     * Display a listing of the PeriodOfClasses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodOfClassesRepository->pushCriteria(new RequestCriteria($request));
        $periodOfClasses = $this->periodOfClassesRepository->all();
        return view('period_of_classes.index')
            ->with('periodOfClasses', $periodOfClasses);
    }

    /**
     * Show the form for creating a new PeriodOfClasses.
     *
     * @return Response
     */
    public function create()
    {
        return view('period_of_classes.create');
    }

    /**
     * Store a newly created PeriodOfClasses in storage.
     *
     * @param CreatePeriodOfClassesRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodOfClassesRequest $request)
    {
        $input = $request->all();
        $periodOfClasses = $this->periodOfClassesRepository->create($input);

        Flash::success('Period Of Classes saved successfully.');

        return redirect(route('periodOfClasses.index'));
    }

    /**
     * Display the specified PeriodOfClasses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            Flash::error('Period Of Classes not found');

            return redirect(route('periodOfClasses.index'));
        }

        return view('period_of_classes.show')->with('periodOfClasses', $periodOfClasses);
    }

    /**
     * Show the form for editing the specified PeriodOfClasses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            Flash::error('Period Of Classes not found');

            return redirect(route('periodOfClasses.index'));
        }

        return view('period_of_classes.edit')->with('periodOfClasses', $periodOfClasses);
    }

    /**
     * Update the specified PeriodOfClasses in storage.
     *
     * @param  int              $id
     * @param UpdatePeriodOfClassesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodOfClassesRequest $request)
    {
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            Flash::error('Period Of Classes not found');

            return redirect(route('periodOfClasses.index'));
        }

        $periodOfClasses = $this->periodOfClassesRepository->update($request->all(), $id);

        Flash::success('Period Of Classes updated successfully.');

        return redirect(route('periodOfClasses.index'));
    }

    /**
     * Remove the specified PeriodOfClasses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodOfClasses = $this->periodOfClassesRepository->findWithoutFail($id);

        if (empty($periodOfClasses)) {
            Flash::error('Period Of Classes not found');

            return redirect(route('periodOfClasses.index'));
        }

        $this->periodOfClassesRepository->delete($id);

        Flash::success('Period Of Classes deleted successfully.');

        return redirect(route('periodOfClasses.index'));
    }
}
