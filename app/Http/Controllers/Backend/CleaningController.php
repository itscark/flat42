<?php

namespace App\Http\Controllers;

use App\Cleaning;
use App\CleaningDay;
use App\CleaningPeriod;
use App\CleaningRoom;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CleaningController extends Controller
{
    protected $flat_id;
    protected $data;
    protected $period;
    protected $day;
    protected $room;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            return $next($request);
        });

        $this->period = CleaningPeriod::all();
        $this->day = CleaningDay::all();
        $this->room = CleaningRoom::where('flat_id', '=', $this->flat_id)->get();

    }


    public function index()
    {
        $cleaning = Cleaning::where('flat_id', '=', $this->flat_id)
            ->get();

        return view('backend.cleaning.index', compact('cleaning'));
    }

    public function pdf()
    {




    }

    public function daily()
    {
        $period =  CleaningPeriod::where('name', 'Täglich')->get();

       $getData =  Cleaning::where('flat_id', '=', $this->flat_id)
           ->where('period_id', '=', $period[0]->id)
            ->get();



      return $getData;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cleaning $cleaning
     * @return \Illuminate\Http\Response
     */
    public function show(Cleaning $cleaning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cleaning $cleaning
     * @return \Illuminate\Http\Response
     */
    public function edit(Cleaning $cleaning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cleaning $cleaning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cleaning $cleaning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cleaning $cleaning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cleaning $cleaning)
    {
        //
    }

    /*    public function pdf()
        {
            $pdf = App::make('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadHTML($this->convert_data_to_html());
            return $pdf->stream();
        }
        private function convert_data_to_html()
        {
            $flat_id = auth()->user()->flat_id;
            $data = Cleaning::where('flat_id', '=', $flat_id)
                ->get();
            $dayData = CleaningDay::all();
            $periodData = CleaningPeriod::all();
            $roomData = CleaningRoom::where('flat_id', '=', $flat_id)->get();


            $output = '
            <table class="table">
              <thead>
                <tr>
                <th></th>';

            foreach ($dayData as $day) {
                $output .= '
                    <th scope="col">' . $day->name . '</th>
                ';
            };
            $output .= '
            </tr>
              </thead>
              <tbody>
            ';

            foreach ($roomData as $room) {
                $output .= '
                 <tr>
                    <th>' . $room->name . '</th>
                 </tr>
                ';

                foreach ($periodData as $period) {
                    $output .= '
                    <tr>
                        <td>' . $period->name . '</td>';



                    $output .= '
                    </tr>
                    ';
                }
            }
            $output .= '</tbody>
                </table>';
            return $output;

        }*/
}
