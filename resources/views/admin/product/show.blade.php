@extends('admin.admin_layouts')



@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product section</span>
      </nav>

      <div class="sl-pagebody">

          <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Prouct Detail </h6>
         

          

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product name <span class="tx-danger">*</span></label><br>
                  <strong>{{$product->product_name}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Prodct code: <span class="tx-danger">*</span></label> <br>
                  <strong>{{$product->product_code}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label><br>
                  <strong>{{$product->product_quantity}}</strong>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->category_name}}</strong>
                </div>
              </div><!-- col-4 -->
         

            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->subcategory_name}}</strong>
                </div>
              </div><!-- col-4 -->
           

            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->brand_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->product_size}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product color <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->product_color}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">selling price <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->selling_price}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">product details <span class="tx-danger">*</span></label><br>
                  <p>{!! $product->product_details !!}</p>
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">vdeo link <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{$product->video_link}}</strong>
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image one (Main Thumbal) <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
                  <img src="{{ URL::to($product->image_one) }}" style="height: 80px; width: 80px;">
                </label>
                  
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image two  <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
                  <img src="{{ URL::to($product->image_two) }}" style="height: 80px; width: 80px;">
                </label>
                  
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image thre  <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
                 <img src="{{ URL::to($product->image_three) }}" style="height: 80px; width: 80px;">
                </label>
                  
                </div>
                </div><!-- col-4 -->
                
               

            </div> <!-- row -->

            <hr>
            <br> <br>

            <div class="row">

              <div class="col-lg-4">
                <label class=""> </label>
                @if($product->main_slider==1)
                <span class="badge badge-success">active</span>
                @else
                <span class="badge badge-danger">inactive</span>
                @endif
                <span>main slider</span>
              </div><!-- col-4 -->

             
              <div class="col-lg-4">
                <label class=""></label>
                @if($product->hot_deal==1)
                <span class="badge badge-success">active</span>
                @else
                <span class="badge badge-danger">inactive</span>
                @endif
                
              <span>  hot deal </span>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <label class=""></label>
               @if($product->best_rated==1)
                <span class="badge badge-success">active</span>
                @else
                <span class="badge badge-danger">inactive</span>
                @endif
              
                <span>Best rated </span>
              </div><!-- col-4 -->

              
              <div class="col-lg-4">
                <label class=""></label>
                @if($product->trend==1)
                <span class="badge badge-success">active</span>
                @else
                <span class="badge badge-danger">inactive</span>
                @endif
              
                <span>product Trend  </span>
              </div><!-- col-4 -->

             
              <div class="col-lg-4">
                <label class=""></label>
               @if($product->hot_new==1)
                <span class="badge badge-success">active</span>
                @else
                <span class="badge badge-danger">inactive</span>
                @endif
           
                <span> Hot New</span>
              </div><!-- col-4 -->

             
              <div class="col-lg-4">
                <label class=""></label>
                @if($product->mid_slider==1)
                <span class="badge badge-success">active</span>
                @else
                <span class="badge badge-danger">inactive</span>
                @endif
          
                <span>mid slider</span>
              </div><!-- col-4 -->



            </div><!-- row -->
            <br> <br>
          

          </div><!-- form-layout -->
        </div><!-- card -->
       

      
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    

@endsection
