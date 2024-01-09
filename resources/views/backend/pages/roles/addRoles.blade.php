@extends('admin/adminDashboard')
@section('admin')



<div class="page-content">

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Add Roles</h6>

                                <form class="forms-sample" method="POST" action="{{route('storeRoles')}}">
                                   @csrf

                                
                                   <div class="mb-3">
                                        <label for="roles_name" class="form-label">Roles Name</label>
                                        <input type="text" name="roles_name"
                                         class="form-control @error('roles_name') is-invalid @enderror">

                                          @error('roles_name')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div> 

                       
                                   

                                    <button type="submit" class="btn btn-primary me-2">Add Roles</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>



@endsection