<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMembersRequest;
use App\Http\Requests\UpdateMembersRequest;
use App\Repositories\MembersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Roles;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
class MembersController extends AppBaseController
{
    private $membersRepository;
    /**
     * Display a listing of the Members.
     *
     * @param Request $request
     * @return Response
     */
    public function __construct(MembersRepository $membersRepository)
    {
        $this->middleware('auth');
        $this->membersRepository = $membersRepository;
    }

    

    public function index(Request $request)
    {
        $members = User::all();
        $currentUserId = $request->user()->id;
        //dd($currentUserId);
        $currentUserRole = $request->user()->role;
        return view('members.index', compact('members', 'currentUserId', 'currentUserRole'));
    }

    /**
     * Show the form for creating a new Members.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('members.create')->with('roles', $roles);
    }

    /**
     * Store a newly created Members in storage.
     *
     * @param CreateMembersRequest $request
     *
     * @return Response
     */
    public function store(CreateMembersRequest $request)
    {
        $newUser = $request->all();
//         $this->validator($request->all())->validate();
        $newUser['password'] = Hash::make($newUser['password']);
        User::create($newUser);
        Flash::success('Members saved successfully.');
        return redirect(route('members.index'));
    }
    /**
     * Display the specified Members.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('members', $members);
    }

    /**
     * Show the form for editing the specified Members.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);
        $roles = Roles::all();

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }
        // die($members);
        return view('members.edit', compact('members','roles'));
    }

    /**
     * Update the specified Members in storage.
     *
     * @param  int              $id
     * @param UpdateMembersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMembersRequest $request)
    {
        $members = $this->membersRepository->findWithoutFail($id);
        //edit
//         $this->validator($request->all())->validate();
        $name = $request->name;
        $email = $members->email;
        $password = Hash::make($request->password);
        $phone = $request->phone;
        $role = $request->role;
        
        $data = array('name'=>$name, 'email'=>$email, 'password'=>$password, 'phone'=>$phone,'role'=>$role);
        //end edit

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        $members = $this->membersRepository->update($data, $id);

        Flash::success('Members updated successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified Members from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        $this->membersRepository->delete($id);

        Flash::success('Members deleted successfully.');

        return redirect(route('members.index'));
    }
}
