@include("home.layouts.header") 

<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			 <div class="header"></div>
			<!-- /Header -->
			

			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
			
               
					<!-- Doctor Widget -->
					<div class="card">
                  
						<div class="card-body">
                        <div class="container-fluid">
                        <div class="row">
                    <div class="col-md-12 ">

                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                            
                                <div class="col-md-12 col-lg-12 ">
                                    <div class="login-header">
                                    <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
                                    Blood Request/Donate
                </h4>
                                     
                                    </div>
                                    <br>

                                    <!-- Register Form -->
                                    <form method='post'  action="{{ __('blood.bank.request') }}"  enctype="multipart/form-data">
                    @csrf
                      @include('home.layouts.flash_msg')
                      <div class="row">
                         
                         <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Name') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                               @if ($errors->has('name'))
                                 <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                               @endif
                             </div>
                           </div> 
                           <label class="col-sm-2 col-form-label"style='color:black;'>{{ __('Email id') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ old('email') }}"  aria-required="true"/>
                               @if ($errors->has('email'))
                                 <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                               @endif
                             </div>
                           </div>

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Mobile No') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('mobile_no') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" name="mobile_no" id="input-mobile_no" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ old('mobile_no') }}"  aria-required="true"/>
                               @if ($errors->has('mobile_no'))
                                 <span id="mobile_no-error" class="error text-danger" for="input-mobile_no">Mobile No is Empty!</span>
                               @endif
                             </div>
                           </div>
                        
                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Age') }}</label>
                           <div class="col-sm-4">
                             <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" id="input-age" type="text" placeholder="{{ __(' Age ') }}"  value="{{ old('age') }}"  aria-required="true"/>
                               @if ($errors->has('age'))
                                 <span id="age-error" class="error text-danger" for="input-age">Age is Empty!</span>
                               @endif
                             </div>
                           </div> 

                
                           
                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Height') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" id="input-height" type="text" placeholder="{{ __(' Height') }}"  value="{{ old('height') }}"  aria-required="true"/>
                      @if ($errors->has('height'))
                        <span id="height-error" class="error text-danger" for="input-height">Height is Empty!</span>
                      @endif
                    </div>
                  </div>

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Height Unit') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('hunit') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('hunit') ? ' is-invalid' : '' }}" name='hunit' id="input-hunit"   >
                            <option value=''>Select the Height unit?</option>
                            <option value='ft' {{ ('ft'==old('hunit'))?'selected':''}}> ft </option>  
                            <option value='cm' {{ ('cm'==old('hunit'))?'selected':''}}> cm</option>
                           
          
                       </select>  @if ($errors->has('hunit'))
                        <span id="hunit-error" class="error text-danger" for="input-hunit">Height Unit is Empty!</span>
                      @endif
                    </div>
                  </div>
                    
                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Weight') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"  name="weight" id="input-weight" type="text" placeholder="{{ __(' Weight') }}"   value="{{ old('weight') }}"  aria-required="true"/>
                    
                     @if ($errors->has('weight'))
                        <span id="weight-error" class="error text-danger" for="input-weight">Weight is Empty!</span>
                      @endif
                    </div>
                  </div>

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Weight Unit') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('wunit') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('wunit') ? ' is-invalid' : '' }}" name='wunit' id="input-wunit"   >
                            <option value=''>Select the weight unit?</option>
                            <option value='kg' {{ ('kg'==old('wunit'))?'selected':''}}> Kg </option>  
                            <option value='pound' {{ ('pound'==old('wunit'))?'selected':''}}> pound</option>
                           
                       </select>  @if ($errors->has('wunit'))
                        <span id="wunit-error" class="error text-danger" for="input-wunit">Unit is Empty!</span>
                      @endif
                    </div>
                  </div>
                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('User Type') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('user_type') ? ' has-danger' : '' }}">
                                    <select  class="custom-select {{ $errors->has('user_type') ? ' is-invalid' : '' }}" name='user_type' id="input-user_type"   >
                                            <option value=''>Select the User Type?</option>
                                            <option value="request"{{ ('request'==old('user_type'))?'selected':''}}>Request</option>
                                            <option value="donate"{{ ('donate'==old('user_type'))?'selected':''}}>Donate</option>
           
                                                         
                                            </select>  @if ($errors->has('user_type'))
                                        <span id="user_type-error" class="error text-danger" for="input-user_type">User Type is Empty!</span>
                                      @endif
                                    </div>
                                  </div>
                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Blood Group') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('blood_group') ? ' has-danger' : '' }}">
                                    <select  class="custom-select {{ $errors->has('blood_group') ? ' is-invalid' : '' }}" name='blood_group' id="input-blood_group"   >
                                            <option value=''>Select the Blood Group?</option>
                                            <option value="A+"{{ ('A+'==old('blood_group'))?'selected':''}}>A+</option>
                                            <option value="A-"{{ ('A-'==old('blood_group'))?'selected':''}}>A-</option>
                                            <option value="B+"{{ ('B+'==old('blood_group'))?'selected':''}}>B+</option>
                                            <option value="B-"{{ ('B-'==old('blood_group'))?'selected':''}}>B-</option>
                                            <option value="O+"{{ ('O+'==old('blood_group'))?'selected':''}}>O+</option>
                                            <option value="O-"{{ ('O-'==old('blood_group'))?'selected':''}}>O-</option>
                                            <option value="AB+"{{ ('AB+'==old('blood_group'))?'selected':''}}>AB+</option>
                                            <option value="AB-"{{ ('AB-'==old('blood_group'))?'selected':''}}>AB-</option>
           
                                                         
                                            </select>  @if ($errors->has('blood_group'))
                                        <span id="blood_group-error" class="error text-danger" for="input-blood_group">Blood Group is Empty!</span>
                                      @endif
                                    </div>
                                  </div>
                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Gender') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                    <select  class="custom-select {{ $errors->has('gender') ? ' is-invalid' : '' }}" name='gender' id="input-gender"   >
                                            <option value=''>Select the Gender?</option>
                                            <option value="male"{{ ('male'==old('gender'))?'selected':''}}>Male</option>
                                            <option value="female"{{ ('female'==old('gender'))?'selected':''}}>Female</option>
                                            <option value="other"{{ ('other'==old('gender'))?'selected':''}}>Other</option>
                                                         
                                            </select>  @if ($errors->has('gender'))
                                        <span id="gender-error" class="error text-danger" for="input-gender">Gender is Empty!</span>
                                      @endif
                                    </div>
                                  </div> 

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Appointment Date') }}</label>
                           <div class="col-sm-4">
                           <?php
$ds=date("Y-m-d");
?>
                             <div class="form-group{{ $errors->has('appoint_date') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('appoint_date') ? ' is-invalid' : '' }}" name="appoint_date" id="input-appoint_date" type="date" placeholder="{{ __('  Appointment Date') }}"  value="{{ old('appoint_date') }}" min="<?php echo $ds; ?>"  aria-required="true"/>
                               @if ($errors->has('appoint_date'))
                                 <span id="appoint_date-error" class="error text-danger" for="input-appoint_date">Appointment Date is Empty!</span>
                               @endif
                             </div>
                           </div> 

                           <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Address') }}</label>
                           <div class="col-sm-10">
                             <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                               <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __(' Address') }}"  value="{{ old('address') }}"  aria-required="true"/>
                               @if ($errors->has('address'))
                                 <span id="address-error" class="error text-danger" for="input-address">Address is Empty!</span>
                               @endif
                             </div>
                           </div> 
                           
            
            
                     
                              </div> 
                         
                                        <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image')}}</label>
                          <div class="col-sm-10">
                          <label htmlFor="myImage" > 
                          <input type="file" name="myImage" 
                        

                              class="form-control-file" 
                              accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                              id="myImage"
                          /></label>
                             </div>
                                     </div>
                                     </div>
                                     </div>
                                     <input type="hidden" name="bank_id" value="{{$users->id}}">
                                     <br><br>
                                     <div class="col-sm-3">
                                     <button class="btn btn-primary btn-block btn-lg login-btn"  type="submit">Send Enquiry</button>
                                    </div>
                                    <br> <br> <br> <br>
                                 </div>
                                    </form>
                                    <!-- /Register Form -->

                                </div>
                            </div>
                        </div>
                        <!-- /Register Content -->
<div>
<div>
<div>


							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
                                    @if($users->img)
                               <img src="{{ asset('public/uploads/profile_img') }}/{{ $users->img }}" style='height:150px;width:150px;border-radius:5%;'/>
                            @else
                                <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($users->name,0,1) }}
                                </p>
                            @endif
										
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{$users->name}}</h4>
										<p class="doc-speciality">{{ $users->biography }}</p>
												<p class="doc-speciality">{{ $users->email }}</p>
										<p class="doc-speciality">{{ $users->mobile }}</p>
								
										<div class="clinic-details">
                                       
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $users->address}}</a></p>
										
										</div>
										
									</div>
								</div>
								<div class="doc-info-right">
								<div class="clini-infos">
										<ul>
											<li><b>City : </b> {{ $users->city }}, </li>
											<li><b>State : </b>{{ $users->state }},</li>
											<li><b>Country : </b>{{ $users->country }}, </li>
											<li><b>Zipcode : </b>{{ $users->zipcode }}.</li>
											
										</ul>
									</div>
								
								
								</div>
							</div>

                          



						</div>
                        <br>
                      
					</div>
              
					<!-- /Doctor Widget -->
                    </div>
							</div>
						</div>
                        </div>
						</div>
					
				
	
		
	</body>
   

    @include("home.layouts.footer")