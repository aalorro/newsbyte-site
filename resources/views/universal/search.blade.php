
    <div class="container">
            <div class="form_cntry">
                <form method="GET" action="/find/{{ $region }}/{{ $country }}/q/">
                    <div class="row">
                        <div class="col-md-8 col-xs-8">
                            <input type="text" class="form-control" name="key"  placeholder="Search News" required/>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-default" id="" value="Search"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="form_cntry">
                <form method="POST" action="{{url('search/')}}">
                    <div class="row">
                        <div class="col-md-10 col-xs-9">
                            <div class="form-group">
                                <select class="form-control" name="nav">
                                    <option>-- Select Country --</option>
                                    <optgroup label="Southeast Asia">
                                        <option value="sea/Cambodia">Cambodia</option>
                                        <option value="sea/Indonesia">Indonesia</option>
                                        <option value="sea/Laos">Laos</option>
                                        <option value="sea/Malaysia">Malaysia</option>
                                        <option value="sea/Myanmar">Myanmar</option>
                                        <option value="sea/Philippines">Philippines</option>
                                        <option value="sea/Thailand">Thailand</option>
                                    </optgroup>
                                    <optgroup label="Central Asia">
                                        <option value="ca/Kazakhstan">Kazakhstan</option>
                                        <option value="ca/Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="ca/Tajikistan">Tajikistan</option>
                                        <option value="ca/Uzbekistan">Uzbekistan</option>
                                    </optgroup>
                                    <optgroup label="East Asia">
                                        <option value="ea/Mongolia">Mongolia</option>
                                    </optgroup>
                                    <optgroup label="South Asia">
                                        <option value="sa/Bhutan">Bhutan</option>
                                        <option value="sa/Bangladesh">Bangladesh</option>
                                        <option value="sa/India">India</option>
                                        <option value="sa/Maldives">Maldives</option>
                                        <option value="sa/Nepal">Nepal</option>
                                        <option value="sa/Pakistan">Pakistan</option>
                                        <option value="sa/Sri Lanka">Sri Lanka</option>
                                    </optgroup>
                                    <optgroup label="West Asia">
                                        <option value="wa/Iraq">Iraq</option>
                                        <option value="wa/Lebanon">Lebanon</option>
                                        <option value="wa/Oman">Oman</option>
                                        <option value="wa/Palestine">Palestine</option>
                                        <option value="wa/Saudi Arabia">Saudi Arabia</option>
                                        <option value="wa/Yemen">Yemen</option>
                                    </optgroup>
                                    <optgroup label="Africa">
                                        <option value="af/Algeria">Algeria</option>
                                        <option value="af/Angola">Angola</option>
                                        <option value="af/Burkina Faso">Burkina Faso</option>
                                        <option value="af/Botswana">Botswana</option>
                                        <option value="af/Cameroon">Cameroon</option>
                                        <option value="af/Cape Verde">Cape Verde</option>
                                        <option value="af/Congo-Kinshasa">Congo-Kinshasa</option>
                                        <option value="af/Djibouti">Djibouti</option>
                                        <option value="af/Egypt">Egypt</option>
                                        <option value="af/Eritrea">Eritrea</option>
                                        <option value="af/Ethiopia">Ethiopia</option>
                                        <option value="af/Gabon">Gabon</option>
                                        <option value="af/Gambia">Gambia</option>
                                        <option value="af/Ghana">Ghana</option>
                                        <option value="af/Guinea">Guinea</option>
                                        <option value="af/Kenya">Kenya</option>
                                        <option value="af/Liberia">Liberia</option>
                                        <option value="af/Madagascar">Madagascar</option>
                                        <option value="af/Malawi">Malawi</option>
                                        <option value="af/Mauritania">Mauritania</option>
                                        <option value="af/Morocco">Morocco</option>
                                        <option value="af/Mozambique">Mozambique</option>
                                        <option value="af/Namibia">Namibia</option>
                                        <option value="af/Niger">Niger</option>
                                        <option value="af/Nigeria">Nigeria</option>
                                        <option value="af/Rwanda">Rwanda</option>
                                        <option value="af/Senegal">Senegal</option>
                                        <option value="af/Seychelles">Seychelles</option>
                                        <option value="af/South Africa">South Africa</option>
                                        <option value="af/South Sudan">South Sudan</option>
                                        <option value="af/Tanzania">Tanzania</option>
                                        <option value="af/Uganda">Uganda</option>
                                        <option value="af/Zambia">Zambia</option>
                                    </optgroup>
                                    <optgroup label="South America">
                                        <option value="sam/Argentina">Argentina</option>
                                        <option value="sam/Brazil">Brazil</option>
                                        <option value="sam/Bolivia">Bolivia</option>
                                        <option value="sam/Chile">Chile</option>
                                        <option value="sam/Colombia">Colombia</option>
                                        <option value="sam/Peru">Peru</option>
                                    </optgroup>
                                    <optgroup label="Central America / Mexico / Caribbean">
                                        <option value="cam/Dominican Republic">Dominican Republic</option>
                                        <option value="cam/El Salvador">El Salvador</option>
                                        <option value="cam/Guatemala">Guatemala</option>
                                        <option value="cam/Haiti">Haiti</option>
                                        <option value="cam/Jamaica">Jamaica</option>
                                        <option value="cam/Mexico">Mexico</option>
                                        <option value="cam/Nicaragua">Nicaragua</option>
                                        <option value="cam/Panama">Panama</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-3">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-default" id="" value="Go"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
