<?php

namespace Modules\Education\Http\Controllers\School;

use Illuminate\Http\Response;
use Modules\Education\Entities\Admitted;
use Modules\Education\Entities\Graduated;
use Modules\Core\Services\Traits\UploadFile;
use Modules\Government\Events\Education\School\NewGraduationEvent;
use Modules\Core\Http\Controllers\Education\EducationBaseController;
use Modules\Education\Http\Requests\Education\School\GraduationFormRequest;

class GraduationController extends EducationBaseController
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   $class_honors = ['Excellent','Very Good', 'Good', 'Poor'];
        return view('education::Education.School.Graduation.index',['class_honors'=>$class_honors]);
    }

    
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(GraduationFormRequest $request)
    {
        $admission = Admitted::find($request->admission_id);
        if($request->has('certificate')){
            $path = $admission->profile->certificateImageLocation();
            $file = $this->storeFile($request->certificate,$path);
        }else{
            $file = $request->certificate;
        }
        $admission->graduated()->create([
            'year' => $request->year,
            'certificate' => $file,
            'class_honor' => $request->class_honor
        ]);

        if($request->has('discpline')){
            $admission->graduated()->update([
                'discpline'=>$request->discpline
            ]);
        }
        
        event(new NewGraduationEvent($admission->profile));

        session()->flash('message','Congratulation the graduation was register successfully');
        return redirect()->route('education.school.graduation.index',[$request->route('year')]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(GraduationFormRequest $request, $id)
    {
        $graduation = Graduated::find($request->graduation_id);
        if($request->graduation_status != 'on'){
            if($graduation->certificate){
                //delete certificate from the server
                $this->deleteFile($graduation->admitted->profile->certificateImageLocation().$graduation->certificate);
            }

            //delete the graduation
            $graduation->delete();
            $message = 'Congratulation the graduation deleted successfully';
        }else{
            if($request->has('certificate')){
                $path = $graduation->admitted->profile->certificateImageLocation();
                //if the certificate already uploaded
                if($graduation->certificate){
                    //delete certificate from the server
                    $this->deleteFile($graduation->admitted->profile->certificateImageLocation().$graduation->certificate);
                }
                //upload new certificate
                $file = $this->storeFile($request->certificate,$path);
            }else{
                $file = $request->certificate;
            }
            $graduation->update([
                'year' => $request->year,
                'certificate' => $file,
                'class_honor' => $request->class_honor
            ]);
            if($request->has('discpline')){
                $graduation->update([
                    'discpline'=>$request->discpline
                ]);
            }
            $message = 'Congratulation the graduation was updated successfully';
        }
        session()->flash('message',$message);
        return redirect()->route('education.school.graduation.index',[$request->route('year')]);
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
