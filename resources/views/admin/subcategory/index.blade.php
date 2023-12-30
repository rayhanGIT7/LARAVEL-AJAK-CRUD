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
            <h1>CategoriesTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">




  <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Add New
</button></p>



      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('subcategory.store')}}" method="post">
          @csrf
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Category Name</label>
               <select class="form-control" name="category_id" >

               <?php
                  foreach ($category as $row) {

              ?>
     <option value="{{$row->id}}"><?php echo $row->category_name; ?> </option>
     <?php } ?>

   </select>
          </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">SubCategory Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="subcategory_name"  value="{{ old('subcategory_name') }}">
     <input type="hidden" class="form-control"  aria-describedby="emailHelp" name="id" id="edit_category_name">

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
                <h3 class="card-title">All Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
 <table id="example1" class="table table-bordered table-striped">
     <thead>
     <tr>
      <th scope="col">SL</th>
      <th scope="col">SubCategoey Name</th>

      <th scope="col">SubCategory Slug</th>
      <th scope="col">Category Name</th>
       <th scope="col">Action</th>
      </tr>
    </thead>
                  <tbody>

          <?php
        foreach ($data as $row) {
             ?>
      <tr>
      <th scope="row"> <?php echo $row->id; ?></th>
      <td> <?php echo $row->subcategory_name; ?></td>
      <td><?php echo $row->subcategory_slug ;?> </td>
       <td><?php echo $row->Category->category_name;?> </td>

      <td>
        <a href="#"  class="btn btn-sm btn-infot"data-id="{{$row->id}}" data-bs-toggle="modal"  data-bs-target="#SubEditModal" id="edit"><i class="fas fa-edit" > </i></a>



        <a href="{{route('subcategory.destroy',$row->id)}}" class="btn bnt-sm btn-danger" onclick="get"><i class="fas fa-trash"> </i></a>

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

<!-- EditModal -->
<div class="modal fade" id="SubEditModal" tabindex="-1" aria-labelledby="SubEditModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit SubCategory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

     <form action="{{ route('subcategory.update',$row->id)}}" method="post">

        @csrf

        <!-- Rest of your form code -->


        <div class="mb-3">
          <label for="category_id" class="form-label">Category</label>
          <select class="form-control" name="category_id">
            <?php foreach ($category as $categoryRow) { ?>
              <option value="{{ $categoryRow->id }}">{{ $categoryRow->category_name }}</option>
            <?php } ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">SubCategory Name</label>
          <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" value="{{$data->subcategory_name}}">
          @error('subcategory_name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="modal-footer">
          <button class="btn btn-info" name="submit">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>



</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</html>



<script type="text/javascript">
  function
  $('body').on('click','#edit', function (e) {
      e.preventDefault();
      let subcat_id = $(this).data('id');

      console.log(subcat_id);

      $.get("subcategory/edit/" + subcat_id, function (data) {

});

  });
</script>





@endsection

