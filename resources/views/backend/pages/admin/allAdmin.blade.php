@extends('admin/adminDashboard')
@section('admin')




    <!-- partial -->

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('addAdmin')}}" class="btn btn-inverse-info">Add Admin</a>
                &nbsp;&nbsp;&nbsp;
       

            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">All Admin</h6>
                <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>S1</th>
                <th>Image</th> 
                <th>Name</th>
               <th>Email</th> 
               <th>Phone</th> 
               <th>Role</th> 
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($allAdmin as $key=>$admin )
              <tr>
                <td>{{$key+1}}</td>
                <td> <img class="wd-70 ht-70 circle-img rounded-circle" id="showImage"
                    src="{{(!empty($admin->photo))?url('/upload/adminImages/'.$admin->photo):url('/uploads/no_image.jpg')}}" alt="profile"></td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->phone}}</td>
                <td>
                    @foreach($admin->roles as $role )
                   <span class="badge badge-pill bg-danger"> {{$role->name}}</span>
                    @endforeach
                </td>
               
                <td><a href="{{route('edit_admin',$admin->id)}}" class="btn btn-inverse-warning">Edit</a>
                <a href="{{route('deleteAdmin',$admin->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a></td>
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