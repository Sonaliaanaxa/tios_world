@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
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


            <!-- Add Blog -->
            <form method='post' action="{{route('collections.update',$id)}}" enctype="multipart/form-data">
              @csrf
              @include('admin.layouts.flash_msg')

              <div class="service-fields mb-3">
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <label class="category">{{ __('Select End Level Category *')  }}</label>
                    <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                      <select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}category" name='category_id' id="categoryList">
                        <option selected disabled>Select End Level Category</option>
                        @if($categories)
                        @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}" {{ ($category->id==$collection->category_id)?'selected':''}}  style="font-size:15px;font-weight:700;">{{$category->name}}</option>
                                                @if(count($category->subcategory))
                                                    @include('admin.categories.subCategoryList-option',['subcategories' => $category->subcategory])
                                                @endif
                                            @endforeach
                        @endif
                      </select>

                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6">
                    <label>{{ __('Select Products *')  }}</label>
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



                  <div class="form-group col-md-6">
                    <label for="category">Collection Name</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Collection Name') }}" value="{{$collection->name}}" aria-required="true" />
                      @if ($errors->has('name'))
                      <span id="name-error" class="error text-danger" for="input-name">Title is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="category">Collection Slug</label>
                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Collection Slug') }}" value="{{$collection->slug}}" aria-required="true" />
                      @if ($errors->has('slug'))
                      <span id="slug-error" class="error text-danger" for="input-slug">Slug is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="category">{{ __('Select Product Collection Type*') }}</label>
                    <div class="form-group{{ $errors->has('product_collection_type') ? ' has-danger' : '' }}">
                      <select class="custom-select {{ $errors->has('product_collection_type') ? ' is-invalid' : '' }}" name='product_collection_type[]' id="input-product_collection_type" multiple>
                        <option value='' selected disabled>Select Product Collection Type</option>
                        <option value='{{ $collection->product_collection_type }}' {{ $collection->product_collection_type }}></option>
                        <option value='curated' {{ ('curated'==$collection->product_collection_type)?'selected':''}}> Curated </option>
                        <option value='trial' {{ ('trial'==$collection->product_collection_type)?'selected':''}}> Trial </option>
                        <option value='sponsored' {{ ('sponsored'==$collection->product_collection_type)?'selected':''}}> Sponsored </option>
                        <option value='other' {{ ('other'==$collection->product_collection_type)?'selected':''}}> Other </option>
                      </select> @if ($errors->has('product_collection_type'))
                      <span id="product_collection_type-error" class="error text-danger" for="input-product_collection_type"> Please Select Product Collection Type!</span>
                      @endif
                    </div>
                  </div>


                </div>

                <div class="col-sm-6">
                  <label class="category">{{ __('Status*') }}</label>
                  <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                    <select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status">
                      <option value='{{ $collection->status }}'>{{ $collection->status }}</option>
                      <option value='1' {{ ('1'==$collection->status)?'selected':''}}> Active </option>
                      <option value='0' {{ ('0'==$collection->status)?'selected':''}}> Inactive</option>

                    </select> @if ($errors->has('status'))
                    <span id="status-error" class="error text-danger" for="input-status">Please Select Status!</span>
                    @endif
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="category">{{ __('Upload  Image')}}</label>
                  <div class="upload-img">
                    <div class="change-photo-btn">

                      <label htmlFor="myImage">
                        <input type="file" class="upload" name="myImage" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="myImage" /></label>
                      <br>
                      <img src="{{ asset('/uploads/collections') }}/{{ $collection->img }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;' />
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
<script>
  let products = <?php echo (json_encode($products)) ?>;
	$('#categoryList').click();
	let currentCategorySubCategory = parseInt(<?php echo $collection->product_id ?>);
	subCategoryDOM(<?php echo $collection->category_id ?>, currentCategorySubCategory)
	$('#categoryList').on('change', function() {
		subCategoryDOM($(this).val(), currentCategorySubCategory)
	});

	function subCategoryDOM (catId, subCatId){
		let currentCategorySubCategory = products.filter(v => v.category_id == catId);
		let optionDom = '';
		currentCategorySubCategory.map((v) => {
			optionDom += `<option value='${v.id}' selected=${currentCategorySubCategory == v.id}>${v.name}</option>`;
			return true
		})
		$("#subcategoryList").html(optionDom) //enable subcategory select
		$("#subcategoryList").attr('disabled', false); //enable subcategory select
	}

</script>