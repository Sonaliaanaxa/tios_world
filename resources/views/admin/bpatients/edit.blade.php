

@include("admin.layouts.sidebar")
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">{{ __($title) }}
                                <a href="{{route('patient.list')}}"  class="btn btn-primary float-right" ><i class='fa fa-arrow-left'>  {{ __('Back') }}</i> </a>
                                </h3>
							
							</div>
						</div>
					</div>

					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body custom-edit-service">
									
                                <h4 class="card-title">Profile Image</h4>
                                <form method='post'  action="{{ route('patient.img.update',$user->id) }}"  enctype="multipart/form-data">
                              @csrf
                                @include('admin.layouts.flash_msg')

                                    <div class="row form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        
                                                        <img src="{{ asset('public/uploads/profile_img') }}/{{ $user->img }}" style='height:130px;width:130px;border-radius:5%;' />
                                                    </div>
                                                    <br>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                  
                                                          <label htmlFor="myImage" >
                                                            <input type="file" class="upload" name="myImage" 
                                                            accept="image/x-png,image/gif,image/jpeg,image/jpg" 
                                                          id="myImage"
                                                            /></label>
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section mt-4">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Information</h4>
					
				
				
							
								<!-- Add Blog -->
                                <form method='post'  action="{{ route('patient.update',$user->id) }}"  enctype="multipart/form-data">
                                @csrf
                            
									<div class="service-fields mb-3">
										<div class="row">

										<div class="form-group col-md-6">
                                                <label for="category">Name</label>
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('  Name') }}"  value="{{ $user->name}}"  aria-required="true"/>
                                                    @if ($errors->has('name'))
                                                        <span id="name-error" class="error text-danger" for="input-name">Name is Empty!</span>
                                                    @endif
                                                </div>
                                            </div>
                                            	<div class="form-group col-md-6">
                                                <label for="category">Email</label>
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __(' Email id') }}"  value="{{ $user->email}}" readonly aria-required="true"/>
                                                    @if ($errors->has('email'))
                                                        <span id="email-error" class="error text-danger" for="input-email">Email is Empty!</span>
                                                    @endif
                                                    </div>
                                                </div>
                                               	<div class="form-group col-md-6">
                                                <label for="category">Secondary Email</label>
                                                <div class="form-group{{ $errors->has('secondary_email') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('secondary_email') ? ' is-invalid' : '' }}" name="secondary_email" id="input-secondary_email" type="text" placeholder="{{ __('Secondary Email id') }}"  value="{{ $user->secondary_email}}"  aria-required="true"/>
                                                    @if ($errors->has('secondary_email'))
                                                        <span id="secondary_email-error" class="error text-danger" for="input-secondary_email">Email is Empty!</span>
                                                    @endif
                                                    </div>
                                                </div>
                                            	<div class="form-group col-md-6">
                                                <label for="category">Mobile</label>
                                                <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="input-mobile" type="number" placeholder="{{ __(' Mobile No') }}"  value="{{ $user->mobile}}"  aria-required="true"/>
                                                    @if ($errors->has('mobile'))
                                                        <span id="mobile-error" class="error text-danger" for="input-mobile">Mobile No is Empty!</span>
                                                    @endif
                                                    </div>
                                            </div>
                                   
                                            <div class="form-group col-md-6">
                                                <label for="category">Status</label>
                                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                                    <select  class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name='status' id="input-status"   >
                                                            <option value='{{ $user->status}}'>Select Status</option>
                                                            <option value='1' {{($user->status=='1')?'selected':''}} > Activate </option>  
                                                            <option value='0' {{($user->status=='0')?'selected':''}}> Deactivate</option>
                                                    </select>
                                            
                                            @if ($errors->has('status'))
                                                        <span id="status-error" class="error text-danger" for="input-status">Status is Empty!</span>
                                                    @endif
                                                    </div>
                                            </div>
										</div>
									</div>
									
						
                        <!-- /Basic Information -->
                        <div class="card contact-card">
                            <div class="card-body">
                                <h4 class="card-title">Contact Details</h4>
                                <div class="row form-row">
                        

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" id="input-city" type="text" placeholder="{{ __('City') }}"  value="{{ $user->city}}"  aria-required="true"/>
                      @if ($errors->has('city'))
                        <span id="city-error" class="error text-danger" for="input-city">City is Empty!</span>
                      @endif
                    </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">State / Province</label>
                                            <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" id="input-state" type="text" placeholder="{{ __('State') }}"  value="{{ $user->state}}"  aria-required="true"/>
                                          @if ($errors->has('state'))
                                            <span id="state-error" class="error text-danger" for="input-state">State is Empty!</span>
                                          @endif
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Country</label>
                                            <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                    <select  class="custom-select {{ $errors->has('country') ? ' is-invalid' : '' }}" name='country' id="input-country"   >
                            <option value='{{ $user->country}}'>{{ $user->country}}</</option>

                            <option value="Afghanistan"{{ ('Afghanistan'==$user->country)?'selected':''}}>Afghanistan</option>
                            <option value="Åland_Islands"{{ ('Åland_Islands'==$user->country)?'selected':''}}>Åland Islands</option>
                            <option value="Albania"{{ ('Albania'==$user->country)?'selected':''}}>Albania</option>
                            <option value="Albania"{{ ('Albania'==$user->country)?'selected':''}}>Algeria</option>
                            <option value="American_Samoa"{{ ('American_Samoa'==$user->country)?'selected':''}}>American Samoa</option>
                            <option value="Andorra"{{ ('Andorra'==$user->country)?'selected':''}}>Andorra</option>
                            <option value="Angola"{{ ('Angola'==$user->country)?'selected':''}}>Angola</option>
                            <option value="Anguilla"{{ ('Anguilla'==$user->country)?'selected':''}}>Anguilla</option>
                            <option value="Antarctica"{{ ('Antarctica'==$user->country)?'selected':''}}>Antarctica</option>
                            <option value="Antigua_and_Barbuda"{{ ('Antigua_and_Barbuda'==$user->country)?'selected':''}}>Antigua and Barbuda</option>
                            <option value="Argentina"{{ ('Argentina'==$user->country)?'selected':''}}>Argentina</option>
                            <option value="Armenia"{{ ('Armenia'==$user->country)?'selected':''}}>Armenia</option>
                            <option value="Aruba"{{ ('Aruba'==$user->country)?'selected':''}}>Aruba</option>
                            <option value="Australia"{{ ('Australia'==$user->country)?'selected':''}}>Australia</option>
                            <option value="Austria"{{ ('Austria'==$user->country)?'selected':''}}>Austria</option>
                            <option value="Azerbaijan"{{ ('Azerbaijan'==$user->country)?'selected':''}}>Azerbaijan</option>
                            <option value="Bahamas"{{ ('Bahamas'==$user->country)?'selected':''}}>Bahamas</option>
                            <option value="Bahrain"{{ ('Bahrain'==$user->country)?'selected':''}}>Bahrain</option>
                            <option value="Bangladesh"{{ ('Bangladesh'==$user->country)?'selected':''}}>Bangladesh</option>
                            <option value="Barbados"{{ ('Barbados'==$user->country)?'selected':''}}>Barbados</option>
                            <option value="Belarus"{{ ('Belarus'==$user->country)?'selected':''}}>Belarus</option>
                            <option value="Belgium"{{ ('Belgium'==$user->country)?'selected':''}}>Belgium</option>
                            <option value="Belize"{{ ('Belize'==$user->country)?'selected':''}}>Belize</option>
                            <option value="Benin"{{ ('Benin'==$user->country)?'selected':''}}>Benin</option>
                            <option value="Bermuda"{{ ('Bermuda'==$user->country)?'selected':''}}>Bermuda</option>
                            <option value="Bhutan"{{ ('Bhutan'==$user->country)?'selected':''}}>Bhutan</option>
                            <option value="Bolivia_Plurinational_State_of"{{ ('Bolivia_Plurinational_State_of'==$user->country)?'selected':''}}>Bolivia, Plurinational State of</option>
                            <option value="Bonaire_Sint_Eustatius_and_Saba"{{ ('Bonaire_Sint_Eustatius_and_Saba'==$user->country)?'selected':''}}>Bonaire, Sint Eustatius and Saba</option>
                            <option value="Bosnia_and_Herzegovina"{{ ('Bosnia_and_Herzegovina'==$user->country)?'selected':''}}>Bosnia and Herzegovina</option>
                            <option value="Botswana"{{ ('Botswana'==$user->country)?'selected':''}}>Botswana</option>
                            <option value="Bouvet_Island"{{ ('Bouvet_Island'==$user->country)?'selected':''}}>Bouvet Island</option>
                            <option value="Brazil"{{ ('Brazil'==$user->country)?'selected':''}}>Brazil</option>
                            <option value="British_Indian_Ocean_Territory"{{ ('British_Indian_Ocean_Territory'==$user->country)?'selected':''}}>British Indian Ocean Territory</option>
                            <option value="Brunei_Darussalam"{{ ('Brunei_Darussalam'==$user->country)?'selected':''}}>Brunei Darussalam</option>
                            <option value="Bulgaria"{{ ('Bulgaria'==$user->country)?'selected':''}}>Bulgaria</option>
                            <option value="Burkina_Faso"{{ ('Burkina_Faso'==$user->country)?'selected':''}}>Burkina Faso</option>
                            <option value="Burundi"{{ ('Burundi'==$user->country)?'selected':''}}>Burundi</option>
                            <option value="Cambodia"{{ ('Cambodia'==$user->country)?'selected':''}}>Cambodia</option>
                            <option value="Cameroon"{{ ('Cameroon'==$user->country)?'selected':''}}>Cameroon</option>
                            <option value="Canada"{{ ('Canada'==$user->country)?'selected':''}}>Canada</option>
                            <option value="Cape_Verde"{{ ('Cape_Verde'==$user->country)?'selected':''}}>Cape Verde</option>
                            <option value="Cayman_Islands"{{ ('Cayman_Islands'==$user->country)?'selected':''}}>Cayman Islands</option>
                            <option value="Central_African_Republic"{{ ('Central_African_Republic'==$user->country)?'selected':''}}>Central African Republic</option>
                            <option value="Chad"{{ ('Chad'==$user->country)?'selected':''}}>Chad</option>
                            <option value="Chile"{{ ('Chile'==$user->country)?'selected':''}}>Chile</option>
                            <option value="China"{{ ('China'==$user->country)?'selected':''}}>China</option>
                            <option value="Christmas_Island"{{ ('Christmas_Island'==$user->country)?'selected':''}}>Christmas Island</option>
                            <option value="Cocos_Islands"{{ ('Cocos_Islands'==$user->country)?'selected':''}}>Cocos (Keeling) Islands</option>
                            <option value="Colombia"{{ ('Colombia'==$user->country)?'selected':''}}>Colombia</option>
                            <option value="Comoros"{{ ('Comoros'==$user->country)?'selected':''}}>Comoros</option>
                            <option value="Congo"{{ ('Congo'==$user->country)?'selected':''}}>Congo</option>
                            <option value="Congo_the_Democratic_Republic_of_the"{{ ('Congo_the_Democratic_Republic_of_the'==$user->country)?'selected':''}}>Congo, the Democratic Republic of the</option>
                            <option value="Cook_Islands"{{ ('Cook_Islands'==$user->country)?'selected':''}}>Cook Islands</option>
                            <option value="Costa_Rica"{{ ('Costa_Rica'==$user->country)?'selected':''}}>Costa Rica</option>
                            <option value="Côte_d_Ivoire"{{ ('Côte_d_Ivoire'==$user->country)?'selected':''}}>Côte d'Ivoire</option>
                            <option value="Croatia"{{ ('Croatia'==$user->country)?'selected':''}}>Croatia</option>
                            <option value="Cuba"{{ ('Cuba'==$user->country)?'selected':''}}>Cuba</option>
                            <option value="Curaçao"{{ ('Curaçao'==$user->country)?'selected':''}}>Curaçao</option>
                            <option value="Cyprus"{{ ('Cyprus'==$user->country)?'selected':''}}>Cyprus</option>
                            <option value="Czech_Republic"{{ ('Czech_Republic'==$user->country)?'selected':''}}>Czech Republic</option>
                            <option value="Denmark"{{ ('Denmark'==$user->country)?'selected':''}}>Denmark</option>
                            <option value="Djibouti"{{ ('Djibouti'==$user->country)?'selected':''}}>Djibouti</option>
                            <option value="Dominica"{{ ('Dominica'==$user->country)?'selected':''}}>Dominica</option>
                            <option value="Dominican_Republic"{{ ('Dominican_Republic'==$user->country)?'selected':''}}>Dominican Republic</option>
                            <option value="Ecuador"{{ ('Ecuador'==$user->country)?'selected':''}}>Ecuador</option>
                            <option value="Egypt"{{ ('Egypt'==$user->country)?'selected':''}}>Egypt</option>
                            <option value="El_Salvador"{{ ('El_Salvador'==$user->country)?'selected':''}}>El Salvador</option>
                            <option value="Equatorial_Guinea"{{ ('Equatorial_Guinea'==$user->country)?'selected':''}}>Equatorial Guinea</option>
                            <option value="Eritrea"{{ ('Eritrea'==$user->country)?'selected':''}}>Eritrea</option>
                            <option value="Estonia"{{ ('Estonia'==$user->country)?'selected':''}}>Estonia</option>
                            <option value="Ethiopia"{{ ('Ethiopia'==$user->country)?'selected':''}}>Ethiopia</option>
                            <option value="Falkland_Islands"{{ ('Falkland_Islands'==$user->country)?'selected':''}}>Falkland Islands (Malvinas)</option>
                            <option value="Faroe_Islands"{{ ('Faroe_Islands'==$user->country)?'selected':''}}>Faroe Islands</option>
                            <option value="Fiji"{{ ('Fiji'==$user->country)?'selected':''}}>Fiji</option>
                            <option value="Finland"{{ ('Finland'==$user->country)?'selected':''}}>Finland</option>
                            <option value="France"{{ ('France'==$user->country)?'selected':''}}>France</option>
                            <option value="French_Guiana"{{ ('French_Guiana'==$user->country)?'selected':''}}>French Guiana</option>
                            <option value="French_Polynesia"{{ ('French_Polynesia'==$user->country)?'selected':''}}>French Polynesia</option>
                            <option value="French_Southern_Territories"{{ ('French_Southern_Territories'==$user->country)?'selected':''}}>French Southern Territories</option>
                            <option value="Gabon"{{ ('Gabon'==$user->country)?'selected':''}}>Gabon</option>
                            <option value="Gambia"{{ ('Gambia'==$user->country)?'selected':''}}>Gambia</option>
                            <option value="Georgia"{{ ('Georgia'==$user->country)?'selected':''}}>Georgia</option>
                            <option value="Germany"{{ ('Germany'==$user->country)?'selected':''}}>Germany</option>
                            <option value="Ghana"{{ ('Ghana'==$user->country)?'selected':''}}>Ghana</option>
                            <option value="Gibraltar"{{ ('Gibraltar'==$user->country)?'selected':''}}>Gibraltar</option>
                            <option value="Greece"{{ ('Greece'==$user->country)?'selected':''}}>Greece</option>
                            <option value="Greenland"{{ ('Greenland'==$user->country)?'selected':''}}>Greenland</option>
                            <option value="Grenada"{{ ('Grenada'==$user->country)?'selected':''}}>Grenada</option>
                            <option value="Guadeloupe"{{ ('Guadeloupe'==$user->country)?'selected':''}}>Guadeloupe</option>
                            <option value="Guam"{{ ('Guam'==$user->country)?'selected':''}}>Guam</option>
                            <option value="Guatemala"{{ ('Guatemala'==$user->country)?'selected':''}}>Guatemala</option>
                            <option value="Guernsey"{{ ('Guernsey'==$user->country)?'selected':''}}>Guernsey</option>
                            <option value="Guinea"{{ ('Guinea'==$user->country)?'selected':''}}>Guinea</option>
                            <option value="Guinea_Bissau"{{ ('Guinea_Bissau'==$user->country)?'selected':''}}>Guinea-Bissau</option>
                            <option value="Guyana"{{ ('Guyana'==$user->country)?'selected':''}}>Guyana</option>
                            <option value="Haiti"{{ ('Haiti'==$user->country)?'selected':''}}>Haiti</option>
                            <option value="Heard_Island_and_McDonald_Islands"{{ ('Heard_Island_and_McDonald_Islands'==$user->country)?'selected':''}}>Heard Island and McDonald Islands</option>
                            <option value="Holy_See"{{ ('Holy_See'==$user->country)?'selected':''}}>Holy See (Vatican City State)</option>
                            <option value="Honduras"{{ ('Honduras'==$user->country)?'selected':''}}>Honduras</option>
                            <option value="Hong_Kong"{{ ('Hong_Kong'==$user->country)?'selected':''}}>Hong Kong</option>
                            <option value="Hungary"{{ ('Hungary'==$user->country)?'selected':''}}>Hungary</option>
                            <option value="Iceland"{{ ('Iceland'==$user->country)?'selected':''}}>Iceland</option>
                            <option value="India"{{ ('India'==$user->country)?'selected':''}}>India</option>
                            <option value="Indonesia"{{ ('Indonesia'==$user->country)?'selected':''}}>Indonesia</option>
                            <option value="Iran_Islamic_Republic_of"{{ ('Iran_Islamic_Republic_of'==$user->country)?'selected':''}}>Iran, Islamic Republic of</option>
                            <option value="Iraq"{{ ('Iraq'==$user->country)?'selected':''}}>Iraq</option>
                            <option value="Ireland"{{ ('Ireland'==$user->country)?'selected':''}}>Ireland</option>
                            <option value="Isle_of_Man"{{ ('Isle_of_Man'==$user->country)?'selected':''}}>Isle of Man</option>
                            <option value="Israel"{{ ('Israel'==$user->country)?'selected':''}}>Israel</option>
                            <option value="Italy"{{ ('Italy'==$user->country)?'selected':''}}>Italy</option>
                            <option value="Jamaica"{{ ('Jamaica'==$user->country)?'selected':''}}>Jamaica</option>
                            <option value="Japan"{{ ('Japan'==$user->country)?'selected':''}}>Japan</option>
                            <option value="Jersey"{{ ('Jersey'==$user->country)?'selected':''}}>Jersey</option>
                            <option value="Jordan"{{ ('Jordan'==$user->country)?'selected':''}}>Jordan</option>
                            <option value="Kazakhstan"{{ ('Kazakhstan'==$user->country)?'selected':''}}>Kazakhstan</option>
                            <option value="Kenya"{{ ('Kenya'==$user->country)?'selected':''}}>Kenya</option>
                            <option value="Kiribati"{{ ('Kiribati'==$user->country)?'selected':''}}>Kiribati</option>
                            <option value="Korea_Democratic_Peoples_Republic_of"{{ ('Korea_Democratic_Peoples_Republic_of'==$user->country)?'selected':''}}>Korea, Democratic People's Republic of</option>
                            <option value="Korea_Republic_of"{{ ('Korea_Republic_of'==$user->country)?'selected':''}}>Korea, Republic of</option>
                            <option value="Kuwait"{{ ('Kuwait'==$user->country)?'selected':''}}>Kuwait</option>
                            <option value="Kyrgyzstan"{{ ('Kyrgyzstan'==$user->country)?'selected':''}}>Kyrgyzstan</option>
                            <option value="Lao_Peoples_Democratic_Republic"{{ ('Lao_Peoples_Democratic_Republic'==$user->country)?'selected':''}}>Lao People's Democratic Republic</option>
                            <option value="Latvia"{{ ('Latvia'==$user->country)?'selected':''}}>Latvia</option>
                            <option value="Lebanon"{{ ('Lebanon'==$user->country)?'selected':''}}>Lebanon</option>
                            <option value="Lesotho"{{ ('Lesotho'==$user->country)?'selected':''}}>Lesotho</option>
                            <option value="Liberia"{{ ('Liberia'==$user->country)?'selected':''}}>Liberia</option>
                            <option value="Libya"{{ ('Libya'==$user->country)?'selected':''}}>Libya</option>
                            <option value="Liechtenstein"{{ ('Liechtenstein'==$user->country)?'selected':''}}>Liechtenstein</option>
                            <option value="Lithuania"{{ ('Lithuania'==$user->country)?'selected':''}}>Lithuania</option>
                            <option value="Luxembourg"{{ ('Luxembourg'==$user->country)?'selected':''}}>Luxembourg</option>
                            <option value="Macao"{{ ('Macao'==$user->country)?'selected':''}}>Macao</option>
                            <option value="Macedonia_the_former_Yugoslav_Republic_of"{{ ('Macedonia_the_former_Yugoslav_Republic_of'==$user->country)?'selected':''}}>Macedonia, the former Yugoslav Republic of</option>
                            <option value="Madagascar"{{ ('Madagascar'==$user->country)?'selected':''}}>Madagascar</option>
                            <option value="Malawi"{{ ('Malawi'==$user->country)?'selected':''}}>Malawi</option>
                            <option value="Malaysia"{{ ('Malaysia'==$user->country)?'selected':''}}>Malaysia</option>
                            <option value="Maldives"{{ ('Maldives'==$user->country)?'selected':''}}>Maldives</option>
                            <option value="Mali"{{ ('Mali'==$user->country)?'selected':''}}>Mali</option>
                            <option value="Malta"{{ ('Malta'==$user->country)?'selected':''}}>Malta</option>
                            <option value="Marshall_Islands"{{ ('Marshall_Islands'==$user->country)?'selected':''}}>Marshall Islands</option>
                            <option value="Martinique"{{ ('Martinique'==$user->country)?'selected':''}}>Martinique</option>
                            <option value="Mauritania"{{ ('Mauritania'==$user->country)?'selected':''}}>Mauritania</option>
                            <option value="Mauritius"{{ ('Mauritius'==$user->country)?'selected':''}}>Mauritius</option>
                            <option value="Mayotte"{{ ('Mayotte'==$user->country)?'selected':''}}>Mayotte</option>
                            <option value="Mexico"{{ ('Mexico'==$user->country)?'selected':''}}>Mexico</option>
                            <option value="Micronesia_Federated_States_of"{{ ('Micronesia_Federated_States_of'==$user->country)?'selected':''}}>Micronesia, Federated States of</option>
                            <option value="Moldova_Republic_of"{{ ('Moldova_Republic_of'==$user->country)?'selected':''}}>Moldova, Republic of</option>
                            <option value="Monaco"{{ ('Monaco'==$user->country)?'selected':''}}>Monaco</option>
                            <option value="Mongolia"{{ ('Mongolia'==$user->country)?'selected':''}}>Mongolia</option>
                            <option value="Montenegro"{{ ('Montenegro'==$user->country)?'selected':''}}>Montenegro</option>
                            <option value="Montserrat"{{ ('Montserrat'==$user->country)?'selected':''}}>Montserrat</option>
                            <option value="Morocco"{{ ('Morocco'==$user->country)?'selected':''}}>Morocco</option>
                            <option value="Mozambique"{{ ('Mozambique'==$user->country)?'selected':''}}>Mozambique</option>
                            <option value="Myanmar"{{ ('Myanmar'==$user->country)?'selected':''}}>Myanmar</option>
                            <option value="Namibia"{{ ('Namibia'==$user->country)?'selected':''}}>Namibia</option>
                            <option value="Nauru"{{ ('Nauru'==$user->country)?'selected':''}}>Nauru</option>
                            <option value="Nepal"{{ ('Nepal'==$user->country)?'selected':''}}>Nepal</option>
                            <option value="Netherlands"{{ ('Netherlands'==$user->country)?'selected':''}}>Netherlands</option>
                            <option value="New_Caledonia"{{ ('New_Caledonia'==$user->country)?'selected':''}}>New Caledonia</option>
                            <option value="New_Zealand"{{ ('New_Zealand'==$user->country)?'selected':''}}>New Zealand</option>
                            <option value="Nicaragua"{{ ('Nicaragua'==$user->country)?'selected':''}}>Nicaragua</option>
                            <option value="Niger"{{ ('Niger'==$user->country)?'selected':''}}>Niger</option>
                            <option value="Nigeria"{{ ('Nigeria'==$user->country)?'selected':''}}>Nigeria</option>
                            <option value="Niue"{{ ('Niue'==$user->country)?'selected':''}}>Niue</option>
                            <option value="Norfolk_Island"{{ ('Norfolk_Island'==$user->country)?'selected':''}}>Norfolk Island</option>
                            <option value="Northern_Mariana_Islands"{{ ('Northern_Mariana_Islands'==$user->country)?'selected':''}}>Northern Mariana Islands</option>
                            <option value="Norway"{{ ('Norway'==$user->country)?'selected':''}}>Norway</option>
                            <option value="Oman"{{ ('Oman'==$user->country)?'selected':''}}>Oman</option>
                            <option value="Pakistan"{{ ('Pakistan'==$user->country)?'selected':''}}>Pakistan</option>
                            <option value="Palau"{{ ('Palau'==$user->country)?'selected':''}}>Palau</option>
                            <option value="Palestinian_Territory_Occupied"{{ ('Palestinian_Territory_Occupied'==$user->country)?'selected':''}}>Palestinian Territory, Occupied</option>
                            <option value="Panama"{{ ('Panama'==$user->country)?'selected':''}}>Panama</option>
                            <option value="Papua_New_Guinea"{{ ('Papua_New_Guinea'==$user->country)?'selected':''}}>Papua New Guinea</option>
                            <option value="Paraguay"{{ ('Paraguay'==$user->country)?'selected':''}}>Paraguay</option>
                            <option value="Peru"{{ ('Peru'==$user->country)?'selected':''}}>Peru</option>
                            <option value="Philippines"{{ ('Philippines'==$user->country)?'selected':''}}>Philippines</option>
                            <option value="Pitcairn"{{ ('Pitcairn'==$user->country)?'selected':''}}>Pitcairn</option>
                            <option value="Poland"{{ ('Poland'==$user->country)?'selected':''}}>Poland</option>
                            <option value="Portugal"{{ ('Portugal'==$user->country)?'selected':''}}>Portugal</option>
                            <option value="Puerto_Rico"{{ ('Puerto_Rico'==$user->country)?'selected':''}}>Puerto Rico</option>
                            <option value="Qatar"{{ ('Qatar'==$user->country)?'selected':''}}>Qatar</option>
                            <option value="Réunion"{{ ('Réunion'==$user->country)?'selected':''}}>Réunion</option>
                            <option value="Romania"{{ ('Romania'==$user->country)?'selected':''}}>Romania</option>
                            <option value="Russian_Federation"{{ ('Russian_Federation'==$user->country)?'selected':''}}>Russian Federation</option>
                            <option value="Rwanda"{{ ('Rwanda'==$user->country)?'selected':''}}>Rwanda</option>
                            <option value="Saint_Barthélemy"{{ ('Saint_Barthélemy'==$user->country)?'selected':''}}>Saint Barthélemy</option>
                            <option value="Saint_Helena_Ascension_and_Tristan_da_Cunha"{{ ('Saint_Helena_Ascension_and_Tristan_da_Cunha'==$user->country)?'selected':''}}>Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="Saint_Kitts_and_Nevis"{{ ('Saint_Kitts_and_Nevis'==$user->country)?'selected':''}}>Saint Kitts and Nevis</option>
                            <option value="Saint_Lucia"{{ ('Saint_Lucia'==$user->country)?'selected':''}}>Saint Lucia</option>
                            <option value="Saint_Martin"{{ ('Saint_Martin'==$user->country)?'selected':''}}>Saint Martin (French part)</option>
                            <option value="Saint_Pierre_and_Miquelon"{{ ('Saint_Pierre_and_Miquelon'==$user->country)?'selected':''}}>Saint Pierre and Miquelon</option>
                            <option value="Saint_Vincent_and_the_Grenadines"{{ ('Saint_Vincent_and_the_Grenadines'==$user->country)?'selected':''}}>Saint Vincent and the Grenadines</option>
                            <option value="Samoa"{{ ('Samoa'==$user->country)?'selected':''}}>Samoa</option>
                            <option value="San_Marino"{{ ('San_Marino'==$user->country)?'selected':''}}>San Marino</option>
                            <option value="Sao_Tome_and_Principe"{{ ('Sao_Tome_and_Principe'==$user->country)?'selected':''}}>Sao Tome and Principe</option>
                            <option value="Saudi_Arabia"{{ ('Saudi_Arabia'==$user->country)?'selected':''}}>Saudi Arabia</option>
                            <option value="Senegal"{{ ('Senegal'==$user->country)?'selected':''}}>Senegal</option>
                            <option value="Serbia"{{ ('Serbia'==$user->country)?'selected':''}}>Serbia</option>
                            <option value="Seychelles"{{ ('Seychelles'==$user->country)?'selected':''}}>Seychelles</option>
                            <option value="Sierra_Leone"{{ ('Sierra_Leone'==$user->country)?'selected':''}}>Sierra Leone</option>
                            <option value="Singapore"{{ ('Singapore'==$user->country)?'selected':''}}>Singapore</option>
                            <option value="Sint_Maarten"{{ ('Sint_Maarten'==$user->country)?'selected':''}}>Sint Maarten (Dutch part)</option>
                            <option value="Slovakia"{{ ('Slovakia'==$user->country)?'selected':''}}>Slovakia</option>
                            <option value="Slovenia"{{ ('Slovenia'==$user->country)?'selected':''}}>Slovenia</option>
                            <option value="Solomon_Islands"{{ ('Solomon_Islands'==$user->country)?'selected':''}}>Solomon Islands</option>
                            <option value="Somalia"{{ ('Somalia'==$user->country)?'selected':''}}>Somalia</option>
                            <option value="South_Africa"{{ ('South_Africa'==$user->country)?'selected':''}}>South Africa</option>
                            <option value="South_Georgia_and_the_South_Sandwich_Islands"{{ ('South_Georgia_and_the_South_Sandwich_Islands'==$user->country)?'selected':''}}>South Georgia and the South Sandwich Islands</option>
                            <option value="South_Sudan"{{ ('South_Sudan'==$user->country)?'selected':''}}>South Sudan</option>
                            <option value="Spain"{{ ('Spain'==$user->country)?'selected':''}}>Spain</option>
                            <option value="Sri_Lanka"{{ ('Sri_Lanka'==$user->country)?'selected':''}}>Sri Lanka</option>
                            <option value="Sudan"{{ ('Sudan'==$user->country)?'selected':''}}>Sudan</option>
                            <option value="Suriname"{{ ('Suriname'==$user->country)?'selected':''}}>Suriname</option>
                            <option value="Svalbard_and_Jan_Mayen"{{ ('Svalbard_and_Jan_Mayen'==$user->country)?'selected':''}}>Svalbard and Jan Mayen</option>
                            <option value="Swaziland"{{ ('Swaziland'==$user->country)?'selected':''}}>Swaziland</option>
                            <option value="Sweden"{{ ('Sweden'==$user->country)?'selected':''}}>Sweden</option>
                            <option value="Switzerland"{{ ('Switzerland'==$user->country)?'selected':''}}>Switzerland</option>
                            <option value="Syrian_Arab_Republic"{{ ('Syrian_Arab_Republic'==$user->country)?'selected':''}}>Syrian Arab Republic</option>
                            <option value="Taiwan_Province_of_China"{{ ('Taiwan_Province_of_China'==$user->country)?'selected':''}}>Taiwan, Province of China</option>
                            <option value="Tajikistan"{{ ('Tajikistan'==$user->country)?'selected':''}}>Tajikistan</option>
                            <option value="Tanzania_United_Republic_of"{{ ('Tanzania_United_Republic_of'==$user->country)?'selected':''}}>Tanzania, United Republic of</option>
                            <option value="Thailand"{{ ('Thailand'==$user->country)?'selected':''}}>Thailand</option>
                            <option value="Timor_Leste"{{ ('Timor_Leste'==$user->country)?'selected':''}}>Timor-Leste</option>
                            <option value="Togo"{{ ('Togo'==$user->country)?'selected':''}}>Togo</option>
                            <option value="Tokelau"{{ ('Tokelau'==$user->country)?'selected':''}}>Tokelau</option>
                            <option value="Tonga"{{ ('Tonga'==$user->country)?'selected':''}}>Tonga</option>
                            <option value="Trinidad_and_Tobago"{{ ('Trinidad_and_Tobago'==$user->country)?'selected':''}}>Trinidad and Tobago</option>
                            <option value="Tunisia"{{ ('Tunisia'==$user->country)?'selected':''}}>Tunisia</option>
                            <option value="Turkey"{{ ('Turkey'==$user->country)?'selected':''}}>Turkey</option>
                            <option value="Turkmenistan"{{ ('Turkmenistan'==$user->country)?'selected':''}}>Turkmenistan</option>
                            <option value="Turks_and_Caicos_Islands"{{ ('Turks_and_Caicos_Islands'==$user->country)?'selected':''}}>Turks and Caicos Islands</option>
                            <option value="Tuvalu"{{ ('Tuvalu'==$user->country)?'selected':''}}>Tuvalu</option>
                            <option value="Uganda"{{ ('Uganda'==$user->country)?'selected':''}}>Uganda</option>
                            <option value="Ukraine"{{ ('Ukraine'==$user->country)?'selected':''}}>Ukraine</option>
                            <option value="United_Arab_Emirates"{{ ('United_Arab_Emirates'==$user->country)?'selected':''}}>United Arab Emirates</option>
                            <option value="United_Kingdom"{{ ('United_Kingdom'==$user->country)?'selected':''}}>United Kingdom</option>
                            <option value="United_States"{{ ('United_States'==$user->country)?'selected':''}}>United States</option>
                            <option value="United_States_Minor_Outlying_Islands"{{ ('United_States_Minor_Outlying_Islands'==$user->country)?'selected':''}}>United States Minor Outlying Islands</option>
                            <option value="Uruguay"{{ ('Uruguay'==$user->country)?'selected':''}}>Uruguay</option>
                            <option value="Uzbekistan"{{ ('Uzbekistan'==$user->country)?'selected':''}}>Uzbekistan</option>
                            <option value="Vanuatu"{{ ('Vanuatu'==$user->country)?'selected':''}}>Vanuatu</option>
                            <option value="Venezuela_Bolivarian_Republic_of"{{ ('Venezuela_Bolivarian_Republic_of'==$user->country)?'selected':''}}>Venezuela, Bolivarian Republic of</option>
                            <option value="Viet_Nam"{{ ('Viet_Nam'==$user->country)?'selected':''}}>Viet Nam</option>
                            <option value="Virgin_Islands_British"{{ ('Virgin_Islands_British'==$user->country)?'selected':''}}>Virgin Islands, British</option>
                            <option value="Virgin_Islands_U_S"{{ ('Virgin_Islands_U_S'==$user->country)?'selected':''}}>Virgin Islands, U.S.</option>
                            <option value="Wallis_and_Futuna"{{ ('Wallis_and_Futuna'==$user->country)?'selected':''}}>Wallis and Futuna</option>
                            <option value="Western_Sahara"{{ ('Western_Sahara'==$user->country)?'selected':''}}>Western Sahara</option>
                            <option value="Yemen"{{ ('Yemen'==$user->country)?'selected':''}}>Yemen</option>
                            <option value="Zambia"{{ ('Zambia'==$user->country)?'selected':''}}>Zambia</option>
                            <option value="Zimbabwe"{{ ('Zimbabwe'==$user->country)?'selected':''}}>Zimbabwe</option>
                       </select>  @if ($errors->has('country'))
                        <span id="country-error" class="error text-danger" for="input-countr">Country Region is Empty!</span>
                      @endif
                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Zipcode Code</label>
                                            <div class="form-group{{ $errors->has('zipcode') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" id="input-zipcode" type="text" placeholder="{{ __('Zipcode') }}"  value="{{ $user->zipcode}}"  aria-required="true"/>
                      @if ($errors->has('zipcode'))
                        <span id="zipcode-error" class="error text-danger" for="input-zipcode">Zipcode is Empty!</span>
                      @endif
                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}"  value="{{ $user->address}}"  aria-required="true"/>
                                            @if ($errors->has('address'))
                                              <span id="address-error" class="error text-danger" for="input-address">Address is Empty!</span>
                                            @endif
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Payment End -->

                        <!-- About Me -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">About Me</h4>
                                <div class="form-group mb-0">
                                    <label>Biography</label>
                                    <div class="form-group{{ $errors->has('biography') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('biography') ? ' is-invalid' : '' }}" name="biography" id="input-biography" type="text" placeholder="{{ __('Biography') }}"  value="{{ $user->biography}}"  aria-required="true"/>
                                            @if ($errors->has('biography'))
                                              <span id="biography-error" class="error text-danger" for="input-biography">Biography is Empty!</span>
                                            @endif
                                          </div>
                                    
                                </div>
                               
                            </div>
                          
                        </div>
									
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
									</div>
								</form>
								<!-- /Add Blog -->


								</div>
							</div>
                            <div class="card contact-card">
		<div class="card-body">
			<div class="payment-widget">
				<h4 class="card-title">Payment Information</h4>
                <form method='post'  action="{{ route('patient.acc.profile.update',$user->id) }}"  enctype="multipart/form-data">
					  @csrf
				

				<!-- Credit Card Payment -->
				<div class="payment-list">
					<label for="card-title">Account Details</label>
				
						<div class="row">
							<div class="col-md-6">
								<div class="form-group card-label">
										<label for="card_name">Account Holder's Name</label>
										<div class="form-group{{ $errors->has('acc_holder_name') ? ' has-danger' : '' }}">
									<input class="form-control{{ $errors->has('acc_holder_name') ? ' is-invalid' : '' }}" name="acc_holder_name" id="input-acc_holder_name" type="text" placeholder="{{ __('Account Holder Name') }}"  value="{{ $user->acc_holder_name}}"  aria-required="true"/>
									@if ($errors->has('acc_holder_name'))
									  <span id="acc_holder_name-error" class="error text-danger" for="input-acc_holder_name">Account Holder's Name is Empty!</span>
									@endif
								  </div>
									   
								</div>
							</div>
							<div class="col-md-6">
									<div class="form-group card-label">
										<label for="card_number">Account Number</label>
										<div class="form-group{{ $errors->has('acc_number') ? ' has-danger' : '' }}">
								<input class="form-control{{ $errors->has('acc_number') ? ' is-invalid' : '' }}" name="acc_number" id="input-acc_number" type="number" placeholder="{{ __('1234  5678  9876  5432') }}"  value="{{ $user->acc_number}}"  aria-required="true"/>
								@if ($errors->has('acc_number'))
								  <span id="acc_number-error" class="error text-danger" for="input-acc_number">Account Number is Empty!</span>
								@endif
							  </div>
										
									</div>
							</div>
								<div class="col-md-4">
									<div class="form-group card-label">
										<label for="expiry_month">IFSC Code</label>
										<div class="form-group{{ $errors->has('ifsc_code') ? ' has-danger' : '' }}">
								<input class="form-control{{ $errors->has('ifsc_code') ? ' is-invalid' : '' }}" name="ifsc_code" id="input-ifsc_code" type="text" placeholder="{{ __('ABCD1234') }}"  value="{{ $user->ifsc_code}}"  aria-required="true"/>
								@if ($errors->has('ifsc_code'))
								  <span id="ifsc_code-error" class="error text-danger" for="input-ifsc_code">IFSC Code is Empty!</span>
								@endif
							  </div>
									   
									</div>
							</div>
							<div class="col-md-4">
									<div class="form-group card-label">
										<label for="expiry_year">UPI ID</label>
										<div class="form-group{{ $errors->has('upi_id') ? ' has-danger' : '' }}">
								<input class="form-control{{ $errors->has('upi_id') ? ' is-invalid' : '' }}" name="upi_id" id="input-upi_id" type="text" placeholder="{{ __('UPI ID') }}"  value="{{ $user->upi_id}}"  aria-required="true"/>
								@if ($errors->has('upi_id'))
								  <span id="upi_id-error" class="error text-danger" for="input-upi_id">UPI ID is Empty!</span>
								@endif
							  </div>
									   
									</div>
							</div>

						</div>
								<div class="submit-section mt-4">
									<button type="submit" class="btn btn-primary submit-btn">Submit</button>
								</div>
				
				</div>
			</div>
            </form>
		</div>
	</div>

						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
    <!-- /Main Wrapper -->