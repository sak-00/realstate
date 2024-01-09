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
    
                                    <h6 class="card-title">Update Admin Profile</h6>
    
                                    <form class="forms-sample" method="POST" action="{{route('adminProfileStore')}}" enctype="multipart/form-data">
                                       @csrf

                                       <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Name</label>
                                        <input type="text" value="{{$profileDataUser->name}}" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                                    </div>

                                        <div class="mb-3">
                                            <label for="exampleInputUsername1" class="form-label">Username</label>
                                            <input type="text" value="{{$profileDataUser->username}}" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" name="email" value="{{$profileDataUser->email}}" 
                                            class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPhone" class="form-label">phone</label>
                                            <input type="text" name="phone" value="{{$profileDataUser->phone}}" 
                                            class="form-control" id="exampleInputPhone" placeholder="phone">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputAddress" class="form-label">Address</label>
                                            <input type="text" name="address" value="{{$profileDataUser->address}}" 
                                            class="form-control" id="exampleInputAddress" placeholder="Address">
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password" value="{{$profileDataUser->email}}"
                                             class="form-control" id="exampleInputPassword1" autocomplete="off"
                                              placeholder="Password">
                                        </div> --}}


                                        <div class="mb-3">
                                            <label for="exampleInputPhoto" class="form-label">photo</label>
                                            <input class="form-control" name="photo" type="file" id="image">
                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleInputPhoto" class="form-label"></label>
                                            <img class="wd-10 ht-10 circle-img rounded-circle" id="showImage"
                                            src="{{(!empty($profileDataUser->photo))?url('/upload/adminImages/'.$profileDataUser->photo):url('/uploads/no_image.jpg')}}" alt="profile">
                                        </div>

                                        <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">save changes</button>
                                    </form>
    
                </div>
                        </div>
         
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
   
      <!-- right wrapper end -->
    </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload=function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            })
        </script>

@endsection