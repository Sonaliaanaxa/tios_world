


@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							
            <div class="col-md-12" >
        @include('admin.layouts.flash_msg')
          <div class="card card-chart" >
            <div class="card-header  card-header-default" >
            <h4 class="card-title">{{ __($title) }}
            <a  href="{{route('products.update',$id)}}"  class="btn btn-primary float-right" ><i class='fa fa-edit-left mr-1'>  {{ __('Edit') }}</i> </a>
          
        
                </h4>

            </div>
           
           
            <div class="row">
            <div class="col-md-10 offset-1">
          <div class="card card-chart">
           
            <div class="card-body">
            
            <div class="row">
            <div class="col-md-6">
            <table class="table text-center">
                    <thead class=" text-default" style='color:blue;'>
                    <th>  Features </th>
                    <th> Value </th>
                    </thead>
                    <tbody> 
                     <tr>
                        <th> {{__('Product Name')}} </th>
                         <td> {{ $product->name }}</td>
                       </tr>
                    
                      
                       <tr>
                        <th> {{__('MRP')}} </th>
                         <td>{{ $product->currency }}  {{ $product->mrp }}</td>
                       </tr>
                       <tr>
                        <th> {{__('Price')}} </th>
                         <td> {{ $product->currency }}  {{ $product->price }}</td>
                       </tr>
                       <tr>
                        <th> {{__('Discount')}} </th>
                         <td> {{ $product->discount }} %</td>
                       </tr>
                    
                       <tr>
                        <th> {{__('Tax Types')}} </th>
                         <td>{{ $product->tax_type }}</td>
                       </tr>
                       <th> {{__('Tax')}} </th>
                         <td> {{ $product->tax }} %</td>
                       </tr>
                       <tr>
                        <th> {{__('Tax Price')}} </th>
                         <td>{{ $product->tax_price }} </td>
                       </tr>
                       <tr>
                        <th> {{__('Stock')}} </th>
                         <td>@if($product->stock==1)  <i class='fa fa-check-circle' style='color:green;'> {{ __('In Stock') }}  </i>
                                  @else
                                  <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Out of Stock') }} </i> 
                                  @endif
                          </td>
                       </tr>
                      
                       <tr>
                        <th> {{__('Status')}} </th>
                         <td> 
                          @if($product->status==1)<i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                          @else
                           <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Not Active') }} </i> 
                           @endif
                          </td>
                       </tr>
                     <tr>
                        <th> {{__('Product Short Details')}} </th>
                        <td>{{ $product->short_details }} </td>
                       </tr>

                       <tr>
                        <th> {{__('Product Details')}} </th>
                         <td>   
                         <?php 
                         $p= $product->description;
                         $p= htmlspecialchars_decode($p);
                                echo $p;
                                ?>
                                </td>
                       </tr>

                     
                       <tr>

                        <th> {{__('Created On')}} </th>
                         <td>{{ $product->created_at->format('d F, Y') }}</td>
                     
                       </tr>
                       <tr>
                        <th> {{__('Updated On')}} </th>
                         <td>{{ $product->updated_at->format('d F, Y') }}</td>
                       </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
            <p class="card-category float-right"  style='color:black;'>   <img src="{{ asset('/uploads/products') }}/{{ $product->upload_image }}" style='height:200;width:200px;'/></p>
          
            </div>
            </div>

            
            </div>
          </div>
        </div>
        
          </div>
		 
        </div>
        </div>		
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
    <!-- /Main Wrapper -->
  
    @push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush