@include("home.layouts.header")            
 <!--Main Content data load Hear from controller-->
 <section class="ls-wrapper">

   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title" style='padding-bottom:20px;padding-top:30px;'>
                    <h3>All Categories</h3>
                </div>
            
            </div>
        </div>
    </div>


    <div class="container-fluid" style="margin-top:20px;margin-bottom:80px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach(getCategory() as $r)
                      
                        <div class="col-lg-2  remove-padding"   style=" padding: 3px;border: 1px solid #ccc; text-align: center;margin:20px;">
                            @if($r->img)
                                <a href="{{route('products',$r->id)}}"> <img src="{{ asset('public/uploads/categories') }}/{{ $r->img }}" style='height:150px;width:200px;border-radius:5%;'/></a>
                            @else
                                <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($r->name,0,1) }}
                                </p>
                            @endif
                            <div class="info">
                                <div class="title">
                                    <h3 class="title-bold">
                                        <a href="{{route('products',$r->id)}}" class="font-color-black" style="font-size: 14px;color:black;">
                                              {{$r->name}}
                                        </a>
                                    </h3>
                                </div>
                            </div>  
                                  
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    </section>








    

<!--main-ends-->

@include("home.layouts.footer")