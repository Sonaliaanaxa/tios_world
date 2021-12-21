

@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">{{ __($title) }}
                                <a href="{{route('home.notification.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                <form method='post'  action="{{route('home.notification.update',$id)}}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

									<div class="service-fields mb-3">
										<div class="row">

							
										<div class="form-group col-md-6">
                                                <label for="category">Title</label>
                                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{$homenotifications->title}}"  aria-required="true"/>
                                                    @if ($errors->has('title'))
                                                        <span id="title-error" class="error text-danger" for="input-title">Title is Empty!</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        		<div class="form-group col-md-6">
                                                <label for="category">Link</label>
                                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="input-link" type="text" placeholder="{{ __('Link') }}" value="{{$homenotifications->link}}"  aria-required="true"/>
                                                    @if ($errors->has('link'))
                                                        <span id="link-error" class="error text-danger" for="input-link">Link is Empty!</span>
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
													   <br>
												 <img src="{{ asset('public/uploads/homenotifications') }}/{{ $homenotifications->img }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;'/>
													   <br>
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