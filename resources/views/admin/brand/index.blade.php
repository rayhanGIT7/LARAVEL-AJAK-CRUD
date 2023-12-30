@extends('layouts.admin')

@section('admin_content')


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<body>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ctaegory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Catedory</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">




  <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Add New
</button></p>



      <!-- insert  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
          @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="brand_name" >

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
    <input type="file" class="form-control"  aria-describedby="emailHelp" name="brand_logo">

  </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

     </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Brands</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
 <table id="example1" class="table table-bordered table-striped">
     <thead>
     <tr>
      <th scope="col">SL</th>
      <th scope="col">Brand Name</th>

      <th scope="col">Brand Logo</th>
       <th scope="col">Action</th>
      </tr>
    </thead>
                  <tbody>

          <?php
        foreach ($brand as $row) {
             ?>
      <tr>
      <th scope="row">{{$row->id}} </th>
      <td> {{$row->brand_name}}</td>

      <td>
    <img src="public/file/brand/{{$row->brand_logo}}" height="100px;">
</td>


      <td>
        <a href="#"  class="btn btn-sm btn-info edit " data-id="{{$row->id}}"><i class="fas fa-edit" > </i></a>



        <a href="{{route('brand.destroy',$row->id)}}" class="btn bnt-sm btn-danger"><i class="fas fa-trash"> </i></a>
      </td>
    </tr>


<?php }
?>
  </tbody>

                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <!-- #EditModal -->

  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('brand.update',$row->id) }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Brand Name</label>
           <input type="text" class="form-control" aria-describedby="emailHelp" name="brand_name" id="E_brand_name">

            <input type="hidden" class="form-control" name="id" id="E_brand_id"> <!-- Updated ID -->
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
           <input type="file" class="form-control" aria-describedby="emailHelp" name="brand_logo" id="E_brand_logo">


          </div>
          <button class="btn btn-info" name="submit">Update</button>

        </form>
      </div>
    </div>
  </div>
</div>



</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>





</html>



<script>
    // $('body').on('click', '.edit', function () {
    //     let brand_id = $(this).data('id');

    //     $.get("{{ url('brand/edit') }}/" + brand_id, function(data) {
    //         console.log(data);
    //       $('#E_brand_name').val(data.brand_name);
    //       $('#E_brand_logo').val(data.brand_logo);
    //       $('#E_brand_id').val(data.id);
    //     });
    // });

    $(document).ready(function() {
    $(document).on("click", ".edit", function() {
        let brand_id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "{{ url('brand/edit') }}/" + brand_id,
            success: function(response) {
                console.log(response);

                // Assuming your response object has properties like brand_name, brand_logo, and brand_id
                $('#E_brand_name').val(response.brand_name);
                // $('#E_brand_logo').val(response.brand_logo);
                $('#E_brand_id').val(response.brand_id);

                $('#EditModal').modal('show');
            },
        });
    });
});



</script>


@endsection

