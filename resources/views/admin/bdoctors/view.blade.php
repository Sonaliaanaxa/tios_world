

@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">{{ __($title) }}
                            <a href="{{route('doctors.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
                            </h3>
                        
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                @include('admin.layouts.flash_msg')
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                @if($user->img)
                                    <a href="{{ asset('public/uploads/profile_img') }}/{{ $user->img }}"><img class="rounded-circle" alt="User Image" src="{{ asset('public/uploads/profile_img') }}/{{ $user->img }}">
                                    </a>
                                    @else
                                    <p class='text-center' style='padding-top:12px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:25px;'>
                                    {{ substr($user->name,0,1) }}
                                    </p>
                                    @endif
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">{{ $user->name }}</h4>
                                    <h6 class="text-muted">{{ $user->email }}</h6>
                                    <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $user->city }},{{ $user->state }},{{ $user->country }},{{ $user->zipcode }}.</div>
                                    <div class="about-text">{{ $user->biography}}</div>
                                </div>
                                <!-- <div class="col-auto profile-btn">

                                    <a href="#" class="btn btn-primary">
											Edit
										</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                           
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="per_details_tab">

                                <!-- Personal Details -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a class="edit"  href="{{route('doctors.update',$user->id)}}" target='_blank'><i class="fa fa-edit mr-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10">{{ $user->name }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                    <p class="col-sm-10">{{ $user->dbd }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                    <p class="col-sm-10">{{ $user->email }}</p>
                                                </div>
                                                      <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Secondary Email ID</p>
                                                    <p class="col-sm-10">{{ $user->secondary_email }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-10">{{ $user->mobile }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">City</p>
                                                    <p class="col-sm-10">{{ $user->city }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">State</p>
                                                    <p class="col-sm-10">{{ $user->state }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Country</p>
                                                    <p class="col-sm-10">{{ $user->country }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Zipcode Code</p>
                                                    <p class="col-sm-10">{{ $user->zipcode }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                    <p class="col-sm-10 mb-0">{{ $user->address}}
                                                   </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Biography</p>
                                                    <p class="col-sm-10">{{ $user->biography }}</p>
                                                </div>
                                              
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Gender</p>
                                                    <p class="col-sm-10">{{ $user->gender }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                    <p class="col-sm-10">{{ $user->dbd }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Price/Charge Detail</p>
                                                    <p class="col-sm-10">{{ $user->price }}</p>
                                                </div>
                                               
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Account Holder's Name</p>
                                                    <p class="col-sm-10">{{ $user->acc_holder_name }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Account Number</p>
                                                    <p class="col-sm-10">{{ $user->acc_number }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">IFSC Code</p>
                                                    <p class="col-sm-10">{{ $user->ifsc_code }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">UPI ID</p>
                                                    <p class="col-sm-10">{{ $user->upi_id }}</p>
                                                </div>
                                               
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Hospital/Clinic Name</p>
                                                    <p class="col-sm-10">{{ $user->hospital_name }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Hospital/Clinic Address</p>
                                                    <p class="col-sm-10">{{ $user->hospital_address }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Hospital/Clinic Registrations</p>
                                                    <p class="col-sm-10">{{ $user->hospital_reg }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Registrations Year</p>
                                                    <p class="col-sm-10">{{ $user->hospital_reg_year }}</p>
                                                </div>
                                              <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Highest Degree</p>
                                                    <p class="col-sm-10">{{ $user->degree }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">College/Institute</p>
                                                    <p class="col-sm-10">{{ $user->collage }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Year of Completion</p>
                                                    <p class="col-sm-10">{{ $user->ed_year }}</p>
                                                </div>
                                               
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Services</p>
                                                    <p class="col-sm-10">{{ $user->services }}</p>
                                                </div>
                                                      <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Specialization</p>
                                                    <p class="col-sm-10">
                                                    		<?php
                 
                                                        $arr=json_decode($user->specialization,true);
                                                        
                                                        if(isset($arr))    {   
                                                        foreach($arr as $key=>$value){
                                                            
                                                            echo  $value . ",";
                                                        }
                                                        }
                                                                                    ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Total Experience</p>
                                                    <p class="col-sm-10">{{ $user->total_experience }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Designation</p>
                                                    <p class="col-sm-10">{{ $user->designation }}</p>
                                                </div>
                 <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Reference Id</p>
                                                    <p class="col-sm-10">{{ $user->reference }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Referral Id</p>
                                                    <p class="col-sm-10">{{ $user->referral }}</p>
                                                </div>

                                            </div>
                                        </div>

                                       

                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->