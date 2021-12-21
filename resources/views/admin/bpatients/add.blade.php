

@include("admin.layouts.sidebar")
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">{{ __($title) }}
                                <a href="{{route('patient.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                                <form method='post'  action="{{ route('patient.create') }}"  enctype="multipart/form-data">
                    @csrf
                      @include('home.layouts.flash_msg')
									<div class="service-fields mb-3">
										<div class="row">

										<div class="form-group col-md-6">
                                                <label for="category">Name</label>
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                                                    @if ($errors->has('name'))
                                                        <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                                                    @endif
                                                </div>
                                            </div>
                                            	<div class="form-group col-md-6">
                                                <label for="category">Email</label>
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ old('email') }}"  aria-required="true"/>
                                                    @if ($errors->has('email'))
                                                        <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                                                    @endif
                                                    </div>
                                                </div>
                                            
                                            	<div class="form-group col-md-6">
                                                <label for="category">Mobile</label>
                                                <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ old('mobile') }}"  aria-required="true"/>
                                                    @if ($errors->has('mobile'))
                                                        <span id="mobile-error" class="error text-danger" for="input-mobile">Mobile No is Empty!</span>
                                                    @endif
                                                    </div>
                                            </div>
                                   
                                            <div class="form-group col-md-6">
                                                <label for="category">Password</label>
                                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                       
                                                    <input class="form-control" type="password" name="password" id="password"  placeholder="{{ __('Password...') }}" value="{{ old('password') }}"  aria-required="true"/>
                                                    
                                                    @if ($errors->has('password'))
                                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </div>
                                                    @endif
                                                </div>
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