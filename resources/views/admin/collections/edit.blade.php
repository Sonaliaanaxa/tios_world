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

                  <div class="form-group col-md-6">
                    <label for="category">Collection Title</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Collection Name') }}" value="{{$collection->name}}" aria-required="true" />
                      @if ($errors->has('name'))
                      <span id="name-error" class="error text-danger" for="input-name">Title is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6">
                    <label class="category">{{ __('Select Product*')  }}</label>
                    <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                      <select class="custom-select {{ $errors->has('product_id') ? ' is-invalid' : '' }}department" name='product_id[]' id="input-product_id" multiple>
                        <option value=''>Select Product</option>
                        @foreach($products as $c)
                        <option value='{{ $c->id}}' {{ ($c->id==$collection->product_id)?'selected':''}}> {{ $c->name}} </option>
                        @endforeach
                      </select>
                      @if ($errors->has('product_id'))
                      <span id="product_id-error" class="error text-danger" for="input-product_id">Product is Empty!</span>
                      @endif
                    </div>
                  </div>

                <div class="col-sm-6">
										<label class="category">{{ __('Status*') }}</label>
										<div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
										<select  class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status"   >
										<option value='{{ $collection->status }}'>{{ $collection->status }}</option>
										<option value='1' {{ ('1'==$collection->status)?'selected':''}}> Active </option>  
										<option value='0' {{ ('0'==$collection->status)?'selected':''}}> Inactive</option>		
										
										</select>  @if ($errors->has('status'))
											<span id="status-error" class="error text-danger" for="input-status">Please Select Status!</span>
										@endif
										</div>
									</div> 

                  <div class="form-group col-md-6">
                                                <label for="category">{{ __('Upload  Image')}}</label>
                                                <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                  
                                                          <label htmlFor="myImage" >
                                                            <input type="file" class="upload"  name="myImage" 
                                                            accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                                                          id="myImage"
                                                            /></label>
                                                            <br>
                                                      <img src="{{ asset('/uploads/collections') }}/{{ $collection->img }}" style='margin-bottom:30px;height:200px;width:250px;border-radius:5%;'/>
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