
@include("admin.layouts.app")


@include("admin.layouts.sidebar")

    <!-- Main Wrapper -->
    <div class="main-wrapper">

    
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Prescriptions</h3>
                            <ul class="breadcrumb">
                               <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Prescriptions</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                       





                        <div class="doc-review review-listing custom-edit-service">

                            <div class="row mb-5">
                                <div class="col">
                                    <!--<ul class="nav nav-tabs nav-tabs-solid">
                                        <li class="nav-item">
                                            <a class="nav-link" href="doctor-blog.html">Acitive Blog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="doctor-pending-blog.html">Pending Blog</a>
                                        </li>
                                    </ul>-->
                                </div>
                            </div>

                            <!-- Add Blog -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="pb-3">Add Prescriptions</h3>

                    <form method="post" enctype="multipart/form-data" autocomplete="off" id="update_service" action="{{route('add-prescriptions')}}">
                        @csrf

                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Prescriptions <span class="text-danger">*</span></label>
                                                        <textarea id="about" class="form-control service-desc" name="about">note.</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<input type="hidden" name="userid" id="userid" value="{{ request()->id }}">



       <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="service-upload">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                        <span>Upload Record *</span>
                                                        <input type="file" name="file" id="image-input" multiple="">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /Add Blog -->

                        </div>





                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $('#update_service').submit(function(e) {
    
       e.preventDefault();

about = $('#about').val();
if(about==''){

   alert("Field cannot be empty.");
}else{

       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: "{{route('add-prescriptions')}}",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               alert('Prescriptions has been submitted successfully');
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
}
  });

</script>