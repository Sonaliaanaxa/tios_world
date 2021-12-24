@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
	<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title"> {{ __($title) }} 
						<a href="{{route('warehouse.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
						<form method='post' action="{{ route('warehouse.create') }}" enctype="multipart/form-data">
							@csrf
							@include('admin.layouts.flash_msg')

							<div class="service-fields mb-3">
                     		<div class="row">
								
									<label class="col-sm-2 col-form-label">{{ __('Warehouse Name')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Warehouse Name') }}" value="{{ old('name') }}" aria-required="true" />
												@if ($errors->has('name'))
												<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
												@endif
											</div>

										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Contact Person Name')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('contact_person_name') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('contact_person_name') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('contact_person_name') ? ' is-invalid' : '' }}" name="contact_person_name" id="input-contact_person_name" type="text" placeholder="{{ __('Contact Person Name') }}" value="{{ old('contact_person_name') }}" aria-required="true" />
												@if ($errors->has('contact_person_name'))
												<span id="contact_person_name-error" class="error text-danger" for="input-contact_person_name">Contact Person Name is Empty!</span>
												@endif
											</div>

										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Contact Person Number')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('contact_person_no') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('contact_person_no') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('contact_person_no') ? ' is-invalid' : '' }}" name="contact_person_no" id="input-contact_person_no" type="text" placeholder="{{ __('Contact Person Number') }}" value="{{ old('contact_person_no') }}" aria-required="true" />
												@if ($errors->has('contact_person_no'))
												<span id="contact_person_no-error" class="error text-danger" for="input-contact_person_no">Contact Person Number is Empty!</span>
												@endif
											</div>

										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Address')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}" value="{{ old('address') }}" aria-required="true" />
												@if ($errors->has('address'))
												<span id="address-error" class="error text-danger" for="input-address">Address is Empty!</span>
												@endif
											</div>

										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Pincode')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('pincode') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('pincode') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('pincode') ? ' is-invalid' : '' }}" name="pincode" id="input-pincode" type="number" placeholder="{{ __('Pincode') }}" value="{{ old('pincode') }}" aria-required="true" />
												@if ($errors->has('pincode'))
												<span id="pincode-error" class="error text-danger" for="input-pincode">Pincode is Empty!</span>
												@endif
											</div>

										</div>
									</div>
							
							
							<label class="col-sm-2 col-form-label">{{ __('Status*') }}</label>
							<div class="col-sm-4">
								<div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
									<select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status">
										<option value=''>Select the status of product</option>
										<option value='1' {{ ('1'==old('status'))?'selected':''}}> Active </option>
										<option value='0' {{ ('0'==old('status'))?'selected':''}}> Inctive</option>
									</select> @if ($errors->has('status'))
									<span id="status-error" class="error text-danger" for="input-status"> Status</span>
									@endif
								</div>
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
