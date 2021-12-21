<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $title ?? "MedTo - Dashboard"}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('material/admin') }}/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('material/admin/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('material/admin/css/style.css') }}">
<style>

.user-menu.nav > li > a > i {
    
    color: black;
}
.user-menu.nav > li > a {
    color: black !important;
    }
 
</style>

</head>

<body class="{{ $class ?? '' }}">
         @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
     
        @endauth 

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="{{ route('home')}}"class="logo">
                   <img src="{{ asset('uploads/logo') }}/{{ getWeb()->logo }}"  alt="Logo" style="height:100px;width:150px;">
                </a>
                <a href="{{ route('home')}}" class="logo logo-small">
                    <img src="{{ asset('uploads/logo') }}/{{ getWeb()->logo }}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <!-- <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">
        <!-- Order -->
        <li class="nav-item dropdown noti-dropdown">
                    <a href="{{ route('home')}}" class="dropdown-toggle nav-link" >
                        <i class="fa fa-home text-primary"></i> 
                    </a>
                    </li>
               <!--  @if(auth()->user()->user_type=='admin')
        <li class="nav-item dropdown noti-dropdown">
                    <a href="{{ route('orders.new')}}" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart"></i> <span class="badge badge-pill">@if(newOrders()>0) <span class='notification-counts' > {{newOrders()}}  </span> @endif </span>
                    </a>
                    </li>
                    @endif -->
                 

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
      
                        <span class="user-img"><h6>Hello <?php  $ar=explode(" ",auth()->user()->name); echo $ar[0];  ?>!</h6></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                           
                            <div class="user-text">
                            <h6>Hello <?php  $ar=explode(" ",auth()->user()->name); echo $ar[0];  ?>!</h6>
                            @if(auth()->user()->user_type=='admin')
                                <p class="text-muted mb-0">Administrator</p>
                                @endif
                                @if(auth()->user()->user_type=='doctor')
                                <p class="text-muted mb-0">Doctor</p>
                                @endif
                                @if(auth()->user()->user_type=='blood_bank')
                                <p class="text-muted mb-0">Blood Bank</p>
                                @endif
                                @if(auth()->user()->user_type=='diagnostic')
                                <p class="text-muted mb-0">Diagnostic</p>
                                @endif
                                @if(auth()->user()->user_type=='hospital')
                                <p class="text-muted mb-0">Hospital</p>
                                @endif
                                @if(auth()->user()->user_type=='pharmacy')
                                <p class="text-muted mb-0">Pharmacy</p>
                                @endif
                                @if(auth()->user()->user_type=='patient')
                                <p class="text-muted mb-0">Patient</p>
                                @endif
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('my.profile.view')}}">My Profile</a>
                 
                        <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

               <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                    @if(auth()->user()->user_type=='admin'|| auth()->user()->user_type=='editor' ||
                        auth()->user()->user_type=='author'  || auth()->user()->user_type=='contributor' ||
                        auth()->user()->user_type=='subscriber')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('admin.dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='doctor')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('doctor.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='blood_bank')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('blood_bank.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='diagnostic')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('diagonostics.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='hospital')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('hospital.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        @endif
                        @if(auth()->user()->user_type=='pharmacy')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('pharmacy.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        @endif
                        @if(auth()->user()->user_type=='patient')
                        <li class="item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
                            <a href="{{ route('patient.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        @endif
                        @if(auth()->user()->user_type=='admin'|| auth()->user()->user_type=='subscriber')
                           <li class="submenu">
                            <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span> Business Partners </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            <li><a href="{{ route('business.partners.list')}}">All Business Partners</a></li>
                                <li><a href="{{ route('doctors.list')}}">Doctors</a></li>
                                <li><a href="{{ route('blood.bank.list')}}">Blood Bank</a></li>
                                <li><a href="{{ route('diagonostics.list')}}">Diagnostic</a></li>
                                <li><a href="{{ route('hospital.list')}}">Hospitals</a></li>
                                <li><a href="{{ route('pharmacy.list')}}">Pharmacy</a></li>
                                <li><a href="{{ route('patient.list')}}">Patients</a></li>
                          
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='pharmacy' ||
                        auth()->user()->user_type=='hospital'  || auth()->user()->user_type=='diagnostic' ||
                        auth()->user()->user_type=='blood_bank' || auth()->user()->user_type=='doctor' || auth()->user()->user_type=='editor')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span> Subscription Plans </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='editor')
                                <li><a href="{{ route('subscription.plans.list')}}">All Subscription Plans</a></li>
                                @endif
                                @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='doctor' || auth()->user()->user_type=='editor')
                                <li><a href="{{ route('subscription.doctors.plans.list')}}">Doctors</a></li>
                                @endif
                                @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='blood_bank' || auth()->user()->user_type=='editor')
                                <li><a href="{{ route('subscription.blood.bank.plans.list')}}">Blood Bank</a></li>
                                @endif
                                @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='editor')
                                <li><a href="{{ route('subscription.diagonostics.plans.list')}}">Diagnostic</a></li>
                                @endif
                                @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='hospital' || auth()->user()->user_type=='editor')
                                <li><a href="{{ route('subscription.hospital.plans.list')}}">Hospitals</a></li>
                                @endif
                                @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='pharmacy' || auth()->user()->user_type=='editor')
                                <li><a href="{{ route('subscription.pharmacy.plans.list')}}">Pharmacy</a></li>
                                @endif
                          
                            </ul>
                        </li>
                        @endif

                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='pharmacy' ||
                        auth()->user()->user_type=='hospital'  || auth()->user()->user_type=='diagnostic' ||
                        auth()->user()->user_type=='blood_bank' || auth()->user()->user_type=='doctor')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i><span> Subscription Pay</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('subscription.payment.list')}}">All Payments</a></li>
                                @endif
                       
                               
                                <li><a href="{{ route('subscription.plans.payment')}}">Payment Choice </a></li>
                                <li><a href="{{ route('subscription.my.payment.list')}}">Payment History</a></li>
                              
                          
                            </ul>
                        </li>
                        @endif
						
         @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='blood_bank' || auth()->user()->user_type=='author')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-tint" aria-hidden="true"></i> <span> Blood Bank </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='author')
                                <li><a href="{{ route('blood.bank.all.request.list')}}">Request</a></li>
                                <li><a href="{{ route('blood.bank.all.donate.list')}}">Donate</a></li>
                                @endif
                                @if(auth()->user()->user_type=='blood_bank')
                                <li><a href="{{ route('blood.bank.my.request.list')}}">Request</a></li>
                                <li><a href="{{ route('blood.bank.my.donate.list')}}">Donate</a></li>
                                @endif
                          
                            </ul>
                        </li>
                        @endif
                                         @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='subscriber')
                            <li class="item{{ $activePage == 'Employee' ? ' active' : '' }}">
                                <a href="{{ route('employee.list')}}"><i class="fa fa-users" aria-hidden="true"></i> <span>{{ __('Employee') }}   </a>
                            </li>
                            @endif
                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='editor')
                            <li class="item{{ $activePage == 'Category' ? ' active' : '' }}">
                                <a href="{{ route('categories.list')}}"><i class="fa fa-filter" aria-hidden="true"></i> <span>{{ __('Categories') }}   </a>
                            </li>
                            @endif

                            @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='pharmacy' || auth()->user()->user_type=='editor')
                           <li class="submenu">
                            <a href="#"><i class="fa fa-medkit" aria-hidden="true"></i> <span> Product </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('products.list')}}">Product List</a></li>
                                @endif
                                <li><a href="{{ route('products.mylist')}}">My Product</a></li>
                                <li><a href="{{ route('products.create')}}">Add Product</a></li>
                            
                          
                            </ul>
                        </li>
                        @endif
                         <?php /*if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='pharmacy' ||
                        auth()->user()->user_type=='hospital'  || auth()->user()->user_type=='diagnostic' ||
                        auth()->user()->user_type=='blood_bank' || auth()->user()->user_type=='doctor' || auth()->user()->user_type=='patient') */?>
                        
                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='pharmacy' || auth()->user()->user_type=='patient')
                        
                        <li class="submenu">
                            <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span> Orders </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='pharmacy')
                            <li><a href="{{ route('my.orders.list')}}">All Orders</a></li>
                            @endif
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('orders.new')}}">New Orders</a></li>
                                <li><a href="{{ route('orders.list')}}">All Orders</a></li>
                                <li><a href="{{ route('orders.processing')}}">Processing Orders</a></li>
                                <li><a href="{{ route('orders.completed')}}">Completed Orders</a></li>
                                <li><a href="{{ route('orders.cancelled')}}">Cancelled Orders</a></li>
                           
                                @endif
                                
                                <li><a href="{{ route('my.orders.his.list')}}">Orders History</a></li>
                                  
                            </ul>
                        </li>
                   @endif
                        
                        @if(auth()->user()->user_type=='pharmacy' || auth()->user()->user_type=='admin')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money" aria-hidden="true"></i> <span>Product Payments </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('payments.new')}}">New Payments </a></li>
                                <li><a href="{{ route('payments.list')}}">All Payments </a></li>
                                <li><a href="{{ route('payments.month')}}">1 Month Payments </a></li>
                                <li><a href="{{ route('payments.year')}}"> 1 Year Payments </a></li>
                                @endif
                                @if(auth()->user()->user_type=='pharmacy')
                               
                             <li><a href="{{ route('seller.payments.list')}}">All Payments </a></li>
                             @endif
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='author' || auth()->user()->user_type=='subscriber')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <span> Messages </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                          
                                <li><a href="{{ route('msg.new')}}">New Message</a></li>
                                <li><a href="{{ route('msg.list')}}">All Message</a></li>
                               
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('ask.question.list')}}"><i class="fa fa-question" aria-hidden="true"></i> <span>AskQuestion</span></a>
                        </li>
                        <li>
                            <a href="{{ route('query.list')}}"><i class="fa fa-question" aria-hidden="true"></i> <span>Queries</span></a>
                        </li>

                        @endif

<!-- ---------sali -->
@if(auth()->user()->user_type=='admin')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Appointment </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            @if(auth()->user()->user_type=='admin')
                                <li><a href="{{ route('patient.appointment.list')}}">Appointment List </a></li>
                                <li><a href="{{ route('appointment.history.list')}}">Appointment History </a></li>
                               
                                @endif
                                @if(auth()->user()->user_type=='pharmacy')
                               
                           <li><a href="{{ route('patient.appointment.list')}}"> My Appointment </a></li>
                             @endif
                            </ul>
                        </li>
                        @endif
						   @if(auth()->user()->user_type=='admin' || 
                        auth()->user()->user_type=='hospital'  || auth()->user()->user_type=='diagnostic' ||
                        auth()->user()->user_type=='doctor'|| auth()->user()->user_type=='editor' || auth()->user()->user_type=='contributor' )
                        <li>
                            <a href="{{ route('reviews.list')}}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                        </li>
                        		   @if(auth()->user()->user_type=='admin' ||  auth()->user()->user_type=='editor' || auth()->user()->user_type=='contributor' )
                        <li>
                    <a href="{{ route('blogs.list')}}"><i class="fa fa-rss" aria-hidden="true"></i> <span>All Blog</span></a>
                        </li>
                          @endif                       <li>
                    <a href="{{ route('my.blogs.list')}}"><i class="fa fa-rss" aria-hidden="true"></i> <span>My Blog</span></a>
                        </li>
                        @endif  


@if(auth()->user()->user_type=='doctor'||auth()->user()->user_type=='hospital'||auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='editor' || auth()->user()->user_type=='contributor' )                   
<li><a href="{{ route('patient.appointment.list')}}"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Appointment List</span> </a></li>
@endif
@if(auth()->user()->user_type=='doctor'||auth()->user()->user_type=='hospital'||auth()->user()->user_type=='admin'||auth()->user()->user_type=='diagnostic' || auth()->user()->user_type=='editor' || auth()->user()->user_type=='contributor' ) 
<li><a href="{{ route('schedule-time')}}"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Schedule Time</span> </a></li>

@endif


                        <!-- @if(auth()->user()->user_type=='patient'||auth()->user()->user_type=='admin')
                        <li>
                            <a href="{{ route('favourite.doctor.like')}}"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>Doctor List</span></a>
                        </li>
 @endif -->
 @if(auth()->user()->user_type=='patient')
                        
                         <li>
                            <a href="{{ route('appointment.history.list')}}"><i class="fa fa-history" aria-hidden="true"></i> <span>Appointment History</span></a>
                        </li>
                         @endif
                        <li>
                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='editor' || auth()->user()->user_type=='editor' )
                        
                        <li>
                            <a href="{{ route('specialities.list')}}"><i class="fa fa-diamond" aria-hidden="true"></i> <span>Specialities</span></a>
                        </li>
                        @endif
                      
                      
                      
                     
                   


                       
                
                       
                      
                        @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='editor')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cogs"></i> <span> Setting </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('web.info')}}"> Website Info </a></li>
                                <!-- <li><a href="{{ route('home.slide.list')}}"> Slide </a></li> -->
                                <li><a href="{{ route('about.list')}}"> About</a></li>
                                <li><a href="{{ route('policy.list')}}"> Privacy Policy</a></li>
                                   <li><a href="{{ route('home.notification.list')}}"> Home Notifications</a></li>
                               
                            </ul>
                        </li>
                        @endif

                        <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('my.profile.view')}}"> My Profile </a></li>
                              
                            </ul>
                        </li>
                   
            
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
    <!-- jQuery -->
    <script src="{{ asset('material/admin') }}/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('material/admin') }}/js/popper.min.js"></script>
    <script src="{{ asset('material/admin') }}/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('material/admin') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="{{ asset('material/admin') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('material/admin') }}/plugins/morris/morris.min.js"></script>
    <script src="{{ asset('material/admin') }}/js/chart.morris.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('material/admin') }}/js/script.js"></script>
        @stack('js')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>
        <script >
         
         $(function()
         {
          $(".select2").select2({ });
        
         });
         $(function()
         {
            $(".select3").select2({ });
         });
         $(function()
         {
          $(".select1").select2({ 
          });
          
        
         });
        
 </script>
</body>

</html>