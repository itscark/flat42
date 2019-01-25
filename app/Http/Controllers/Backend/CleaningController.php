<?php

namespace App\Http\Controllers;

use App\Cleaning;
use Session;

class CleaningController extends BackendController
{


    public function __construct()
    {
parent::__construct();
    }


    public function index()
    {
        return view('backend.cleaning.index');
    }

    public function indexApi(){
        return $this->cleaning->getPeriod();
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
        $details['daily'] = $this->cleaning->getDailyItems($this->flat_id);
        $details['weekly'] = $this->cleaning->getWeeklyItems($this->flat_id);
        $details['monthly'] = $this->cleaning->getMonthlyItems($this->flat_id);
        $details['yearly'] = $this->cleaning->getYearlyItems($this->flat_id);
        return $details;
    }

    public function destroy($id)
    {
        $item = Cleaning::findOrFail($id);
        $item->delete();
        return response()->json($item);
    }
}
