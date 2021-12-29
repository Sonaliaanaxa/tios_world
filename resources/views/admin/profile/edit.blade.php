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
						<a href="{{ route('my.profile.view')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
						<form method='post' action="{{ route('basic.my.profile.update') }}" enctype="multipart/form-data">
							@csrf
							@include('home.layouts.flash_msg')
							<div class="service-fields mb-3">
								<div class="row">

									<div class="form-group col-md-6">
										<label for="category">Name</label>
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}" value="{{ $user->name}}" aria-required="true" />
											@if ($errors->has('name'))
											<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
											@endif
										</div>
									</div>
									<div class="form-group col-md-6">
										<label for="category">Email</label>
										<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}" value="{{ $user->email}}" aria-required="true" readonly/>
											@if ($errors->has('email'))
											<span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
											@endif
										</div>
									</div>


									<div class="form-group col-md-6">
										<label for="category">Mobile</label>
										<div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="number" placeholder="{{ __(' Mobile No') }}" value="{{ $user->phone}}" aria-required="true" readonly />
											@if ($errors->has('phone'))
											<span id="phone-error" class="error text-danger" for="input-phone">Mobile No is Empty!</span>
											@endif
										</div>
									</div>
								</div>

								<div class="form-group col-md-6" id="file-content">
									<label class=" col-form-label">{{ __('Upload  Logo*')}}</label>
									<div class="col-sm-10">
										<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myLogo' id="myLogo" class="form-control" title="Upload Logo" class="add-input" onChange="displayImage1(this)">
										<img src="{{ asset('/uploads/profile_img') }}/{{ $user->logo }}" style='margin-bottom:30px;height:50px;width:50px;border-radius:5%;' />
									</div>
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>


								<div class="col-12">
									<h5>About Your Business</h5>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="title">Business Title</label>
										<div class="form-group">
											<input id="title" class="form-control" name="business_title" type="text" value="{{ $user->business_title}}">
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for="tagline">Tag Line</label>
										<div class="form-group">
											<input id="tagline" class="form-control" name="tag_line" type="text" value="{{ $user->tag_line}}">
										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('About Business')  }}</label>
									<div class="col-sm-12 col-md-12">
										<div class="form-group{{ $errors->has('about_business') ? ' has-danger' : '' }}">
											<textarea class="form-control{{ $errors->has('about_business') ? ' is-invalid' : '' }}" name="about_business" id="input-about_business" type="about_business" value="{{ old('about_business') }}" placeholder="{{ __('About Business') }}" />
											{!! $user->about_business !!}
											</textarea>
											
											@if ($errors->has('about_business'))
											<span id="about_business-error" class="error text-danger" for="input-about_business">Product Details is Empty!</span>
											@endif
										</div>
									</div>
								</div>
								<div class="col-12">
									<h5>About Your Founder</h5>
								</div>
								<div class="row">
									<div class="form-group col-md-6" id="file-content">
										<label class=" col-form-label">{{ __('Upload  Image1*')}}</label>
										<div class="col-sm-10">
											<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage1' id="myImage1" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
											<img src="{{ asset('/uploads/profile_img') }}/{{ $user->image1 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
										</div>
										<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
									</div>


									<div class="form-group col-md-6" id="file-content">
										<label class=" col-form-label">{{ __('Upload Image2*')}}</label>
										<div class="col-sm-10">
											<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage2' id="myImage2" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
											<img src="{{ asset('/uploads/profile_img') }}/{{ $user->image2 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
										</div>
										<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
									</div>
									<div class="form-group col-md-6" id="file-content">
										<label class=" col-form-label">{{ __('Upload  Image3*')}}</label>
										<div class="col-sm-10">
											<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage3' id="myImage3" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
											<img src="{{ asset('/uploads/profile_img') }}/{{ $user->image3 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
										</div>
										<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
									</div>

								</div>
								<label class="col-sm-2 col-form-label">{{ __('About Founder*')  }}</label>
								<div class="col-sm-12 col-md-12">
									<div class="form-group{{ $errors->has('about_founder') ? ' has-danger' : '' }}">
										<textarea class="form-control{{ $errors->has('about_founder') ? ' is-invalid' : '' }}" name="about_founder" id="input-about_founder" type="about_founder" value="{{ old('about_founder') }}" placeholder="{{ __('About founder') }}" />
										{!! $user->about_founder!!}
										</textarea>
										
										@if ($errors->has('about_founder'))
										<span id="about_founder-error" class="error text-danger" for="input-about_founder">founder Details is Empty!</span>
										@endif
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