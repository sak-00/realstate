@extends('admin/adminDashboard')
@section('admin')



<div class="page-content">

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Add Amenities</h6>

                                <form class="forms-sample" id="myForm" method="POST" action="{{route('storeAmenities')}}">
                                   @csrf

                                
                                   <div class="form-group mb-3">
                                        <label for="Amenities_name" class="form-label">Amenities Name</label>
                                        <input type="text" name="Amenities_name"
                                         class="form-control">

                                         
                                    </div> 

                                   

                                    <button type="submit" class="btn btn-primary me-2">Add Amenities</button>
                                </form>

            </div>
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