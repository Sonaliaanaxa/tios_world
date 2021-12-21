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

                            <h3 class="page-title">
<?php 

echo ucfirst(Auth::user()->user_type);
                            
?>

                           </h3>
                            <!--<ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Appointment</li>
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
                             <img src="{{ asset('public/uploads/profile_img/icon-01.png')}}" class="img-fluid" alt="patient">

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
                                                            <img src="{{ asset('public/uploads/profile_img/icon-02.png')}}" class="img-fluid" alt="Patient">
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
                                                            <img src="{{ asset('public/uploads/profile_img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Appoinments</h6>
                                                        <h3>{{$n}}</h3>
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
                                            <th></th>
                                              <th>Type</th>
                              <th class="text-center">Paid Amount</th>
                                     <th></th>
                                       <th></th>
                                         <th></th>
                                   </tr>
                                 </thead>
                              <tbody>
                                  
 <?php
   $date = date("Y-m-d");
   foreach($post as $row){
    if($date!=$row->date){
        $id = $row->doctorId;
      //$idp = $row->patientId;
        $ids = $row->id;
   /*foreach($docs as $u){
                 $iis= date('Y-m-d', strtotime($u->updated_at));
                 $iiv= $u->vaild;*/
                
               //  echo date('Y-m-d', strtotime($iis)).'hkjh'.$date.'<br>';
               
             

  
     
               ?>
                             <tr>



                                                                    <td>
                                             <h2 class="table-avatar">
                      <a href="#" class="avatar avatar-sm mr-2">

 <img src="{{ asset('public/uploads/profile_img/dummy.jpg')}}" alt=""class="avatar-img rounded-circle">
</a>

                             <a href="#">{{$row->name}}<span></span></a>
                         </h2>
    </td>


     <td><?php

echo date('d-m-Y', strtotime($row->date));
?> <span class="d-block text-info">{{$row->time}}</span></td>
                                                                    
                                <td></td>
                             <td>Patient</td>
            <td class="text-center">₹{{$row->fees}}</td>
            
            
                         <td class="text-right">           
                                 
 <?php
 
   $idp = $row->patientId;

if($idp){
    
 ?>
     <a href="{{route('prescriptions',$idp)}}" class="btn btn-sm bg-info-light" >
            Add Prescriptions</a>


     <a href="{{route('medical-records',$idp)}}" class="btn btn-sm bg-info-light" >
    Medical Record</a>
    <?php
}


    ?>
    </td>
            
             <td class="text-right">
            <div class="table-action">
    <a href="javascript:void(0);" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#myModal"onclick=" return change_status('{{$row->id}}');" id="status_{{$row->id}}">                  
    <i class="far fa-eye"></i> View
                                                     </a>

 <?php
if($id){
 ?>
    <a href="{{route('patient_appointment_active',$row->id)}}" class="btn btn-sm bg-success-light">          <?php
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
                 <?php
               }
                 ?>
                   <!--  <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">                                     
                        <i class="fas fa-times"></i> Cancel

                                                                            </a>-->
                    
 <?php
if($ids){
 ?>
                     <a href="{{route('patient_appointment_cancel',$row->id)}}" id="cancel" class="btn btn-sm bg-danger-light">                                     
                        <i class="fas fa-times"></i> Cancel
                        
                          </a>
                          <?php
}
                          ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>

										<?php

}
?>
   <?php
}
//}


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
                                                                    <!--<th>Purpose</th>-->
                                                                    <th>Type</th>
                                                                    <th class="text-center">Paid Amount</th>
                                                                    <th></th>
                                                                    <th></th>
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
                <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ asset('public/uploads/profile_img/dummy.jpg')}}" alt="User Image"></a>
                <a href="patient-profile.html">{{$row->name}} <span></span></a>
                                                                        </h2>
                        </td>
                         <td><?php

echo date('d-m-Y', strtotime($row->date));
?><span class="d-block text-info">{{$row->time}}</span></td>
                                 <!--<td></td>-->
                                 <td>Patient</td>
                                 <td class="text-center">₹{{$row->fees}}</td>
                                 
                                 
                      <td class="text-right">           
                                 
 <?php
 
   $idp = $row->patientId;

if($idp){
    
 ?>
     <a href="{{route('prescriptions',$idp)}}" class="btn btn-sm bg-info-light" >
            Add Prescriptions</a>


     <a href="{{route('medical-records',$idp)}}" class="btn btn-sm bg-info-light" >
    Medical Record</a>
    <?php
}


    ?>
    </td>
                                 
                                  <td class="text-right">
                                <div class="table-action">
                                 <a href="javascript:void(0);" class="btn btn-sm bg-info-light"data-toggle="modal" data-target="#myModal"onclick=" return change_status('{{$row->id}}');" id="status_{{$row->id}}">
                          <i class="far fa-eye"></i> View
                                                                            </a>

 <?php
if($id){
 ?>
    <a href="{{url('/patient_appointment_active/'.$row->patientId)}}" class="btn btn-sm bg-success-light">          <?php
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

                             
   <a href="{{url('/patient_appointment_cancel/'.$row->patientId)}}" id="cancel" class="btn btn-sm bg-danger-light">                                     
                        <i class="fas fa-times"></i> Cancel
                        
                              </a>
                              <?php
}
                              ?>
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
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <!-- <h4 class="modal-title">Modal Header</h4>-->
        </div>
        <div class="modal-body" id="show">
          
                                                                          
        </div>
        <div class="modal-footer">
 

    
        </div>
      </div>
      
    </div>
  </div>
  

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
    
    <script>
        function change_status(id){
        //alert("ok");
            var chk= $("#status_"+id).is(":checked"); 
            var id = id.replace('status','');
            var value=1;
            /*if(chk==true){
                value = 1;

            }  */ 
            
            $.ajax({
            url: "{{route('apointment_view')}}",
            type: 'POST',//dataType: 'json',
            data:{
           "_token": "{{ csrf_token() }}",
                id: id, 
                
            },
            success: function(msg) {

         $("#show").html(msg);
                //alert('status changed successfully');
             } 
            })           
        }
        </script>

