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
						<a href="{{route('products.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
						<form method='post' action="{{ route('products.create') }}" enctype="multipart/form-data">
							@csrf
							@include('admin.layouts.flash_msg')

							<div class="service-fields mb-3">


								<div class="row">
									<label class="col-sm-2 col-form-label">{{ __('Select Category *')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}category" name='category_id' id="categoryList">
												<option selected disabled>Select Category</option>
												@foreach($categories as $c)
												<option value='{{ $c->id}}' {{ ($c->id==old('category_id'))?'selected':''}}> {{ $c->name}} </option>
												@endforeach
											</select>
											@if ($errors->has('category_id'))
											<span id="category_id-error" class="error text-danger" for="categoryList">Category is Empty!</span>
											@endif
										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Select Subcategory *')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('subcategory_id') ? ' has-danger' : '' }}">
											<select id="subcategoryList" class="custom-select {{ $errors->has('subcategory_id') ? ' is-invalid' : '' }}subcategory" name='subcategory_id' disabled>
												<option value=''>Select Subcategory</option>
												{{-- @foreach($subcategories as $c)
												<option value='{{ $c->id}}' class='parent-{{ $c->category_id }} subcategory'> {{ $c->name}} </option>
												@endforeach --}}
											</select>
											@if ($errors->has('subcategory_id'))
											<span id="subcategory_id-error" class="error text-danger" for="subcategoryList">Please Select Subcategory!</span>
											@endif
										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Product Name')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Product Name') }}" value="{{ old('name') }}" aria-required="true" />
												@if ($errors->has('name'))
												<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
												@endif
											</div>

										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Product Slug')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Product Slug') }}" value="{{ old('Slug') }}" aria-required="true" />
												@if ($errors->has('slug'))
												<span id="slug-error" class="error text-danger" for="input-slug">Slug is Empty!</span>
												@endif
											</div>

										</div>
									</div>
								</div>
								<br>

								<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
									Price & Discount
								</h4>
								<div class="row">
									<label class="col-sm-2 col-form-label">{{ __('Purchase Price*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('purchase_price') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('purchase_price') ? ' is-invalid' : '' }}" name="purchase_price" id="input-purchase_price" type="number" placeholder="{{ __(' Purchase Price') }}" value="{{ old('Purchase Price') }}" aria-required="true" />
											@if ($errors->has('purchase_price'))
											<span id="purchase_price-error" class="error text-danger" for="input-purchase_price">Purchase Price is Empty!</span>
											@endif
										</div>
									</div>



									<label class="col-sm-2 col-form-label">{{ __('Selling Price*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('selling_price') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }}" name="selling_price" id="input-selling_price" type="number" placeholder="{{ __(' Selling Price') }}" value="{{ old('Selling Price ') }}" aria-required="true" />
											@if ($errors->has('selling_price'))
											<span id="selling_price-error" class="error text-danger" for="input-selling_price">Selling Price is Empty!</span>
											@endif
											<span id="err_selling_price" style="color:red;font-size:12px;"></span>
										</div>

									</div>

									
									<label class="col-sm-2 col-form-label">{{ __('Discount % *') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" readonly name="discount" id="input-discount" type="number" placeholder="{{ __(' Discount %') }}" value="{{ old('discount') }}" style='background-color:#fafafa;' aria-required="true" />
											@if ($errors->has('discount'))
											<span id="discount-error" class="error text-danger" for="input-discount">Discount is Empty!</span>
											@endif
										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Saving Price*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('saving') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('saving') ? ' is-invalid' : '' }}" readonly name="saving" id="input-saving" type="number" placeholder="{{ __(' Saving Price') }}" style='background-color:#fafafa;' value="{{ old('saving') }}" aria-required="true" />
											@if ($errors->has('saving'))
											<span id="saving-error" class="error text-danger" for="input-saving">Saving Price is Empty!</span>
											@endif
										</div>
									</div>
									<label class="col-sm-2 col-form-label">{{ __('Tax Types*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('tax_type') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('tax_type') ? ' is-invalid' : '' }}" name='tax_type' id="input-tax_type">
												<option value=''>Select the Tax Types of product?</option>
												<option value='GST' {{ ('GST'==old('tax_type'))?'selected':''}}> GST </option>

											</select> @if ($errors->has('tax_type'))
											<span id="tax_type-error" class="error text-danger" for="input-tax_type">Tax Types is Empty!</span>
											@endif
										</div>
									</div>
									<label class="col-sm-2 col-form-label">{{ __('Tax %*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('tax') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('tax') ? ' is-invalid' : '' }}" name="tax" id="input-tax" type="number" placeholder="{{ __(' Tax %') }}" value="{{ old('tax') }}" aria-required="true" />
											@if ($errors->has('tax'))
											<span id="tax-error" class="error text-danger" for="input-tax">Tax is Empty!</span>
											@endif
										</div>
									</div>
									<label class="col-sm-2 col-form-label">{{ __('Tax Price*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('tax_price') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('tax_price') ? ' is-invalid' : '' }}" readonly name="tax_price" id="input-tax_price" type="number" placeholder="{{ __(' Tax Price') }}" style='background-color:#fafafa;' value="{{ old('tax_price') }}" aria-required="true" />
											@if ($errors->has('tax_price'))
											<span id="tax_price-error" class="error text-danger" for="input-tax_price">Tax Price is Empty!</span>
											@endif
										</div>
									</div>
									<!-- <label class="col-sm-2 col-form-label">{{ __(' Currency*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('currency') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('currency') ? ' is-invalid' : '' }}" name='currency' id="input-currency">
												<option value=''>Select the Currency of Price?</option>
												<option value='&#8377' {{ ('rupee'==old('currency'))?'selected':''}}> INR Rupee </option>

											</select> @if ($errors->has('currency'))
											<span id="currency-error" class="error text-danger" for="input-currency">Currency is Empty!</span>
											@endif
										</div>
									</div> -->
								</div>


								<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
									Stock & Quantity
								</h4>

								<div class='row'>


									<label class="col-sm-2 col-form-label">{{ __('Weight*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" id="input-weight" type="text" placeholder="{{ __(' Weight') }}" value="{{ old('weight') }}" aria-required="true" />

											@if ($errors->has('weight'))
											<span id="weight-error" class="error text-danger" for="input-weight">Weight is Empty!</span>
											@endif
										</div>
									</div>


									<label class="col-sm-2 col-form-label">{{ __('Weight Unit*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('unit') ? ' is-invalid' : '' }}" name='unit' id="input-unit">
												<option value=''>Select the weight unit of product?</option>
												<option value='kg' {{ ('kg'==old('unit'))?'selected':''}}> Kg </option>
												<option value='ltr' {{ ('ltr'==old('unit'))?'selected':''}}> Ltr</option>
												<option value='gm' {{ ('gm'==old('unit'))?'selected':''}}> gm</option>
												<option value='ml' {{ ('ml'==old('unit'))?'selected':''}}> ml</option>
												<option value='piece' {{ ('piece'==old('unit'))?'selected':''}}> Piece</option>
											</select> @if ($errors->has('unit'))
											<span id="unit-error" class="error text-danger" for="input-unit">Unit is Empty!</span>
											@endif
										</div>
									</div>

									<label class="col-sm-2 col-form-label">{{ __('Current Stock*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('current_stock') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('current_stock') ? ' is-invalid' : '' }}" name="current_stock" id="input-current_stock" type="number" placeholder="{{ __(' Current Stock') }}" value="{{ old('current_stock') }}" aria-required="true" />

											@if ($errors->has('current_stock'))
											<span id="current_stock-error" class="error text-danger" for="input-current_stock">Current Stock is Empty!</span>
											@endif
										</div>
									</div>
								</div>

							</div>
							<br>
							<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
								Advance Features
							</h4>
							<div class='row'>
							</div>

							<div class='row'>
								<label class="col-sm-2 col-form-label">{{ __('Short Details*') }}</label>
								<div class="col-sm-10">
									<div class="form-group{{ $errors->has('short_details') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('short_details') ? ' is-invalid' : '' }}" name="short_details" id="input-short_details" type="text" placeholder="{{ __(' Short Details') }}" value="{{ old('short_details') }}" aria-required="true" />

										@if ($errors->has('short_details'))
										<span id="short_details-error" class="error text-danger" for="input-short_details">Short Details is Empty!</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Product Details & Features*')  }}</label>
								<div class="col-sm-10 col-md-10">
									<div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
										<textarea class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" id="input-details" type="details" value="{{ old('details') }}" placeholder="{{ __('Product Details') }}" />
										{{ old('details') }}
										</textarea>
										<script>
											CKEDITOR.replace('input-details');
										</script>
										@if ($errors->has('details'))
										<span id="details-error" class="error text-danger" for="input-details">Product Details is Empty!</span>
										@endif
									</div>
								</div>

							</div>

							<br>

							<div class="row" id="file-content">
								<label class="col-sm-2 col-form-label">{{ __('Upload  Image*')}}</label>
								<div class="col-sm-10">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
								
								<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
							</div>

							<br>								
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

							<label class="col-sm-2 col-form-label">{{ __('Show on Website*') }}</label>
							<div class="col-sm-4">
								<div class="form-group{{ $errors->has('is_show') ? ' has-danger' : '' }}">
									<select class="custom-select {{ $errors->has('is_show') ? ' is-invalid' : '' }}" name='is_show' id="input-is_show">
										<option value=''>Wants to Show on Website?</option>
										<option value='1' {{ ('1'==old('is_show'))?'selected':''}}> Yes </option>
										<option value='0' {{ ('0'==old('is_show'))?'selected':''}}> No</option>
									</select> @if ($errors->has('is_show'))
									<span id="is_show-error" class="error text-danger" for="input-is_show">Select Website Show </span>
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
<script>
	//Bitcoin
	$(document).ready(function() {

		$("#input-selling_price").keyup(function() {
			var purchase_price = $("#input-purchase_price").val();

			if (purchase_price == null || purchase_price == '') {
				document.getElementById("err_purchase_price").innerHTML = "Please enter the Purchase Price to calculate discount!";
			} else {
				var selling_price = $("#input-selling_price").val();
				var purchase_bitcoin = purchase_price * 0.000000239;
				var selling_bitcoin = selling_price * 0.000000239;
				$('input[name=\'purchase_bitcoin\']').val(purchase_bitcoin);
				$('input[name=\'selling_bitcoin\']').val(selling_bitcoin);
			}
		});
	});

	$(document).ready(function() {

		$("#input-selling_price").keyup(function() {
			var purchase_price = $("#input-purchase_price").val();

			if (purchase_price == null || purchase_price == '') {
				document.getElementById("err_purchase_price").innerHTML = "Please enter the Purchase Price to calculate discount!";
			} else {
				var selling_price = $("#input-selling_price").val();
				var saving = selling_price - purchase_price;
				var discount = ((selling_price / purchase_price)).toFixed(1);
				$('input[name=\'saving\']').val(saving);
				$('input[name=\'discount\']').val(discount);
			}
		});
	});

	$(document).ready(function() {

		$("#input-tax").keyup(function() {
			var selling_price = $("#input-selling_price").val();

			if (selling_price == null || selling_price == '') {
				document.getElementById("err_selling_price").innerHTML = "Please enter the Selling Price to calculate Tax Price!";
			} else {
				var tax = $("#input-tax").val();

				var tax_price = (selling_price * (tax / 100)).toFixed(1);
				$('input[name=\'tax_price\']').val(tax_price);

			}
		});
	});

	let subCategories = <?php echo (json_encode($subcategories)) ?>;
	$('#categoryList').on('change', function() {
		let currentCategorySubCategory = subCategories.filter(v => v.category_id == $(this).val());
		console.log(currentCategorySubCategory);
		let optionDom = '';
		currentCategorySubCategory.map((v) => {
			optionDom += `<option value='${v.id}'>${v.name}</option>`;
			return true
		})
		$("#subcategoryList").html(optionDom) //enable subcategory select
		$("#subcategoryList").attr('disabled', false); //enable subcategory select
	});
</script>