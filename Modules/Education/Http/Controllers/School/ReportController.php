<?php

namespace Modules\Education\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Education\Entities\Admitted;
use Modules\Core\Http\Controllers\Education\EducationBaseController;


class ReportController extends EducationBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('education::Education.School.Report.index');
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $admission = Admitted::find($request->admission_id);
        if($request->has('evidence')){
            //upload the file to the server
        }else{
            $evidence = null;
        }
        $admission->schoolReports()->create([
            'about_report' =>$request->about_report,
            'school_report_type_id' =>$request->report_type_id,
            'evidence' =>$evidence
        ]);
        session()->flash('message','Congratulation the report is register successfully');
        return redirect()->route('education.school.report.index',[$request->route('year')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('education::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('education::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
