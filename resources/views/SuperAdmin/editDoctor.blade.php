@extends('SuperAdminLayouts.app')

@section('content')

 <form action="{{route('SuperAdmin.editDoctor', $doctor[0]->DoctorId)}}" method="post">
    @csrf
  <div class="form-group">
    <label for="VisitingFee">Visiting Fee:</label>
    <input type="text" class="form-control" placeholder="Visiting Fee" name="VisitingFee" value="{{$doctor[0]->VisitingFee}}">
  </div>
  <div class="form-group">
    <label for="commission">Commission:</label>
    <input type="text" class="form-control" placeholder="Commission" name="commission" value="{{$doctor[0]->Commission}}">
  </div>
  <div class="form-group">
    <label for="closingDay">Closing Day:</label>
    <input type="text" class="form-control" placeholder="closingDay" name="closingDay" value="{{$doctor[0]->ClosingDay}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection