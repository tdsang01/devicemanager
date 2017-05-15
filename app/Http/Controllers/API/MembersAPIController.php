<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMembersAPIRequest;
use App\Http\Requests\API\UpdateMembersAPIRequest;
use App\Models\Members;
use App\Repositories\MembersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MembersController
 * @package App\Http\Controllers\API
 */

class MembersAPIController extends AppBaseController
{
    /** @var  MembersRepository */
    private $membersRepository;

    public function __construct(MembersRepository $membersRepo)
    {
        $this->membersRepository = $membersRepo;
    }

    /**
     * Display a listing of the Members.
     * GET|HEAD /members
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->membersRepository->pushCriteria(new RequestCriteria($request));
        $this->membersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $members = $this->membersRepository->all();

        return $this->sendResponse($members->toArray(), 'Members retrieved successfully');
    }

    /**
     * Store a newly created Members in storage.
     * POST /members
     *
     * @param CreateMembersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMembersAPIRequest $request)
    {
        $input = $request->all();

        $members = $this->membersRepository->create($input);

        return $this->sendResponse($members->toArray(), 'Members saved successfully');
    }

    /**
     * Display the specified Members.
     * GET|HEAD /members/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Members $members */
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            return $this->sendError('Members not found');
        }

        return $this->sendResponse($members->toArray(), 'Members retrieved successfully');
    }

    /**
     * Update the specified Members in storage.
     * PUT/PATCH /members/{id}
     *
     * @param  int $id
     * @param UpdateMembersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMembersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Members $members */
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            return $this->sendError('Members not found');
        }

        $members = $this->membersRepository->update($input, $id);

        return $this->sendResponse($members->toArray(), 'Members updated successfully');
    }

    /**
     * Remove the specified Members from storage.
     * DELETE /members/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Members $members */
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            return $this->sendError('Members not found');
        }

        $members->delete();

        return $this->sendResponse($id, 'Members deleted successfully');
    }
}
