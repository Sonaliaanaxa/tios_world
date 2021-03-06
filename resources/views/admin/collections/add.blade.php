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
						<a href="{{route('collections.list')}}" class="btn btn-primary float-right"><i class='fa fa-arrow-left'> {{ __('Back') }}</i> </a>
					</h3>

				</div>
			</div>
		</div>

		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body custom-edit-service">
						<form method='post' action="{{ route('collections.create') }}" enctype="multipart/form-data">
							@csrf
							@include('admin.layouts.flash_msg')

							<div class="service-fields mb-3">
								<div class="row">

								<div class="form-group col-md-6">
										<label for="category">Collection Name</label>
										<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Collection Name') }}" value="{{ old('name') }}" aria-required="true" />
											@if ($errors->has('name'))
											<span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
											@endif
										</div>
									</div>	

								
									<div class="form-group col-md-6">
										<label for="category">Collection Slug</label>
										<div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
											<input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Collection Slug') }}" value="{{ old('slug') }}" aria-required="true" />
											@if ($errors->has('slug'))
											<span id="slug-error" class="error text-danger" for="input-slug">Slug is Empty!</span>
											@endif
										</div>
									</div>

									<div class="col-sm-6 col-md-6">
										<label class="category">{{ __('Select Category *')  }}</label>
										<div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}category" name='category_id' id="categoryList">
												<option selected disabled>Select Category</option>
												@if($categories)
												@foreach($categories as $category)
												<?php $dash = ''; ?>
												<option value="{{$category->id}}" style="font-size:15px;font-weight:700;">{{$category->name}}</option>
												@if(count($category->subcategory))
												@include('admin.categories.subCategoryList-option',['subcategories' => $category->subcategory])
												@endif
												@endforeach
												@endif
											</select>
										</div>
									</div>
								</div>
								
								<h5>Select Curated Products</h5>	
								<div class="row" style="border:1px solid #ced4da;padding:30px;border-radius:10px;"  id="dynamicTable">
								<div class="col-sm-6">
										<label class="category">{{ __('Select Product Type*') }}</label>
										<div class="form-group{{ $errors->has('product_collection_type') ? ' has-danger' : '' }}">
											<select class="custom-select {{ $errors->has('product_collection_type') ? ' is-invalid' : '' }}" name='product_collection_type' id="input-product_collection_type">
												<option value='' selected disabled>Select Product Collection Type</option>
												<option value='curated' {{ ('curated'==old('product_collection_type'))?'selected':''}}> Curated </option>
												<option value='trial' {{ ('trial'==old('product_collection_type'))?'selected':''}}> Trial</option>
												<option value='sponsored' {{ ('sponsored'==old('product_collection_type'))?'selected':''}}> Sponsored</option>
												<option value='other' {{ ('other'==old('product_collection_type'))?'selected':''}}> Other</option>
											</select> @if ($errors->has('product_collection_type'))
											<span id="product_collection_type-error" class="error text-danger" for="input-product_collection_type"> Please Select Product Collection Type!</span>
											@endif
										</div>
									</div> 

									<div class="col-sm-6 col-md-6">
										<label>{{ __('Select Curated Products*')  }}</label>
										<div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
											<select id="subcategoryList" class="custom-select {{ $errors->has('product_id') ? ' is-invalid' : '' }}subcategory" name='product_id[]' disabled multiple>
												<option value=''>Select Products</option>
												{{-- @foreach($products as $c)
												<option value='{{ $c->id}}' class='parent-{{ $c->category_id }} subcategory'> {{ $c->name}} </option>
												@endforeach --}}
											</select>
											@if ($errors->has('product_id'))
											<span id="product_id-error" class="error text-danger" for="subcategoryList">Please Select Product!</span>
											@endif
										</div>
									</div>
									<div class="col-md-12 float-left">
              	 					<button type="button" name="add" id="add" class="btn btn-success" style="float:right">Add More</button>
									</div>

								</div>
								
								<div class="row">
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

							
									<div class="form-group col-md-6">
										<label for="category">{{ __('Upload  Collection Image')}}</label>
										<div class="upload-img">
											<div class="change-photo-btn">
												<label htmlFor="myImage">
													<input type="file" class="upload" name="myImage" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage" /></label>
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
<script>
	let products = <?php echo (json_encode($products)) ?>;
	let users = <?php echo (json_encode($users)) ?>;
	$('#categoryList').on('change', function() {
		let currentCategorySubCategory = products.filter(v => v.category_id == $(this).val());
		let optionDom = '';
		currentCategorySubCategory.map((v) => {
			optionDom += `<option value='${v.id}'>${v.name} by ${v.user_name}</option>`;
			return true
})
		$("#subcategoryList").html(optionDom) //enable subcategory select
		$("#subcategoryList").attr('disabled', false); //enable subcategory select
	});
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>