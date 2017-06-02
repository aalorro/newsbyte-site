
    @extends('theme')

    @section('content')
        <section class="cntry_select">
            <div class="container">
                <h4>Select Country</h4>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">Southeast Asia<span></span></li>
                    <li><a href="{{url('scoresbyte/r/sea/Cambodia')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/kh.png')"></div> Cambodia</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Indonesia')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/id.png')"></div> Indonesia</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Laos')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/la.png')"></div> Laos</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Malaysia')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/mm.png')"></div> Malaysia</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Myanmar')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/my.png')"></div> Myanmar</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Philippines')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/ph.png')"></div> Philippines</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Thailand')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/th.png')"></div> Thailand</a></li>
                    <li><a href="{{url('scoresbyte/r/sea/Vietnam')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/vn.png')"></div> Vietnam</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">Central Asia<span></span></li>
                    <li><a href="{{url('scoresbyte/r/ca/Kazakhstan')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/kz.png')"></div> Kazakhstan</a></li>
                    <li><a href="{{url('scoresbyte/r/ca/Kyrgyzstan')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/kg.png')"></div> Kyrgyzstan</a></li>
                    <li><a href="{{url('scoresbyte/r/ca/Tajikistan')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/tj.png')"></div> Tajikistan</a></li>
                    <li><a href="{{url('scoresbyte/r/ca/Uzbekistan')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/uz.png')"></div> Uzbekistan</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">East Asia<span></span></li>
                    <li><a href="{{url('scoresbyte/r/ea/Mongolia')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/mn.png')"></div> Mongolia</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">South Asia<span></span></li>
                    <li><a href="{{url('scoresbyte/r/sa/Bangladesh')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/bd.png')"></div> Bangladesh</a></li>
                    <li><a href="{{url('scoresbyte/r/sa/Bhutan')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/bt.png')"></div> Bhutan</a></li>
                    <li><a href="{{url('scoresbyte/r/sa/India')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/in.png')"></div> India</a></li>
                    <li><a href="{{url('scoresbyte/r/sa/Maldives')}}"><div class="bg_img" style="background-image: url('images/flags/mv.png')"></div> Maldives</a></li>
                    <li><a href="{{url('scoresbyte/r/sa/Nepal')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/np.png')"></div> Nepal</a></li>
                    <li><a href="{{url('scoresbyte/r/sa/Pakistan')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/pk.png')"></div> Pakistan</a></li>
                    <li><a href="{{url('scoresbyte/r/sa/Sri Lanka')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/lk.png')"></div> Sri Lanka</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">West Asia<span></span></li>
                    <li><a href="{{url('scoresbyte/r/wa/Iraq')}}"><div class="bg_img" style="background-image: url('images/flags/iq.png')"></div> Iraq</a></li>
                    <li><a href="{{url('scoresbyte/r/wa/Lebanon')}}"><div class="bg_img" style="background-image: url('images/flags/lb.png')"></div> Lebanon</a></li>
                    <li><a href="{{url('scoresbyte/r/wa/Oman')}}"><div class="bg_img" style="background-image: url('images/flags/om.png')"></div> Oman</a></li>
                    <li><a href="{{url('scoresbyte/r/wa/Palestine')}}"><div class="bg_img" style="background-image: url('images/flags/ps.png')"></div> Palestine</a></li>
                    <li><a href="{{url('scoresbyte/r/wa/Saudi Arabia')}}"><div class="bg_img" style="background-image: url('images/flags/sa.png')"></div> Saudi Arabia</a></li>
                    <li><a href="{{url('scoresbyte/r/wa/Yemen')}}"><div class="bg_img" style="background-image: url('http://dev.newsbyte.org/images/flags/ye.png')"></div> Yemen</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">Eastern Europe<span></span></li>
                    <li><a href="{{url('scoresbyte/r/ee/Belarus')}}"><div class="bg_img" style="background-image: url('images/flags/by.png')"></div> Belarus</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">Africa<span></span></li>
                    <li><a href="{{url('scoresbyte/r/af/Algeria')}}"><div class="bg_img" style="background-image: url('images/flags/dz.png')"></div> Algeria</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Angola')}}"><div class="bg_img" style="background-image: url('images/flags/ao.png')"></div> Angola</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Botswana')}}"><div class="bg_img" style="background-image: url('images/flags/bw.png')"></div> Botswana</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Burkina Faso')}}"><div class="bg_img" style="background-image: url('images/flags/bf.png')"></div> Burkina Faso</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Cameroon')}}"><div class="bg_img" style="background-image: url('images/flags/cm.png')"></div> Cameroon</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Cape Verde')}}"><div class="bg_img" style="background-image: url('images/flags/cv.png')"></div> Cape Verde</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Congo-Kinshasa')}}"><div class="bg_img" style="background-image: url('images/flags/cg.png')"></div> Congo-Kinshasa</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Djibouti')}}"><div class="bg_img" style="background-image: url('images/flags/dj.png')"></div> Djibouti</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Egypt')}}"><div class="bg_img" style="background-image: url('images/flags/eg.png')"></div> Egypt</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Eritrea')}}"><div class="bg_img" style="background-image: url('images/flags/er.png')"></div> Eritrea</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Ethiopia')}}"><div class="bg_img" style="background-image: url('images/flags/et.png')"></div> Ethiopia</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Gabon')}}"><div class="bg_img" style="background-image: url('images/flags/ga.png')"></div> Gabon</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Gambia')}}"><div class="bg_img" style="background-image: url('images/flags/gm.png')"></div> Gambia</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Ghana')}}"><div class="bg_img" style="background-image: url('images/flags/gh.png')"></div> Ghana</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Guinea')}}"><div class="bg_img" style="background-image: url('images/flags/gn.png')"></div> Guinea</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Kenya')}}"><div class="bg_img" style="background-image: url('images/flags/ke.png')"></div> Kenya</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Liberia')}}"><div class="bg_img" style="background-image: url('images/flags/lr.png')"></div> Liberia</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Madagascar')}}"><div class="bg_img" style="background-image: url('images/flags/mg.png')"></div> Madagascar</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Malawi')}}"><div class="bg_img" style="background-image: url('images/flags/mw.png')"></div> Malawi</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Mauritania')}}"><div class="bg_img" style="background-image: url('images/flags/mr.png')"></div> Mauritania</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Morocco')}}"><div class="bg_img" style="background-image: url('images/flags/ma.png')"></div> Morocco</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Mozambique')}}"><div class="bg_img" style="background-image: url('images/flags/mz.png')"></div> Mozambique</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Namibia')}}"><div class="bg_img" style="background-image: url('images/flags/na.png')"></div> Namibia</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Niger')}}"><div class="bg_img" style="background-image: url('images/flags/ne.png')"></div> Niger</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Nigeria')}}"><div class="bg_img" style="background-image: url('images/flags/ng.png')"></div> Nigeria</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Rwanda')}}"><div class="bg_img" style="background-image: url('images/flags/rw.png')"></div> Rwanda</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Senegal')}}"><div class="bg_img" style="background-image: url('images/flags/sn.png')"></div> Senegal</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Seychelles')}}"><div class="bg_img" style="background-image: url('images/flags/sc.png')"></div> Seychelles</a></li>
                    <li><a href="{{url('scoresbyte/r/af/South Africa')}}"><div class="bg_img" style="background-image: url('images/flags/za.png')"></div> South Africa</a></li>
                    <li><a href="{{url('scoresbyte/r/af/South Sudan')}}"><div class="bg_img" style="background-image: url('images/flags/sd.png')"></div> South Sudan</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Tanzania')}}"><div class="bg_img" style="background-image: url('images/flags/tz.png')"></div> Tanzania</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Uganda')}}"><div class="bg_img" style="background-image: url('images/flags/ug.png')"></div> Uganda</a></li>
                    <li><a href="{{url('scoresbyte/r/af/Zambia')}}"><div class="bg_img" style="background-image: url('images/flags/zm.png')"></div> Zambia</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">South America<span></span></li>
                    <li><a href="{{url('scoresbyte/r/sam/Argentina')}}"><div class="bg_img" style="background-image: url('images/flags/ar.png')"></div> Argentina</a></li>
                    <li><a href="{{url('scoresbyte/r/sam/Bolivia')}}"><div class="bg_img" style="background-image: url('images/flags/bo.png')"></div> Bolivia</a></li>
                    <li><a href="{{url('scoresbyte/r/sam/Brazil')}}"><div class="bg_img" style="background-image: url('images/flags/br.png')"></div> Brazil</a></li>
                    <li><a href="{{url('scoresbyte/r/sam/Chile')}}"><div class="bg_img" style="background-image: url('images/flags/cl.png')"></div> Chile</a></li>
                    <li><a href="{{url('scoresbyte/r/sam/Colombia')}}"><div class="bg_img" style="background-image: url('images/flags/co.png')"></div> Colombia</a></li>
                    <li><a href="{{url('scoresbyte/r/sam/Peru')}}"><div class="bg_img" style="background-image: url('images/flags/pe.png')"></div> Peru</a></li>
                </ul>
                <ul class="list-unstyled list_cntry">
                    <li class="country_title">Central America / Mexico / Caribbean<span></span></li>
                    <li><a href="{{url('scoresbyte/r/cam/Dominican Republic')}}"><div class="bg_img" style="background-image: url('images/flags/do.png')"></div> Dominican Republic</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/El Salvador')}}"><div class="bg_img" style="background-image: url('images/flags/sv.png')"></div> El Salvador</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/Guatemala')}}"><div class="bg_img" style="background-image: url('images/flags/gt.png')"></div> Guatemala</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/Haiti')}}"><div class="bg_img" style="background-image: url('images/flags/ht.png')"></div> Haiti</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/Jamaica')}}"><div class="bg_img" style="background-image: url('images/flags/jm.png')"></div> Jamaica</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/Mexico')}}"><div class="bg_img" style="background-image: url('images/flags/mx.png')"></div> Mexico</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/Nicaragua')}}"><div class="bg_img" style="background-image: url('images/flags/ni.png')"></div> Nicaragua</a></li>
                    <li><a href="{{url('scoresbyte/r/cam/Panama')}}"><div class="bg_img" style="background-image: url('images/flags/pa.png')"></div> Panama</a></li>
                </ul>
            </div>
            <center>
                <a href="https://0.freebasics.com/?ref=badges"><img src="{{asset('images/freebasic.jpg')}}" alt="freebasic" width="150px"></a>
            </center>
        </section>
    @stop