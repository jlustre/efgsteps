<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Step;
use Illuminate\Validation\Rule;

class StepController extends Controller
{
    public function AllStepFAP(Request $request) {
        $country = $request->segment(4);
        $steps = Step::where('type', 'fap')
            ->where('country', $country)
            ->get();
        return view('backend.pages.step.all_step_fap', compact('steps','country'));
    }//End Method

    public function AddStepFAP(Request $request) {
        $country = $request->segment(4);
        return view('backend.pages.step.add_step_fap', compact('country'));
    }//End Method

    public function StoreStepFAP(Request $request) {

        $request->validate([
            'title' => 'required|unique:steps|max:250',
            'nthDayTarget' => 'required',
            'country' => 'required',
        ]);

        Step::create([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'nthDayTarget' => $request->nthDayTarget,
            'sequence' => $request->sequence,
            'country' => $request->country,
        ]);

        $notification = array(
            'message' => 'New Step Was Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.steps.fap', $request->country)->with($notification);
    }//End Method

    public function UpdateStepFAP(Request $request, $id) {

        $request->validate([
            'title' => ['required', Rule::unique('steps')->ignore($id), 'max:250'],
            'nthDayTarget' => 'required',
            'country' => 'required',
        ]);

        $step = Step::findOrFail($id)->update([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'nthDayTarget' => $request->nthDayTarget,
            'sequence' => $request->sequence,
            'country' => $request->country,
        ]);

        $notification = array(
            'message' => 'Step Was Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.steps.fap', $request->country)->with($notification);
    }//End Method

    public function EditStepFAP($id) {
        $step = Step::findOrFail($id);
        $country = $step->country;
        return view('backend.pages.step.edit_step_fap', compact('step', 'country'));
    }//End Method

    public function DeleteStepFAP($id) {
        Step::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Step Was Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method
}