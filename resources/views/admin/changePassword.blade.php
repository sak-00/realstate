@extends('admin/adminDashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

   
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="mb-2">
              <img class="wd-70 ht-70 rounded-circle" src="{{(!empty($profileDataUser->photo))?url('/upload/adminImages/'.$profileDataUser->photo):url('/uploads/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3 text-lihgt">{{$profileDataUser->name}}</span>
              </div>
           
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
              <p class="text-muted">{{$profileDataUser->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$profileDataUser->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{$profileDataUser->phone}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{$profileDataUser->address}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
                <div class="card">
                  <div class="card-body">
    
                                    <h6 class="card-title">Change Admin Password</h6>
    
                                    <form class="forms-sample" method="POST" action="{{route('adminUpdatePassword')}}">
                                       @csrf

                                    
                                       <div class="mb-3">
                                            <label for="old_password" class="form-label">Old password</label>
                                            <input type="password" name="old_password"
                                             class="form-control @error('old_password') is-invalid @enderror"
                                              id="old_password" autocomplete="off"
                                              placeholder="Password">
                                              @error('old_password')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror
                                        </div> 

                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New password</label>
                                            <input type="password" name="new_password"
                                             class="form-control @error('new_password') is-invalid @enderror"
                                              id="new_password" autocomplete="off"
                                              placeholder="New Password">
                                              @error('new_password')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror
                                        </div> 

                                        <div class="mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm password</label>
                                            <input type="password" name="new_password_confirmation"
                                             class="form-control @error('confirm_password') is-invalid @enderror"
                                              id="new_password_confirmation" autocomplete="off"
                                              placeholder="Confirm Password">
                                              @error('confirm_password')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror
                                        </div> 

                                        <button type="submit" class="btn btn-primary me-2">change Password</button>
                                    </form>
    
                </div>
                        </div>
         
        </div>
      </div>
  
    </div>

        </div>

     

@endsection