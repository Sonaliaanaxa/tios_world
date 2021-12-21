
@include("admin.layouts.app")


@include("admin.layouts.sidebar")
@include("admin.layouts.navbar")
<div class="wrapper ">
           
              
 <div class="main-panel">

  <div class="content">
    <div class="container-fluid">
      
      <div class="row">

     

        <div class="col-md-12" >
        @include('admin.layouts.flash_msg')
          <div class="card card-chart" >
            <div class="card-header  card-header-default" >
            <h4 class="card-title">{{ __($title) }}
                <a href="{{route('users.list')}}"  class="btn btn-sm btn-default float-right" style='background-color:white ;color:#0099cc;'><i class='fa fa-arrow-left' style='font-size:12px;'>  {{ __('Back') }}</i> </a>
                <a href="{{route('users.update',$id)}}"class='float-right' style='color:white;font-size:20px;padding-right:15px;' title="Update" >
                             <i class="fa fa-edit"></i></a>
                </h4>

            </div>
           
           
            <div class="row">
            <div class="col-md-10 offset-1">
          <div class="card card-chart">
           
            <div class="card-body">
            
            <div class="row">
            <div class="col-md-6">
            <table class="table text-center">
                    <thead class=" text-default" style='color:whitesmoke;'>
                    <th>  Features </th>
                    <th> Value </th>
                    </thead>
                    <tbody> 
                     <tr>
                        <th> {{__('Name')}} </th>
                         <td> {{ $user->name }}</td>
                       </tr>
                       <tr>
                        <th> {{__('ID')}} </th>
                         <td> {{ $user->employee_id }}</td>
                       </tr>
                       <tr>
                        <th> {{__('Email')}} </th>
                         <td> {{ $user->email }}</td>
                       </tr>
                       <tr>
                        <th> {{__('Mobile')}} </th>
                         <td> {{ $user->mobile }}</td>
                       </tr>
                       @if(auth()->user()->user_type=='admin' || auth()->user()->user_type=='subadmin')
                       <tr>
                        <th> {{__('Role')}} </th>
                         <td> {{ $user->user_type }}</td>
                       </tr>
                       @endif
                       <tr>
                        <th> {{__('Department')}} </th>
                         <td> {{ $user-> department_name}}</td>
                       </tr>
                       <tr>
                        <th> {{__('Position')}} </th>
                         <td> {{ $user->post_name }}</td>
                       </tr>
                      
                       <tr>
                        <th> {{__('Status')}} </th>
                         <td>   @if($user->status==1)
                                     <i class='fa fa-check-circle' style='color:green;'> {{ __('Active') }}  </i>
                                 @else
                                      <i class='fa fa-question-circle' style='color:gold;'></i> {{ __('Inactive') }}
                                @endif
                          </td>
                       </tr>
                       <tr>
                        <th> {{__('Address')}} </th>
                         <td> {{ $user->city }}, {{ $user->country }}, {{ $user->zipcode }}</td>
                       </tr>
                       <tr>
                        <th> {{__('Joined On')}} </th>
                         <td>{{ $user->created_at }}</td>
                       </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
            <p class="card-category float-right"  style='color:black;'>   <img src="{{ asset('uploads/profile_img') }}/{{ $user->profile_img }}" style='height:200;width:200px;'/></p>
          
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

  </div>
  </div>


@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush

@include("admin.layouts.footer")