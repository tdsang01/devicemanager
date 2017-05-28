<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DevicesRepository;
use App\Repositories\HistoriesRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Histories;

class StatisticController extends Controller
{
	/** @var  DevicesRepository */
    private $devicesRepository;

    public function __construct(DevicesRepository $devicesRepo)
    {
        $this->middleware('auth');
        $this->devicesRepository = $devicesRepo;
    }

    /**
     * Display a listing of the Devices.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
 
        return view('statistic.index');
    }
    
    public function getAllLecture($id_role){
    	$lectures = DB::table('users')->where('role', $id_role)->get();
    	return response()->json($lectures);
    }
    
    public function statisticByIdLecture($id_lecture){
    	$statistic = Histories::with('device')->with('borrower')->with('lender')
                    ->with('periodofclassstart')->with('periodofclassend')
    				->where('id_borrower', $id_lecture)
    				->get();
    	return response()->json($statistic);
    }
	
	public function statisticTime($timeStart, $timeEnd){
        $statistic = Histories::with('device')->with('borrower')->with('lender')
                    ->with('periodofclassstart')->with('periodofclassend')
                    ->whereBetween('date_borrow', [$timeStart, $timeEnd])
                    ->get();
        return response()->json($statistic);
	}

    public function statisticBorrowing(){
        $statistic = Histories::with('device')->with('borrower')->with('lender')
                    ->with('periodofclassstart')->with('periodofclassend')
                    ->where('date_render', 'Chưa trả')
                    ->get();
        return response()->json($statistic);
    }

    public function statisticFrequency(){
        //$statistic = Histories::with('device')->count('id_device');
        $statistic = Histories::with('device')
                     ->select(DB::raw('count(*) as his_count, id_device'))
                     ->groupBy('id_device')
                     ->get();
        //$users = DB::table('users')->count();
        //dd($statistic);
        return response()->json($statistic);
    }

    public function statisticCurrentLecture($id){
        $statistic = Histories::with('device')->with('borrower')->with('lender')
                    ->with('periodofclassstart')->with('periodofclassend')
                    ->where('id_borrower', $id)
                    ->get();
        //dd($statistic);
        return view('statistic.index_statistic_lecture')
            ->with('statistic', $statistic);
    }
}
