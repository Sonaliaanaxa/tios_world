@include("admin.layouts.sidebar")
 
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Appointment: </h4>
                          
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-xl-5 col-sm-6 col-12">
                        <div class="card" style="min-height: 166px;">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-primary border-primary">
                                            <i class="fe fe-users"></i>
                                        </span>
                                    <div class="dash-count">
                                        <h3>{{$data}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-muted">Appointment</h6>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                 
                       <div class="col-xl-5 col-sm-6 col-12">
                        <div class="card" style="min-height: 166px;">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-primary border-primary">
                                            <i class="fe fe-users"></i>
                                        </span>
                                     
                                    <div class="dash-count">
                                         <?php if(isset($subscription)){ ?>
                                        <h3>{{$subscription->splan_name}}</h3>
                                      
                                        <?php
                                           $startDate = $subscription->created_at->format('d-m-Y') ;
                                 $vailds = $subscription->vaild;
                            
                                 $vaildDay= $vailds*30;
                            $date=date_create( $startDate);
                            
                            date_add($date,date_interval_create_from_date_string("$vaildDay days"));
                                 // $currentdate=date_create(date("Y-m-d"));
                                  //  $endDate=date_create($date->format('Y-m-d'));
                                    
                                    $date1=date_create(date("Y-m-d"));
                                    $date2=date_create($date->format('Y-m-d'));
                                    $diff=date_diff($date1,$date2);
                                    echo $diff->format("%R%a days remaining");
                                         }
                                         else
                                         { ?>
                                         <h4>No Subscription</h4>
                                         <div class="text-center">
                            <a href="{{ route('subscription.doctors.plans.list')}}" class="btn btn-primary">Subscribe</a>
                    </div>
                                     <?php    }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-muted">Active Subscription</h6>
                                 
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
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
