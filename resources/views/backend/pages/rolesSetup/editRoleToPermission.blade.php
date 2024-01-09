@extends('admin/adminDashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">

<div class="col-md-12 col-xl-12 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Update Roles in Permission</h6>

                                <form class="forms-sample" method="POST" action="{{route('updateRolesinPermission',$roles->id)}}">
                                   @csrf


                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Roles Name</label>
                                       <h3>{{$roles->name}}</h3>
                                    </div>
                                   

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="mainCheck">
                                                              <label class="form-check-label" for="mainCheck">
                                                                  Permission all
                                                              </label>
                                                          </div>

                                                          <hr>

                                                          @foreach($premission_groups as $group)
                                                          <div class="row">
                                                            <div class="col-3">

                                                              @php
                                                              $permissions = APP\Models\user::getPermissionByGroupName($group->group_name);    
                                                              @endphp 

                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" id="checkDefault" 
                                                                    {{App\Models\User::roleHasPermissions($roles,$permissions)?'checked' : ''}}>
                                                                                          <label class="form-check-label text-capitalize" for="checkDefault">
                                                                                             {{$group->group_name}}
                                                                                          </label>
                                                                                      </div>
                                                            </div>
                                                            <div class="col-9">


                                                             

                                                              @foreach($permissions as $premission)
                                                              
                                                                 <div class="form-check mb-2"> {{--[] cuase I have multi choice for checkbox --}}
                                                                    <input type="checkbox" class="form-check-input " name="permissions[]" 
                                                                    value="{{$premission->id}}" id="checkDefault{{$premission->id}}" {{$roles->hasPermissionTo($premission->name)?'checked':''}}>
                                                                    <label class="form-check-label text-capitalize" for="checkDefault{{$premission->id}}">
                                                                               {{$premission->name}}
                                                                     </label>
                                                                  </div>

                                                              @endforeach
                                                           <br>

                                                            </div>

                                                          </div>
                                                          @endforeach
                                    <button type="submit" class="btn btn-primary me-2">save changes</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>



<script type="text/javascript">
  $('#mainCheck').click(function(){
    if($(this).is(':checked')){
      $('input[type=checkbox]').prop('checked',true);
    }
    else{
      $('input[type=checkbox]').prop('checked',false);
    }
  })
</script>

@endsection