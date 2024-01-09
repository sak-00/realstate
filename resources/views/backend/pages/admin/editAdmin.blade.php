@extends('admin/adminDashboard')
@section('admin')



<div class="page-content">

    <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
                <div class="card">
                  <div class="card-body">
    
                                    <h6 class="card-title">Update Admin </h6>
    
                                    <form class="forms-sample" method="POST" action="{{route('updateAdmin',$admin->id)}}">
                                       @csrf

                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                                    </div>

                                     
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" value="{{$admin->email}}" name="email"
                                            class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPhone" class="form-label">phone</label>
                                            <input type="text" name="phone" value="{{$admin->phone}}"
                                            class="form-control" id="exampleInputPhone" placeholder="phone">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputAddress" class="form-label">Address</label>
                                            <input type="text" name="address"  value="{{$admin->address}}"
                                            class="form-control" id="exampleInputAddress" placeholder="Address">
                                        </div>

                                           
                                       {{-- <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password"
                                         class="form-control"
                                          id="password" autocomplete="off"
                                          placeholder="Password">
                                    </div>  --}}


                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                        <select class="form-select" name="role_id" id="group_name "aria-label="Default select example">
                                            <option selected="" disabled="">selected option</option>
                                            @foreach($roles as $role)
                                              <option value="{{$role->id}}" {{$admin->hasRole($role->name)?'selected':''}}>{{$role->name}}</option>
                                            @endforeach
                                            </select>   
                                         </div>


                        
                                        <button type="submit" class="btn btn-primary me-2">add admin</button>
                                    </form>
    
                </div>
                        </div>
         
        </div>
      </div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                Amenities_name: {
                    required : true,
                }, 
                
            },
            messages :{
                Amenities_name: {
                    required : 'Please Enter Amenities name',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection 