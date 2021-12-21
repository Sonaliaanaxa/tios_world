


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
                            <h3 class="page-title">Hospital</h3>
                            <!--<ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Review</li>
                            </ul>-->
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                       


 <?php
$n=0;
foreach($post as $row){
    
  $n++;  
    }

  $date = date("Y-m-d");
  $y=0;
foreach($post as $row){
    if($date==$row->date){
        
        $y++;
}
}
?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card dash-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget dct-border-rht">
                                                    <div class="circle-bar circle-bar1">
                                                        <div class="circle-graph1" data-percent="75">
                                                            <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Total Patient</h6>
                                                        <h3>{{ $n }}</h3>
                                                        <p class="text-muted">Till Today</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget dct-border-rht">
                                                    <div class="circle-bar circle-bar2">
                                                        <div class="circle-graph2" data-percent="65">
                                                            <img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Today Patient</h6>
                                                        <h3>{{ $y }}</h3>
                                                        <p class="text-muted"><?php echo date("d-m-Y") ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget">
                                                    <div class="circle-bar circle-bar3">
                                                        <div class="circle-graph3" data-percent="50">
                                                            <img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Appoinments</h6>
                                                        <h3>85</h3>
                                                        <p class="text-muted"><?php echo date("d-m-Y") ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-4">Patient Appoinment</h4>
                                <div class="appointment-tab">

                                    <!-- Appointment Tab -->
                                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                        </li>
                                    </ul>
                                    <!-- /Appointment Tab -->
<?php 

                      if(Session::has('success')){
                         echo"<sapn style='color:green'>Data Deleted Successfully</span>";
                                                               

 }
  

?>
                                    <div class="tab-content">

                                        <!-- Upcoming Appointment Tab -->
                                        <div class="tab-pane show active" id="upcoming-appointments">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>



                                                                <tr>
                                                                    <th>Patient Name</th>
                                                                    <th>Appt Date</th>
                                                                    <th>Purpose</th>
                                                                    <th>Type</th>
                                                                    <th class="text-center">Paid Amount</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>

 <?php
   $date = date("Y-m-d");
foreach($post as $row){
    if($date!=$row->date){
        $id = $row->id;
?>
                                                                    <td>
                                             <h2 class="table-avatar">
                              <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="public/new/assets/img/patients/dummy.jpg" alt="User Image"></a>
                             <a href="patient-profile.html">{{$row->name}}<span>#PT0016</span></a>
                         </h2>
    </td>


     <td>{{$row->date}} <span class="d-block text-info">{{$row->time}}</span></td>
                                                                    
                                <td>{{$row->purpose}}</td>
                             <td>New Patient</td>
            <td class="text-center">{{$row->fees}}</td>
             <td class="text-right">
            <div class="table-action">
    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">                       <i class="far fa-eye"></i> View
                                                     </a>
  
 
    <a href="{{url('/patient_appointment_active/'.$id)}}" class="btn btn-sm bg-success-light">          <?php
if($row->status==1){
    ?>            
     <i class="fas fa-check"></i> Accept
     <?php
 }
     else{
?>
 pending
<?php
     
}
     ?>
                 </a>
                   <!--  <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">                                     
                        <i class="fas fa-times"></i> Cancel

                                                                            </a>-->
                     <a href="{{url('/patient_appointment_cancel/'.$id)}}" id="cancel" class="btn btn-sm bg-danger-light">                                     
                        <i class="fas fa-times"></i> Cancel
                        
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
<?php
}
}
?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Upcoming Appointment Tab -->


    




                                        <!-- Today Appointment Tab -->
                                        <div class="tab-pane" id="today-appointments">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Patient Name</th>
                                                                    <th>Appt Date</th>
                                                                    <th>Purpose</th>
                                                                    <th>Type</th>
                                                                    <th class="text-center">Paid Amount</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
foreach($post as $row){
    if($date==$row->date){

?>


                                                                <tr>
                                                                    <td>
                                             <h2 class="table-avatar">
                <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="public/new/assets/img/patients/dummy.jpg" alt="User Image"></a>
                <a href="patient-profile.html">{{$row->name}} <span>#PT0006</span></a>
                                                                        </h2>
                        </td>
                         <td>{{$row->date}} <span class="d-block text-info">{{$row->time}}</span></td>
                                 <td>{{$row->purpose}}</td>
                                 <td>Old Patient</td>
                                 <td class="text-center">{{$row->fees}}</td>
                                  <td class="text-right">
                                <div class="table-action">
                                 <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                          <i class="far fa-eye"></i> View
                                                                            </a>

                      <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                  <i class="fas fa-check"></i> Accept
                                                                            </a>
                             
   <a href="{{url('/patient_appointment_cancel/'.$id)}}" id="cancel" class="btn btn-sm bg-danger-light">                                     
                        <i class="fas fa-times"></i> Cancel
                        
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

<?php
}
}

?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Today Appointment Tab -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    </div>


                    <!-- <div class="col-md-7 col-lg-8 col-xl-9"> -->
                         <!--</div>-->





                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
    
    <script>
        function change_status(id){
        
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=1;
            if(chk==true){
                value = 1;

            }   
            
            $.ajax({
            url: "{{route('hospitalreviews_like')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                id: id, 
                like:value
            },
            success: function(msg) {

         
                alert('status changed successfully');
             } 
            })           
        }
        </script>


    <script>
        function change_statuss(id){
    
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=0;
            if(chk==true){
                value = 1;

            }   
           
            $.ajax({
            url: "{{route('hospitalreviews_like')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                id: id, 
                like:value
            },
            success: function(msg) {

         
                alert('status changed successfully');
             } 
            })           
        }
        </script>
        <!-- /Page Content -->

  