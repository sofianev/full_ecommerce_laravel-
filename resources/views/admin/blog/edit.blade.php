@extends('admin.admin_layouts')



@section('admin_content')

@php

 $blogcategory = DB::table('post_category')->get();
@endphp

  <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Post section</span>
      </nav>

      <div class="sl-pagebody">

          <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Post Add
            <a href="{{route('all.blogpost')}}" class="btn btn-success btn-sm pull-right">All Post </a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Update Post Form</p>

          <form method="post" action="{{ url('update/post/'.$post->id) }}" enctype="multipart/form-data">
      
            @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post title(ENGLICH) <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  
                  value="{{ $post->post_title_en }}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post title(FRAN9AIS) <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_fr"  value="{{$post->post_title_fr}}">
                </div>
              </div><!-- col-4 -->
             
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Blog Category <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id">
                    <option label="Choose category"></option>
                     @foreach($blogcategory as $row)
                    <option value="{{ $row->id }}"
                  <?php if ($row->id == $post->category_id) {
                   echo "selected"; } ?> >
                      {{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
         

           

              

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post details ENGLICH<span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote" name="post_detail_en">
                    {!! $post->post_detail_en !!}
                  </textarea>
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post details FRAN9AIS <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote1" name="post_detail_fr">
                      {!! $post->post_detail_fr !!}
                  </textarea>
                  
                </div>
              </div><!-- col-4 -->


             

                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image post <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL1(this);" >
                  <span class="custom-file-control"></span>
                  <img src="#" id="one">
                </label>
                  
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">old Image post <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <img src="{{URL::to($post->post_image)}}" style="height: 80px; width: 130px;">
                   <input type="hidden" name="old_image" value="{{$post->post_image}}"></label>
                </div>
                </div><!-- col-4 -->

                
                
               

            </div> <!-- row -->

           
            </div><!-- row -->
            <br> <br>
          

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="Submit">Submit Form</button>
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
        </form>

      
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
   

 <script type="text/javascript">
  function readURL1(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>



@endsection
