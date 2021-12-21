

@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">{{ __($title) }}
                                <a href="{{route('specialities.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                <form method='post'  action="{{ route('specialities.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

									<div class="service-fields mb-3">
										<div class="row">

										<div class="form-group col-md-6">
                                                <label for="category">Name</label>
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                                                    @if ($errors->has('name'))
                                                        <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                       
									   <div class="form-group col-md-6">
										   <label for="category">{{ __('Upload  Image')}}</label>
										   <div class="upload-img">
												   <div class="change-photo-btn">
											 
													 <label htmlFor="myImage" >
													   <input type="file" class="upload"  name="myImage" 
													   accept="image/x-png,image/gif,image/jpeg,image/jpg" 
													 id="myImage"
													   /></label>
												   </div>
												   <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
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