@extends('layouts.indexLayout')
@section('content')

<!-- Page Title--> 
<div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset('assets/img/page-title/blog-pattern.jpg')}});">
  <div class="container text-left align-self-center">
    <h1 class="page-title-heading">Contact Us</h1>
  </div>
</div>
    <!-- Contact Details-->
    <section class="container-fluid mb-5">
      <div class="row">
        <div class="col-md-3 col-sm-6 border-right py-2 border-bottom"><a class="scroll-to icon-box text-center mx-auto box-shadow-none px-0" href="#map">
            <div class="icon-box-icon"><i class="fe-icon-map-pin"></i></div>
            <h3 class="icon-box-title">Find us</h3>
            <p class="icon-box-text font-weight-medium">{{$profileCompany->country}}</p></a></div>
        <div class="col-md-3 col-sm-6 py-2 border-right border-bottom"><a class="icon-box text-center mx-auto box-shadow-none px-0" href="tel:{{$profileCompany->phone_local}}">
            <div class="icon-box-icon"><i class="fe-icon-phone"></i></div>
            <h3 class="icon-box-title">Call us</h3>
            <p class="icon-box-text font-weight-medium">{{$profileCompany->phone_local}}</p></a></div>
        <div class="col-md-3 col-sm-6 py-2 border-right border-bottom"><a class="icon-box text-center mx-auto box-shadow-none px-0" href="{{$profileCompany->email}}">
            <div class="icon-box-icon"><i class="fe-icon-mail"></i></div>
            <h3 class="icon-box-title">Email us</h3>
            <p class="icon-box-text font-weight-medium">{{$profileCompany->email}}</p></a></div>
        <div class="col-md-3 col-sm-6 py-2 border-bottom"><a class="icon-box text-center mx-auto box-shadow-none px-0" href="https://www.facebook.com/estudio2b.dev">
            <div class="icon-box-icon"><i class="fe-icon-facebook"></i></div>
            <h3 class="icon-box-title">Follow us</h3>
            <p class="icon-box-text font-weight-medium">Facebook</p></a></div>
      </div>
    </section>
    <!-- Contact Form-->
    <section class="container mb-5 pb-3">
      <div class="wizard">
        <div class="wizard-body pt-3">
          <h2 class="h4 text-center">Drop us a line</h2>
          <p class="text-muted text-center">We will get back to you as soon as possible</p>
          <form class="needs-validation" novalidate>
            <div class="row pt-3">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-name">Your Name <span class='text-danger font-weight-medium'>*</span></label>
                  <input class="form-control" type="text" id="contact-name" placeholder="John Doe" required>
                  <div class="invalid-feedback">Please enter your name!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-email">Your Email <span class='text-danger font-weight-medium'>*</span></label>
                  <input class="form-control" type="email" id="contact-email" placeholder="johndoe@email.com" required>
                  <div class="invalid-feedback">Please provide a valid email address!</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-subject">Subject</label>
                  <input class="form-control" type="text" id="contact-subject" placeholder="Provide short title of you request">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact-file">Attachment</label>
                  <div class="custom-file">
                    <input class="custom-file-input" type="file" id="contact-file">
                    <label class="custom-file-label" for="contact-file">Choose file...</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="contact-message">Message <span class='text-danger font-weight-medium'>*</span></label>
              <textarea class="form-control" rows="7" id="contact-message" placeholder="Let us know more what's on your mind..." required></textarea>
              <div class="invalid-feedback">Please write a message!</div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Map-->
    <!--<section class="google-map" id="map" data-height="400" data-address="New York, USA" data-zoom="10" data-disable-controls="false" data-scrollwheel="false" data-marker="img/map-marker.png" data-marker-title="We are here!" data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FFBB00&quot;},{&quot;saturation&quot;:43.400000000000006},{&quot;lightness&quot;:37.599999999999994},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FFC200&quot;},{&quot;saturation&quot;:-61.8},{&quot;lightness&quot;:45.599999999999994},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FF0300&quot;},{&quot;saturation&quot;:-100},{&quot;lightness&quot;:51.19999999999999},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FF0300&quot;},{&quot;saturation&quot;:-100},{&quot;lightness&quot;:52},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#0078FF&quot;},{&quot;saturation&quot;:-13.200000000000003},{&quot;lightness&quot;:2.4000000000000057},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#00FF6A&quot;},{&quot;saturation&quot;:-1.0989010989011234},{&quot;lightness&quot;:11.200000000000017},{&quot;gamma&quot;:1}]}]"></section>-->

@endsection