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
						<a href="{{route('trial-products.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
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
						<form method='post' action="{{ route('trial-products.update',$id) }}" enctype="multipart/form-data">
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
												<option value='{{ $c->id}}' {{ ($c->id==$product->category_id)?'selected':''}}> {{ $c->name}} </option>
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
												<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Product Name') }}" value="{{ $product->name }}" aria-required="true" />
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
												<input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Product Slug') }}" value="{{$product->slug }}" aria-required="true" />
												@if ($errors->has('slug'))
												<span id="slug-error" class="error text-danger" for="input-slug">Slug is Empty!</span>
												@endif
											</div>

										</div>
									</div>
								
									</div>

								</div>
								<br>

								<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
									Price 
								</h4>
								<div class="row">
									<label class="col-sm-2 col-form-label">{{ __('Purchase Price*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('purchase_price') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('purchase_price') ? ' is-invalid' : '' }}" name="purchase_price" id="input-purchase_price" type="number" placeholder="{{ __(' Purchase Price') }}" value="{{ $product->purchase_price }}" aria-required="true" />
											@if ($errors->has('purchase_price'))
											<span id="purchase_price-error" class="error text-danger" for="input-purchase_price">Purchase Price is Empty!</span>
											@endif
										</div>
									</div>



									<label class="col-sm-2 col-form-label">{{ __('Selling Price*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('selling_price') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }}" name="selling_price" id="input-selling_price" type="number" placeholder="{{ __(' Selling Price') }}" value="{{ $product->selling_price }}" aria-required="true" />
											@if ($errors->has('selling_price'))
											<span id="selling_price-error" class="error text-danger" for="input-selling_price">Selling Price is Empty!</span>
											@endif
											<span id="err_selling_price" style="color:red;font-size:12px;"></span>
										</div>

									</div>

									
									<label class="col-sm-2 col-form-label">{{ __('Quantity  *') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"  
											id="input-quantity" type="number" placeholder="{{ __(' Quantity ') }}" value="{{  $product->quantity }}"  name="quantity" aria-required="true" />
											@if ($errors->has('quantity'))
											<span id="quantity-error" class="error text-danger" for="input-quantity">Quantity is Empty!</span>
											@endif
											<span id="err_quantity" style="color:red;font-size:12px;"></span>
										</div>
									</div>
                              	<label class="col-sm-2 col-form-label">{{ __('Tios Point*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('tios_points') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('tios_points') ? ' is-invalid' : '' }}"  id="input-tios_points" name="tios_points" type="number" placeholder="{{ __(' Tios Point') }}" style='background-color:#fafafa;' value="{{  $product->tios_points }}" aria-required="true" />
											@if ($errors->has('tios_points'))
											<span id="tios_points-error" class="error text-danger" for="input-tios_points">Tax Price is Empty!</span>
											@endif
										</div>
									</div>
								
								</div>
	                     <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
									Stock & Quantity
								</h4>

								<div class='row'>


									<label class="col-sm-2 col-form-label">{{ __('Weight*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" id="input-weight" type="text" placeholder="{{ __(' Weight') }}" value="{{  $product->weight }}" aria-required="true" />

											@if ($errors->has('weight'))
											<span id="weight-error" class="error text-danger" for="input-weight">Weight is Empty!</span>
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
								<label class="col-sm-2 col-form-label">{{ __(' Details*') }}</label>
								<div class="col-sm-10">
									<div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" id="input-details" type="text" placeholder="{{ __('Details') }}" value="{{  $product->details }}" aria-required="true" />

										@if ($errors->has('details'))
										<span id="details-error" class="error text-danger" for="input-details"> Details is Empty!</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Trail Product Details & Features*')  }}</label>
								<div class="col-sm-10 col-md-10">
									<div class="form-group{{ $errors->has('extra_details') ? ' has-danger' : '' }}">
										<textarea class="form-control{{ $errors->has('extra_details') ? ' is-invalid' : '' }}" name="extra_details" id="input-extra_details" type="extra_details" value="{{ $product->extra_details }}" placeholder="{{ __('Trail Product Extra Details') }}" />
										{{ old('extra_details') }}
										</textarea>
										<script>
											CKEDITOR.replace('input-extra_details');
										</script>
										@if ($errors->has('extra_details'))
										<span id="extra_details-error" class="error text-danger" for="input-extra_details">Trail Product Details is Empty!</span>
										@endif
									</div>
								</div>

							</div>

							<br>

							<div class="row" id="file-content">
								<label class="col-sm-2 col-form-label">{{ __('Upload  Image*')}}</label>
								<div class="col-sm-10">



									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<br>
									<img src="{{ asset('/uploads/products') }}/{{ $product->upload_image }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<br>


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

							{{-- <label class="col-sm-2 col-form-label">{{ __('Show on Website*') }}</label>
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
							</div> --}}
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