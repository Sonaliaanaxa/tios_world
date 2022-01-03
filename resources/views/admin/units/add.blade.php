@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
	<style>
		#hidden_div {
			display: none;
		}
	</style>
	<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">{{ __($title) }}
						<a href="{{route('variation-units.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
						<form method='post' action="{{ route('variation-units.create') }}" enctype="multipart/form-data">
							@csrf
							@include('admin.layouts.flash_msg')

							<div class="service-fields mb-3">
								<div class="row">
									<div class="col-sm-6 col-md-6">
										<label class="category">{{ __('Select Variation *')  }}</label>
										<div class="form-group{{ $errors->has('variation_id') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('variation_id') ? ' is-invalid' : '' }}category" name='variation_id' id="input-variation_id" >
												<option value='' selected disabled>Select Variation</option>
												@foreach($variations as $d)
												<option value='{{ $d->id}}' {{ ($d->id==old('variation_id'))?'selected':''}}> {{ $d->name}} </option>
												@endforeach
											</select>
											@if ($errors->has('variation_id'))
											<span id="variation_id-error" class="error text-danger" for="input-variation_id">Variation is Empty!</span>
											@endif
										</div>
									</div>

									<div id="hidden_div1" class="form-group col-md-6">
										<label for="category">Unit Name</label>
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unit" id="input-name" type="text" placeholder="{{ __('Unit Name') }}" value="{{ old('name') }}" aria-required="true" />
											@if ($errors->has('name'))
											<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
											@endif
										</div>
									</div>
									<div id="hidden_div" class="form-group col-md-6">
										<div id="cp2" class="input-group colorpicker-component">
											<label for="category">Select Color</label>
											<div id="cp2" class="input-group colorpicker-component">
												<input type="text" value="#00AABB" class="form-control" name="color" />
												<span class="input-group-addon"><i></i></span>
											</div>
										</div>
									</div>


									<div class="col-sm-6">
										<label class="category">{{ __('Status*') }}</label>
										<div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status">
												<option value=''>Select Status</option>
												<option value='1' {{ ('1'==old('status'))?'selected':''}}> Active </option>
												<option value='0' {{ ('0'==old('status'))?'selected':''}}> Inactive</option>
											</select> @if ($errors->has('status'))
											<span id="status-error" class="error text-danger" for="input-status"> Status</span>
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
<script type="text/javascript">
	$('#cp2').colorpicker();

	$(document).ready(function(){
    $('#input-variation_id').on('change', function() {
      if ( this.value == '3')
      {
        $("#hidden_div").show();
      }
      else
      {
        $("#hidden_div").hide();
      }
    });

	$('#input-variation_id').on('change', function() {
      if ( this.value != '3')
      {
        $("#hidden_div1").show();
      }
      else
      {
        $("#hidden_div1").hide();
      }
    });
});

</script>