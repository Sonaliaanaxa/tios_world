


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
                                <a href="{{route('delivery-charges.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
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
                <form method='post'  action="{{ route('delivery-charges.create') }}"  enctype="multipart/form-data">
          @csrf
            @include('admin.layouts.flash_msg')

                  <div class="service-fields mb-3">
                

                    <div class="row">
                

                      <label class="col-sm-2 col-form-label">{{ __('Delivery Charges*')  }}</label>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group{{ $errors->has('delivery_charges') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('delivery_charges') ? ' is-invalid' : '' }}" name="delivery_charges" id="input-delivery_charges" type="number" placeholder="{{ __(' Delivery Charges') }}"  value="{{ old('delivery_charges') }}"  aria-required="true"/>
                      @if ($errors->has('delivery_charges'))
                        <span id="delivery_charges-error" class="error text-danger" for="input-delivery_charges">Delivery Charges is Empty!</span>
                      @endif
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
