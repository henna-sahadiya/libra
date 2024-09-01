<x-header/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Publisher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Publisher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Publisher Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Publisher Name" name="pn">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile Number" name="mob">
                  </div>
				  
				  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- Form Element sizes -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">List Publisher</h3>
                
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Publisher</th>
                    <th>Mobile</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $pu=0;
                    @endphp
                  @foreach($publi as $pub)
                  <tr>
                    <td>
                      @php
                        $pu++;
                      @endphp
                      {{$pu}}
                    </td>
                    <td>
                    {{$pub->name}}
                    </td>
                    <td>{{$pub->mob}}</td>
                    
                    <td>
                      <a href="#" class="text-muted" /*data-toggle="modal"data-target="#modal-default"*/ onclick="return lan({{$pub->id}},{{$pu}})">
                      <i class="fas fa-edit" id="editid{{$pu}}"></i> 

                      <a href="{{url('delpub')}}/{{$pub->id}}" class="text-muted" onclick="return deleted()">
                        <i class="fas fa-trash" id="icon{{$pub->id}}"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Publisher</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                    <label for="exampleInputEmail1">Publisher Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Publisher Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile Number">
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control">
                          <option>Active</option>
                          <option>Deactive</option>
                         </select>
                  </div>
				  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
  <!-- /.content-wrapper -->
 <x-footer/>
</body>
</html>
