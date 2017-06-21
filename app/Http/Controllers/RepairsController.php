<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRepairsRequest;
use App\Http\Requests\UpdateRepairsRequest;
use App\Repositories\RepairsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Devices;

class RepairsController extends AppBaseController
{
    /** @var  RepairsRepository */
    private $repairsRepository;

    public function __construct(RepairsRepository $repairsRepo)
    {
        $this->repairsRepository = $repairsRepo;
    }

    /**
     * Display a listing of the Repairs.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /* Start
        $hour = date('H');
        $minute = date('i');
        $time = ((int)$hour + 7).':'.((int)$minute -5);
        //dd($time);
        $statistic = \App\Models\Histories::with('borrower')->with('periodofclassend')
        ->where('flag_email', 0)
        ->where('date_render', 'Chưa trả')
        ->get();
        //dd($statistic);
        // $histories = \App\Models\Histories::with('borrower')->with('periodofclassend')->get();
        // \Log::info($histories->id);
        if($statistic->count()){
            foreach ($statistic as $key => $value) {
                if($time > $value->periodofclassend->timeend){
                    //code send mail day
                    \Log::info('Đã send');
                    //code update flag
                    $value->flag_email = 1;
                    $value->save();
                }else {
                    \Log::info('Chua het gio');
                }
                
            }
        }else {
            \Log::info('Mang rong!');
        }
        dd((string)($statistic));
        // End */
        

        $this->repairsRepository->pushCriteria(new RequestCriteria($request));
        $repairs = $this->repairsRepository->all();
        $currentUserRole = $request->user()->role;
        return view('repairs.index', compact('repairs', 'currentUserRole'));
    }

    /**
     * Show the form for creating a new Repairs.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        //dd($input);
        return view('repairs.create');
    }

    /**
     * Store a newly created Repairs in storage.
     *
     * @param CreateRepairsRequest $request
     *
     * @return Response
     */
    public function store(CreateRepairsRequest $request)
    {
        $input = $request->all();
        $_token = $input['_token'];
        $id_device = $input['id_device'];
        $id_reporter = $request->user()->id;
        $date_report = date('d/m/Y');
        $description = $input['description'];
        $data = array(
                '_token' => $_token,
                'id_device' => $id_device,
                'id_reporter' => $id_reporter,
                'date_report' => $date_report,
                'description' => $description,
        );

        $deviceReport = Devices::find($id_device);
        $deviceReport->id_devicestatus = 3;
        $deviceReport->save();

        // $histories = \DB::table('histories')
        // ->where('id_device', $id)
        // ->where('date_render', '')
        // ->get();

        $repairs = $this->repairsRepository->create($data);

        Flash::success('Repairs saved successfully.');

        return redirect(route('histories.index'));
    }

    /**
     * Display the specified Repairs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            Flash::error('Repairs not found');

            return redirect(route('repairs.index'));
        }

        return view('repairs.show')->with('repairs', $repairs);
    }

    /**
     * Show the form for editing the specified Repairs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            Flash::error('Repairs not found');

            return redirect(route('repairs.index'));
        }

        return view('repairs.edit')->with('repairs', $repairs);
    }

    /**
     * Update the specified Repairs in storage.
     *
     * @param  int              $id
     * @param UpdateRepairsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepairsRequest $request)
    {
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            Flash::error('Repairs not found');

            return redirect(route('repairs.index'));
        }

        $repairs = $this->repairsRepository->update($request->all(), $id);

        Flash::success('Repairs updated successfully.');

        return redirect(route('repairs.index'));
    }

    /**
     * Remove the specified Repairs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $repairs = $this->repairsRepository->findWithoutFail($id);

        if (empty($repairs)) {
            Flash::error('Repairs not found');

            return redirect(route('repairs.index'));
        }

        $this->repairsRepository->delete($id);

        Flash::success('Repairs deleted successfully.');

        return redirect(route('repairs.index'));
    }

    public function filter($id) {
        $id_device = $id;
        return view('repairs.create')->with('id_device', $id_device);
    }

    public function repairDevice($id){
        $repair = $this->repairsRepository->findWithoutFail($id);
        $repair->id_repairer = \Auth::user()->id;
        $repair->date_repair = date('d/m/Y');
        $repair->save();

        $deviceRepair = Devices::find($repair->id_device);
        $deviceRepair->id_devicestatus = 1;
        $deviceRepair->save();

        return redirect(route('repairs.index'));
    }
}
