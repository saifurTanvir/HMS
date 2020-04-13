@extends('SuperAdminLayouts.app')

@section('content')
    <div class="btn-group">
  <a href="{{route('SuperAdmin.index')}}" class="btn btn-primary">Doctors</a>
  <button type="button" class="btn btn-primary">Edit</button>
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       Department
    </button>
    <div class="dropdown-menu">
      @foreach ($department as $dep)
     <a class="dropdown-item" href="{{route('SuperAdmin.department',$dep->Department)}}">{{$dep->Department}}</a>

          
      @endforeach

     
    </div>
  </div>
</div> 
  <table class="table table-striped">
  <thead>
    <tr>
      <th>Doctor Name</th>
      <th>Phone </th>
      <th>Email</th>
      <th>Department</th>
      <th style="text-align: center;">Action</th>
    </tr>
  </thead>

  @foreach ($doctors as $doctor)
  <tbody>
 
    <tr>
        
        <td><a href="{{route('SuperAdmin.doctorProfile', $doctor->DoctorId)}}">{{$doctor->Name}}</a></td>
        <td>{{$doctor->Phone}}</td>
        <td>{{$doctor->Email}}</td>
        <td>{{$doctor->Department}}</td>
        <td style="text-align: center;">
          <a href="{{route('SuperAdmin.editDoctor', $doctor->DoctorId)}}" class="btn btn-primary">Edit</a>
          <a href="#" class="btn btn-primary">Block</a>
        </td>
        
      </tr>
    </tbody>


  @endforeach
  </table>
@endsection