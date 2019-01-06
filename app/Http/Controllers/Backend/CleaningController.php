<?php

namespace App\Http\Controllers;

use App\Cleaning;

class CleaningController extends Controller
{
    protected $flat_id;
    protected $user_id;
    protected $cleaning;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            return $next($request);
        });
        $this->cleaning = new Cleaning();

    }


    public function index()
    {
        $period = $this->cleaning->getPeriod();
        return view('backend.cleaning.index', compact('period'));
    }

    public function store()
    {
        $this->validate(\request(), [
            'title' => 'required | string ',
            'period' => 'required ',
        ]);


        return Cleaning::create([
            'flat_id' => $this->flat_id,
            'title' => \request('title'),
            'period_id' => \request('period'),
        ]);

    }

    public function details()
    {
        $details = [];
        $daily = $this->cleaning->getDailyItems($this->flat_id);
        $weekly = $this->cleaning->getWeeklyItems($this->flat_id);
        $monthly = $this->cleaning->getMonthlyItems($this->flat_id);
        $yearly = $this->cleaning->getYearlyItems($this->flat_id);
        // array_push($details , ['daily' => $daily, 'weekly' => $weekly, 'monthly' => $monthly, 'yearly' => $yearly]);
        array_push($details, $daily, $weekly, $monthly, $yearly);

        return $details;
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
