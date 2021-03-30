@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">

       <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px;border-radius: 25px; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>

            <form action="#" id="contact_form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email or Phone </label>
    <input type="text" class="form-control" placeholder="Enter email or phone" name="email" required="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" required="">
    </div> 

          <div class="contact_form_button">
          <button type="submit" class="btn btn-info">LogIn</button>
         </div>
         </form>

         <br><br>

         <button type="submit" class="btn btn-primary btn-block">
            <i class="fab fa-facebook"></i>  login  with facebook</button>
         <button type="submit" class="btn btn-danger btn-block">
            <i class="fab fa-google"></i>  login with google</button>

         </div>
        </div>

               <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px;border-radius: 25px; ">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign Up</div>

                         <form action="{{route('register')}}" id="contact_form" method="post">
                            @csrf

              <div class="form-group">
               <label for="exampleInputEmail1">Full Name </label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your full name" required="">    
             </div>

              <div class="form-group">
               <label for="exampleInputEmail1">Email </label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Enter your email" name="email" required="">    
             </div>

              <div class="form-group">
               <label for="exampleInputEmail1">phone </label>
               <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"  placeholder="Enter your phone " name="phone" required="">    
             </div>

              <div class="form-group">
               <label for="exampleInputEmail1">password </label>
               <input type="password" class="form-control" placeholder="Enter your password" name="email" required="">    
             </div>

              <div class="form-group">
               <label for="exampleInputEmail1">confirm password </label>
               <input type="password" class="form-control" placeholder="recreate your password" name="password_confirmation" required="">    
             </div>


                 <div class="contact_form_button">
                 <button type="submit" class="btn btn-info">Register</button>
                  </div>
                  </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
