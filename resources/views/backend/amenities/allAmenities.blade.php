@extends('admin/adminDashboard')
@section('admin')




    <!-- partial -->

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('addAmenities')}}" class="btn btn-inverse-info">Add New Amenitie</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Amenitie All</h6>
                <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>S1</th>
                <th>Amenitie name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($amenities as $key=>$amenitie )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$amenitie->amenities_name}}</td>
                <td>
                  @can('amenities.edit')
                  <a href="{{route('edit_amenities',$amenitie->id)}}" class="btn btn-inverse-warning">Edit</a>
                  @endcan
                  @can('amenities.delete')
                <a href="{{route('delete_amenities',$amenitie->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a>
                @endcan
              
              </td>
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