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
						<a href="{{route('customer.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
						<form method='post' action="{{ route('customer.create') }}" enctype="multipart/form-data">
							@csrf
							@include('home.layouts.flash_msg')
							<div class="service-fields mb-3">
								<div class="row">

									<div class="form-group col-md-6">
										<label for="category">Name</label>
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}" value="{{ old('name') }}" aria-required="true" />
											@if ($errors->has('name'))
											<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
											@endif
										</div>
									</div>
									<div class="form-group col-md-6">
										<label for="category">Email</label>
										<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}" value="{{ old('email') }}" aria-required="true" />
											@if ($errors->has('email'))
											<span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
											@endif
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for="category">Passsword</label>
										<div class="password">
											<input class="form-control" name="password" id="password" type="password">
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for="category">Mobile</label>
										<div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="phone" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}" value="{{ old('mobile') }}" aria-required="true" />
											@if ($errors->has('mobile'))
											<span id="mobile-error" class="error text-danger" for="input-mobile">Mobile No is Empty!</span>
											@endif
										</div>
									</div>



									<div class="form-group col-md-6" id="file-content">
										<label class=" col-form-label">{{ __('Upload  Image*')}}</label>
										<div class="col-sm-10">
											<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
										</div>
										<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
									</div>


									<div class="col-12">
										<h5>About Your Business</h5>
									</div>

									<div class="form-group col-md-6">
										<label for="title">Business Title</label>
										<div class="form-group">
											<input id="title" class="form-control" name="business_title" type="text">
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for="tagline">Tag Line</label>
										<div class="form-group">
											<input id="tagline" class="form-control" name="tag_line" type="text">
										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('About Business*')  }}</label>
								<div class="col-sm-12 col-md-12">
									<div class="form-group{{ $errors->has('about_business') ? ' has-danger' : '' }}">
										<textarea class="form-control{{ $errors->has('about_business') ? ' is-invalid' : '' }}" name="about_business" id="input-about_business" type="about_business" value="{{ old('about_business') }}" placeholder="{{ __('About Business') }}" />
										{{ old('about_business') }}
										</textarea>
										<script>
											CKEDITOR.replace('input-about_business');
										</script>
										@if ($errors->has('about_business'))
										<span id="about_business-error" class="error text-danger" for="input-about_business">Business Details is Empty!</span>
										@endif
									</div>
								</div>




									<div class="form-group col-md-6">
										<label for="category">Role</label>
										<div class="form-group">
											<select class="custom-select" name='user_type' id="input-user_type">
												<option value=''>Select the Role </option>
												<option value='seller'> Seller </option>
												<option value='customer'> Customer </option>
												<option value='admin'> Admin </option>
											</select>
										</div>
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