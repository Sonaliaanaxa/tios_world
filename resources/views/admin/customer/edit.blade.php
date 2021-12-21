
 
@include("admin.layouts.sidebar")
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">{{ __($title) }}
                                <a href="{{route('customer.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
                                </h3>
							
							</div>
						</div>
					</div>

					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body custom-edit-service">
							
							
								<!-- Add Blog -->
                                <form method='post'  action="{{ route('customer.update',$customer->id) }}"  enctype="multipart/form-data">
                    @csrf
                      @include('home.layouts.flash_msg')
									<div class="service-fields mb-3">
										<div class="row">

										<div class="form-group col-md-6">
                                                <label for="category">Name</label>
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}"  value="{{ $customer->name}}"  aria-required="true"/>
                                                    @if ($errors->has('name'))
                                                        <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                                                    @endif
                                                </div>
                                            </div>
                                            	<div class="form-group col-md-6">
                                                <label for="category">Email</label>
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ $customer->email}}"   aria-required="true"/>
                                                    @if ($errors->has('email'))
                                                        <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                                                    @endif
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6">
	                                                <label for="category">Mobile</label>
	                                                <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
	                                                    <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="phone" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ $customer->phone}}"  aria-required="true"/>
	                                                    @if ($errors->has('mobile'))
	                                                        <span id="mobile-error" class="error text-danger" for="input-mobile">Mobile No is Empty!</span>
	                                                    @endif
	                                                    </div>
	                                            </div>
                                            
                            
                                    
{{--                                            <div class="form-group col-md-6">
                                                <label for="category">Role</label>
                        <div class="form-group{{ $errors->has('user_type') ? ' has-danger' : '' }}">
                        <select  class="custom-select {{ $errors->has('user_type') ? ' is-invalid' : '' }}" name='user_type' id="input-user_type"   >
                                <option value='{{ $customer->user_type}}'>Select the  Role </option>
                                <option value='seller' {{ ('seller'==$customer->user_type)?'selected':''}}> Seller </option> 
                                <option value='customer' {{ ('customer'==$customer->user_type)?'selected':''}}>  Customer </option> 
                               <option value='admin' {{ ('admin'==$customer->user_type)?'selected':''}}>  Admin </option> 
                          </select>  @if ($errors->has('user_type'))
                            <span id="user_type-error" class="error text-danger" for="input-user_type">Role is Empty!</span>
                          @endif
                        </div>
                      </div>

                      <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image*')}}</label>
                          <div class="col-sm-10">
             
                          <div class="profile-img">
                                                        
                                                        <img src="{{ asset('uploads/profile_img') }}/{{ $customer->img }}" style='height:130px;width:130px;border-radius:5%;' />
                                                    </div>
                                                    <br>

                            <input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg"  name='myImage' id="myImage" class="form-control"  title="Upload image" class="add-input" onChange="displayImage1(this)" > 
                              
                                        
                          </div>
                          <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                </div>

                --}}
                             </div>

										</div>
									</div>
									
						
									
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
									</div>
								</form>
								<!-- /Add Blog -->


								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
    <!-- /Main Wrapper -->