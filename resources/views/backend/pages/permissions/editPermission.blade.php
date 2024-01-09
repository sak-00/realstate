@extends('admin/adminDashboard')
@section('admin')

<div class="page-content">

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Update Permission</h6>

                                <form class="forms-sample" method="POST" action="{{route('updatePermission')}}">
                                   @csrf

                                {{-- to send it to update method as a request --}}
                                   <input type="hidden" name="id" value="{{$permission->id}}">

                                   <div class="mb-3">
                                        <label for="premission_name" class="form-label">Permission Name</label>
                                        <input type="text" name="permission_name" value="{{$permission->name}}"
                                         class="form-control @error('premission_name') is-invalid @enderror">

                                          @error('premission_name')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div> 

                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <select class="form-select" name="group_name" id="group_name "aria-label="Default select example">
                                            <option selected>selected group</option>
                                            <option value="type" {{$permission->group_name =='type'? 'selected':''}}>Property Type</option>
                                            <option value="state" {{$permission->group_name =='state'? 'selected':''}}>State</option>
                                            <option value="amenities" {{$permission->group_name =='amenities'? 'selected':''}}>Amenities</option>
                                            <option value="property" {{$permission->group_name =='property'? 'selected':''}}>Property</option>
                                            <option value="history" {{$permission->group_name =='history'? 'selected':''}}>Package History</option>
                                            <option value="message" {{$permission->group_name =='message'? 'selected':''}}>Property Message</option>
                                            <option value="testimonials" {{$permission->group_name =='testimonials'? 'selected':''}}>Testimonials</option>
                                            <option value="agent" {{$permission->group_name =='agent'? 'selected':''}}>Manege Agent</option>

                                            <option value="category" {{$permission->group_name =='category'? 'selected':''}}>Blog Category</option>
                                            <option value="post" {{$permission->group_name =='post'? 'selected':''}}>Blog Post</option>
                                            <option value="comment" {{$permission->group_name =='comment'? 'selected':''}}>Blog Comment</option>
                                            <option value="smtp" {{$permission->group_name =='smtp'? 'selected':''}}>SMTP Setting</option>
                                            <option value="site" {{$permission->group_name =='site'? 'selected':''}}>Site $ Sitting</option>
                                            <option value="role" {{$permission->group_name =='role'? 'selected':''}}>Role $ Permission</option>



                                          </select>
                                    </div>

                                   

                                    <button type="submit" class="btn btn-primary me-2">update</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>
@endsection