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
            <h1>Child-CategoriesTables</h1>
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
        <form action="{{route('childcategory.store')}}" method="post">
          @csrf
          <select class="form-control" name="subcategory_id">

       @foreach ($category as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>

        @php
            $subcategory = DB::table('sub_categories')->where('category_id', $category->id)->get();
        @endphp

        @foreach ($subcategory as $subcategory)
            <option value="{{ $subcategory->id }}">......{{ $subcategory->subcategory_name }}</option>
        @endforeach

     @endforeach
    </select>


     <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ChildCategory Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="childcategory_name" id="edit_category_name">

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
   <table id="example1" class="table table-bordered table-striped ytable">
     <thead>
     <tr>

      <th scope="col">ChildCategory Name</th>
       <th scope="col">ChildCategory Slug</th>
       <th scope="col">Category Name</th>


        <th scope="col">Action</th>


    </thead>

      <tbody>







    </tbody>

               </tr>


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






</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<!-- //ajax -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include DataTables CSS and JavaScript -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>


</html>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

<script>





    // Initialize DataTable
    $(document).ready(function () {
    var table;

    function initDataTable() {
        table = $('.ytable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('childcategory.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'childcategory_name', name: 'ChildCategory name' },
                { data: 'category_name', name: 'Category Name' },
                { data: 'subcategory_name', name: 'subcategory_name' },
                { data: 'action', name: 'action', orderable: true, searchable: true },
            ]
        });
    }

    // Check if the table with class 'ytable' is already a DataTable
    if (!$.fn.dataTable.isDataTable('.ytable')) {
        initDataTable();
    }

    // Rest of your code...
});


</script>






@endsection

