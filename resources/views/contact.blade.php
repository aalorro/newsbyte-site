    @extends('theme')

    @section('headtag_additionalCodes')
        
    <!-- <script src="https://www.google.com/recaptcha/api.js?">
    </script> -->
    

    @stop

    @section('content')
        <div class="container contact_us">
            <center>
                <h2>Contact Us</h2>
                <span class="divider_contact"></span>
            </center><br/>
            <form id="contact_form" method="POST" action="contact">
                <div class="row">
                @if(isset($success))
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                        <div class="alert alert-success" role="alert">{{ $success }}</div>
                    </div>
                @endif
                @if(isset($error))
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    </div>
                @endif
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="Full Name" name="name" required/>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                        <div class="form-group">
                            <input type="email" class="form-control input-lg" placeholder="Email Address" name="email" required/>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="City, Country" name="c_number" required/>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2 form-group">
                        <textarea class="form-control wow contact_form3 input-lg" rows="6" placeholder="Your message here .." name="contact_message" required/></textarea>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                        <!-- <br/>
                        <div class="g-recaptcha" data-sitekey="6Lc-rhITAAAAANWbhgzum6e6MG87L8VRQp0D4zEK"></div> -->
                        <div class="form-group">
                           <label><input type="checkbox" name="" required>I'm not a robot</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-8 col-xs-offset-2 col-md-xs-3 col-sm-offset-3">
                        <div class="form-group"><br/>
                            <input type="submit" class="btn btn-lg btn-block btn-primary" value="Submit" />
                        </div>
                    </div>
                </div>

            </form>
            <center>
                <span class="divider_contact"></span>
            </center>
        </div>
        
    @stop