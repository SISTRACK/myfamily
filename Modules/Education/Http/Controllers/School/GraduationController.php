<?php

namespace Modules\Education\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Education\Entities\Admitted;
use Modules\Education\Entities\Graduated;
use Modules\Core\Services\Traits\UploadFile;

class GraduationController extends Controller
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
    public function store(Request $request)
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
        session()->flash('message','Congratulation the graduation was register successfully');
        return redirect()->route('education.school.graduation.index',[date('Y')]);
    }

    
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $graduation = Graduated::find($request->graduation_id);
        if($request->graduation_status != 'on'){
            if($graduation->certificate){
                //delete certificate from the server
            }

            //delete the graduation
            $graduation->delete();
            $message = 'Congratulation the graduation deleted successfully';
        }else{
            if($request->has('certificate')){
                $path = $graduation->admitted->profile->certificateImageLocation($graduation->id);
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
        return redirect()->route('education.school.graduation.index',[date('Y')]);
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
