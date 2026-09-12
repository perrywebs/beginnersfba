<div>
    <style>
        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            width: 100%;
            padding-right: 45px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            display: flex;
            align-items: center;
            color: #6c757d;
        }

        .password-toggle:hover {
            color: #000;
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }
    </style>
    <form wire:submit.prevent="save" style="font-size: 20px">

        <p class="comment-form-author">
            <label for="author">Name <span class="required" aria-hidden="true">*</span></label>
            <input id="author" wire:model.blur="name" type="text" value="" size="30" maxlength="245">
            @error('name')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>
        <p class="comment-form-email">
            <label for="email">Email <span class="required" aria-hidden="true">*</span></label>
            <input id="email" wire:model.blur="email" type="email" value="" size="30" maxlength="100"
                aria-describedby="email-notes">
            @error('email')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>
        <p class="comment-form-url">
            <label for="phone">Phone <span class="required" aria-hidden="true">*</span></label>
            <input id="phone" wire:model.blur="phone" type="number" value="" size="30" maxlength="200">
            @error('phone')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <!-- New Password Field -->
        <p class="comment-form-url">
            <label for="password">
                Password <span class="required" aria-hidden="true">*</span>
            </label>

        <div class="password-wrapper">
            <input id="password" wire:model.blur="password" type="password" size="30" maxlength="200">

            <span class="password-toggle" id="togglePassword">
                <!-- Eye Icon -->
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7
                    -1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </span>
        </div>

        @error('password')
            <em class="text-danger">{{ $message }}</em>
        @enderror
        </p>


        <!-- New Confirm Password Field -->
        <p class="comment-form-url">
            <label for="password_confirmation">Confirm Password <span class="required"
                    aria-hidden="true">*</span></label>
            <input id="password_confirmation" wire:model.blur="password_confirmation" type="password" value=""
                size="30" maxlength="200">
            @error('password_confirmation')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">Country<span class="required" aria-hidden="true">*</span></label>
            <select wire:model="country" data-bs-placeholder="Select Country">
                <option value="">Select Country</option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina
                </option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean
                    Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African
                    Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote DIvoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter
                </option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="India">India</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles
                </option>
                <option value="Netherlands">Netherlands (Holland, Europe)
                </option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro
                </option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre & Miquelon">St Pierre & Miquelon
                </option>
                <option value="St Vincent & Grenadines">St Vincent & Grenadines
                </option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome & Principe">Sao Tome & Principe
                </option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates
                </option>
                <option value="United States of America">United States of
                    America
                </option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)
                </option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)
                </option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
            @error('country')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">Did you watch the entire training before applying? <span class="required"
                    aria-hidden="true">*</span></label>
            <select wire:model.blur="watch_training_before_applying">
                <option value="">Please Select One</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            @error('watch_training_before_applying')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">What is your budget to invest in your business? <span class="required"
                    aria-hidden="true">*</span></label>
            <select wire:model.blur="budget_to_invest">
                <option value="">Please Select One</option>
                <option value="$30k +">$30k +</option>
                <option value="$10,000 - $20,000">$10,000 - $20,000</option>
                <option value="$10,000 - $20,000">$5,000 - $10,000</option>
                <option value="$10,000 - $20,000">$2,500 - $5,000</option>
                <option value="$10,000 - $20,000">$1,000 - $2,500</option>
                <option value="$10,000 - $20,000">$250 - $1,000</option>
            </select>
            @error('budget_to_invest')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">What is your biggest struggle in starting or growing an
                BeginnersFba business? <span class="required" aria-hidden="true">*</span></label>
            <textarea id="comment" wire:model.blur="struggle_growing_business" cols="45" rows="8"
                maxlength="65525"></textarea>
            @error('struggle_growing_business')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">What is your experience selling products on Amazon? <span class="required"
                    aria-hidden="true">*</span></label>
            <textarea id="comment" wire:model.blur="experience_selling_on_amazon" cols="45" rows="8"
                maxlength="65525"></textarea>
            @error('experience_selling_on_amazon')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">If you're accepted, how soon can you get started? <span class="required"
                    aria-hidden="true">*</span></label> <input id="phone"
                wire:model.blur="how_soon_will_you_start" type="text" value="" size="30"
                maxlength="200">
            @error('how_soon_will_you_start')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="comment-form-comment">
            <label for="comment">Do you <b>PROMISE</b> that if you qualify you will show up to the
                call? <span class="required" aria-hidden="true">*</span></label>
            <select wire:model.blur="promise">
                <option value="">Please Select One</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            @error('promise')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </p>

        <p class="form-submit">
            <button wire:loading.attr="disabled" wire:target="save"
                class="login100-form-btn text-white btn btn-primary" type="submit">
                <span wire:loading.remove wire:target="save">Done</span>
                <span wire:loading wire:target="save">
                    <x-spinner size="sm" />
                </span>
            </button>
        </p>
    </form>
    <span class="extra-line">
        <span>Already have an account? </span>
        <a href="/access">Sign in</a>
    </span>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const toggle = document.getElementById('togglePassword');
            const icon = document.getElementById('eyeIcon');

            toggle.addEventListener('click', function() {

                if (password.type === 'password') {
                    password.type = 'text';

                    icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3l18 18"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.584 10.587A2 2 0 0013.414 13.4"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.88 5.09A9.77 9.77 0 0112 5
                    c4.477 0 8.268 2.943 9.542 7
                    a9.752 9.752 0 01-4.293 5.135
                    M6.228 6.228A9.76 9.76 0 002.458 12
                    c1.274 4.057 5.065 7 9.542 7
                    a9.77 9.77 0 004.09-.88"/>
            `;
                } else {
                    password.type = 'password';

                    icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7
                    -1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z"/>
                <circle cx="12" cy="12" r="3"/>
            `;
                }

            });
        });
    </script>
</div>
