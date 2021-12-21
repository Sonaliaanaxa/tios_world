
@include("admin.layouts.sidebar")
<!-- Page Wrapper -->
<div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __($title) }}</h3>
                            
                        </div>
                        @if(count($products)< 1)
                        <div class="col-sm-5 col">
                        <a href="{{route('delivery-charges.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
                        </div>
                        @endif
                    </div>
                </div>
                @include('admin.layouts.flash_msg')
              <div class="row">
              
                  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                    </div>
                  
                </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                        
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                            <th>
                         
                         @sortablelink('id',__('S No')) 
                     </th>
                     <th>
                      @sortablelink('img',__('Delivery Charges'))  
                     </th>
                    
                     <th>
                     @sortablelink('status',__('Status')) 
                   
                     </th>
                     <th>
                     @sortablelink('action',__('Action')) 
                   
                     </th>
                   
                   
                   
                    
                   </thead>
                   <tbody id="myTable"> 
                   <?php $i=0; ?>
                   @foreach($products as $r)
                     <?php $i++; ?>
                       <tr>
                       <td>
                       <?php echo $i; ?>
                         </td>
                        
                           <td>
                                 {{ $r->delivery_charges }} 
                            </td>
                         
            
                         <td>
                         @if($r->status==1)
                         
                         <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                         @else
                          <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Not Active') }} </i> 
                          @endif
                         </td>
                         <td>
                         
                          <a href="{{route('delivery-charges.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                        <i class="fa fa-edit"></i></a>
                        <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-delivery-charges' title="Delete" data-id="{{$r->id}}">
                        <i class="fa fa-trash"></i>
                        </a>
                         </td>
                       
                       </tr>
                       @endforeach
                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->


    

    
    </div>
    <!-- /Main Wrapper -->



  <script>
        $(document).ready(function() {
            $('.delete-delivery-charges').on('click', function (e) {
                if (!confirm("Are you sure? It can't be undone.")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('delivery-charges.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Delivery Charge Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>


