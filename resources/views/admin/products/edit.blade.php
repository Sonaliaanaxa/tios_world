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
						@if(Auth::user()->user_type=='admin')
						<a href="{{route('products.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
						@else
						<a href="{{route('seller-products.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
						@endif
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
						<form method='post' action="{{ route('products.update',$id) }}" enctype="multipart/form-data">
							@csrf
							@include('admin.layouts.flash_msg')

							<div class="service-fields mb-3">
								<div class="row">
									<label class="col-sm-2 col-form-label">{{ __('Select Category *')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
										<select type="text" name="category_id" class="form-control">
                                        <option value="" disabled selected>Select Category</option>
										@if($categories)
                                            @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}" {{ ($category->id==$product->category_id)?'selected':''}}  style="font-size:15px;font-weight:700;">{{$category->name}}</option>
                                                @if(count($category->subcategory))
                                                    @include('admin.categories.subCategoryList-option',['subcategories' => $category->subcategory])
                                                @endif
                                            @endforeach
                                        @endif

                                           

                                    </select>

											
											@if ($errors->has('category_id'))
											<span id="category_id-error" class="error text-danger" for="categoryList">Category is Empty!</span>
											@endif
										</div>
									</div>

									
									<label class="col-sm-2 col-form-label">{{ __('Product Name*') }}</label>
									<div class="col-sm-4">
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __(' Name') }}" value="{{ $product->name }}" aria-required="true" />
											@if ($errors->has('name'))
											<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
											@endif
										</div>
									</div>


									<!-- <label class="col-sm-2 col-form-label">{{ __('Product Slug')  }}</label>
									<div class="col-sm-6 col-md-4">
										<div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
											<div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
												<input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Product Slug') }}" value="{{ $product->slug }}" aria-required="true" />
												@if ($errors->has('slug'))
												<span id="slug-error" class="error text-danger" for="input-slug">Slug is Empty!</span>
												@endif
											</div>

										</div>
									</div> -->
								</div>


							</div>

							<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
								Price & Discount
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
										<span id="selling_price-error" style="color:red;font-size:12px;"></span>
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Discount % *') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" readonly name="discount" id="input-discount" type="number" placeholder="{{ __(' Discount %') }}" value="{{ $product->discount }}" style='background-color:#fafafa;' aria-required="true" />
										@if ($errors->has('discount'))
										<span id="discount-error" class="error text-danger" for="input-discount">Discount is Empty!</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Saving Price*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('saving') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('saving') ? ' is-invalid' : '' }}" readonly name="saving" id="input-saving" type="number" placeholder="{{ __(' Saving Price') }}" style='background-color:#fafafa;' value="{{ $product->saving }}" aria-required="true" />
										@if ($errors->has('saving'))
										<span id="saving-error" class="error text-danger" for="input-saving">Saving Price is Empty!</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Tax Types*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('tax_type') ? ' has-danger' : '' }}">
										<select class="custom-select {{ $errors->has('tax_type') ? ' is-invalid' : '' }}" name='tax_type' id="input-tax_type">
											<option value='{{ $product->tax_type }}'>{{ $product->tax_type }}</option>
											<option value='GST' {{ ('GST'==old('tax_type'))?'selected':''}}> GST </option>

										</select> @if ($errors->has('tax_type'))
										<span id="tax_type-error" class="error text-danger" for="input-tax_type">Tax Types is Empty!</span>
										@endif
									</div>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Tax %*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('tax') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('tax') ? ' is-invalid' : '' }}" name="tax" id="input-tax" type="number" placeholder="{{ __(' Tax %') }}" value="{{ $product->tax }}" aria-required="true" />
										@if ($errors->has('tax'))
										<span id="tax-error" class="error text-danger" for="input-tax">Tax is Empty!</span>
										@endif
									</div>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Tax Price*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('tax_price') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('tax_price') ? ' is-invalid' : '' }}" readonly name="tax_price" id="input-tax_price" type="number" placeholder="{{ __(' Tax Price') }}" style='background-color:#fafafa;' value="{{ $product->tax_price }}" aria-required="true" />
										@if ($errors->has('tax_price'))
										<span id="tax_price-error" class="error text-danger" for="input-tax_price">Tax Price is Empty!</span>
										@endif
									</div>
								</div>
							</div>

							<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
								Stock & Quantity
							</h4>

							<div class='row'>
								<label class="col-sm-2 col-form-label">{{ __('Unit*') }}</label>
								<div class="col-sm-6 col-md-4">
									<div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
										<select class="custom-select {{ $errors->has('unit') ? ' is-invalid' : '' }}category" name='unit'>
											<option value=''>Select Unit</option>
											@foreach($units as $c)
											<option value='{{ $c->id}}' {{ ($c->id==$product->unit)?'selected':''}}> {{ $c->name}} </option>
											@endforeach
										</select>
										@if ($errors->has('unit'))
										<span id="unit-error" class="error text-danger" for="categoryList">Unit is Empty!</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Weight*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" id="input-weight" type="text" placeholder="{{ __(' Weight') }}" value="{{ $product->weight }}" aria-required="true" />

										@if ($errors->has('weight'))
										<span id="weight-error" class="error text-danger" for="input-weight">Weight is Empty!</span>
										@endif
									</div>
								</div>
								
								<label class="col-sm-2 col-form-label">{{ __('Current Stock*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('current_stock') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('current_stock') ? ' is-invalid' : '' }}" name="current_stock" id="input-current_stock" type="number" placeholder="{{ __(' Current Stock') }}" value="{{ $product->current_stock }}" aria-required="true" />

										@if ($errors->has('current_stock'))
										<span id="current_stock-error" class="error text-danger" for="input-current_stock">Current Stock is Empty!</span>
										@endif
									</div>
								</div>

							</div>

							<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
								Origin Details
							</h4>

							<div class='row'>
								<label class="col-sm-2 col-form-label">{{ __('Origin*') }}</label>
								<div class="col-sm-10">
									<div class="form-group{{ $errors->has('origin') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('origin') ? ' is-invalid' : '' }}" name="origin" id="input-origin" type="text" placeholder="{{ __('Origin') }}" value="{{ $product->origin }}" aria-required="true" />

										@if ($errors->has('origin'))
										<span id="origin-error" class="error text-danger" for="input-origin">Origin Details is Empty!</span>
										@endif
									</div>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Type*') }}</label>
								<div class="col-sm-10">
									<div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="input-type" type="text" placeholder="{{ __('Type') }}" value="{{ $product->type }}" aria-required="true" />

										@if ($errors->has('type'))
										<span id="type-error" class="error text-danger" for="input-type">Type Details is Empty!</span>
										@endif
									</div>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Certification*') }}</label>
								<div class="col-sm-10">
									<div class="form-group{{ $errors->has('certification') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('certification') ? ' is-invalid' : '' }}" name="certification" id="input-certification" type="text" placeholder="{{ __('Certification') }}" value="{{ $product->certification }}" aria-required="true" />

										@if ($errors->has('certification'))
										<span id="certification-error" class="error text-danger" for="input-certification">Short Details is Empty!</span>
										@endif
									</div>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Upload Map*')}}</label>
								<div class="col-sm-10">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myMap' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/map') }}/{{ $product->map }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>
							</div>

							<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
								Upload Images
							</h4>

							<div class="row" id="file-content">
								<label class="col-sm-2 col-form-label">{{ __('Product Front Image*')}}</label>
								<div class="col-sm-4">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myFrontImage' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/products') }}/{{ $product->upload_image }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Product Back Image*')}}</label>
								<div class="col-sm-4">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myBackImage' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/products') }}/{{ $product->back_image }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Gallery Image1*')}}</label>
								<div class="col-sm-4">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage1' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/gallery') }}/{{ $product->image1 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Gallery Image2*')}}</label>
								<div class="col-sm-4">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage2' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/gallery') }}/{{ $product->image2 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Gallery Image3*')}}</label>
								<div class="col-sm-4">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage3' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/gallery') }}/{{ $product->image3 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>
								<label class="col-sm-2 col-form-label">{{ __('Gallery Image4*')}}</label>
								<div class="col-sm-4">
									<input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg" name='myImage4' id="myImage" class="form-control" title="Upload image" class="add-input" onChange="displayImage1(this)">
									<img src="{{ asset('/uploads/gallery') }}/{{ $product->image4 }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
									<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
								</div>

							</div>
							<h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
								Advance Features
							</h4>

							<div class='row'>

								<label class="col-sm-2 col-form-label">{{ __('Short Details*') }}</label>
								<div class="col-sm-10">
									<div class="form-group{{ $errors->has('short_details') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('short_details') ? ' is-invalid' : '' }}" name="short_details" id="input-short_details" type="text" placeholder="{{ __(' Short Details') }}" value="    {{ $product->short_details }}" aria-required="true" />

										@if ($errors->has('short_details'))
										<span id="short_details-error" class="error text-danger" for="input-short_details">Short Details is Empty!</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Product Details & Features*')  }}</label>
								<div class="col-sm-10 col-md-10">
									<div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
										<textarea class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" id="input-details" type="details" value="{{ old('details') }}" placeholder="{{ __('Product Details') }}" />
										{{ $product->details }}
										</textarea>

										@if ($errors->has('details'))
										<span id="details-error" class="error text-danger" for="input-details">Product Details is Empty!</span>
										@endif
									</div>
								</div>



							</div>



							<div class="row" id="file-content">
								<label class="col-sm-2 col-form-label">{{ __('Status*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
										<select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status">
											<option value='{{ $product->status }}'>Select Status</option>
											<option value='1' {{ ('1'==$product->status)?'selected':''}}> Active </option>
											<option value='0' {{ ('0'==$product->status)?'selected':''}}> Inactive</option>
										</select> @if ($errors->has('status'))
										<span id="status-error" class="error text-danger" for="input-status"> Status</span>
										@endif
									</div>
								</div>

								<label class="col-sm-2 col-form-label">{{ __('Show on Website*') }}</label>
								<div class="col-sm-4">
									<div class="form-group{{ $errors->has('is_show') ? ' has-danger' : '' }}">
										<select class="custom-select {{ $errors->has('is_show') ? ' is-invalid' : '' }}" name='is_show' id="input-is_show">
											<option value='{{ $product->is_show }}'>Wants to Show on Website?</option>
											<option value='1' {{ ('1'==$product->is_show)?'selected':''}}> Yes </option>
											<option value='0' {{ ('0'==$product->is_show)?'selected':''}}> No</option>
										</select> @if ($errors->has('is_show'))
										<span id="is_show-error" class="error text-danger" for="input-is_show"> Show on Website</span>
										@endif
									</div>
								</div>

								<div class="submit-section">
									<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
								</div>



							</div>

					</div>

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

	(function($) {
		"use strict";
		$.fn.openSelect = function() {
			return this.each(function(idx, domEl) {
				if (document.createEvent) {
					var event = document.createEvent("MouseEvents");
					event.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
					domEl.dispatchEvent(event);
				} else if (element.fireEvent) {
					domEl.fireEvent("onmousedown");
				}
			});
		}
	}(jQuery));



	let subCategories = <?php echo (json_encode($subcategories)) ?>;
	$('#subcategoryList').click();
	let selectedSubCategoryId = parseInt(<?php echo $product->subcategory_id ?>);
	subCategoryDOM(<?php echo $product->category_id ?>, selectedSubCategoryId)
	$('#categoryList').on('change', function() {
		subCategoryDOM($(this).val(), selectedSubCategoryId)
	});

	function subCategoryDOM(catId, subCatId) {
		let currentCategorySubCategory = subCategories.filter(v => v.category_id == catId);
		let optionDom = '';
		currentCategorySubCategory.map((v) => {
			optionDom += `<option value='${v.id}' selected=${selectedSubCategoryId == v.id}>${v.name}</option>`;
			return true
		})
		$("#subcategoryList").html(optionDom) //enable subcategory select
		$("#subcategoryList").attr('disabled', false); //enable subcategory select
	}
</script>