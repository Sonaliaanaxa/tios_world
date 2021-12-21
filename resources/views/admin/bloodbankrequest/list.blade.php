
@include("admin.layouts.sidebar")
<div class="page-wrapper">
            <div class="content container-fluid">


           
              
 <div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-default" >
                <h4 class="card-title" >{{ __($title) }}
            
                </h4>
                <!-- <p class="card-category" > {{ __('Here you can manage the products') }}</p> -->
                <p class="card-category" >Total {{ __($title) }} -  {{ $oCount}}</p>

              </div>
              <div class="card-body">
              @include('admin.layouts.flash_msg')
              <div class="row">
              
<!--                   
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                    </div>
                  
                </div> -->
                <div id="myTable" class="col-md-12"> 
                  
                      @foreach($orders as $r)
					<!-- Doctor Widget -->

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12"> 
            <div class="container">
              <div class="row">
                <div class="col-md-8"> 
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4">
                     
                      <div class="doctor-img">
                                    @if($r->img)
                               <img src="{{ asset('public/uploads/bloodbankrd') }}/{{ $r->img }}" style='height:150px;width:150px;border-radius:5%;'/>
                            @else
                                <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($r->name,0,1) }}
                                </p>
                            @endif
										
									</div> 
                  <p>Order ID : {{ $r->order_no }}</p>
                 
                      </div>
                      <div class="col-md-8"> 
                        <div class="doc-info-cont">
                          <h4 class="doc-name">{{$r->name}}</h4>     
                          <p class="doc-speciality"> 
                                  {{ $r->email }} , {{ $r->mobile_no }}  </p>
                                  <p><b>Age:</b> {{ $r->age }} ,<b>H: </b> {{ $r->height }} {{ $r->hunit }}, <b>W :</b>{{ $r->weight }} {{ $r->wunit }} </p>
                                  <p><b>Blood Group:</b> {{ $r->blood_group }} ,<b>Gender: </b> {{ $r->gender }}</p>
                            <div class="clinic-details">
                              <p><b>Address :</b> {{ $r->address}}</a></p>
                              <span style="color:blue;"><b>Appoint Date : </b>
                            
                             <?php 
                           echo  date('d-m-Y', strtotime($r->appoint_date));
                             
                             ?>
                              </span>
                          
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-4"> 
<h4>Blood Bank Detail :</h4>
<p>	{{ $r->bank_name}}</p>
<p>	{{ $r->bank_email}}</p>
<p>	{{ $r->bank_mobile}}</p>
<p>	{{ $r->bank_address}}</p><br>
<span style="color:green;"><b>Created At : </b>
<?php echo date('d-m-Y H:i:s', strtotime($r->created_at)); ?>
</span>
<br> <br>
 @if(auth()->user()->user_type=='admin')
              <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-blood' title="Delete" data-id="{{$r->id}}">
                         <i class="fa fa-trash"></i> Delete
                         </a>
   @endif

                <!-- <select id="{{ $r->order_no}}" style='width:112px;'  class="custom-select status" name='status'   >
                               
                               <option value='pending' {{ ('pending'== $r->status)?'selected':''}}> Pending </option>  
                               <option value='completed' {{ ('completed'== $r->status)?'selected':''}}> Completed</option>
                              
                            
                             </select>  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

            {!! $orders->appends(request()->except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>



  <!-- <script>
        $(document).ready(function() {


              $('.status').on('change', function() {

                var order_no = $(this).attr('id');
                var status =  $(this).val();
              
            
                if (!confirm("Confirm if you want to update status to " + status+ " ?")) {
                    e.preventDefault();
                    return false;
                }
               
                $.ajax({
                    type: 'POST',
                    url:"{{ route('blood.bank.status.update') }}",
                    data: {order_no: order_no,status:status,_token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                            
                             swal("Success!", "Order Status Successfully Updated!", "success");
                        }
                        else{
                            
                            swal("Error!", "Error Occurred!", "waring");
                       }
                      //  location.reload();
                       
                    }
                });
            });

       </script> -->
               
  <script>
        $(document).ready(function() {
            $('.delete-blood').on('click', function (e) {
                if (!confirm("Are you sure to Delete?")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('blood.request.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>
