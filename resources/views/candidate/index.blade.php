<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    {{--  --}}


<div class="row">
    <!-- left column -->
    <div class="col-md-8" style="margin:0 auto;">
        <!-- general form elements -->
        <div class="card card-primary">

 
            <!-- form start -->
            <form role="form" action="{{route('candidate.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">



                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                      </div>
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


                    
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" required>
                        </div>
                      </div>
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


 
                     

                      <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="custom-file @error('image') is-invalid @enderror">
                                <input type="file" name="image" class="custom-file-input" id="imageUpload">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                      </div>
                      @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror



                      <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="1">
                                <label class="form-check-label" for="gender">Male</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="2">
                                <label class="form-check-label" for="gender">Female</label>
                              </div>

                        </div>
                      </div>




                      <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="laravel" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">Laravel</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="codeigniter" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Codeigniter</label>
                              </div>
                              <br>


                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="ajax" value="1">
                                <label class="form-check-label" for="inlineCheckbox3">Ajax</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="vue" value="1">
                                <label class="form-check-label" for="inlineCheckbox4">VUE JS</label>
                              </div>
                              <br>



                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="mysql" value="1">
                                <label class="form-check-label" for="inlineCheckbox5">MySQL</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="api" value="1">
                                <label class="form-check-label" for="inlineCheckbox6">API</label>
                              </div>



                        </div>
                      </div>




                </div>
                <div class="card-footer">
                    <div class="col-md-12 bg-light text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                   
                </div>
            </form>
        </div>
    </div>
    <!--/.col (left) -->






{{-- row ends --}}
</div>



<div class="row">
    <div class="col-md-8" style="margin:0 auto;">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">List Of Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 80px">Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($candidate as $cnd)


                        <tr>
                            <td>1</td>

                            <td>image</td>
                            <td>{{ $cnd->name }}</td>
                            <td>{{ $cnd->email }}</td>



                            <td>
                                <a href="{{route('candidate.edit',$cnd->id)}}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{route('candidate.destroy',$cnd->id)}}"
                                    class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>

                      

   @endforeach

                    </tbody>
                </table>
            </div>
         

        </div>
        
        <!-- /.card-body -->
    </div>
</div>





<!--/.col (right) -->

</body>
</html>