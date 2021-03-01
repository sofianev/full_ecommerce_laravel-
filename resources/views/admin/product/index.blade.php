@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List
           <a href="{{route('add.product')}}" class="btn btn-sm btn-warning" style="float: right;" >Add New</a>
          </h6>

          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product Name</th>
                   <th class="wd-15p">Image</th>   
                   <th class="wd-15p">Category</th>  
                   <th class="wd-15p">Brand</th>  
                   <th class="wd-15p">Quantity</th>  
                   <th class="wd-15p">Status</th>         
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              	@foreach($product as $row)
                <tr>
                  <td>{{$row->product_code}}</td>
                  <td>{{$row->product_name}}</td>
                  <td><img src="{{URL::to($row->image_one)}}" height="50px;" width="50px;"></td>
                  <td>{{$row->category_name}}</td>
                  <td>{{$row->brand_name}}</td>
                  <td>{{$row->product_quantity}}</td>

                  <td>
                    @if($row->status==1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif

                  </td>

                  <td>
                    <a href="{{ URL::to('edit/product/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit" title="edit"></i></a>
                    <a href="{{ URL::to('delete/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="delete" id="delete" ><i class="fa fa-trash"></i></a>

                    <a href="{{ URL::to('view/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="show"><i class="fa fa-eye"></i></a>
                    
                    @if($row->status==1)
                    <a href="{{ URL::to('inactive/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="inactive" ><i class="fa fa-thumbs-down"></i></a>
                    @else
                     <a href="{{ URL::to('active/product/'.$row->id) }}" class="btn btn-sm btn-info" title="active"><i class="fa fa-thumbs-up"></i></a>
                     @endif
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
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
                                                              <!--  enctype pour upload images -->
              <form method="post" action="{{route('store.brand')}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body pd-20">
            
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="brand name" name="brand_name">
                        
                  </div>

                  <div class="modal-body pd-20">
            
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Brand Logo</label>
                     <input type="file" class="form-control"  aria-describedby="emailHelp" placeholder="brand logo" name="brand_logo">
                        
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