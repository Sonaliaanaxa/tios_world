@include("admin.layouts.sidebar")
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{ __($title) }}
                        <a href="{{route('customer.create')}}" class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
                    </h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Total Sellers - {{ $dCount}}</li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        @include('admin.layouts.flash_msg')
        <div class="row">


            <div class="col-sm-3">
                <div class="form-group">
                    <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="{{ __('Search..') }}" aria-required="true" />
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
                                            @sortablelink('logo',__('Logo'))
                                        </th>
                                        <th>
                                            @sortablelink('name',__('Name'))
                                        </th>
                                        <th>
                                            @sortablelink('email',__('Contact'))
                                        </th>
                                        <th>
                                            @sortablelink('user_type',__('Role'))
                                        </th>

                                        <!-- <th>
                                                @sortablelink('approve',__('Approval')) 
                                                
                                                </th> -->

                                        <th>
                                            @sortablelink('created_at',__('Created At'))

                                        </th>

                                        <th>
                                            @sortablelink('action',__('Action'))

                                        </th>



                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php $i = 0; ?>
                                    @foreach($customer as $r)
                                    <?php $i++; ?>

                                    <tr>

                                        <td>
                                            <?php echo $i; ?>
                                        </td>

                                        <td>

                                            @if($r->logo)
                                            <a href="{{ asset('/uploads/profile_img') }}/{{ $r->logo }}"><img src="{{ asset('/uploads/profile_img') }}/{{ $r->logo }}" alt="User Logo" style="height:50px;width:50px;"></a>
                                            @else
                                            <p class='text-center' style='margin-right: 12px;padding-top:8px;height:40px;width:40px;border-radius:50%; background-color:#0099cc;color:white;font-size:21px;'>
                                                {{ substr($r->name,0,1) }}
                                            </p>
                                            @endif


                                        </td>
                                        <td>
                                            {{ $r->name }}
                                        </td>
                                        </td>

                                        <td>

                                            <i class='fa fa-envelope'> </i> {{ $r->email }}<br>
                                            <i class='fa fa-phone'> </i> {{ $r->phone }}
                                        </td>

                                        <td>
                                            {{ $r->user_type }}
                                        </td>


                                        <!-- <td>
                               
                               <select id="{{ $r->id}}" style='width:112px;'  class="custom-select approve" name='approve'   >
                             
                               
                                 <option value='1' {{ ('1'== $r->approve)?'selected':''}}> Approve</option>
                                 <option value='0' {{ ('0'== $r->approve)?'selected':''}}> Not Approve  </option>  
                                 
                              
                               </select> 
                          </td>
                      -->



                                        <td>
                                        {{ $r->created_at->format('d F, Y') }}
                                        </td>


                                        <td>
                                            <!-- <a href="{{route('my.user.update.password',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                         <i class="fa fa-key"></i></a> -->



                                            <a href="{{route('customer.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                                                <i class="fa fa-edit"></i></a>

                                            <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-customer' title="Delete" data-id="{{$r->id}}">
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
                {!! $customer->appends(request()->except('page'))->render() !!}
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


<script>
    $(document).ready(function() {
        $('.delete-customer').on('click', function(e) {
            if (!confirm("Are you sure to Delete?")) {
                e.preventDefault();
                return false;
            }

            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: "{{route('customer.destroy')}}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                        swal("Success!", "Customer Successfully Deleted!", "success");

                    }

                    location.reload();

                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.approve').on('change', function() {

            var id = $(this).attr('id');
            var approve = $(this).val();


            if (!confirm("Confirm if you want to update approve status?")) {
                e.preventDefault();
                return false;
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('user.approve.update') }}",
                data: {
                    id: id,
                    approve: approve,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success == 1) {

                        swal("Success!", "Approve Status Successfully Updated!", "success");
                    } else {

                        swal("Error!", "Error Occurred!", "waring");
                    }
                    //  location.reload();

                }
            });
        });

    });
</script>