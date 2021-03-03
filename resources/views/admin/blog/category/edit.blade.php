@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Blog Category update</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">blog Ctegory update </h6>


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

              <form method="post" action="{{URL::to('update/blog/category/'.$blogcat->id)}}">  
                @csrf
              <div class="modal-body pd-20">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name EN</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$blogcat->category_name_en}}" name="category_name_en">
                        </div>

                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name FR</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$blogcat->category_name_fr}}" name="category_name_fr">
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