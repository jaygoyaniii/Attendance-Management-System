<?php

namespace App\Repository;

use App\Models\attendanceStatus;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\AttendanceStatusFactory;
use DB;


class AttendanceStatusRepository extends BaseRepository
{
    public function __construct(AttendanceStatusFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

    public function getAllStudentReport($faculty,$subject,$todayDate,$nextDate)
    {
        return $this->modelFactory->create()
                        ->select('students.id','students.name','fill_attendances.*','attendance_statuses.*')
                        ->join('students','students.id','attendance_statuses.student_id')
                        ->join('fill_attendances','fill_attendances.id','attendance_statuses.fill_attendance_id')
                        ->where('fill_attendances.faculty',$faculty)
                        ->where('fill_attendances.subject',$subject)
                        ->whereBetween('fill_attendances.date',[$todayDate,$nextDate])
                        ->get();
    }

    public function countTotalAttendance($id)
    {
        return $this->modelFactory->create()->where('student_id',$id)->count();
    }

    public function countPresentAttendance($id)
    {
        return $this->modelFactory->create()->where('student_id',$id)->where('status',1)->count();
    }

    public function weeklyAttendance($id)
    {
        $beforeDate = date('Y-m-d', strtotime('-7 days') );
        $todayDate = date('Y-m-d');

        return $this->modelFactory->create()
                        ->select('students.id','fill_attendances.*','attendance_statuses.*')
                        ->join('students','students.id','attendance_statuses.student_id')
                        ->join('fill_attendances','fill_attendances.id','attendance_statuses.fill_attendance_id')
                        ->where('attendance_statuses.student_id',$id)
                        ->whereBetween('fill_attendances.date', [$beforeDate, $todayDate])
                        ->count();

    }

    public function weeklyPresentAttendance($id)
    {
        $beforeDate = date('Y-m-d', strtotime('-7 days') );
        $todayDate = date('Y-m-d');

        return $this->modelFactory->create()
                        ->select('students.id','fill_attendances.*','attendance_statuses.*')
                        ->join('students','students.id','attendance_statuses.student_id')
                        ->join('fill_attendances','fill_attendances.id','attendance_statuses.fill_attendance_id')
                        ->where('attendance_statuses.student_id',$id)
                        ->where('attendance_statuses.status',1)
                        ->whereBetween('fill_attendances.date', [$beforeDate, $todayDate])
                        ->count();

    }

    public function weeklySubjectWiseAttendance($id)
    {
        $beforeDate = date('Y-m-d', strtotime('-7 days') );
        $todayDate = date('Y-m-d');

        return $this->modelFactory->create()
                    ->select('fill_attendances.subject', DB::raw('count(attendance_statuses.status) as total'))
                    // ->select('students.id','fill_attendances.*','attendance_statuses.*')
                    ->join('students','students.id','attendance_statuses.student_id')
                    ->join('fill_attendances','fill_attendances.id','attendance_statuses.fill_attendance_id')
                    ->where('attendance_statuses.student_id',$id)
                    ->groupBy('subject')
                    // ->where('attendance_statuses.status',1)
                    ->whereBetween('fill_attendances.date', [$beforeDate, $todayDate])
                    ->get();
    }

}

?>
