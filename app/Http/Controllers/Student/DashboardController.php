<?php

namespace App\Http\Controllers\Student;

use App\Models\Grade;
use App\Models\ExamGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //get exam groups
        $exam_groups = ExamGroup::with('exam', 'exam_session', 'student.classroom')
            ->where('student_id', auth()->guard('student')->user()->id)
            ->get();

        //define variable array
        $data = [];

        //get nilai
        foreach($exam_groups as $exam_group) {
            
            //get data nilai / grade
            $grade = Grade::where('exam_id', $exam_group->exam_id)
                ->where('exam_session_id', $exam_group->exam_session_id)
                ->where('student_id', auth()->guard('student')->user()->id)
                ->first();

            //jika nilai / grade kosong, maka buat baru
            if($grade == null) {

                //create defaul grade
                $grade = new Grade();
                $grade->grades_code     = 'grds-' . rand(11, 99) . uniqid();
                $grade->exam_id         = $exam_group->exam_id;
                $grade->exam_session_id = $exam_group->exam_session_id;
                $grade->student_id      = auth()->guard('student')->user()->id;
                $grade->duration        = $exam_group->exam->duration * 60000;
                $grade->total_correct   = 0;
                $grade->grade           = 0;
                $grade->save();

            }

            $data[] = [
                'exam_group' => $exam_group,
                'grade'      => $grade
            ];

        }

        //return with inertia
        return inertia('Student/Dashboard/Index', [
            'exam_groups' => $data,
        ]);
    }
}