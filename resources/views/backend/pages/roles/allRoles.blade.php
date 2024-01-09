@extends('admin/adminDashboard')
@section('admin')




    <!-- partial -->

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('addRoles')}}" class="btn btn-inverse-info">Add New Roles</a>
                &nbsp;&nbsp;&nbsp;
       

            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">All Roles</h6>
                <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>S1</th>
                <th>Roles Name</th>
                {{-- <th>Guard Name</th> --}}
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($roles as $key=>$role )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$role->name}}</td>
                {{-- <td>{{$premission->guard_name}}</td> --}}
                <td><a href="{{route('edit_roles',$role->id)}}" class="btn btn-inverse-warning">Edit</a>
                <a href="{{route('delete_roles',$role->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a></td>
              </tr>
              @endforeach
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
            </div>
        </div>

    </div> 


@endsection