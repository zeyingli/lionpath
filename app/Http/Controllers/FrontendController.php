<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Classes;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\Notification;
use App\Models\User;
use Auth;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $currentUser = Auth::user();
        $classes = $this->getClassSchedule($currentUser->id);

        $data = [
            'currentUser' => $currentUser,
            'classes'     => $classes,
        ];
        return view('frontend.dashboard')->with($data);
    }

    // Retrieving Class Schedule
    public function classSchedule()
    {
        $currentUser = Auth::user();
        $schedules = $this->getClassSchedule($currentUser->id);

        $data = [
            'currentUser' => $currentUser,
            'schedules'   => $schedules,
        ];

        return view('frontend.schedule')->with($data);
    }

    // Retrieving Exam Schedule
    public function examSchedule()
    {
        $currentUser = Auth::user();
        $exams = $this->getExamSchedule($currentUser->id);
        
        $data = [
            'currentUser' => $currentUser,
            'exams'       => $exams,
        ];

        return view('frontend.exam')->with($data);
    }

    // Finding Exam Classroom on Map
    public function locateExamRoom(Request $request)
    {
        $exam = Exam::findOrFail($request->id);
        $class = Classes::find($exam->class_id);
        $name = $this->getClassName($exam->class_id);
        $building = Building::findOrFail($exam->building_id);

        // Create New Map Instance
        Mapper::map(40.7964652, -77.86278949);

        Mapper::informationWindow($building->lat, $building->lng, 'Exam Name: '.$name.' Final Exam<br> <a href="https://maps.apple.com/?q='.$building->lat.','.$building->lng.'">Get Direction to Here.</a>');

        return view('frontend.find', compact('class'));
    }

    public function locateAllRoom()
    {
        $classes = $this->getClassSchedule(Auth::id());
        $class = null;

        // Create New Map Instance
        Mapper::map(40.7964652, -77.86278949);

        foreach ($classes as $class)
        {
            $building = Building::findOrFail($class->building_id);
            $name = $class->name;
            $period = $class->period;


            Mapper::informationWindow($building->lat, $building->lng, 'Name: '.$name.' <br>Period: '.$period.' <br> <a href="https://maps.apple.com/?q='.$building->lat.','.$building->lng.'">Open Map in Phone</a>');
        }

        return view('frontend.find', compact('class'));
    }


    // Add Notification for Exam
    public function addNotification(Request $request)
    {
        $userId = Auth::id();
        $examId = $this->validateExamId($request->get('exam_id'));
        $examTime = $this->getExamStartTime($examId);
        $building = $this->getBuildingId($examId);

        $notification = new Notification();
        $notification->users_id = $userId;
        $notification->exam_id = $examId;
        $notification->building_id = $building;
        $notification->notify_date = $examTime;
        $notification->notify_frequency = 3;
        $notification->save();

        return redirect('/schedule/exam')->with('success', 'Notification has been setup succesfully!');
    }

    // Get class name by Id
    protected function getClassName($id)
    {
        $class = Classes::findOrFail($id);
        $name = $class->name;

        return $name;
    }

    // Get Building location by Id
    protected function getBuildingLocation($id)
    {
        $building = Building::findOrFail($id);
        $location= $building->location;

        return $location;
    }

    protected function getBuildingId($id)
    {
        $exam = Exam::findOrFail($id);
        $building = Building::findOrFail($exam->building_id);
        $Id = $building->id;

        return $Id;
    }

    protected function getExamStartTime($id)
    {
        $exam = Exam::find($id);
        $time = $exam->start_time;

        return $time;
    }

    private static function validateExamId($id)
    {
        $exam = Exam::findOrFail($id);
        $enroll = Enrollment::where([
            ['users_id', Auth::id()],
            ['class_id', $exam->class_id],
        ])->exists();

        if(!$enroll) {
            return back()->with('errors', 'ERROR: You have not registered with this course.');
        }

        return $id;
    }

    // Get Class Schedule by User Id
    private static function getClassSchedule($id)
    {
        $enrollments = Enrollment::where('users_id', $id)->get();
        $classes = [];

        foreach($enrollments as $enrollment)
        {
            $classes[] = Classes::where('id', $enrollment->class_id)->orderBy('name', 'ASC')->first();
        }
        
        return $classes;
    }

    // Get Exam Schedule by User Id
    private static function getExamSchedule($id)
    {
        $enrollments = Enrollment::where('users_id', $id)->get();
        $exams = [];

        foreach($enrollments as $enrollment)
        {
            $exams[] = Exam::where('class_id', $enrollment->class_id)->orderBy('id', 'ASC')->first();
        }

        return $exams;
    }

    // Get Exam Location by Exam Id
    private static function getExamLocation($id)
    {
        $exam = Exam::findOrFail($id);
        $location = Building::find($exam->building_id);

        return $location;
    }
}