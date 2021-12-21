



    <form method="post" id="upload-image-form"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="file" class="form-control" id="image-input">
            <span class="text-danger" id="image-input-error"></span>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>

    </form>



 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $('#upload-image-form').submit(function(e) {
    alert('ok');
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: "{{route('add-blog')}}",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               alert('Image has been uploaded successfully');
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });

</script>