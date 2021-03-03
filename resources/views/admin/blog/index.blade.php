@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>post Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">post List
           <a href="{{route('add.blogpost')}}" class="btn btn-sm btn-warning" style="float: right;">Add New post</a>
          </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">post_title En</th>
                  <th class="wd-15p">post_title FR Fr</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($post as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->post_title_en}}</td>
                   <td>{{$row->post_title_fr}}</td>
                    <td><img src="{{URL::to($row->post_image)}}" height="50px;" width="50px;"></td>
                  <td>
                  	<a href="{{ URL::to('edit/post/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                  	<a href="{{ URL::to('delete/post/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>

          </div><!-- table-wrapper    -->
        </div><!-- card -->

        

    
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





   <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Category Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                   @if ($errors->any())
                       <div class="alert alert-danger">
                      <ul>
                              @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                      </ul>
                      </div>
                     @endif

              <form method="post" action="{{route('store.blogcategory')}}">
              	@csrf
              <div class="modal-body pd-20">
            
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name EN</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="blogcategory name" name="category_name_en">
                        
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name FR</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="blogcategory name" name="category_name_fr">
                        
                  </div>
                     
                      
          


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="Sumbit" class="btn btn-info pd-x-20">Sumbit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
               </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection