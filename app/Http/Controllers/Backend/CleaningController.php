<?php

namespace App\Http\Controllers;

use App\Cleaning;
use Session;

class CleaningController extends BackendController
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
