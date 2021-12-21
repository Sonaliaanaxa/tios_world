@include("admin.layouts.app")
<div class="container"  id="login-page"  style="height:auto;">

  <div class="row align-items-center" >
    <div class="col-md-11 ml-auto mr-auto mb-3 text-center">
      <h3></h3>  </div>
  
      <div class=" col-md-8 col-sm-12 ml-auto mr-auto" >
                 <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
 

      
                  <form method='post'  action="{{ __('Register') }}"  enctype="multipart/form-data">
                    @csrf
                      @include('admin.layouts.flash_msg')

                  
                    <div class="card card-login card-hidden mb-3" style='background-color:white;color:white;'>
                          <div class="card-header  text-center" style='    background-image: linear-gradient( 138deg, rgba(32,201,255,1) 36.7%, rgba(0,8,187,1) 84.4%, rgba(255,255,255,1) 119.7% );color:white;'>
                            <h4 class="card-title" style='color:white;'><strong>{{ __('Register') }}</strong></h4>
                      
                            </div>

                            <div class="card-header  text-center" >
                              <img src="{{ asset('public/material') }}/img/logo.png" style='height:60px;width:150px;border-radius:5px;'>
                              <!-- <img src="{{ asset('public/material') }}/img/logo.png" style='height:100px;width:150px;border-radius:5px;box-shadow:0px 6px 10px whitesmoke;'> -->
                            </div>

                    
                                    <div class="card-body">
                        <p class="card-description text-center"> </p>




                            <div class="bmd-form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <!-- <span class="input-group-text">
                                
                              </span> -->
                            </div>

                        
                              <div class="card-body ">

                        
                              <div class="row">
                            <div class="col-md-12">
                            <h4 class="card-title" style='border:1px dashed #ccc;padding:5px;color:#03cc00;border-radius:5px;margin:1px 0px;'>
                            Supplier Details
                                </h4>
                                </div>
                                <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Name*') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __(' Supplier Name') }}"  value="{{ old('name') }}"  aria-required="true"/>
                                      @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                                      @endif
                                    </div>
                                  </div> 
                                  <label class="col-sm-2 col-form-label"style='color:black;'>{{ __('Email id*') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Supplier Email id') }}"  value="{{ old('email') }}"  aria-required="true"/>
                                      @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                                      @endif
                                    </div>
                                  </div>


                          




                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Mobile No*') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="number" placeholder="{{ __(' Mobile No1') }}"  value="{{ old('mobile') }}"  aria-required="true"/>
                                      @if ($errors->has('mobile'))
                                        <span id="mobile-error" class="error text-danger" for="input-mobile">Mobile No1 is Empty!</span>
                                      @endif
                                    </div>
                                  </div>
                          

                                  
                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Password*') }}</label>
                                  <div class="col-sm-4">
                                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                              
                                <input class="form-control" type="password" name="password" id="password"  placeholder="{{ __('Password...') }}" value="{{ old('password') }}"  aria-required="true"/>
                              
                              @if ($errors->has('password'))
                                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                  <strong>{{ $errors->first('password') }}</strong>
                                </div>
                              @endif
                            </div>
                            </div>
                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Address*') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}"  value="{{ old('address') }}"  aria-required="true"/>
                                      @if ($errors->has('address'))
                                        <span id="address-error" class="error text-danger" for="input-address">Address is Empty!</span>
                                      @endif
                                    </div>
                                  </div>   
                                
                                  <label class="col-sm-2 col-form-label" style='color:black;'>{{ __('Country*') }}</label>
                                  <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                    <select  class="custom-select {{ $errors->has('country') ? ' is-invalid' : '' }}" name='country' id="input-country"   >
                                            <option value=''>Select the Country?</option>

                                            <option value="Afghanistan"{{ ('af'==old('country'))?'selected':''}}>Afghanistan</option>
                                                          <option value="Åland Islands"{{ ('ax'==old('country'))?'selected':''}}>Åland Islands</option>
                                                          <option value="Albania"{{ ('al'==old('country'))?'selected':''}}>Albania</option>
                                                          <option value="Algeria"{{ ('dz'==old('country'))?'selected':''}}>Algeria</option>
                                                          <option value="American Samoa"{{ ('as'==old('country'))?'selected':''}}>American Samoa</option>
                                                          <option value="Andorra"{{ ('ad'==old('country'))?'selected':''}}>Andorra</option>
                                                          <option value="Angola"{{ ('ao'==old('country'))?'selected':''}}>Angola</option>
                                                          <option value="Anguilla"{{ ('ai'==old('country'))?'selected':''}}>Anguilla</option>
                                                          <option value="Antarctica"{{ ('aq'==old('country'))?'selected':''}}>Antarctica</option>
                                                          <option value="Antigua and Barbuda"{{ ('ag'==old('country'))?'selected':''}}>Antigua and Barbuda</option>
                                                          <option value="Argentina"{{ ('ar'==old('country'))?'selected':''}}>Argentina</option>
                                                          <option value="Armenia"{{ ('am'==old('country'))?'selected':''}}>Armenia</option>
                                                          <option value="Aruba"{{ ('aw'==old('country'))?'selected':''}}>Aruba</option>
                                                          <option value="Australia"{{ ('au'==old('country'))?'selected':''}}>Australia</option>
                                                          <option value="Austria"{{ ('at'==old('country'))?'selected':''}}>Austria</option>
                                                          <option value="Azerbaijan"{{ ('az'==old('country'))?'selected':''}}>Azerbaijan</option>
                                                          <option value="Bahamas"{{ ('bs'==old('country'))?'selected':''}}>Bahamas</option>
                                                          <option value="Bahrain"{{ ('bh'==old('country'))?'selected':''}}>Bahrain</option>
                                                          <option value="Bangladesh"{{ ('bd'==old('country'))?'selected':''}}>Bangladesh</option>
                                                          <option value="Barbados"{{ ('bb'==old('country'))?'selected':''}}>Barbados</option>
                                                          <option value="Belarus"{{ ('by'==old('country'))?'selected':''}}>Belarus</option>
                                                          <option value="Belgium"{{ ('be'==old('country'))?'selected':''}}>Belgium</option>
                                                          <option value="Belize"{{ ('bz'==old('country'))?'selected':''}}>Belize</option>
                                                          <option value="Benin"{{ ('bj'==old('country'))?'selected':''}}>Benin</option>
                                                          <option value="Bermuda"{{ ('bm'==old('country'))?'selected':''}}>Bermuda</option>
                                                          <option value="Bhutan"{{ ('bt'==old('country'))?'selected':''}}>Bhutan</option>
                                                          <option value="Bolivia, Plurinational State of"{{ ('bo'==old('country'))?'selected':''}}>Bolivia, Plurinational State of</option>
                                                          <option value="Bonaire, Sint Eustatius and Saba"{{ ('bq'==old('country'))?'selected':''}}>Bonaire, Sint Eustatius and Saba</option>
                                                          <option value="Bosnia and Herzegovina"{{ ('ba'==old('country'))?'selected':''}}>Bosnia and Herzegovina</option>
                                                          <option value="Botswana"{{ ('bw'==old('country'))?'selected':''}}>Botswana</option>
                                                          <option value="Bouvet Island"{{ ('bv'==old('country'))?'selected':''}}>Bouvet Island</option>
                                                          <option value="Brazil"{{ ('br'==old('country'))?'selected':''}}>Brazil</option>
                                                          <option value="British Indian Ocean Territory"{{ ('io'==old('country'))?'selected':''}}>British Indian Ocean Territory</option>
                                                          <option value="Brunei Darussalam"{{ ('bn'==old('country'))?'selected':''}}>Brunei Darussalam</option>
                                                          <option value="Bulgaria"{{ ('bg'==old('country'))?'selected':''}}>Bulgaria</option>
                                                          <option value="Burkina Faso"{{ ('bf'==old('country'))?'selected':''}}>Burkina Faso</option>
                                                          <option value="Burundi"{{ ('bi'==old('country'))?'selected':''}}>Burundi</option>
                                                          <option value="Cambodia"{{ ('kh'==old('country'))?'selected':''}}>Cambodia</option>
                                                          <option value="Cameroon"{{ ('cm'==old('country'))?'selected':''}}>Cameroon</option>
                                                          <option value="Canada"{{ ('ca'==old('country'))?'selected':''}}>Canada</option>
                                                          <option value="Cape Verde"{{ ('cv'==old('country'))?'selected':''}}>Cape Verde</option>
                                                          <option value="Cayman Islands"{{ ('ky'==old('country'))?'selected':''}}>Cayman Islands</option>
                                                          <option value="Central African Republic"{{ ('cf'==old('country'))?'selected':''}}>Central African Republic</option>
                                                          <option value="Chad"{{ ('td'==old('country'))?'selected':''}}>Chad</option>
                                                          <option value="Chile"{{ ('cl'==old('country'))?'selected':''}}>Chile</option>
                                                          <option value="China"{{ ('cn'==old('country'))?'selected':''}}>China</option>
                                                          <option value="Christmas Island"{{ ('cx'==old('country'))?'selected':''}}>Christmas Island</option>
                                                          <option value="Cocos (Keeling) Islands"{{ ('cc'==old('country'))?'selected':''}}>Cocos (Keeling) Islands</option>
                                                          <option value="Colombia"{{ ('co'==old('country'))?'selected':''}}>Colombia</option>
                                                          <option value="Comoros"{{ ('km'==old('country'))?'selected':''}}>Comoros</option>
                                                          <option value="Congo"{{ ('cg'==old('country'))?'selected':''}}>Congo</option>
                                                          <option value="Congo, the Democratic Republic of the"{{ ('cd'==old('country'))?'selected':''}}>Congo, the Democratic Republic of the</option>
                                                          <option value="Cook Islands"{{ ('ck'==old('country'))?'selected':''}}>Cook Islands</option>
                                                          <option value="Costa Rica"{{ ('cr'==old('country'))?'selected':''}}>Costa Rica</option>
                                                          <option value="Côte d'Ivoire"{{ ('ci'==old('country'))?'selected':''}}>Côte d'Ivoire</option>
                                                          <option value="Croatia"{{ ('hr'==old('country'))?'selected':''}}>Croatia</option>
                                                          <option value="Cuba"{{ ('cu'==old('country'))?'selected':''}}>Cuba</option>
                                                          <option value="Curaçao"{{ ('cw'==old('country'))?'selected':''}}>Curaçao</option>
                                                          <option value="Cyprus"{{ ('cy'==old('country'))?'selected':''}}>Cyprus</option>
                                                          <option value="Czech Republic"{{ ('cz'==old('country'))?'selected':''}}>Czech Republic</option>
                                                          <option value="Denmark"{{ ('dk'==old('country'))?'selected':''}}>Denmark</option>
                                                          <option value="Djibouti"{{ ('dj'==old('country'))?'selected':''}}>Djibouti</option>
                                                          <option value="Dominica"{{ ('dm'==old('country'))?'selected':''}}>Dominica</option>
                                                          <option value="Dominican Republic"{{ ('do'==old('country'))?'selected':''}}>Dominican Republic</option>
                                                          <option value="Ecuador"{{ ('ec'==old('country'))?'selected':''}}>Ecuador</option>
                                                          <option value="Egypt"{{ ('eg'==old('country'))?'selected':''}}>Egypt</option>
                                                          <option value="El Salvador"{{ ('sv'==old('country'))?'selected':''}}>El Salvador</option>
                                                          <option value="Equatorial Guinea"{{ ('gq'==old('country'))?'selected':''}}>Equatorial Guinea</option>
                                                          <option value="Eritrea"{{ ('er'==old('country'))?'selected':''}}>Eritrea</option>
                                                          <option value="Estonia"{{ ('ee'==old('country'))?'selected':''}}>Estonia</option>
                                                          <option value="Ethiopia"{{ ('et'==old('country'))?'selected':''}}>Ethiopia</option>
                                                          <option value="Falkland Islands (Malvinas)"{{ ('fk'==old('country'))?'selected':''}}>Falkland Islands (Malvinas)</option>
                                                          <option value="Faroe Islands"{{ ('fo'==old('country'))?'selected':''}}>Faroe Islands</option>
                                                          <option value="Fiji"{{ ('fj'==old('country'))?'selected':''}}>Fiji</option>
                                                          <option value="Finland"{{ ('fi'==old('country'))?'selected':''}}>Finland</option>
                                                          <option value="France"{{ ('fr'==old('country'))?'selected':''}}>France</option>
                                                          <option value="French Guiana"{{ ('gf'==old('country'))?'selected':''}}>French Guiana</option>
                                                          <option value="French Polynesia"{{ ('pf'==old('country'))?'selected':''}}>French Polynesia</option>
                                                          <option value="French Southern Territories"{{ ('tf'==old('country'))?'selected':''}}>French Southern Territories</option>
                                                          <option value="Gabon"{{ ('ga'==old('country'))?'selected':''}}>Gabon</option>
                                                          <option value="Gambia"{{ ('gm'==old('country'))?'selected':''}}>Gambia</option>
                                                          <option value="Georgia"{{ ('ge'==old('country'))?'selected':''}}>Georgia</option>
                                                          <option value="Germany"{{ ('de'==old('country'))?'selected':''}}>Germany</option>
                                                          <option value="Ghana"{{ ('gh'==old('country'))?'selected':''}}>Ghana</option>
                                                          <option value="Gibraltar"{{ ('gi'==old('country'))?'selected':''}}>Gibraltar</option>
                                                          <option value="Greece"{{ ('gr'==old('country'))?'selected':''}}>Greece</option>
                                                          <option value="Greenland"{{ ('gl'==old('country'))?'selected':''}}>Greenland</option>
                                                          <option value="Grenada"{{ ('gd'==old('country'))?'selected':''}}>Grenada</option>
                                                          <option value="Guadeloupe"{{ ('gp'==old('country'))?'selected':''}}>Guadeloupe</option>
                                                          <option value="Guam"{{ ('gu'==old('country'))?'selected':''}}>Guam</option>
                                                          <option value="Guatemala"{{ ('gt'==old('country'))?'selected':''}}>Guatemala</option>
                                                          <option value="Guernsey"{{ ('gg'==old('country'))?'selected':''}}>Guernsey</option>
                                                          <option value="Guinea"{{ ('gn'==old('country'))?'selected':''}}>Guinea</option>
                                                          <option value="Guinea-Bissau"{{ ('gw'==old('country'))?'selected':''}}>Guinea-Bissau</option>
                                                          <option value="Guyana"{{ ('gy'==old('country'))?'selected':''}}>Guyana</option>
                                                          <option value="Haiti"{{ ('ht'==old('country'))?'selected':''}}>Haiti</option>
                                                          <option value="Heard Island and McDonald Islands"{{ ('hm'==old('country'))?'selected':''}}>Heard Island and McDonald Islands</option>
                                                          <option value="Holy See (Vatican City State)"{{ ('va'==old('country'))?'selected':''}}>Holy See (Vatican City State)</option>
                                                          <option value="Honduras"{{ ('hn'==old('country'))?'selected':''}}>Honduras</option>
                                                          <option value="Hong Kong"{{ ('hk'==old('country'))?'selected':''}}>Hong Kong</option>
                                                          <option value="Hungary"{{ ('hu'==old('country'))?'selected':''}}>Hungary</option>
                                                          <option value="Iceland"{{ ('is'==old('country'))?'selected':''}}>Iceland</option>
                                                          <option value="India"{{ ('in'==old('country'))?'selected':''}}>India</option>
                                                          <option value="Indonesia"{{ ('id'==old('country'))?'selected':''}}>Indonesia</option>
                                                          <option value="Iran, Islamic Republic of"{{ ('ir'==old('country'))?'selected':''}}>Iran, Islamic Republic of</option>
                                                          <option value="Iraq"{{ ('iq'==old('country'))?'selected':''}}>Iraq</option>
                                                          <option value="Ireland"{{ ('ie'==old('country'))?'selected':''}}>Ireland</option>
                                                          <option value="Isle of Man"{{ ('im'==old('country'))?'selected':''}}>Isle of Man</option>
                                                          <option value="Israel"{{ ('il'==old('country'))?'selected':''}}>Israel</option>
                                                          <option value="Italy"{{ ('it'==old('country'))?'selected':''}}>Italy</option>
                                                          <option value="Jamaica"{{ ('jm'==old('country'))?'selected':''}}>Jamaica</option>
                                                          <option value="Japan"{{ ('jp'==old('country'))?'selected':''}}>Japan</option>
                                                          <option value="Jersey"{{ ('je'==old('country'))?'selected':''}}>Jersey</option>
                                                          <option value="Jordan"{{ ('jo'==old('country'))?'selected':''}}>Jordan</option>
                                                          <option value="Kazakhstan"{{ ('kz'==old('country'))?'selected':''}}>Kazakhstan</option>
                                                          <option value="Kenya"{{ ('ke'==old('country'))?'selected':''}}>Kenya</option>
                                                          <option value="Kiribati"{{ ('ki'==old('country'))?'selected':''}}>Kiribati</option>
                                                          <option value="Korea, Democratic People's Republic of"{{ ('kp'==old('country'))?'selected':''}}>Korea, Democratic People's Republic of</option>
                                                          <option value="Korea, Republic of"{{ ('kr'==old('country'))?'selected':''}}>Korea, Republic of</option>
                                                          <option value="Kuwait"{{ ('kw'==old('country'))?'selected':''}}>Kuwait</option>
                                                          <option value="Kyrgyzstan"{{ ('kg'==old('country'))?'selected':''}}>Kyrgyzstan</option>
                                                          <option value="Lao People's Democratic Republic"{{ ('la'==old('country'))?'selected':''}}>Lao People's Democratic Republic</option>
                                                          <option value="Latvia"{{ ('lv'==old('country'))?'selected':''}}>Latvia</option>
                                                          <option value="Lebanon"{{ ('lb'==old('country'))?'selected':''}}>Lebanon</option>
                                                          <option value="Lesotho"{{ ('ls'==old('country'))?'selected':''}}>Lesotho</option>
                                                          <option value="Liberia"{{ ('lr'==old('country'))?'selected':''}}>Liberia</option>
                                                          <option value="Libya"{{ ('ly'==old('country'))?'selected':''}}>Libya</option>
                                                          <option value="Liechtenstein"{{ ('li'==old('country'))?'selected':''}}>Liechtenstein</option>
                                                          <option value="Lithuania"{{ ('lt'==old('country'))?'selected':''}}>Lithuania</option>
                                                          <option value="Luxembourg"{{ ('lu'==old('country'))?'selected':''}}>Luxembourg</option>
                                                          <option value="Macao"{{ ('mo'==old('country'))?'selected':''}}>Macao</option>
                                                          <option value="Macedonia, the former Yugoslav Republic of"{{ ('mk'==old('country'))?'selected':''}}>Macedonia, the former Yugoslav Republic of</option>
                                                          <option value="Madagascar"{{ ('mg'==old('country'))?'selected':''}}>Madagascar</option>
                                                          <option value="Malawi"{{ ('mw'==old('country'))?'selected':''}}>Malawi</option>
                                                          <option value="Malaysia"{{ ('my'==old('country'))?'selected':''}}>Malaysia</option>
                                                          <option value="Maldives"{{ ('mv'==old('country'))?'selected':''}}>Maldives</option>
                                                          <option value="Mali"{{ ('ml'==old('country'))?'selected':''}}>Mali</option>
                                                          <option value="Malta"{{ ('mt'==old('country'))?'selected':''}}>Malta</option>
                                                          <option value="Marshall Islands"{{ ('mh'==old('country'))?'selected':''}}>Marshall Islands</option>
                                                          <option value="Martinique"{{ ('mq'==old('country'))?'selected':''}}>Martinique</option>
                                                          <option value="Mauritania"{{ ('mr'==old('country'))?'selected':''}}>Mauritania</option>
                                                          <option value="Mauritius"{{ ('mu'==old('country'))?'selected':''}}>Mauritius</option>
                                                          <option value="Mayotte"{{ ('yt'==old('country'))?'selected':''}}>Mayotte</option>
                                                          <option value="Mexico"{{ ('mx'==old('country'))?'selected':''}}>Mexico</option>
                                                          <option value="Micronesia, Federated States of"{{ ('fm'==old('country'))?'selected':''}}>Micronesia, Federated States of</option>
                                                          <option value="Moldova, Republic of"{{ ('md'==old('country'))?'selected':''}}>Moldova, Republic of</option>
                                                          <option value="Monaco"{{ ('mc'==old('country'))?'selected':''}}>Monaco</option>
                                                          <option value="Mongolia"{{ ('mo'==old('country'))?'selected':''}}>Mongolia</option>
                                                          <option value="Montenegro"{{ ('me'==old('country'))?'selected':''}}>Montenegro</option>
                                                          <option value="Montserrat"{{ ('ms'==old('country'))?'selected':''}}>Montserrat</option>
                                                          <option value="Morocco"{{ ('ma'==old('country'))?'selected':''}}>Morocco</option>
                                                          <option value="Mozambique"{{ ('mz'==old('country'))?'selected':''}}>Mozambique</option>
                                                          <option value="Myanmar"{{ ('mm'==old('country'))?'selected':''}}>Myanmar</option>
                                                          <option value="Namibia"{{ ('na'==old('country'))?'selected':''}}>Namibia</option>
                                                          <option value="Nauru"{{ ('nr'==old('country'))?'selected':''}}>Nauru</option>
                                                          <option value="Nepal"{{ ('np'==old('country'))?'selected':''}}>Nepal</option>
                                                          <option value="Netherlands"{{ ('nl'==old('country'))?'selected':''}}>Netherlands</option>
                                                          <option value="New Caledonia"{{ ('nc'==old('country'))?'selected':''}}>New Caledonia</option>
                                                          <option value="New Zealand"{{ ('nz'==old('country'))?'selected':''}}>New Zealand</option>
                                                          <option value="Nicaragua"{{ ('ni'==old('country'))?'selected':''}}>Nicaragua</option>
                                                          <option value="Niger"{{ ('ne'==old('country'))?'selected':''}}>Niger</option>
                                                          <option value="Nigeria"{{ ('ng'==old('country'))?'selected':''}}>Nigeria</option>
                                                          <option value="Niue"{{ ('nu'==old('country'))?'selected':''}}>Niue</option>
                                                          <option value="Norfolk Island"{{ ('nf'==old('country'))?'selected':''}}>Norfolk Island</option>
                                                          <option value="Northern Mariana Islands"{{ ('mp'==old('country'))?'selected':''}}>Northern Mariana Islands</option>
                                                          <option value="Norway"{{ ('no'==old('country'))?'selected':''}}>Norway</option>
                                                          <option value="Oman"{{ ('om'==old('country'))?'selected':''}}>Oman</option>
                                                          <option value="Pakistan"{{ ('pk'==old('country'))?'selected':''}}>Pakistan</option>
                                                          <option value="Palau"{{ ('pw'==old('country'))?'selected':''}}>Palau</option>
                                                          <option value="Palestinian Territory, Occupied"{{ ('ps'==old('country'))?'selected':''}}>Palestinian Territory, Occupied</option>
                                                          <option value="Panama"{{ ('pa'==old('country'))?'selected':''}}>Panama</option>
                                                          <option value="Papua New Guinea"{{ ('pg'==old('country'))?'selected':''}}>Papua New Guinea</option>
                                                          <option value="Paraguay"{{ ('py'==old('country'))?'selected':''}}>Paraguay</option>
                                                          <option value="Peru"{{ ('pe'==old('country'))?'selected':''}}>Peru</option>
                                                          <option value="Philippines"{{ ('ph'==old('country'))?'selected':''}}>Philippines</option>
                                                          <option value="Pitcairn"{{ ('pn'==old('country'))?'selected':''}}>Pitcairn</option>
                                                          <option value="Poland"{{ ('pl'==old('country'))?'selected':''}}>Poland</option>
                                                          <option value="Portugal"{{ ('pt'==old('country'))?'selected':''}}>Portugal</option>
                                                          <option value="Puerto Rico"{{ ('pr'==old('country'))?'selected':''}}>Puerto Rico</option>
                                                          <option value="Qatar"{{ ('qa'==old('country'))?'selected':''}}>Qatar</option>
                                                          <option value="Réunion"{{ ('re'==old('country'))?'selected':''}}>Réunion</option>
                                                          <option value="Romania"{{ ('ro'==old('country'))?'selected':''}}>Romania</option>
                                                          <option value="Russian Federation"{{ ('ru'==old('country'))?'selected':''}}>Russian Federation</option>
                                                          <option value="Rwanda"{{ ('rw'==old('country'))?'selected':''}}>Rwanda</option>
                                                          <option value="Saint Barthélemy"{{ ('bl'==old('country'))?'selected':''}}>Saint Barthélemy</option>
                                                          <option value="Saint Helena, Ascension and Tristan da Cunha"{{ ('sh'==old('country'))?'selected':''}}>Saint Helena, Ascension and Tristan da Cunha</option>
                                                          <option value="Saint Kitts and Nevis"{{ ('kn'==old('country'))?'selected':''}}>Saint Kitts and Nevis</option>
                                                          <option value="Saint Lucia"{{ ('lc'==old('country'))?'selected':''}}>Saint Lucia</option>
                                                          <option value="Saint Martin (French part)"{{ ('mf'==old('country'))?'selected':''}}>Saint Martin (French part)</option>
                                                          <option value="Saint Pierre and Miquelon"{{ ('pm'==old('country'))?'selected':''}}>Saint Pierre and Miquelon</option>
                                                          <option value="Saint Vincent and the Grenadines"{{ ('vc'==old('country'))?'selected':''}}>Saint Vincent and the Grenadines</option>
                                                          <option value="Samoa"{{ ('ws'==old('country'))?'selected':''}}>Samoa</option>
                                                          <option value="San Marino"{{ ('sm'==old('country'))?'selected':''}}>San Marino</option>
                                                          <option value="Sao Tome and Principe"{{ ('st'==old('country'))?'selected':''}}>Sao Tome and Principe</option>
                                                          <option value="Saudi Arabia"{{ ('sa'==old('country'))?'selected':''}}>Saudi Arabia</option>
                                                          <option value="Senegal"{{ ('sn'==old('country'))?'selected':''}}>Senegal</option>
                                                          <option value="Serbia"{{ ('rs'==old('country'))?'selected':''}}>Serbia</option>
                                                          <option value="Seychelles"{{ ('sc'==old('country'))?'selected':''}}>Seychelles</option>
                                                          <option value="Sierra Leone"{{ ('sl'==old('country'))?'selected':''}}>Sierra Leone</option>
                                                          <option value="Singapore"{{ ('sg'==old('country'))?'selected':''}}>Singapore</option>
                                                          <option value="Sint Maarten (Dutch part)"{{ ('sx'==old('country'))?'selected':''}}>Sint Maarten (Dutch part)</option>
                                                          <option value="Slovakia"{{ ('sk'==old('country'))?'selected':''}}>Slovakia</option>
                                                          <option value="Slovenia"{{ ('si'==old('country'))?'selected':''}}>Slovenia</option>
                                                          <option value="Solomon Islands"{{ ('sb'==old('country'))?'selected':''}}>Solomon Islands</option>
                                                          <option value="Somalia"{{ ('so'==old('country'))?'selected':''}}>Somalia</option>
                                                          <option value="South Africa"{{ ('za'==old('country'))?'selected':''}}>South Africa</option>
                                                          <option value="South Georgia and the South Sandwich Islands"{{ ('gs'==old('country'))?'selected':''}}>South Georgia and the South Sandwich Islands</option>
                                                          <option value="South Sudan"{{ ('ss'==old('country'))?'selected':''}}>South Sudan</option>
                                                          <option value="Spain"{{ ('es'==old('country'))?'selected':''}}>Spain</option>
                                                          <option value="Sri Lanka"{{ ('lk'==old('country'))?'selected':''}}>Sri Lanka</option>
                                                          <option value="Sudan"{{ ('sd'==old('country'))?'selected':''}}>Sudan</option>
                                                          <option value="Suriname"{{ ('sr'==old('country'))?'selected':''}}>Suriname</option>
                                                          <option value="Svalbard and Jan Mayen"{{ ('sj'==old('country'))?'selected':''}}>Svalbard and Jan Mayen</option>
                                                          <option value="Swaziland"{{ ('sz'==old('country'))?'selected':''}}>Swaziland</option>
                                                          <option value="Sweden"{{ ('se'==old('country'))?'selected':''}}>Sweden</option>
                                                          <option value="Switzerland"{{ ('ch'==old('country'))?'selected':''}}>Switzerland</option>
                                                          <option value="Syrian Arab Republic"{{ ('sy'==old('country'))?'selected':''}}>Syrian Arab Republic</option>
                                                          <option value="Taiwan, Province of China"{{ ('tw'==old('country'))?'selected':''}}>Taiwan, Province of China</option>
                                                          <option value="Tajikistan"{{ ('tj'==old('country'))?'selected':''}}>Tajikistan</option>
                                                          <option value="Tanzania, United Republic of"{{ ('tz'==old('country'))?'selected':''}}>Tanzania, United Republic of</option>
                                                          <option value="Thailand"{{ ('th'==old('country'))?'selected':''}}>Thailand</option>
                                                          <option value="Timor-Leste"{{ ('tl'==old('country'))?'selected':''}}>Timor-Leste</option>
                                                          <option value="Togo"{{ ('tg'==old('country'))?'selected':''}}>Togo</option>
                                                          <option value="Tokelau"{{ ('tk'==old('country'))?'selected':''}}>Tokelau</option>
                                                          <option value="Tonga"{{ ('to'==old('country'))?'selected':''}}>Tonga</option>
                                                          <option value="Trinidad and Tobago"{{ ('tt'==old('country'))?'selected':''}}>Trinidad and Tobago</option>
                                                          <option value="Tunisia"{{ ('tn'==old('country'))?'selected':''}}>Tunisia</option>
                                                          <option value="Turkey"{{ ('tr'==old('country'))?'selected':''}}>Turkey</option>
                                                          <option value="Turkmenistan"{{ ('tm'==old('country'))?'selected':''}}>Turkmenistan</option>
                                                          <option value="Turks and Caicos Islands"{{ ('tc'==old('country'))?'selected':''}}>Turks and Caicos Islands</option>
                                                          <option value="Tuvalu"{{ ('tv'==old('country'))?'selected':''}}>Tuvalu</option>
                                                          <option value="Uganda"{{ ('ug'==old('country'))?'selected':''}}>Uganda</option>
                                                          <option value="Ukraine"{{ ('ua'==old('country'))?'selected':''}}>Ukraine</option>
                                                          <option value="United Arab Emirates"{{ ('ae'==old('country'))?'selected':''}}>United Arab Emirates</option>
                                                          <option value="United Kingdom"{{ ('gb'==old('country'))?'selected':''}}>United Kingdom</option>
                                                          <option value="United States"{{ ('us'==old('country'))?'selected':''}}>United States</option>
                                                          <option value="United States Minor Outlying Islands"{{ ('um'==old('country'))?'selected':''}}>United States Minor Outlying Islands</option>
                                                          <option value="Uruguay"{{ ('uy'==old('country'))?'selected':''}}>Uruguay</option>
                                                          <option value="Uzbekistan"{{ ('uz'==old('country'))?'selected':''}}>Uzbekistan</option>
                                                          <option value="Vanuatu"{{ ('vu'==old('country'))?'selected':''}}>Vanuatu</option>
                                                          <option value="Venezuela, Bolivarian Republic of"{{ ('ve'==old('country'))?'selected':''}}>Venezuela, Bolivarian Republic of</option>
                                                          <option value="Viet Nam"{{ ('vn'==old('country'))?'selected':''}}>Viet Nam</option>
                                                          <option value="Virgin Islands, British"{{ ('vg'==old('country'))?'selected':''}}>Virgin Islands, British</option>
                                                          <option value="Virgin Islands, U.S."{{ ('vi'==old('country'))?'selected':''}}>Virgin Islands, U.S.</option>
                                                          <option value="Wallis and Futuna"{{ ('wf'==old('country'))?'selected':''}}>Wallis and Futuna</option>
                                                          <option value="Western Sahara"{{ ('eh'==old('country'))?'selected':''}}>Western Sahara</option>
                                                          <option value="Yemen"{{ ('ye'==old('country'))?'selected':''}}>Yemen</option>
                                                          <option value="Zambia"{{ ('zm'==old('country'))?'selected':''}}>Zambia</option>
                                                          <option value="Zimbabwe"{{ ('zw'==old('country'))?'selected':''}}>Zimbabwe</option>
                                      </select>  @if ($errors->has('country'))
                                        <span id="country-error" class="error text-danger" for="input-countr">Country Region is Empty!</span>
                                      @endif
                                    </div>
                                  </div>

                              </div>  


                                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
                              </div>

                                  <div class="col-6 text-right pull-right" style="color:black;font-size:13px;">
                                  Already have an account? <a href="{{route('login')}}" ><i><u> Login Now</u> </i> </a>
                                      
                                  </div>

                           


                        </div>
                      
                      </div>

                  </div>
	          </form>
     

  </div>
</div><div>
  </div>
  </div>
