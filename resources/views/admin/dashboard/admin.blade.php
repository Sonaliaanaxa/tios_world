@include("admin.layouts.sidebar")

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Business Partners : </h4>
                          
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div  class="card" href="{{ route('doctors.list')}}">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count" >
                                        <h3>{{allDoctors()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-muted">Doctors</h6>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-success">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allPatient()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Patients</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allPharmacy()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Pharmacy</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-success">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allHospital()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Hospital</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allDiagonostics()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Diagonostics</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allBloodBank()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Blood Bank</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
</div>

  <!-- Page Header -->
  <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Ecommerce : </h4>
                          
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                    <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{category()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Category</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-credit-card"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{products()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Products</h6>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-primary border-primary">
											<i class="fa fa-shopping-cart"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{totalOrders()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-muted">Orders</h6>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>₹&nbsp;{{allPayments()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Payments</h6>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
              
                </div>
                

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Blood Bank : </h4>
                          
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                  
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allBloodBankRequest()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Request</h6>
                                
                                </div>
                            </div>
                        </div>
                    </div>
					       <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{allBloodBankDonate()}}</h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Donate</h6>
                                
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
