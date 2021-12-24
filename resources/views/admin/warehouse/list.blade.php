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
                        <li class="breadcrumb-item">Total Warehouse - {{ $pCount}}</li>

                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="{{route('warehouse.create')}}" class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
                </div>
            </div>
        </div>
        @include('admin.layouts.flash_msg')
        <div class="row">


            <div class="col-sm-3">
                <div class="form-group">
                    <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="{{ __('Search..') }}" aria-required="true" />
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
                                            @sortablelink('name',__('Warehouse Name'))
                                        </th>
                                        <th>
                                            @sortablelink('address',__('Address'))
                                        </th>
                                        <th>
                                            @sortablelink('Contact Person details',__('Contact Person Details'))
                                        </th>

                                        <th>
                                            @sortablelink('status',__('Status'))

                                        </th>
                                        <th>
                                            @sortablelink('action',__('Action'))

                                        </th> </thead>
                                <tbody id="myTable">
                                    <?php $i = 0; ?>
                                    @foreach($products as $r)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            {{ $r->name }}
                                        </td>

                                        <td>
                                            <strong>Address:</strong> {{ $r->address }}<br>
                                            <strong>Pincode:</strong> {{ $r->pincode }}
                                        </td>

                                        <td>
                                            <strong>Name:</strong> {{ $r->contact_person_name }}<br>
                                            <strong>Phone:</strong> {{ $r->contact_person_no }}
                                        </td>
                                       <td>
                                            @if($r->status==1)

                                            <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }} </i>
                                            @else
                                            <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Not Active') }} </i>
                                            @endif
                                        </td>
                                        <td>

                                            
                                            <a href="{{route('warehouse.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                                                <i class="fa fa-edit"></i></a>
                                            <br>
                                            <a href="javascript:;" style='color:#0099cc;font-size:16px;padding-right:15px;' class='delete-product' title="Delete" data-id="{{$r->id}}">
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
                {!! $products->appends(request()->except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->





</div>
<!-- /Main Wrapper -->



<script>
    $(document).ready(function() {
        $('.delete-product').on('click', function(e) {
            if (!confirm("Are you sure? It can't be undone.")) {
                e.preventDefault();
                return false;
            }

            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: "{{route('warehouse.destroy')}}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                        swal("Success!", "Warehouse Successfully Deleted!", "success");

                    }

                    location.reload();

                }
            });
        });
    });
</script>