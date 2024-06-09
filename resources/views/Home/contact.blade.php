@extends('Home.navBar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/></head>
    <style>
    .image{
        background-image:url("/assets/background.jpg");
        width:100%;
        height: 500px;
        padding-top: 100px;
        margin-top: 0;
    }
    /* 600px */
</style>
<div style="width: 100%">
    <div class="mapouter" id="googleaddress">
        <div class="gmap_canvas">
        <iframe src="https://maps.google.com/maps?q=11.599059,%2037.364373&amp;
            t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" id="gmap_canvas" 
            frameborder="0" scrolling="yes" style="width: 100%; height: 600px;"></iframe>
            <a href="https://fnftest.net" style="display:none">fnf test</a><style>
            .mapouter{position:relative;text-align:right;height:100%;width:100%;}
            </style><a href="https://googlemapsiframegenerator.com" style="display:none">
            Google Maps Iframe Generator - Free Html Embed Code</a>
    <style>
        .gmap_canvas{overflow:hidden;background:none!important;height:90%;width:fit; margin-top:30px;;}
</style>
</div>
</div>
      
  <div class="right">
  <!-- <html> -->
<head>
<style>

*, *:before, *:after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  /* -moz-osx-font-smoothing: grayscale; */
}
 
body {
  /* background: linear-gradient(to right, #ea1d6f 0%, #eb466b 100%); */
  font-size: 12px;
}
 
body, button, input {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1.4px;
}
 
.background {
  display: flex;
  min-height: 100vh;
}
 
.container {
  flex: 0 1 700px;
  margin: auto;
  padding: 10px;
}
 
.screen {
  position: relative;
  background: gray;
  border-radius: 15px;
}
 
.screen:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  /* box-shadow: 0 20px 40px rgba(0, 0, 0, .4); */
  z-index: -1;
}
 
.screen-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background: #4d4d4f;
  /* border-top-left-radius: 15px;
  border-top-right-radius: 15px; */
}
.screen-header-right {
  display: flex;
}
 
.screen-header-ellipsis {
  width: 3px;
  height: 3px;
  margin-left: 2px;
  border-radius: 8px;
  background: #999;
}
 
.screen-body {
  display: flex;
}
 
.screen-body-item {
  flex: 1;
  padding: 50px;
}
 
.screen-body-item.left {
  display: flex;
  flex-direction: column;
}
 
.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: #ea1d6f;
  font-size: 26px;
}
 
.app-title:after {
  content: '';
  display: block;
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 25px;
  height: 4px;
  background: #ea1d6f;
}
 
.app-contact {
  margin-top: auto;
  font-size: 8px;
  color: #888;
}
 
.app-form-group {
  margin-bottom: 15px;
}
 
.app-form-group.message {
  margin-top: 40px;
}
 
.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}
 
.app-form-control {
  width: 100%;
  padding: 10px 0;
  background: none;
  border: none;
  border-bottom: 1px solid #666;
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color .2s;
}
 
.app-form-control::placeholder {
  color: #666;
}
 
.app-form-control:focus {
  border-bottom-color: #ddd;
}
 
.app-form-button {
  background: none;
  border: none;
  color: #ea1d6f;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}
 
.app-form-button:hover {
  color: #b9134f;
}
 
.credits {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  color: #ffa4bd;
  font-family: 'Roboto Condensed', sans-serif;
  font-size: 16px;
  font-weight: normal;
}
 
.credits-link {
  display: flex;
  align-items: center;
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}
 
.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
}
 
@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }
 
  .screen-body-item.left {
    margin-bottom: 30px;
  }
 
  .app-title {
    flex-direction: row;
  }
 
  .app-title span {
    margin-right: 12px;
  }
 
  .app-title:after {
    display: none;
  }
}
 
@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }
 
  .screen-body-item {
    padding: 0;
  }
}
</style>
</head>

<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <!-- <span>CONTACT</span>
            <span>US</span> -->
            <span>{{__('field.contact-us')}}</span>
          </div>
          <div class="app-contact">CONTACT INFO : +251948263781</div>
        </div>
        <div class="screen-body-item">
      <form action="{{url('/comment')}}" method='post'>
        @csrf
          <!-- <div class="app-form"> -->
            <div class="app-form-group">
              <input class="app-form-control" name="name" placeholder="name" value="">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" name="email" placeholder="email">
            </div>
            <div class="app-form-group">
              <input class="app-form-control"  name="phone" placeholder="phone NO">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" name="message" placeholder="message">
            </div>
            <div class="app-form-group buttons">
              <input type="reset" class="btn btn-danger" value="{{__('field.reset')}}" /> 
              <input type="submit"  class="btn btn-success" value="{{__('field.send')}}" />
            </div>
          <!-- </div> -->
               </form>
        </div>
      </div>
    </div>
 
  </div>
</div>
<!-- </html> -->
  </div>      
</div> 
@endsection