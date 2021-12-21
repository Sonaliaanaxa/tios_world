
@include("admin.layouts.sidebar")
<!-- Main Wrapper -->
    <div class="main-wrapper">

<style>
.modal-header .close {
    padding: 0 !important;
    margin: 0 !important;
}

</style>
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Time-Slot</h3>
                          <!--  <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Time-Slot</li>
                            </ul>-->
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Schedule Timings</h4>


<a class="edit-link" data-toggle="modal" href="#add_time_slot" style="float:right;margin-top:-35px"><i class="fa fa-plus-circle"></i> Add Slot</a>

                                        @include('admin.layouts.flash_msg')
                                        <div class="profile-box">

                                            <!--<div class="row">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Timing Slot Duration</label>
                                                        <select class="select form-control">
                                                                    <option>-</option>
                                                                    <option>15 mins</option>
                                                                    <option selected="selected">30 mins</option>  
                                                                    <option>45 mins</option>
                                                                    <option>1 Hour</option>
                                                                </select>
                                                    </div>
                                                </div>

                                            </div>-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card schedule-widget mb-0">

                                                        <!-- Schedule Header -->
                                                        <div class="schedule-header">

                                                            <!-- Schedule Nav -->
                                                            <div class="schedule-nav">

 <ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#slot_sunday"onclick="return change_statusun('sunday');" id="status_sunnday">Sunday</a>
                             </li>
                 <li class="nav-item">
         <a class="nav-link " data-toggle="tab" href="#slot_monday"onclick="return change_statusun('monday');" id="status_monday">Monday</a>
                                                                    </li>
                             <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#slot_tuesday"onclick="return change_statusun('tuesday');" id="status_tuesday">Tuesday</a>
                                                                    </li>
                         <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#slot_wednesday"onclick="return change_statusun('Wednesday');" id="status_tuesday">Wednesday</a>
                                                                    </li>
                         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#slot_thursday"onclick="return change_statusun('thursday');" id="status_thursday">Thursday</a>
                                                                    </li>
             <li class="nav-item">
             <a class="nav-link" data-toggle="tab" href="#slot_friday"onclick="return change_statusun('friday');" id="status_friday">Friday</a>
                                                                    </li>
            <li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#slot_saturday"onclick="return change_statusun('saturday');" id="status_saturday">Saturday</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /Schedule Nav -->

                                                        </div>
                                                        <!-- /Schedule Header -->

                                                        <!-- Schedule Content -->
                                                        <div class="tab-content schedule-cont">
                                                            <div id="ts">
                                                            <center>For Time Slots , Select Day</center>
                                                            </div>
                                                            <div id="ws" style="display:none">
                                                            wait...
                                                            </div>
                                                            <div id="content"></div>
                                                            <div id="slot_sunday" class="tab-pane fade show">
                                                             </div>
                                                            <div id="slot_monday" class="tab-pane fade">
                                                            </div>
                                                            <div id="slot_tuesday" class="tab-pane fade">
                                                               <!-- <h4 class="card-title d-flex justify-content-between">
                                                                   <!-- <span>Time Slots</span>--
                                                                    <a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                </h4>-->
                                                                <!--<p class="text-muted mb-0">Not Available</p>-->
                                                            </div>
                                                            <div id="slot_wednesday" class="tab-pane fade">
                                                            </div>
                                                            <div id="slot_thursday" class="tab-pane fade">
                                                            </div>
                                                            <div id="slot_friday" class="tab-pane fade">
                                                             </div>
                                                            <div id="slot_saturday" class="tab-pane fade">
                                                             </div>
                                                            </div>
                                                        <!-- /Schedule Content -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->

        <!-- Footer -->
        <div class="footer"></div>
        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- Add Time Slot Modal -->
    <div class="modal fade custom-modal" id="add_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('scheduletime.addscheduletime')}}">
                    @csrf
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                    <div class="col-12 col-md-12">
                                    <div class="form-group">
                                    <?php $ds=date("Y-m-d");?>
                  
                                            <label>Select Day</label>
                                            
                               <!--<input class="form-control" name="adate" id="adate" type="date"  min="<?php echo $ds; ?>">-->
                                        
                                           <div class="form-group{{ $errors->has('weekday') ? ' has-danger' : '' }}">
                                    <select  class="custom-select {{ $errors->has('weekday') ? ' is-invalid' : '' }}" name='weekday' id="input-weekday"   >
                                            <option value=''>Select the Day?</option>
                                            <option value="sunday"{{ ('sunday'==old('weekday'))?'selected':''}}>Sunday</option>
                                            <option value="monday"{{ ('monday'==old('weekday'))?'selected':''}}>Monday</option>
                                            <option value="tuesday"{{ ('tuesday'==old('weekday'))?'selected':''}}>Tuesday</option>
                                            <option value="wednesday"{{ ('wednesday'==old('weekday'))?'selected':''}}>Wednesday</option>
                                            <option value="thursday"{{ ('thursday'==old('weekday'))?'selected':''}}>Thursday</option>
                                            <option value="friday"{{ ('friday'==old('weekday'))?'selected':''}}>Friday</option>
                                            <option value="saturday"{{ ('saturday'==old('weekday'))?'selected':''}}>Saturday</option>       
                                            </select>  @if ($errors->has('weekday'))
                                        <span id="weekday-error" class="error text-danger" for="input-weekday">Day is Empty!</span>
                                      @endif
                                    </div>
                            
                                            </div>
                                            </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <div class="form-group{{ $errors->has('start_time') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" id="input-appoint_date" type="time"    aria-required="true"/>
                               @if ($errors->has('start_time'))
                                 <span id="start_time-error" class="error text-danger" for="input-start_time">Appointment Date is Empty!</span>
                               @endif
                             </div>
                                           
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <div class="form-group{{ $errors->has('end_time') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time" id="input-end_time" type="time"   value="{{ old('start_time') }}"   aria-required="true"/>
                               @if ($errors->has('end_time'))
                                 <span id="end_time-error" class="error text-danger" for="input-end_time">Appointment Date is Empty!</span>
                               @endif
                             </div>
                                   

                                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-more mb-3">
                            <!--<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>-->
                        </div>
                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Time Slot Modal -->

 
    </div>
    </div>

<!--
<form action="{{route('delete-scheduletimes')}}" method="post">
@csrf
<input type="text" name="id" value="5">
<input type="submit" name="submit" value="submit">

</form>-->

    </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
    
    <script>
        function change_statusun(id){
    
    $("#content").hide();
    $("#ws").show();
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            /*var value=1;
            if(chk==true){
                value = 1;

            }  */ 
            
            $.ajax({
            url: "{{route('scheduletimes_day')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                weekday: id, 
            
            },
            success: function(msg) {
$("#content").html(msg);
       $("#content").show();   
       $("#ts").hide();
       $("#ws").hide();
             } 
            })           
        }
        </script>


    <script>
        function change_statumon(id){
      
           $("#content").hide();
            $.ajax({
            url: "{{route('scheduletimes_day')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                weekday: id, 
            
            },
            success: function(msg) {

         $("#content").html(msg);
        
             $("#content").show();
             $("#ts").hide();
             } 
            })           
        }
        </script>
        <!-- /Page Content -->




    <script>
        function change_statussd(id){
//alert(id);  
            
            $.ajax({
            url: "{{route('delete-scheduletimes')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
              id: id, 
                
            },
            success: function(msg) {

         
                alert('Time deleted successfully');
             } 
            })           
        }
        </script>

    





 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $('#update_service').submit(function(e) {
    //alert('ok');
       e.preventDefault();

weekday = $('#weekday').val();

start_time = $('start_time').val();
end_time = $('#end_time').val();
if(weekday==''|| start_time==''|| end_time==''){

   alert("Field cannot be empty.");
}else{

       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: "{{route('edit-time')}}",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               alert('Updated successfully');
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