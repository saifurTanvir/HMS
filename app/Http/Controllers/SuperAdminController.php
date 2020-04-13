<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use App\Doctor;

class SuperAdminController extends Controller
{   
    public function index(){
        return view('SuperAdmin.index');
    }

    //reporting sample
    public function reporting(){
        return view('SuperAdmin.report');
    }
    
    //Doctors
    public function doctors(){
        $doctors = Doctor::all();
        $department = DB::select('SELECT DISTINCT Department FROM Doctors');
        //error_log(print_r( $department, true ) );
        return view('SuperAdmin.doctors')
            ->with('doctors', $doctors)
            ->with('department', $department);
    }

    //Doctor Department
    public function DoctorDepartment($dep){
        //DB::select('select * from users where id = :id', ['id' => 1]);
        $doctors = DB::select('SELECT * FROM Doctors where  Department = :dep', ['dep' => $dep]);
        //error_log(print_r( $doctors, true ) );

        $department = DB::select('SELECT DISTINCT Department FROM Doctors');
        return view('SuperAdmin.index')
            ->with('doctors', $doctors)
            ->with('department', $department);
    }

    //View Doctor Profile 
    public function doctorProfile($DoctorId){
        $doctor = Doctor::find($DoctorId);
        return view('SuperAdmin.doctorProfile',$doctor);
    }

    //Edit Doctor
    public function editDoctor($DoctorId){
        $doctor = DB::select('SELECT * FROM doctors WHERE DoctorId = :DoctorId', ['DoctorId' => $DoctorId]);
        //error_log(print_r( $doctor, true ) );

        return view('SuperAdmin.editDoctor')
            ->with('doctor', $doctor);
    }

    public function updateDoctor($DoctorId, Request $req){
        
        DB::table('doctors')
            ->where('DoctorId', $DoctorId)
            ->update(['VisitingFee' => $req->VisitingFee, 'Commission' => $req->commission, 'ClosingDay' => $req->closingDay]);
        

            $doctor = Doctor::find($DoctorId);
            return view('SuperAdmin.doctorProfile', $doctor);

    }
}
  