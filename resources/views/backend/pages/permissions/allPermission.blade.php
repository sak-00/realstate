@extends('admin/adminDashboard')
@section('admin')




    <!-- partial -->

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('addPremission')}}" class="btn btn-inverse-info">Add New Premission</a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{route('importPremission')}}" class="btn btn-inverse-warning">Import</a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{route('export')}}" class="btn btn-inverse-danger">Export</a>

            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">All Premission</h6>
                <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>S1</th>
                <th>premission Name</th>
                {{-- <th>Guard Name</th> --}}
                <th>Group Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($premission as $key=>$premission )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$premission->name}}</td>
                {{-- <td>{{$premission->guard_name}}</td> --}}
                <td>{{$premission->group_name}}</td>
                
                <td><a href="{{route('edit_premission',$premission->id)}}" class="btn btn-inverse-warning">Edit</a>
                <a href="{{route('delete_premission',$premission->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a></td>
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