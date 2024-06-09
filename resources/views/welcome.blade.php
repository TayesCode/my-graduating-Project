@include('barcontent.barcontent')
<style>
a {
  box-shadow: inset 0 0 0 0 #54b3d6;
  color: #54b3d6;
  margin: 0 -.25rem;
  padding: 0 .25rem;
  transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
}
a:hover {
  box-shadow: inset 100px 0 0 0 #54b3d6;
  color: white;
  background-position: 0;
}

         ///
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  background-image: url('assets/background.jpg');
  background-size: cover;
  background-attachment: fixed;
  scroll-behavior: smooth;
  scroll-direction: smooth;
  scroll-top: 20px;
  
}
.navbar{
  height:5%;
  width: 100%;
  padding: 14px 30px;
  top:0%;
  position: sticky;
  scroll-behavior: fixed;


}
.navbar .nav-header{
  display: inline;
  float: left;
  width: 50%;

}
.navbar .nav-header .nav-logo{
  display: inline-block;
  margin-top: -7px;
  width: 10%;
  margin-left: 0%;

}
.navbar .nav-header .final{
    display: inline-block;
  margin-top: -7px;
  width: 80%;
  margin-left: 40px;

}

.navbar .nav-links{
  display: inline;
  float: left;
  font-size: 18px;
  padding-top: 0px
}

.navbar .nav-links .loginBtn{
  display: inline-block;
  padding: 5px 15px;
  margin-left: 20px;
  font-size: 17px;
  color: rgb(9, 14, 90);
}
.navbar .nav-links a{
  padding: 10px 12px;
  text-decoration: none;
  font-weight: 550;
  color: white;
}
/* Hover effects */
.navbar .nav-links a:hover{
  background-color: rgba(0, 0, 0, 0.3);
}
.navbar .nav-link a:active {
  background: #265301;
  color: #CDFEAA;
}
/* responsive navbar toggle button */
.navbar #nav-check, .navbar .nav-btn{
  display: none;
}
text{
  background-color:#54b3d6;
}
 /* unvisited link */

@media (max-width:700px) {
  .navbar .nav-btn{
    display: inline-block;
    position: absolute;
    top: 0px;
    right: 0px;
  }
  .navbar .nav-btn label {
    display: inline-block;
    width: 80px;
    height: 70px;
    padding: 25px;
  }
  .navbar .nav-btn label span {
    display: block;
    height: 10px;
    width: 25px;
    border-top: 3px solid #eee;
  }
  .navbar .nav-btn label:hover, .navbar #nav-check:checked ~ .nav-btn label {
    background-color: rgb(9, 14, 90);
  }
  .navbar .nav-links{
    position: absolute;
    display: block;
    text-align: center;
    width: 50%;
    background-color: rgb(9, 14, 90);
    transition: all 0.3s ease-in;
    overflow-y: hidden;
    
    right: 0px;
  }
  .navbar .nav-links a {
    display: block;
  }

  /* when nav toggle button not checked */
  .navbar #nav-check:not(:checked) ~ .nav-links {
    height: 0px;
  }

  /* when nav toggle button is checked */
  .navbar #nav-check:checked ~ .nav-links {
    height: calc(100vh - 70px);
    overflow-y: auto;
  }
  .navbar .nav-links .loginBtn {
    padding: 10px 40px ;
    margin: 20px;
    font-size:  18px;
    font-weight: bold;
    color: rgb(9, 14, 90);
  }




        </style>
    </head>
    <body>
    <div class="navbar" >
        <!-- Navbar logo -->
        <div class="nav-header">
          <div class="nav-logo">
              <img src="assets/logo.jpg"  width="50px" alt="logo is no available" />
          </div>
          <div class="final" >
            Community based health Insurance infromation System
          </div>
        </div>
        <!-- responsive navbar toggle button -->
        <input type="checkbox" id="nav-check">
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        <!-- Navbar items -->
        <div class="nav-links">

          <a href="#home" class='active'>Home</a>
          <a href="#about">About</a>
          <a href="#service" >Services</a>
          <a href="#contact" >Contact</a>
          @if (Route::has('login'))
          @auth
          <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
          @else
          <a href="{{ route('login') }}" class="loginBtn">Log in</a>
          @endauth
          @endif
          <!--<button class="loginBtn">Login</button>-->
        </div>

      </div>
     
      
       @yield('content') 
      
    </body>
</html>