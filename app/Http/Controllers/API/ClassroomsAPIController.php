<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClassroomsAPIRequest;
use App\Http\Requests\API\UpdateClassroomsAPIRequest;
use App\Models\Classrooms;
use App\Repositories\ClassroomsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ClassroomsController
 * @package App\Http\Controllers\API
 */

class ClassroomsAPIController extends AppBaseController
{
    /** @var  ClassroomsRepository */
    private $classroomsRepository;

    public function __construct(ClassroomsRepository $classroomsRepo)
    {
        $this->classroomsRepository = $classroomsRepo;
    }

    /**
     * Display a listing of the Classrooms.
     * GET|HEAD /classrooms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->classroomsRepository->pushCriteria(new RequestCriteria($request));
        $this->classroomsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $classrooms = $this->classroomsRepository->all();

        return $this->sendResponse($classrooms->toArray(), 'Classrooms retrieved successfully');
    }

    /**
     * Store a newly created Classrooms in storage.
     * POST /classrooms
     *
     * @param CreateClassroomsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClassroomsAPIRequest $request)
    {
        $input = $request->all();

        $classrooms = $this->classroomsRepository->create($input);

        return $this->sendResponse($classrooms->toArray(), 'Classrooms saved successfully');
    }

    /**
     * Display the specified Classrooms.
     * GET|HEAD /classrooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Classrooms $classrooms */
        $classrooms = $this->classroomsRepository->findWithoutFail($id);

        if (empty($classrooms)) {
            return $this->sendError('Classrooms not found');
        }

        return $this->sendResponse($classrooms->toArray(), 'Classrooms retrieved successfully');
    }

    /**
     * Update the specified Classrooms in storage.
     * PUT/PATCH /classrooms/{id}
     *
     * @param  int $id
     * @param UpdateClassroomsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassroomsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Classrooms $classrooms */
        $classrooms = $this->classroomsRepository->findWithoutFail($id);

        if (empty($classrooms)) {
            return $this->sendError('Classrooms not found');
        }

        $classrooms = $this->classroomsRepository->update($input, $id);

        return $this->sendResponse($classrooms->toArray(), 'Classrooms updated successfully');
    }

    /**
     * Remove the specified Classrooms from storage.
     * DELETE /classrooms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Classrooms $classrooms */
        $classrooms = $this->classroomsRepository->findWithoutFail($id);

        if (empty($classrooms)) {
            return $this->sendError('Classrooms not found');
        }

        $classrooms->delete();

        return $this->sendResponse($id, 'Classrooms deleted successfully');
    }
}
