<x-header/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Language</h1>
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
                <h3 class="card-title">New Language</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Language Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Language Name" name="ln">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Language Code</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Language Code" name="lc">
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
                <h3 class="card-title">List Language</h3>
                
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>SI.NO</th>
                    <th>Language</th>
                    <th>Code</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody>                    
                    @php
                      $s=0;
                    @endphp
                    @foreach($lang as $languages)
                  <tr>
                    <td>
                      @php
                        $s++;
                      @endphp
                      {{$s}}
                    </td>
                    <td id="tdid{{$languages->id}}">
                     {{$languages->name}}
                    </td>
                    <td id="coid{{$languages->id}}">
                       {{$languages->code}}
                    </td>
                    
                    <td>
                      <a href="#" class="text-muted" /*data-toggle="modal"data-target="#modal-default"*/ onclick="return lan({{$languages->id}},{{$s}})">
                        <i class="fas fa-edit" id="editid{{$s}}"></i>

                        <a href="{{url('delang')}}/{{$languages->id}}" class="text-muted" onclick="return deleted()">
                        <i class="fas fa-trash" id="icon{{$languages->id}}"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                  @endforeach
                </table>
				  
              </div>
            </div>
            <!-- /.card -->
          
                   
                    <input type="hidden" id="lanid" placeholder="Language id" name="lanid">
          
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
              <h4 class="modal-title">Edit Language</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                    <label for="exampleInputEmail1">Language Name</label>
                    <input type="text" class="form-control" id="nameid" placeholder="Enter Language Name" name="lanna">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                    <input type="number" class="form-control" id="codeid" placeholder="Enter Code" name="code">
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="exampleInputPassword1" id="statusid">Status</label>
                    <select class="form-control">
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                         </select>
                  </div>
				  
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveid" onclick="edited()">Save changes</button>
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
