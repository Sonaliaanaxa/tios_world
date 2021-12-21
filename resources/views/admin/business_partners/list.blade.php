@include("admin.layouts.sidebar")

<!-- Page Wrapper -->
<div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __($title) }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total businesspartners -  {{ $cCount}}</li>
                                
                            </ul>
                        </div>
                        <!-- <div class="col-sm-5 col">
                        <a href="{{route('business.partners.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
                        </div> -->
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
                                    <thead class=" text-default" style='color:whitesmoke;'>
                                            <tr>
                                            <th>
                         
                         @sortablelink('id',__('S No')) 
                     </th>
                     <th>
                     @sortablelink('img',__('Image'))  
                     
                     </th>
                      <th>
                      @sortablelink('name',__('BusinessPartner'))  
                     </th>
                     <th>
                      @sortablelink('link',__('Link'))  
                     </th>
                     
                     <th>
                     @sortablelink('created_at',__('Added At'))  
                     
                     </th>
                     <th>
                     @sortablelink('action',__('Action'))  
                     
                     </th>
                   
                                            </tr>
                                        </thead>
                     <tbody id="myTable"> 
                    <?php $i=0; ?>
                      @foreach($businesspartners as $r)
                      <?php $i++; ?>
                        <tr>
                        <td>
                        <?php echo $i; ?>
                          </td>
                      
                     <td>
                               
                               @if($r->img)
                                 <a href="{{ asset('public/uploads/businesspartners') }}/{{ $r->img }}" target='_blank'> <img src="{{ asset('public/uploads/businesspartners') }}/{{ $r->img }}" style='height:60px;width:80px;border-radius:5%;'/></a>
                                @else
                                <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                {{ substr($r->name,0,1) }}
                                </p>
                                @endif 
                           </td>
                             <td>
                              <b>{{$r->name}} </b>
                                 
                             </td>
                             <td>
                              <b>{{$r->link}} </b>
                                 
                             </td>
                        
                         
               
                          <td>
                          {{ $r->created_at->format('d F, Y') }}
                       
                          </td>
                         
                          <td>
                          
                           <a href="{{route('business.partners.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>

                      <!--    <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-businesspartners' title="Delete" data-id="{{$r->id}}">
                         <i class="fa fa-trash"></i>
                         </a> -->
                          </td>
                        
                        </tr>
                      @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $businesspartners->appends(request()->except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->


    

    
    </div>
    <!-- /Main Wrapper -->



  <script>
        $(document).ready(function() {
            $('.delete-businesspartners').on('click', function (e) {
                if (!confirm("Are you sure to Delete?")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('business.partners.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "BusinessPartner Type Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>


