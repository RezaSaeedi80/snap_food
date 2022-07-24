<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimeWorkingRequest;
use App\Http\Requests\UpdateTimeWorkingRequest;
use App\Models\Resturant;
use App\Models\TimeWorking;
use App\Rules\WorkingTimeRule;

class TimeWorkingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(TimeWorking::class, 'timeWorking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Resturant $resturant)
    {
        return view('seller.Resturant.SetWorkingTime', compact('resturant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimeWorkingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeWorkingRequest $request, Resturant $resturant)
    {
        TimeWorking::create([
            'resturant_id' => $request->resturant->id,
            'saturday' => $request->saturday_start . '-' . $request->saturday_end,
            'sunday' => $request->sunday_start . '-' . $request->sunday_end,
            'monday' => $request->monday_start . '-' . $request->monday_end,
            'tuesday' => $request->tuesday_start . '-' . $request->tuesday_end,
            'wednesday' => $request->wednesday_start . '-' . $request->wednesday_end,
            'thursday' => $request->thursday_start . '-' . $request->thursday_end,
            'friday' => $request->friday_start . '-' . $request->friday_end,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant, TimeWorking $timeWorking)
    {
        $time_working = $timeWorking;
        return view('seller.Resturant.ShowWorkingTime', compact('time_working', 'resturant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Http\Response
     */
    public function edit(Resturant $resturant , TimeWorking $timeWorking)
    {
        return view('seller.Resturant.editeWorkingTime', compact('resturant', 'timeWorking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeWorkingRequest  $request
     * @param  \App\Models\TimeWorking  $timeWorking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeWorkingRequest $request, Resturant $resturant , TimeWorking $timeWorking)
    {
        $timeWorking->update([
            'resturant_id' => $resturant->id,
            'saturday' => $request->saturday_start . '-' . $request->saturday_end,
            'sunday' => $request->sunday_start . '-' . $request->sunday_end,
            'monday' => $request->monday_start . '-' . $request->monday_end,
            'tuesday' => $request->tuesday_start . '-' . $request->tuesday_end,
            'wednesday' => $request->wednesday_start . '-' . $request->wednesday_end,
            'thursday' => $request->thursday_start . '-' . $request->thursday_end,
            'friday' => $request->friday_start . '-' . $request->friday_end,
        ]);
        return redirect()->route('timeWorking.show', [$resturant, $timeWorking]);
    }
}
