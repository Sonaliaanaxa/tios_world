


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
                                <a href="{{route('subscription.plans.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                <form method='post'  action="{{ route('subscription.plans.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

									<div class="service-fields mb-3">
								

                    <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Select Business Partners*')  }}</label>
                      <div class="col-sm-6 col-md-4">
                        <div class="form-group{{ $errors->has('buspart_id') ? ' has-danger' : '' }}">
                        <select  class="custom-select {{ $errors->has('buspart_id') ? ' is-invalid' : '' }}business_partners" name='buspart_id' id="input-buspart_id"   >
                                <option value=''>Select Business Partners</option>
                                @foreach($businesspartners as $c)
                                <option value='{{ $c->id}}' {{ ($c->id==old('buspart_id'))?'selected':''}} > {{ $c->name}} </option> 
                                @endforeach </select>
                              @if ($errors->has('buspart_id'))
                            <span id="buspart_id-error" class="error text-danger" for="input-buspart_id">business_partners is Empty!</span>
                          @endif
                        </div>
                      </div>
                      <label class="col-sm-2 col-form-label">{{ __('Plan Name*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('plan_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('plan_name') ? ' is-invalid' : '' }}" name="plan_name" id="input-plan_name" type="text" placeholder="{{ __(' Plan Name') }}"  value="{{ old('plan_name') }}"  aria-required="true"/>
                      @if ($errors->has('plan_name'))
                        <span id="plan_name-error" class="error text-danger" for="input-plan_name">Plan Name is Empty!</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                  
                 
              
<br>


                <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
                Price & Tax
                </h4>
              

                <div class="row"> 
        

                  <label class="col-sm-2 col-form-label">{{ __('Price*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="number" placeholder="{{ __(' Price') }}"  value="{{ old('price') }}"  aria-required="true"/>
                      @if ($errors->has('price'))
                        <span id="price-error" class="error text-danger" for="input-price">Price is Empty!</span>
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
                  
                  <label class="col-sm-2 col-form-label">{{ __('Total Price*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('total_price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('total_price') ? ' is-invalid' : '' }}" readonly name="total_price" id="input-total_price" type="number" placeholder="{{ __('Total Price') }}"  value="{{ old('total_price') }}"  aria-required="true"/>
                      @if ($errors->has('total_price'))
                        <span id="total_price-error" class="error text-danger" for="input-total_price">Price is Empty!</span>
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


              
                  <br>
                  <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#196988;border-radius:5px;margin:17px 0px;'>
                      Advance Features
                </h4>


                <div class='row'>
                
                
                  <label class="col-sm-2 col-form-label">{{ __('Status*') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status"   >
                            <option value=''>Select the status</option>
                            <option value='1' {{ ('1'==old('status'))?'selected':''}}> Activate </option>  
                            <option value='0' {{ ('0'==old('status'))?'selected':''}}> Deactivate</option>
                       </select>  @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status"> Status</span>
                      @endif
                    </div>
                  </div> 
                  <label class="col-sm-2 col-form-label">{{ __('Vaild*') }}</label>
                  <div class="col-sm-4">
                   
                    <div class="form-group{{ $errors->has('vaild') ? ' has-danger' : '' }}">
                           <select  class="custom-select {{ $errors->has('vaild') ? ' is-invalid' : '' }}" name="vaild" id="input-vaild" >
                                <option value=''>Select the  Vaild Month?</option>
                                <option value='1' {{ ('1'==old('vaild'))?'selected':''}}> 1 Month </option> 
                                <option value='3' {{ ('3'==old('vaild'))?'selected':''}}> 3 Month </option>  
                                <option value='6' {{ ('6'==old('vaild'))?'selected':''}}> 6 Month </option> 
                                <option value='12' {{ ('12'==old('vaild'))?'selected':''}}> 12 Month </option> 
                          </select>
                     
                      @if ($errors->has('vaild'))
                        <span id="vaild-error" class="error text-danger" for="input-vaild">Vaild is Empty!</span>
                      @endif
                    </div>
                  </div>

                 
                  </div>


                  <div class='row'>
                  <label class="col-sm-2 col-form-label">{{ __('Subscription Plan Details*')  }}</label>
                  <div class="col-sm-10 col-md-10">
                    <div class="form-group{{ $errors->has('details') ? ' has-danger' : '' }}">
                    <textarea class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}"  name="details" id="input-details" type="details" value="{{ old('details') }}" placeholder="{{ __('Product Details') }}"  />
                    {{ old('details') }}
                      </textarea>
                      <script>
                        CKEDITOR.replace( 'input-details' );
                      </script>
                           @if ($errors->has('details'))
                        <span id="details-error" class="error text-danger" for="input-details">Product Details is Empty!</span>
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
           
            $("#input-tax").keyup(function(){
              var price=$("#input-price").val();
            
              if(price==null || price=='')
              {
                document.getElementById("err_price").innerHTML = "Please enter the Price to calculate Tax Price!";
              }
              else{
              var tax=$("#input-tax").val();

              var tax_price=(price*(tax/100)).toFixed(2);
              $('input[name=\'tax_price\']').val(tax_price);
        

             
             
             
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
              var tax_price=(price*(tax/100));
              var total_price=parseFloat(price) + parseFloat(tax_price);
           
              $('input[name=\'total_price\']').val(total_price);

             
             
             
              }
            });
          });
</script>


