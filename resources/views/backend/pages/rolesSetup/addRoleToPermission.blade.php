@extends('admin/adminDashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">

<div class="col-md-12 col-xl-12 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Add Roles in Permission</h6>

                                <form class="forms-sample" method="POST" action="{{route('storeRolesinPermission')}}">
                                   @csrf


                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Roles Name</label>
                                        <select class="form-select" name="role_id" id="group_name "aria-label="Default select example">
                                          @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                          @endforeach
                                          </select>
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

                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" id="RoleCheck">
                                                                                          <label class="form-check-label text-capitalize" for="RoleCheck">
                                                                                             {{$group->group_name}}
                                                                                          </label>
                                                                                      </div>
                                                            </div>
                                                            <div class="col-9">


                                                              @php
                                                              $permissions = APP\Models\user::getPermissionByGroupName($group->group_name);    
                                                              @endphp

                                                              @foreach($permissions as $premission)
                                                              
                                                                 <div class="form-check mb-2"> {{--[] cuase I have multi choice for checkbox --}}
                                                                    <input type="checkbox" class="form-check-input " name="permissions[]" value="{{$premission->id}}" id="checkDefault{{$premission->id}}">
                                                                                          <label class="form-check-label text-capitalize" for="checkDefault{{$premission->id}}">
                                                                                            {{$premission->name}}
                                                                                          </label>
                                                                                      </div>

                                                                                      @endforeach
                                                                                      <br>

                                                            </div>

                                                          </div>
                                                          @endforeach
                                    <button type="submit" class="btn btn-primary me-2">Add Roles</button>
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