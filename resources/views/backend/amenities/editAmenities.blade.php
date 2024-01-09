@extends('admin/adminDashboard')
@section('admin')

<div class="page-content">

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Update Amenities</h6>

                                <form class="forms-sample" method="POST" action="{{route('updateAmenities')}}">
                                   @csrf

                                
                                   <input type="hidden" name="id" value="{{$amenities->id}}">

                                   <div class="mb-3">
                                        <label for="type_name" class="form-label">Amenitie Name</label>
                                        <input type="text" name="Amenities_name" value="{{$amenities->amenities_name}}"
                                         class="form-control ">
                                    </div> 

                                   

                                    <button type="submit" class="btn btn-primary me-2">update</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>
@endsection