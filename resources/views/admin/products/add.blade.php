


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
                                <a href="{{route('products.mylist')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                <form method='post'  action="{{ route('products.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

                  <div class="service-fields mb-3">
                

                    <div class="row">
                

                      <label class="col-sm-2 col-form-label">{{ __('Product Name')  }}</label>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __(' Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                      @endif
                    </div>
                        
                    </div>
                
                     <label class="col-sm-2 col-form-label">{{ __('Slug')  }}</label>
                     <div class="col-sm-6 col-md-4">
                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __(' Slug') }}"  value="{{ old('slug') }}"  aria-required="true"/>
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
                <label class="col-sm-2 col-form-label">{{ __('MRP*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('mrp') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('mrp') ? ' is-invalid' : '' }}" name="mrp" id="input-mrp" type="number" placeholder="{{ __(' MRP') }}"  value="{{ old('mrp') }}"  aria-required="true"/>
                      @if ($errors->has('mrp'))
                        <span id="mrp-error" class="error text-danger" for="input-mrp">MRP is Empty!</span>
                      @endif
                      <span id="err_mrp" style="color:red;font-size:12px;"></span>
                    </div>
                 
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Price*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="number" placeholder="{{ __(' Price') }}"  value="{{ old('price') }}"  aria-required="true"/>
                      @if ($errors->has('price'))
                        <span id="price-error" class="error text-danger" for="input-price">Price is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Discount % *') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" readonly name="discount" id="input-discount" type="number" placeholder="{{ __(' Discount %') }}"  value="{{ old('discount') }}" style='background-color:#fafafa;' aria-required="true"/>
                      @if ($errors->has('discount'))
                        <span id="discount-error" class="error text-danger" for="input-discount">Discount is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Saving Price*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('saving') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('saving') ? ' is-invalid' : '' }}" readonly name="saving" id="input-saving" type="number" placeholder="{{ __(' Saving Price') }}" style='background-color:#fafafa;'  value="{{ old('saving') }}"  aria-required="true"/>
                      @if ($errors->has('saving'))
                        <span id="saving-error" class="error text-danger" for="input-saving">Saving Price is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Tax Types*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('tax_type') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('tax_type') ? ' is-invalid' : '' }}" name='tax_type' id="input-tax_type"   >
                            <option value=''>Select the Tax Types of product?</option>
                            <option value='GST' {{ ('GST'==old('tax_type'))?'selected':''}}> GST </option>  
                           
                       </select>  @if ($errors->has('tax_type'))
                        <span id="tax_type-error" class="error text-danger" for="input-tax_type">Tax Types is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Tax %*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('tax') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tax') ? ' is-invalid' : '' }}" name="tax" id="input-tax" type="number" placeholder="{{ __(' Tax %') }}"  value="{{ old('tax') }}"  aria-required="true"/>
                      @if ($errors->has('tax'))
                        <span id="tax-error" class="error text-danger" for="input-tax">Tax is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Tax Price*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('tax_price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tax_price') ? ' is-invalid' : '' }}" readonly name="tax_price" id="input-tax_price" type="number" placeholder="{{ __(' Tax Price') }}" style='background-color:#fafafa;'  value="{{ old('tax_price') }}"  aria-required="true"/>
                      @if ($errors->has('tax_price'))
                        <span id="tax_price-error" class="error text-danger" for="input-tax_price">Tax Price is Empty!</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __(' Currency*') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('currency') ? ' has-danger' : '' }}">
                        <select  class="custom-select {{ $errors->has('currency') ? ' is-invalid' : '' }}" name='currency' id="input-currency"   >
                                <option value=''>Select the  Currency of Price?</option>
                                <option value='&#36' {{ ('dollars'==old('currency'))?'selected':''}}> US Dollars </option> 
                                <option value='&#8377' {{ ('rupee'==old('currency'))?'selected':''}}>  INR Rupee </option>  
                              
                          </select>  @if ($errors->has('currency'))
                            <span id="currency-error" class="error text-danger" for="input-currency">Currency is Empty!</span>
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
                    <input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"  name="weight" id="input-weight" type="text" placeholder="{{ __(' Weight') }}"   value="{{ old('weight') }}"  aria-required="true"/>
                    
                     @if ($errors->has('weight'))
                        <span id="weight-error" class="error text-danger" for="input-weight">Weight is Empty!</span>
                      @endif
                    </div>
                  </div>


                  <label class="col-sm-2 col-form-label">{{ __('Weight Unit*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('unit') ? ' is-invalid' : '' }}" name='unit' id="input-unit"   >
                            <option value=''>Select the weight unit of product?</option>
                            <option value='kg' {{ ('kg'==old('unit'))?'selected':''}}> Kg </option>  
                            <option value='ltr' {{ ('ltr'==old('unit'))?'selected':''}}> Ltr</option>
                            <option value='gm' {{ ('gm'==old('unit'))?'selected':''}}> gm</option>
                            <option value='ml' {{ ('ml'==old('unit'))?'selected':''}}> ml</option>
                            <option value='pc' {{ ('pc'==old('unit'))?'selected':''}}> Pc</option>
                       </select>  @if ($errors->has('unit'))
                        <span id="unit-error" class="error text-danger" for="input-unit">Unit is Empty!</span>
                      @endif
                    </div>
                  </div>

                

                      <label class="col-sm-2 col-form-label">{{ __('Current Stock*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('current_stock') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('current_stock') ? ' is-invalid' : '' }}"  name="current_stock" id="input-current_stock" type="text" placeholder="{{ __(' Current Stock') }}"   value="{{ old('current_stock') }}"  aria-required="true"/>
                    
                     @if ($errors->has('current_stock'))
                        <span id="current_stock-error" class="error text-danger" for="input-current_stock">Current Stock is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Min Qty*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('min_qty') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('min_qty') ? ' is-invalid' : '' }}"  name="min_qty" id="input-min_qty" type="text" placeholder="{{ __(' Minimum Qty') }}"   value="{{ old('min_qty') }}"  aria-required="true"/>
                    
                     @if ($errors->has('min_qty'))
                        <span id="min_qty-error" class="error text-danger" for="input-min_qty">Minimum Qty is Empty!</span>
                      @endif
                    </div>
                  </div>


                  </div>
                  
                
                 
                  <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
                      Advance Features
                </h4>


                <div class='row'>
                
                
                  <label class="col-sm-2 col-form-label">{{ __('Status*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status"   >
                            <option value=''>Select the status of product</option>
                            <option value='1' {{ ('1'==old('status'))?'selected':''}}> Activate </option>  
                            <option value='0' {{ ('0'==old('status'))?'selected':''}}> Deactivate</option>
                       </select>  @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status"> Status</span>
                      @endif
                    </div>
                  </div> 
         
                 
                  </div>


                  <div class='row'>
                  <label class="col-sm-2 col-form-label">{{ __('Short Details*') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('short_details') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('short_details') ? ' is-invalid' : '' }}"  name="short_details" id="input-short_details" type="text" placeholder="{{ __(' Short Details') }}"   value="{{ old('short_details') }}"  aria-required="true"/>
                    
                     @if ($errors->has('short_details'))
                        <span id="short_details-error" class="error text-danger" for="input-short_details">Short Details is Empty!</span>
                      @endif
                    </div>
                  </div>
                  
                     <label class="col-sm-2 col-form-label">{{ __('Product Details & Features*')  }}</label>
                  <div class="col-sm-10 col-md-10">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  name="description" id="input-description" type="description" value="{{ old('description') }}" placeholder="{{ __('Product Description') }}"  />
                    {{ old('description') }}
                      </textarea>
                      <script>
                        CKEDITOR.replace( 'input-description' );
                      </script>
                           @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">Product Description is Empty!</span>
                      @endif
                    </div>
                  </div>

                </div>

                  <br>

                <div class="row"  id="file-content" >
                          <label class="col-sm-2 col-form-label">{{ __('Upload  Image*')}}</label>
                          <div class="col-sm-10">
             


                            <input type='file' accept="image/x-png,image/gif,image/jpeg,image/jpg"  name='myImage' id="myImage" class="form-control"  title="Upload image" class="add-input" onChange="displayImage1(this)" > 
                              
                                        
                          </div>
                          <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                </div>
                            
                           
                  
                <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
                      Meta Title & Description
                </h4>


                <div class='row'>
                  <label class="col-sm-2 col-form-label">{{ __('Meta Title*') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('meta_title') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}"  name="meta_title" id="input-meta_title" type="text" placeholder="{{ __(' Meta Title*') }}"   value="{{ old('meta_title') }}"  aria-required="true"/>
                    
                     @if ($errors->has('meta_title'))
                        <span id="meta_title-error" class="error text-danger" for="input-meta_title">Meta Title is Empty!</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Meta Description*') }}</label>
                    <div class="col-sm-10 col-md-10">
                    <div class="form-group{{ $errors->has('meta_description') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}"  name="meta_description" id="input-meta_description" type="meta_description" value="{{ old('meta_description') }}" placeholder="{{ __('Meta Description') }}"  />
                    {{ old('meta_description') }}
                      </textarea>
                      <script>
                        CKEDITOR.replace( 'input-meta_description' );
                      </script>
                           @if ($errors->has('meta_description'))
                        <span id="meta_description-error" class="error text-danger" for="input-meta_description">Meta Description is Empty!</span>
                      @endif
                    </div>
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
          $(document).ready(function(){
           
            $("#input-price").keyup(function(){
              var mrp=$("#input-mrp").val();
            
              if(mrp==null || mrp=='')
              {
                document.getElementById("err_mrp").innerHTML = "Please enter the mrp to calculate discount!";
              }
              else{
              var price=$("#input-price").val();
              var saving=mrp-price;
              var discount=((saving/mrp)*100).toFixed(1);
              $('input[name=\'saving\']').val(saving);
              $('input[name=\'discount\']').val(discount);
              }
            });
          });
</script>

<script>
          $(document).ready(function(){
           
            $("#input-tax").keyup(function(){
              var price=$("#input-price").val();
            
              if(price==null || price=='')
              {
                document.getElementById("err_price").innerHTML = "Please enter the Price to calculate Tax Price!";
              }
              else{
              var tax=$("#input-tax").val();
            
              var tax_price=(price*(tax/100)).toFixed(1);
              $('input[name=\'tax_price\']').val(tax_price);
             
              }
            });
          });
</script>
