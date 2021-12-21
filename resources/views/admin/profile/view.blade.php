

@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">My Profile</h3>
           
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
                                    <a href="#">
                                        <img  alt="User Image" src="{{ asset('public/uploads/profile_img') }}/{{ $user->img }}" style='height:130px;width:130px;border-radius:5%'>
                                    </a>
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
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
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
                                                    <a class="edit"  href="{{ route('my.profile.update')}}" target='_blank'><i class="fa fa-edit mr-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10">{{ $user->name }}</p>
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
                                                @if(auth()->user()->user_type=='doctor')
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Gender</p>
                                                    <p class="col-sm-10">{{ $user->gender }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                    <p class="col-sm-10">{{ $user->dbd }}</p>
                                                </div>
                                                @endif
                                                @if(auth()->user()->user_type=='doctor' || auth()->user()->user_type=='blood_bank' || 
                                                auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='hospital' || 
                                                auth()->user()->user_type=='pharmacy')
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
                                                @endif
                                                @if(auth()->user()->user_type=='doctor'  || 
                                                auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='hospital')
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Price/Charge Details</p>
                                                    <p class="col-sm-10">{{ $user->price }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Price Unit</p>
                                                    <p class="col-sm-10">{{ $user->unit }}</p>
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
                                                @endif
                                                @if(auth()->user()->user_type=='doctor'  || auth()->user()->user_type=='diagnostic'  )
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
                                                @endif
                                                @if(auth()->user()->user_type=='doctor' || 
        auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='hospital' )
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
                                                @endif
                                                    <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Reference Id</p>
                                                    <p class="col-sm-10">{{ $user->reference }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Referral Id</p>
                                                    <p class="col-sm-10">{{ $user->referral }}</p>
                                                </div>

                                            </div>
                                            @if(auth()->user()->user_type=='doctor'  || 
        auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='hospital')
                                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Document & Hospital Image</h4>
                                <form method='post'  action="#"  enctype="multipart/form-data">
                             

                                    
                                    <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload Document')}}</label>
                          <div class="col-sm-4">
                          <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->dec_img1 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;'/>
                                <br>
                        </div>
                             

                             <div class="col-sm-4">
                             <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->dec_img2 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;'/>
                                <br>
                        <br> 
                                        
                             </div>
                             </div>
                             <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">Hospital Image</label>
                          <div class="col-sm-4">
                          <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->hospital_img1 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;'/>
                                <br>
                      <br> 
                                        
                             </div>

                             <div class="col-sm-4">
                             <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->hospital_img2 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;'/>
                                <br>
                          <br> 
                                        
                             </div>
                      </div>
                              
                                </form>
                            </div>
                        </div>
                        @endif
                                        </div>

                                       

                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->

                            <!-- Change Password Tab -->
                            <div id="password_tab" class="tab-pane fade">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                            
                                            <form method='post'  action="{{ route('password.update') }}"  enctype="multipart/form-data">
                                            @csrf
                                                @include('admin.layouts.flash_msg')
                                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  id="input-password" type="password" placeholder="{{ __('New Password') }}"  aria-required="true"/>
                                            <input  name="old_password"  type="hidden" />
                                            
                                            @if ($errors->has('password'))
                                                <span id="password-error" class="error text-danger" for="input-password">Please Enter the New Password!</span>
                                            @endif
                                            </div>
                                                   
                                               
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Change Password Tab -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->