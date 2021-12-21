@include("admin.layouts.sidebar")

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Blood Request : </h4>
                          
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                                        <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-users"></i>
										</span>
                                    <div class="dash-count">
                                        <h3>{{myBloodBankRequest()}}</h3>
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
                                        <h3>{{myBloodBankDonate()}}</h3>
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
