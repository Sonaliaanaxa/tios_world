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
                        <li class="breadcrumb-item">Total Products - {{ $pCount}}</li>

                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="{{route('products.create')}}" class="btn btn-primary float-right mt-2"><i class='fa fa-plus-circle'> {{ __('New') }}</i></a>
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
                                            @sortablelink('img',__('Image'))
                                        </th>

                                        <th>
                                            @sortablelink('name',__('Product'))
                                        </th>

                                        <th>
                                            @sortablelink('category_id',__('Category'))
                                        </th>
                                        <th>
                                            @sortablelink('price',__('Price & Discount'))
                                        </th>
                                       



                                        <th>
                                            @sortablelink('stock',__('Current Stock'))
                                        </th>


                                        <th>
                                            @sortablelink('status',__('Status'))

                                        </th>
                                        <th>
                                            @sortablelink('action',__('Action'))

                                        </th>




                                </thead>
                                <tbody id="myTable">
                                    <?php $i = 0; ?>
                                    @foreach($products as $r)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>

                                            @if($r->upload_image)
                                            <a href="{{ asset('/uploads/products') }}/{{ $r->upload_image }}" target='_blank'> <img src="{{ asset('/uploads/products') }}/{{ $r->upload_image }}" style='height:50px;width:50px;border-radius:5%;' /></a>
                                            @else
                                            <p class='text-center' style='padding-top:15px;height:55px;width:55px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                                {{ substr($r->name,0,1) }}
                                            </p>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $r->name }}
                                        </td>

                                        <td>
                                            <strong>Category:</strong> {{ $r->category_name }}<br>
                                            <!-- <strong>Subcategory:</strong> {{ $r->subcategory_name }} -->
                                        </td>
                                        <td>
                                            <span style='color:#1d77fb;font-size:12px;'>Purchase Price - &#8377 {{ $r->purchase_price }}</span>
                                            <p style='color:#f2511e;font-size:10px;margin-top:-2px;'>Saving :{{ $r->saving }} </p>
                                            <p style='color:gray;font-size:10px;margin-top:-14px;'>Selling Price : <span>&#8377 {{ $r->selling_price }} </span> </p>
                                            <p style='color:gray;font-size:10px;margin-top:-14px;'>Discount : {{ $r->discount }}% </span> </p>
                                        </td>

                                         
                                        <td>
                                            {{$r->current_stock}} Products
                                        </td>
                                        <td>
                                            @if($r->status==1)

                                            <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }} </i>
                                            @else
                                            <i class='fa fa-question-circle' style='color:gold;'>{{ __(' Not Active') }} </i>
                                            @endif
                                        </td>
                                        <td>

                                            {{--<a href="{{route('products.view',$r->id)}}" target='_blank' style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                                            <i class="fa fa-eye"></i></a>--}}
                                            <br>
                                            <a href="{{route('products.update',$r->id)}}" style='color:#0099cc;font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
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
                url: "{{route('products.destroy')}}",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success == 1) {
                        //    selector.closest('tr').hide('slow');
                        swal("Success!", "Product Successfully Deleted!", "success");

                    }

                    location.reload();

                }
            });
        });
    });
</script>