@extends('admin/adminDashboard')
@section('admin')

<div class="page-content">

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Update Roles</h6>

                                <form class="forms-sample" method="POST" action="{{route('updateRoles')}}">
                                   @csrf

                                {{-- to send it to update method as a request --}}
                                   <input type="hidden" name="id" value="{{$roles->id}}">

                                   <div class="mb-3">
                                        <label for="roles_name" class="form-label">Roles Name</label>
                                        <input type="text" name="roles_name" value="{{$roles->name}}"
                                         class="form-control @error('roles_name') is-invalid @enderror">

                                          @error('roles_name')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div> 

                                    <button type="submit" class="btn btn-primary me-2">update</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>
@endsection