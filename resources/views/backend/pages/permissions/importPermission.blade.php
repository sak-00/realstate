@extends('admin/adminDashboard')
@section('admin')



<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('export')}}" class="btn btn-inverse-danger">Download Xlsx</a>

        </ol>
    </nav>

<div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
            <div class="card">
              <div class="card-body">

                                <h6 class="card-title">Import Premission</h6>

                                <form class="forms-sample" method="POST" enctype="multipart/form-data"
                                 action="{{route('import')}}">
                                   @csrf

                                
                                   <div class="mb-3">
                                        <label for="premission_name" class="form-label">Xlsx File Import</label>
                                        <input type="file" name="import_file"
                                         class="form-control @error('import_file') is-invalid @enderror">

                                          @error('import_file')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                    </div> 


                                   

                                    <button type="submit" class="btn btn-inverse-warning me-2">Upload</button>
                                </form>

            </div>
                    </div>
     
    </div>
  </div>

</div>



@endsection