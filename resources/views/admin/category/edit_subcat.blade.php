@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>SubCategory update</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SubCtegory update </h6>


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

              <form method="post" action="{{URL::to('update/subcat/'.$subcat->id)}}" >  
                @csrf
              <div class="modal-body pd-20">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">SubCategory Name</label>
                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="category name" value="{{$subcat->subcategory_name}}" name="subcategory_name">
                        </div>
                         <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                     <select class="form-control" name="category_id">

                      @foreach($category as $row)
                               <!-- selection le categorie corespondant de subcategory -->
                      <option value="{{$row->id}}" <?php if ($row->id == $subcat->category_id) {
                         echo'selected' ; } ?> > {{$row->category_name}}</option> 
 
                      @endforeach

                     </select>
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