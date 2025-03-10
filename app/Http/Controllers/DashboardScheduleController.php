<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use Illuminate\Support\Facades\Storage;

class DashboardScheduleController extends Controller
{
    public function index() {
        return view('dashboard.schedules.index', [
            'title' => 'Jadwal Training',
            'schedules' => Schedule::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.schedules.create', [
            'title' => "Tambah Jadwal Training",
            'training_categories_id' => TrainingCategories::where('id', '!=', '4')->get(),
            'training_id' => Training::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'training_categories_id'   =>  'required',
            'name' =>  'nullable',
            'training_id'   => 'nullable',
            'method' => 'required',
            'schedule' =>  'required'
        ]);

        Schedule::create($validatedData);

        return redirect('/dashboard/schedules')->with('success','Schedule has been created successfully.');
    }

    public function edit($id)
    {

        $schedule = Schedule::find($id);
        return view('dashboard.schedules.edit', [
            'title' => "Edit Jadwal Training",
            'training_categories_id' => TrainingCategories::where('id', '!=', '4')->get(),
            'training_id' => Training::all()
        ], compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'training_categories_id'   =>  'required',
            'name' =>  'nullable',
            'training_id'   => 'nullable',
            'method' => 'required',
            'schedule' =>  'required'
        ];

        $validatedData = $request->validate($rules);

        Schedule::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/schedules')->with('success','Schedule has been created successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        if($schedule->image) {
            Storage::delete($schedule->image);
        }
        Schedule::destroy($schedule->id);

        return redirect('/dashboard/schedules')->with('success', 'Schedule has been deleted!');
    }

}
