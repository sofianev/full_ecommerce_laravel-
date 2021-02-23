@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category update</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Ctegory update </h6>


          <div class="table-wrapper">


                   @if ($errors->any())
                       <div class="alert alert-danger">
                      <ul>
                              @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                      </ul>
                      </div>
                     @endif

              <form method="post" action="{{URL::to('update/category/'.$category->id)}}"> 
                @csrf
              <div class="modal-body pd-20">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="category name" value="{{$category->category_name}}" name="category_name">
                        </div>
                     
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="Sumbit" class="btn btn-info pd-x-20">Update</button>
              </div>
               </form>
            

          </div><!-- table-wrapper    -->
        </div><!-- card -->

        

    
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





   <!-- LARGE MODAL -->


@endsection