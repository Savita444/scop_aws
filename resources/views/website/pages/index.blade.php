@extends('website.layout.masterlanding')
@section('content')
    <style>
        /* Custom CSS styles */
        #secondForm {
            width: 100%;
            display: none;
            /* Initially hide the second form */
            justify-content: center;
        }

        .content-display {
            display: flex;
            justify-content: center;
        }
    </style>
    <section>
        <div>
            <!-- Your background images here -->
            <img src="{{ asset('website/assets/images/inner-bg-landing.jpg') }}" class="img-fluid contact-img-mob"
                style="max-width: 100%;">
            <img src="{{ asset('website/assets/images/inner-bg-landing-mob.jpg') }}" class="img-fluid contact-img-web"
                style="max-width: 100%;">
        </div>
    </section>

    <section id="about-sec">
        <div class="container" style="padding-bottom:70px;">


            <h2>IF YOU GOT ANY QUESTIONS<br>
                PLEASE DO NOT HESITATE TO SEND US A MESSAGE.</h2>

            <!-- First Form -->
            <div id ="emptydiv">
                <form class="forms-sample" action="{{ route('add-contactus') }}" id="regForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_type" value="first_form">

                    <div class="con-form clearfix">
                        <!-- Input fields for the first form -->
                        <div class="col-md-6">
                            <input type="text" name="full_name" value="" size="40" class=""
                                id="full_name" aria-required="true" aria-invalid="false" placeholder="Your Full Name">
                            <span id="number-validate" class="red-text"></span>
                            @if ($errors->has('full_name'))
                                <span class="red-text">
                                    <?php echo $errors->first('full_name', ':message'); ?>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="contact_number" value="" size="40" class=""
                                id="contact_number" aria-required="true" aria-invalid="false"
                                placeholder="Your Contact Number" value="{{ old('contact_number') }}"
                                maxlength="10" minlength="10" placeholder="Contact Number"
                                onkeyup="addvalidateMobileNumber(this.value)">
                            <span id="number-validate" class="red-text"></span>
                            @if ($errors->has('contact_number'))
                                <span class="red-text">
                                    <?php echo $errors->first('contact_number', ':message'); ?>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="whats_app_number" value="" size="40"
                                id="whats_app_number" class="" aria-required="true" aria-invalid="false"
                                placeholder="Your Whats App Number" value="{{ old('whats_app_number') }}"
                                maxlength="10" minlength="10" placeholder="Whats App Number"
                                onkeyup="addvalidateWhatsNumber(this.value)">
                            <span id="number-validate" class="red-text"></span>
                            @if ($errors->has('whats_app_number'))
                                <span class="red-text">
                                    <?php echo $errors->first('whats_app_number', ':message'); ?>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="education" value="" size="40" class=""
                                id="education" aria-invalid="false" placeholder="Education">
                            <span id="number-validate" class="red-text"></span>
                            @if ($errors->has('education'))
                                <span class="red-text">
                                    <?php echo $errors->first('education', ':message'); ?>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="" style="padding-top: 30px;">
                        <div class="col-md-12 py-3 captcha_set mt-3" style="text-align: left;">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <span class="red-text">{{ $errors->first('g-recaptcha-response') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 submit-button" style="float:right; width:auto;">
                        <!-- Change the type to button -->
                        <button type="submit" class="btn2" id="submitFirstForm"
                            style="border:none; margin: 20px 0 0 0">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center" style="">
            <div class="col-md-4" style="margin-bottom:20px; ">
                <div class="con-box">
                    <div class="fancy-box-icon">
                        <i class="fa fa-mobile-phone"></i>
                    </div>
                    <h3>HEAD OFFICE</h3>
                    <div class="fancy-box-content">
                        <p> Third Floor, Gajra Chambers, Mumbai - Agra National Hwy, Kamod Nagar, Indira Nagar, Nashik,<br>
                            Maharashtra 422009</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:20px; ">
                <div class="con-box" style="background:#000000;">
                    <div class="fancy-box-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h3>ADDRESS</h3>
                    <div class="fancy-box-content">
                        <p>The Avenue, Fourth Floor, Behind Prakash Petrol Pump, Govind Nagar, Nashik,<br> Maharashtra
                            422009</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom:20px; ">
                <div class="con-box" style="height:258px; ">
                    <div class="fancy-box-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <h3>EMAIL</h3>
                    <div class="fancy-box-content">
                        <p>
                            <a href="mailto:info@sumagoinfotech.com" style="cursor: pointer; color:#fff;">
                                info@sumagoinfotech.com
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div>
    <div class="row google-maps mt-4" style="margin-right: 0px !important;">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.6235047176656!2d73.77331941491543!3d19.982329686574435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebaead9a4d49%3A0xfd6c10f8929d7902!2sSUMAGO%20INFOTECH!5e0!3m2!1sen!2sin!4v1595588446730!5m2!1sen!2sin"
            width="1425" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <script></script>
    <script>
        function addvalidateMobileNumber(number) {
            var mobileNumberPattern = /^\d*$/;
            var validationMessage = document.getElementById("validation-message");

            if (mobileNumberPattern.test(number)) {
                validationMessage.textContent = "";
            } else {
                validationMessage.textContent = "Please enter only numbers.";
            }
        }
    </script>

<script>
    function addvalidateWhatsNumber(number) {
        var mobileNumberPattern = /^\d*$/;
        var validationMessage = document.getElementById("validation-message");

        if (mobileNumberPattern.test(number)) {
            validationMessage.textContent = "";
        } else {
            validationMessage.textContent = "Please enter only numbers.";
        }
    }
</script>
@endsection
