


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
                                <a href="{{route('blogs.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                <form method='post'  action="{{ route('add-blog') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

									<div class="service-fields mb-3">
								

                    <div class="row">
         

                      <label class="col-sm-2 col-form-label">{{ __('Blog Title')  }}</label>
                  <div class="col-sm-10 col-md-10">
                    <div class="form-group{{ $errors->has('blog_title') ? ' has-danger' : '' }}">
                    <div class="form-group{{ $errors->has('blog_title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('blog_title') ? ' is-invalid' : '' }}" name="blog_title" id="input-blog_title" type="text" placeholder="{{ __(' Blog Title ') }}"  value="{{ old('blog_title') }}"  aria-required="true"/>
                      @if ($errors->has('blog_title'))
                        <span id="blog_title-error" class="error text-danger" for="input-blog_title">Blog is Empty!</span>
                      @endif
                    </div>
                        
                    </div>
                  </div>
                  </div>
                  
                 
              
<br>


                  <div class='row'>
               
                  
                  
                  <label class="col-sm-2 col-form-label">{{ __('Short Details') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('short_details') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('short_details') ? ' is-invalid' : '' }}"  name="short_details" id="input-short_details" type="text" placeholder="{{ __(' Short Details') }}"   value="{{ old('short_details') }}"  aria-required="true"/>
                    
                     @if ($errors->has('short_details'))
                        <span id="short_details-error" class="error text-danger" for="input-short_details">Short Details is Empty!</span>
                      @endif
                    </div>
                  </div>
                  
                     <label class="col-sm-2 col-form-label">{{ __('Blog Details')  }}</label>
                  <div class="col-sm-10 col-md-10">
                    <div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}"  name="details" id="input-details" type="details" value="{{ old('details') }}" placeholder="{{ __('Product Details') }}"  />
                    {{ old('details') }}
                      </textarea>
                      <script>
                        CKEDITOR.replace( 'input-details' );
                      </script>
                           @if ($errors->has('details'))
                        <span id="details-error" class="error text-danger" for="input-details">Details is Empty!</span>
                      @endif
                    </div>
                  </div>

                </div>

                  <br>

                <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image*')}}</label>
                          <div class="col-sm-10">
             


                            <input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg"  name='myImage' id="myImage" class="form-control"  title="Upload image" class="add-input" onChange="displayImage1(this)" > 
                              
                                        
                          </div>
                          <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                </div>
                             </div>
                           
									
						
									
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
									</div>
                  <br>
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
