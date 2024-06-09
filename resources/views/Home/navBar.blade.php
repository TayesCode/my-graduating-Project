<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/navBar.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
/* *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
  text-decoration: none;
} */
footer{
  margin-top:30px;
  width: 100%;
  bottom: 0;
  left: 0;
  position:relative;
  background:blue;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
  text-decoration: none;
}
footer .article{
  max-width: 1350px;
  margin: auto;
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
footer .article p,a{
  color: #fff;
}
footer .article .box{
  width: 33%;
  transition: all 0.4s ease;
}
footer .article .topic{
  font-size: 22px;
  font-weight: 600;
  color: #fff;
  margin-bottom: 16px;


}
footer .article p{
  text-align: justify;
  font-size: 14px;
}
footer .article .lower .topic{
  margin: 24px 0 5px 0;
}
footer .article .lower i{
  padding-right: 16px;
}
footer .article .middle{
  padding-left: 80px;
}
footer .article .middle a{
  line-height: 32px;
}
footer .article .right input[type="textarea"]{
  height: 90px;
  width: 100%;
  outline: none;
  color: #d9d9d9;
  background: #000;
  border-radius: 5px;
  padding-left: 10px;
  font-size: 17px;
  border: 2px solid #222222;
}
footer .article .right input[type="submit"]{
  height: 42px;
  width: 100%;
  font-size: 18px;
  color: #d9d9d9;
  background: #eb2f06;
  outline: none;
  border-radius: 5px;
  letter-spacing: 1px;
  cursor: pointer;
  margin-top: 12px;
  border: 2px solid #eb2f06;
  transition: all 0.3s ease-in-out;
}
.article .right input[type="submit"]:hover{
  background: none;
  color:  #eb2f06;
}
footer .article .media-icons a{
  font-size: 16px;
  height: 45px;
  width: 45px;
  display: inline-block;
  text-align: center;
  line-height: 43px;
  border-radius: 5px;
  border: 2px solid #222222;
  margin: 30px 5px 0 0;
  transition: all 0.3s ease;
}
.article .media-icons a:hover{
  border-color: #eb2f06;
}
footer .bottom{
  width: 100%;
  text-align: right;
  color: #d9d9d9;
  padding: 0 40px 5px 0;
}
footer .bottom a{
  color: #eb2f06;
}
footer a{
  transition: all 0.3s ease;
}
footer a:hover{
  color: #eb2f06;
}
@media (max-width:1100px) {
  footer .article .middle{
    padding-left: 50px;
  }
}
@media (max-width:950px){
  footer .article .box{
    width: 50%;
  }
  .article .right{
    margin-top: 40px;
  }
}
@media (max-width:560px){
  footer{
    position: relative;
  }
  footer .article .box{
    width: 100%;
    margin-top: 30px;
  }
  footer .article .middle{
    padding-left: 0;
  }
}
</style>
</head>

<body>
    <div>
        <div class="wellcome">
            <div style="width: 30%;">
                <img class="logo" src="/assets/logo.jpg" alt="LOGO" height="80px" width="80px">
            </div >
            <center> <h1>{{__('field.header')}}</h1></center>
        </div>
        <div style="margin-top: 114px">
            <nav>
              <input type="checkbox" id="check">
              <label for="check" class="checkbtn">
                  <i class="fas fa-bars"></i>
              </label>
              <label class="logo">CBHI</label>
              <ul>
                  <li><a href="{{ url('/') }}" class="{{'/'==request()->path()? 'active':''}}" >{{__('navbar.homepage')}}</a></li>
                  <li><a href="{{ url('/about') }}" class="{{'about'==request()->path()? 'active':''}}">{{__('navbar.about')}}</a></li>
                  <li><a href="{{url('/services')}}" class="{{'services'==request()->path()? 'active':''}}">{{__('navbar.services')}}</a></li>
                  <li><a href="{{url('/contact')}}" class="{{'contact'==request()->path()? 'active':''}}">{{__("localization.contact")}}</a></li>
                  <!-- <li><a href="{{url('/help')}}" class="{{'help'==request()->path()? 'active':''}}">{{__('navbar.help')}}</a></li> -->
                  <li ><select style='height: 30px; width:70px' class="changeLang">
                  <option  value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{__('field.english')}}</option>
                  <option value="amh" {{ session()->get('locale') == 'amh' ? 'selected' : '' }}>{{__('field.amharic')}}</option>
                  </select></li>
                  <li style='margin-left:100px;'><a style='background-color:indigo;' href="{{url('/login')}}" class="{{'login'==request()->path()? 'active':''}}">{{__('navbar.login')}}</a></li>
               
               </ul>

            </nav>
            <div id="body2" class="body">
                @yield('content')
            </div>
            <footer>
   <div class="article">
     <div class="left box">
       <div class="upper">
         <div class="topic">{{__('field.footer-tabout')}}</div>
         <p>{{__('field.footer-babout')}}</p>
       </div>
       <div class="lower">
         <div class="topic">{{__('field.contact-us')}}</div>
         <div class="phone">
           <a href="#"><i class="fas fa-phone-volume"></i>+251948263781</a>
         </div>
         <div class="email">
           <a href="#"><i class="fas fa-envelope"></i>yihuniemulualem220@gmail.com</a>
         </div>
         <div class="phone">
           <a href="#"><i class="fas fa-phone-volume"></i>+251939636707</a>
         </div>
         <div class="email">
           <a href="#"><i class="fas fa-envelope"></i>basie.elsh22@gmail.com</a>
         </div>
       </div>
     </div>
     <div class="middle box">
       <div class="topic">{{__('field.ourObjective')}}</div>
       <div><p>{{__('field.objectiveli1')}} </p></div>
       <div><p>{{__('field.objectiveli2')}} </p></div>
       <div><p>{{__('field.objectiveli3')}} </p></div>
       <div><p>{{__('field.objectiveli4')}} </p></div>
       <div><p> </p></div>
       <div><a></a></div>
     </div>
     <div class="right box">
     <div class="topic">{{__('field.coment')}} </div>
       <form action="{{url('/comment')}}" method='post'>
        @csrf
       <textarea id="textarea" name="message" rows="4" cols="30">
       </textarea>
         <input type="submit" name="" value="{{__('field.send')}}">
         <div class="media-icons">
           <a href="#"><i class="fab fa-facebook-f"></i></a>
           <a href="#"><i class="fab fa-instagram"></i></a>
           <a href="#"><i class="fab fa-twitter"></i></a>
           <a href="#"><i class="fab fa-linkedin-in"></i></a>
         </div>
       </form>
     </div>
   </div>
   <div class="bottom">
     <p>Copyright © 2022 <a href="#">{{__('field.head')}}</a> {{__('field.allRight')}}</p>
   </div>
 </footer>
 <div>
    <div>
        <a href="https://www.ehia.gov.et/" ><b>Agency site</b></a>
        <a href="https://www.moh.gov.et/site/Ethiopian_Health_Insurance">wesite</a>
        <a href="https://www.facebook.com/EthiopiaFMoH">facebook</a>
    </div>
</div>
</div>
        </div>
    </div>

</body>
    <script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>
<!--  -->
 
 <!-- -->
</html>