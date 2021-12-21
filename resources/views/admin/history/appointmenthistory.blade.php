@include("admin.layouts.sidebar")

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<!-- Main Wrapper -->
<div class="main-wrapper">
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">Histroy
            </h3>
            <!--<ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Dashboard
                </a>
              </li>
              <li class="breadcrumb-item active">Appointment Histroy
              </li>
            </ul>-->
          </div>
        </div>
      </div>
      <!-- /Page Header -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body pt-0">
              <!-- Tab Menu -->
              <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                  <li class="nav-item">
                    <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#pat_medical_records" data-toggle="tab">
                      <span class="med-records">Medical Records
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#pat_billing" data-toggle="tab">Billing
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- /Tab Menu -->
              <!-- Tab Content -->
              <div class="tab-content pt-0">
                <!-- Appointment Tab -->
                <div id="pat_appointments" class="tab-pane fade show active">
                  <div class="card card-table mb-0">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                          <thead>
                            <tr>
                              <th>Doctor
                              </th>
                              <th>Appointment Schedule
                              </th>
                              
                              <th>Amount
                              </th>
                              
                              <th>Status
                              </th>
                              <th class="text-center">Action
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
foreach($data as $row){
  $doctorId=$row->doctorId;
  $doctor= DB::table('users')->where('id',$doctorId)->first();
  
?>
                            <tr>
                              <td>
                                <h2 class="table-avatar">
                                  <a href="#" class="avatar avatar-sm mr-2">
                                    <?php
if (!is_null($doctor->img) ){
?>
                                    <img class="avatar-img rounded-circle" src="public/uploads/profile_img/{{$doctor->img}}" alt="">
                                  </a>
                                  <?php
}else{
?>
                                  <img class="avatar-img rounded-circle" src="public/uploads/doctors/dummy.jpg" alt="">
                                  <?php
}
?>
                                  </a>
                                <a href="#">{{ $doctor->name }} 
                                  <span>{{ $doctor->user_type }}
                                  </span>
                                </a>
                          </h2>
                          </td>
                        <td>
                            <span style="text-transform:uppercase;">{{$row->day}}</span> , 
                          <?php echo date('d-m-Y', strtotime($row->date)); ?> 
                          <span class="d-block text-info">{{ $row->time}}
                          </span>
                        </td>
                        
                        <td>₹{{$row->fees}}
                        </td>
                        
                        <td>
                          <?php
if($row->status==1){
?>
                          <span class="badge badge-pill bg-success-light">Confirm
                          </span>
                          <?php
}else{
?>
                          <span class="badge badge-pill bg-warning-light">Pending
                          </span>
                          <?php
}
?>
                        </td>
  
                        <td class="text-right">
                          <div class="table-action">
              <a href="{{route('history.payment.invoice',$row->id)}}" class="btn btn-sm bg-primary-light">
                              <i class="fa fa-print">
                              </i> Invoice
                            </a>
                            <a href="javascript:void(0);" class="btn btn-sm bg-info-light"data-toggle="modal" data-target="#myModal"onclick="return change_status('{{$row->id}}');" id="status_{{$row->id}}">        
                              <i class="fa fa-eye">
                              </i> View
                            </a>
                          </div>
                        </td>

    

                        
                        </tr>
                      <?php
}
?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /Appointment Tab -->
          <!-- Prescription Tab -->
          <div class="tab-pane fade" id="pat_prescriptions">
            <div class="card card-table mb-0">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-center mb-0">
                    <thead>
                      <tr>
                        <th>Date 
                        </th>
                        <th>Name
                        </th>
                        <th>Description
                        </th>
                        <th>Attachment
                        </th>
                        <th>Created by 
                        </th>
                        <th>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach($pre as $p){
?>
                      <tr>
                        <td>
                          <?php
echo date('d-m-Y', strtotime($p->date));
?>
                        </td>
                              <td>
                          <div class="table-avatar">
                            <a href="#" class="avatar avatar-sm mr-2">
                              <!--<img class="avatar-img rounded-circle" src="public/assets/img/dummy.jpg" alt="User Image">-->
                            </a>
                            <a href="{{url('/doctor-profile/'.$doctorId)}}">{{$p->doctor}} 
                              <span>
                              </span>
                            </a>
                          </div>
                        </td>
                        
                        <td>{{$p->prescription}}
                        </td>
                  
 <td>
                <a href="{{ asset('public/uploads/doctors/'.$p->attachment)}}" download>test.pdf
                          </a>
                        </td>

                        <td class="text-right">
                          <div class="table-action">
                            <a href="javascript:void(0);" onclick="window.print()"class="btn btn-sm bg-primary-light">
                            <i class="fa fa-print">
                              </i> Print
                            </a>
                            <!-- <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
<i class="far fa-eye"></i> View
</a>-->
                          </div>
                        </td>
                      </tr>
                      <?php
}
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /Prescription Tab -->
          <!-- Medical Records Tab -->
          <div id="pat_medical_records" class="tab-pane fade">
            <div class="card card-table mb-0">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-center mb-0">
                    <thead>
                      <tr>
                        <th>ID
                        </th>
                        <th>Date 
                        </th>
                        <th>Description
                        </th>
                        <th>Attachment
                        </th>
                        <th>Created
                        </th>
                        <th>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
foreach($med as $m){
?>
                      <tr>
                        <td>
                          <a href="javascript:void(0);">{{$m->id}}
                          </a>
                        </td>
                        <td>
                          <?php
echo date('d-m-Y', strtotime($m->date));
?>
                        </td>
                        <td>{{$m->description}}
                        </td>
                        <td>
                <a href="{{ asset('public/uploads/doctors/'.$m->attachment)}}" download>test.pdf
                          </a>
                        </td>
                        <td>
                          <h2 class="table-avatar">
                            <!--<a href="#" class="avatar avatar-sm mr-2">
                              <img class="avatar-img rounded-circle" src="public/assets/img/dummy.jpg" alt="User Image">
                            </a>-->
                             <a href="{{url('/doctor-profile/'.$doctorId)}}">{{$m->doctor}} 
                              <span>Dental
                              </span>
                            </a>
                          </h2>
                        </td>
                        <td class="text-right">
                          <div class="table-action">
                            <!-- <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
<i class="far fa-eye"></i> View
</a>-->
                            <a href="javascript:void(0);" class="btn btn-sm bg-primary-light" onclick="window.print()">
                             <i class="fa fa-print">
                              </i> Print
                            </a>
                          </div>
                        </td>
                      </tr>
                      <?php
}
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /Medical Records Tab -->
          <!-- Billing Tab -->
          <div id="pat_billing" class="tab-pane fade">
            <div class="card card-table mb-0">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-center mb-0">
                    <thead>
                      <tr>
                        <th>Invoice No
                        </th>
                        <th>Doctor
                        </th>
                        <th>Amount
                        </th>
                        <th>Paid On
                        </th>
                        <th>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
foreach($data as $row){
?>

                      <tr>
                        <td>
                          <a href="#">#INV-00{{$row->id}}
                          </a>
                        </td>
                        <td>
                          <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-sm mr-2">
                                                            <?php
if($row->img!=''){
?>
                                    <img class="avatar-img rounded-circle" src="public/uploads/profile_img/{{$row->img}}" alt="User Image">
                                  </a>
                                  <?php
}else{
?>
                                  <img class="avatar-img rounded-circle" src="public/uploads/doctors/dummy.jpg" alt="User Image">
                                  <?php
}
?>
                            </a>
                            <a href="#">{{ $row->name }}  
                              <span>{{ $row->user_type }}
                              </span>
                            </a>
                          </h2>
                        </td>
                        <td>₹ {{$row->fees}}
                        </td>
                        <td><?php date('d-m-Y', strtotime($row->date)) ?>
                        </td>
                      <td class="text-right">
                          <div class="table-action">
                           <a href="{{route('history.payment.invoice',$row->id)}}" class="btn btn-sm bg-primary-light">
                             <i class="fa fa-print">
                              </i> Invoice
                            </a>
                            <a href="javascript:void(0);" class="btn btn-sm bg-info-light"data-toggle="modal" data-target="#myModal"onclick="return change_status('{{$row->id}}');" id="status_{{$row->id}}">        
                               <i class="fa fa-eye">
                              </i> View
                            </a>
                          </div>
                        </td> 
                      </tr>
                      <?php
}
                      ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /Billing Tab -->
        </div>
        <!-- Tab Content -->
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
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
        <!-- <h4 class="modal-title">Modal Header</h4>-->
      </div>
      <div class="modal-body" id="show">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js">
</script>
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
      url: "{{route('historyget')}}",
      type: 'POST',//dataType: 'json',
      data:{
        "_token": "{{ csrf_token() }}",
        id: id, 
      }
      ,
      success: function(msg) {
        $("#show").html(msg);
        // alert('status changed successfully');
      }
    }
          )           
  }
</script>