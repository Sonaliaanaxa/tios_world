@include("admin.layouts.sidebar")
    <!-- Page Wrapper -->
    <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">{{ __($title) }}
                            <a href="{{route('patient.create')}}"  class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
                            </h3>
                         
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Total Patient -  {{ $dCount}}</li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                @include('admin.layouts.flash_msg')
                <div class="row">
              
                  
              <div class="col-sm-3">
                <div class="form-group">
                  <input class="form-control" id="myInput" onkeyup="myFunction()"  type="text" placeholder="{{ __('Search..') }}"  aria-required="true"/>
                </div>
              
            </div>
            </div>
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
                                            @sortablelink('name',__('Patient'))  
                                            </th>
                                            <th>
                                            @sortablelink('email',__('Contact'))  
                                            </th>
                                         
                                            <th>
                                            @sortablelink('gender',__('Personal Info'))  
                                            </th>
                                         
                                            <th>
                                                @sortablelink('address',__('Address'))  
                                                </th>
                                                
                                                <th>
                                                @sortablelink('status',__('Status')) 
                                                
                                                </th>
                                                <th>
                                                @sortablelink('created_at',__('Member Since'))  
                                                
                                                </th>
                                                
                                                <th>
                     @sortablelink('action',__('Action'))  
                     
                     </th>
                                               
                                               

                                            </tr>
                                        </thead>
                                        <tbody id="myTable"> 
                                        <?php $i=0; ?>
                                        @foreach($patients as $r)
                                        <?php $i++; ?>
                                            
                                            <tr>

                                            <td>
                                            <?php echo $i; ?>
                                            </td>
                                          
                                                <td>
                                                    <h2 class="table-avatar">
                                                    @if($r->img)
                                                        <a href="{{ asset('public/uploads/profile_img') }}/{{ $r->img }}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ asset('public/uploads/profile_img') }}/{{ $r->img }}" alt="User Image"></a>
                                                        @else
                                                        <p class='text-center' style='margin-right: 12px;padding-top:8px;height:40px;width:40px;border-radius:50%; background-color:#0099cc;color:white;font-size:21px;'>
                                                        {{ substr($r->name,0,1) }}
                                                        </p>
                                                        @endif
                                                        <a href="{{route('patient.view',$r->id)}}">{{ $r->name }}</a>
                                                    </h2>
                                                </td>
                                                </td>
                                            
                                            <td>
                                            
                                            <i class='fa fa-envelope'> </i> {{ $r->email }}<br>
                                            <i class='fa fa-phone'> </i> {{ $r->mobile }}
                                            </td>
                                            <td>
                                                <?php 
                                                if($r->gender){
                                                
                                                ?>
                            {{ $r->gender }},<br>
                            <?php
                                                }
                                                else{
                                                    echo"-";
                                                }
                            ?>
                            <?php
                              if($r->dbd){
                                  ?>
                            <span style="color:blue;">Date of birth: </span>{{ $r->dbd }}
                            <?php
                              }  else{
                                                    echo"-";
                                                }
                            ?>
                          </td>  <td>
                          {{ $r->address }}
                          </td>
                          <td>
                          @if($r->status==1)
                          
                          <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                          @else
                           <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Inactive') }} </i> 
                           @endif
                         
                          </td>
       
                                             
                          <td>
                          {{ $r->created_at->format('Y-m-d') }}<br>
                          {{ $r->created_at->format('H:i:s') }}
                          </td>
                            
                        
                          <td>
						    <a href="{{route('my.user.update.password',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-key"></i></a>
                          
                          <a href="{{route('patient.view',$r->id)}}"  target='_blank' style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-eye"></i></a>
<br>
                           <a href="{{route('patient.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-edit"></i></a>

                         <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-patient' title="Delete" data-id="{{$r->id}}">
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
                        {!! $patients->appends(request()->except('page'))->render() !!}
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    
  <script>
        $(document).ready(function() {
            $('.delete-patient').on('click', function (e) {
                if (!confirm("Are you sure to Delete?")) {
                    e.preventDefault();
                    return false;
                }

                var id = $(this).data('id');
              
                $.ajax({
                    type: 'POST',
                    url:"{{route('patient.destroy')}}",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                             swal("Success!", "Patient Successfully Deleted!", "success");
                             
                        }

                       location.reload();
                       
                    }
                });
            }); });
  </script>
