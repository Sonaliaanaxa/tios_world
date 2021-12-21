@include("home.layouts.header") 

<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			 <div class="header"></div>
			<!-- /Header -->
			

			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				@include('home.layouts.flash_msg')
				    <!-- Search -->

					<div class="search-box ">
					<form action="{{route('searched.blood.bank')}}" method="post" style='padding:0px;'> 
			         @csrf
					
                        <div class="form-group search-location">
                            
                            <input type="text" name="searched" class="form-control" placeholder="Search Location">
                            <span class="form-text">Based on your Location</span>
                        </div>
                        
                        <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                    </form>
                </div>

                <!-- /Search -->
                @foreach($users as $r)
					<!-- Doctor Widget -->
					<div class="card">
                  
						<div class="card-body">
                      
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
                                    @if($r->img)
                               <img src="{{ asset('public/uploads/profile_img') }}/{{ $r->img }}" style='height:150px;width:150px;border-radius:5%;'/>
                            @else
                                <p class='text-center' style='padding-top:15px;height:100px;width:140px;border-radius:50%; background-color:#0099cc;color:white;font-size:26px;'>
                                  {{ substr($r->name,0,1) }}
                                </p>
                            @endif
										
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{$r->name}}</h4>
										<p class="doc-speciality">{{ $r->biography }}</p>
										<p class="doc-speciality">{{ $r->email }}</p>
										<p class="doc-speciality">{{ $r->mobile }}</p>
								
										<div class="clinic-details">
                                       
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $r->address}}</a></p>
										
										</div>
										
									</div>
								</div>
								<div class="doc-info-right">
								<div class="clini-infos">
										<ul>
											<li><b>City : </b> {{ $r->city }}, </li>
											<li><b>State : </b>{{ $r->state }},</li>
											<li><b>Country : </b>{{ $r->country }}, </li>
											<li><b>Zipcode : </b>{{ $r->zipcode }}.</li>
											
										</ul>
									</div>
								
									<div class="clinic-booking">
										<a class="apt-btn" href="{{route('blood.bank.details',$r->id)}}">Send Enquiry</a>
									</div>
								</div>
							</div>

                          



						</div>
                        <br>
                      
					</div>
                    @endforeach
					{!! $users->appends(request()->except('page'))->render() !!}
					<!-- /Doctor Widget -->
                    </div>
					
							</div>
						</div>
					
				
	
		
	</body>

    @include("home.layouts.footer")