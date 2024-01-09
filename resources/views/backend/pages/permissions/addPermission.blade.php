@extends('admin/adminDashboard')
@section('admin')



<div class="page-content">

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Add Premission</h6>

                                <form class="forms-sample" method="POST" action="{{route('storePremission')}}">
                                   @csrf

                                
                                   <div class="mb-3">
                                        <label for="premission_name" class="form-label">Premission Name</label>
                                        <input type="text" name="premission_name"
                                         class="form-control @error('premission_name') is-invalid @enderror">

                                          @error('premission_name')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div> 

                                    {{-- <div class="mb-3">
                                        <label for="guard_name" class="form-label">Guard Name</label>
                                        <input type="text" name="guard_name"
                                         class="form-control @error('guard_name') is-invalid @enderror">

                                          @error('guard_name')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div>  --}}

                                   
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <select class="form-select" name="group_name" id="group_name "aria-label="Default select example">
                                            <option selected>selected group</option>
                                            <option value="type">Property Type</option>
                                            <option value="state">State</option>
                                            <option value="amenities">Amenities</option>
                                            <option value="property">Property</option>
                                            <option value="history">Package History</option>
                                            <option value="message">Property Message</option>
                                            <option value="testimonials">Testimonials</option>
                                            <option value="agent">Manege Agent</option>

                                            <option value="category">Blog Category</option>
                                            <option value="post">Blog Post</option>
                                            <option value="comment">Blog Comment</option>
                                            <option value="smtp">SMTP Setting</option>
                                            <option value="site">Site $ Sitting</option>
                                            <option value="role">Role $ Permission</option>



                                          </select>
                                    </div>

                                   

                                    <button type="submit" class="btn btn-primary me-2">Add Premission</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>



@endsection