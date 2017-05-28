<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistoriesRequest;
use App\Http\Requests\UpdateHistoriesRequest;
use App\Repositories\HistoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Devices;
use App\Models\Histories;
use App\Models\PeriodOfClasses;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class HistoriesController extends AppBaseController
{
    /** @var  HistoriesRepository */
    private $historiesRepository;

    public function __construct(HistoriesRepository $historiesRepo)
    {
        $this->middleware('auth');
        $this->historiesRepository = $historiesRepo;
    }

    /**
     * Display a listing of the Histories.
     *
     * @param Request $request
     * @return Response
     */ 
    public function index(Request $request)
    {
        $this->historiesRepository->pushCriteria(new RequestCriteria($request));
        $histories = $this->historiesRepository->all();
        $currentUserId = $request->user()->id;
        $currentUserRole = $request->user()->role;
        //dd($currentUserRole);
        return view('histories.index',compact('histories', 'currentUserRole', 'currentUserId'));
    }

    /**
     * Show the form for creating a new Histories.
     *
     * @return Response
     */
    public function create()
    {

        $devices = DB::table('devices')->where('id_devicestatus', 1)->where('id_devicelocation', 2)->get();
        //dd($devices);
        $users = DB::table('users')->where('role', 2)->get();
        //dd($users);
        $periodofclasses = PeriodOfClasses::all();
        $currentUser = Auth::user();
        return view('histories.create', compact('devices','users', 'periodofclasses','currentUser'));
    }

    /**
     * Store a newly created Histories in storage.
     *
     * @param CreateHistoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoriesRequest $request)
    {
        $_token = $request->input('_token');
        $id_device = $request->input('id_device');
        $id_borrower = $request->input('id_borrower');
        $id_periodstart = $request->input('id_periodstart');
        $id_periodend = $request->input('id_periodend');
        $date_borrow = date('d/m/Y');
        $id_lender = Auth::user()->id;
        $data = array(
                '_token'=>$_token,
                'id_device'=>$id_device,
                'id_borrower'=>$id_borrower,
                'date_borrow'=>$date_borrow,
                'id_periodstart'=>$id_periodstart,
                'id_periodend'=>$id_periodend,
                'id_lender'=>$id_lender);


        $histories = $this->historiesRepository->create($data);
        $deviceBorrow = Devices::find($id_device);
        $deviceBorrow->id_devicestatus = 2;
        $deviceBorrow->save();

        Flash::success('Histories saved successfully.');

        return redirect(route('histories.index'));
    }

    /**
     * Display the specified Histories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        return view('histories.show')->with('histories', $histories);
    }

    /**
     * Show the form for editing the specified Histories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        return view('histories.edit')->with('histories', $histories);
    }

    /**
     * Update the specified Histories in storage.
     *
     * @param  int              $id
     * @param UpdateHistoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoriesRequest $request)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        $histories = $this->historiesRepository->update($request->all(), $id);

        Flash::success('Histories updated successfully.');

        return redirect(route('histories.index'));
    }

    /**
     * Remove the specified Histories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        $this->historiesRepository->delete($id);

        Flash::success('Histories deleted successfully.');

        return redirect(route('histories.index'));
    }

    public function render($id){
        // $histories = $this->historiesRepository->findWithoutFail($id);
        // $deviceRender = Devices::find($histories->id_device);
        // $deviceBorrow->id_devicestatus = 1;
        // $deviceBorrow->save();
        echo "trả lại";
    }
    
	public function trathietbi($id){
	    $histories = Histories::find($id);
        $histories->date_render = date('d/m/Y');
        $histories->save();

        $deviceRender = Devices::find($histories->id_device);
        if($deviceRender->id_devicestatus == 2){
            $deviceRender->id_devicestatus = 1;
        }
        $deviceRender->save();
        
        return redirect(route('histories.index'));
	}
	    
	// public function baohongthietbi($id){
	// 	$histories = $this->historiesRepository->findWithoutFail($id);
 //        $deviceRender = Devices::find($histories->id_device);
 //        $deviceRender->id_devicestatus = 3;
 //        $deviceRender->save();
 //        $histories->date_render = date('d/m/Y');
 //        $histories->save(); 
 //        return redirect(route('histories.index'));
	// }
}
