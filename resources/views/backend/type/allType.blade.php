@extends('admin/adminDashboard')
@section('admin')




    <!-- partial -->

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('addType')}}" class="btn btn-inverse-info">Add New Property</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Property Type All</h6>
                <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>S1</th>
                <th>Type name</th>
                <th>Type Icon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($types as $key=>$item )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->type_name}}</td>
                <td>{{$item->type_icon}}</td>
                <td>
                  @can('edit.type')
                  <a href="{{route('edit_type',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                   @endcan

                  @can('delete.type')
                <a href="{{route('delete_type',$item->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a>
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