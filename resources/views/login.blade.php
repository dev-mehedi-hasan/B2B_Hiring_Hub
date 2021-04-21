@extends('layout.registration')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection

@section('body')

    <div style="margin-top:10px; " class="w3layouts-two-grids">
        <div class="mid-class">
            <div class="txt-left-side">
                <h2 style="color: white;"> Login Here </h2>
                <p></p>
                <form action="{{URL::to('/userlogin')}}" method="post">
                 {{ csrf_field() }}
                    <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="email" name="email" placeholder="Email" required="">

                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l ">

                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Password" required="">
                        <div class="clear"></div>
                    </div>

                    <button style="margin-left: -264px;" class="btn btn-outline-white btn-sm my-0" type="submit">Log In</button>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>Don't Have an account..?
                        <a href="{{URL::to('/signupemail')}}">Sign Up Here
                        </a>
                    </h3>
                </div>

            </div>
            <div class="img-right-side">
                <h3>Welcome To Party Kits Hiring</h3>
                <p>The Biggest Hiring Portal in the Town</p>
                @if($errors->any())
                <h5 style="color: red;">{{$errors->first()}}</h5>
                @endif
            </div>
        </div>
    </div>







<style type="text/css">
  



select,
input[type="email"],
input[type="text"],
input[type=password],
input[type="button"],
input[type="submit"],
textarea {
font-family: 'Open Sans', sans-serif;
  transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
  -ms-transition: 0.5s all;
}



p {
  margin: 0;
  padding: 0;
  letter-spacing: 1px;
font-family: 'Open Sans', sans-serif;
}

ul {
  margin: 0;
  padding: 0;
}


/*-- //Reset-Code --*/


/*--background --*/
.w3layouts-two-grids {
      width: 62%;
    margin: 0em auto;
    -webkit-box-shadow:-2px 7px 37px 8px rgba(167, 167, 167, 0.52);
    -moz-box-shadow:-2px 7px 37px 8px rgba(167, 167, 167, 0.52);
    box-shadow:-2px 7px 37px 8px rgba(167, 167, 167, 0.52);
}
.mid-class{
display: -webkit-flex;
 display: flex; 
 -webkit-justify-content: space-between; 
justify-content: space-between; 
-webkit-flex-wrap: wrap;
flex-wrap:wrap;
}
h1.error {
    text-align: center;
    color: #000;
    text-transform: uppercase;
}
.img-right-side, .txt-left-side {
    flex-basis: 50%;
    -webkit-flex-basis: 50%;
    box-sizing: border-box;
    text-align: center;
}
.img-right-side {
    background: #fff;

}
.txt-left-side {
    background:#60baaf;
}
.img-right-side h3, .txt-left-side h2 {
    color: #000;
    letter-spacing: 0px;
}
.txt-left-side h2{color:#60baaf;}
.img-right-side p, .txt-left-side p {
    color: #908c8c;
    letter-spacing: 0.3px;
}
.txt-left-side p{color:#bdbdbd;}
.txt-left-side {background-image: linear-gradient(to right, #33BBAD , black);}
.form-left-to-w3l {
    display: flex;
    display: -webkit-flex;
    /* border: none; */
    border: 1px solid #fff;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}
.form-left-to-w3l input[type="email"], .form-left-to-w3l input[type="password"] {
    -webkit-flex-basis: 90%;
    flex-basis: 90%;
    width: 100%;
    color: #fff;
    font-size: 14px;
    border: none; 
    outline: none;
  padding: .6em .6em;
    -webkit-appearance: none;
    background: transparent;
  transition: 0.5s all;
  -webkit-transition: 0.5s all;
  -moz-transition: 0.5s all;
  -o-transition: 0.5s all;
  -ms-transition: 0.5s all;
    box-sizing: border-box;
    /* box-shadow: -1px 0px 6px #9f9f9f; */
}
.form-left-to-w3l span {
    -webkit-flex-basis: 15%;
    flex-basis: 15%;
    border: none;
    text-align: center;
    color: #ffffff;
      line-height: 35px;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

button[type=submit]:hover,a.for:hover,.w3layouts_more-buttn a:hover{opacity:0.8;}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
     color: #fff;
   background:transparent;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #fff;
  background:transparent;
}
:-ms-input-placeholder { /* IE 10+ */
     color: #fff;
   background:transparent;
}
:-moz-placeholder { /* Firefox 18- */
    color: #fff;
  background:transparent;
}
input.checked {
    position: absolute;
    top: 3px;
    left:-5px;
    cursor: pointer;
}
.left-side-forget {
float:left;
    position: relative;
}
.right-side-forget{float:right;}
.remenber-me{margin-left:17px;}
.remenber-me, a.for {
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
}
.left-side-forget,.right-side-forget{ 
 flex-basis: 50%;
    -webkit-flex-basis: 50%;
    box-sizing: border-box;}

.w3layouts_more-buttn h3 {
    font-size: 15px;
    color: #fff;
    margin-top:43px;
    font-weight: 400;
}
.w3layouts_more-buttn a {
    font-size: 15px;
    color:#60baaf;
    font-weight: 500;
    text-decoration: none;
    text-transform: capitalize;
    display: inline-block;
    letter-spacing: 0px;
    outline: none;
}

.copyrigh-wthree {
    text-align: center;
}
.copyrigh-wthree p {
    font-size: 14px;
    color: #000;
    letter-spacing: 3px;
}
.copyrigh-wthree p a {
    color:#60baaf;
    font-size: 14px;
    font-weight: 800;
}
/*--responsive--*/
@media(max-width:1920px){
  h1.error {
    font-size: 58px;
    padding-top: 60px;
    margin-bottom: 47px;
  }
.img-right-side, .txt-left-side {
    padding: 5.5em 6em 4em;
}
.copyrigh-wthree {
    padding: 5em 0em 4.5em;
}
.img-right-side h3, .txt-left-side h2 {
    font-size: 25px;
      margin-bottom: 35px;
  }
}
@media(max-width:1680px){
    h1.error {
    font-size: 54px;
    padding-top: 57px;
    margin-bottom: 45px;
  }
.img-right-side, .txt-left-side {
    padding: 4.5em 4.5em 3.5em;
}
.copyrigh-wthree {
    padding: 4em 0em 4.5em;
}
.img-right-side h3, .txt-left-side h2 {
    font-size: 24px;
  margin-bottom: 33px;
  }
}
@media(max-width:1600px){
h1.error {
    padding-top: 54px;
    margin-bottom: 43px;
    letter-spacing: 3px;
    font-size: 49px;
} 
.img-right-side, .txt-left-side {
    padding: 3.5em 4em 3em;
}
.copyrigh-wthree {
    padding: 3em 0em 4.5em;
}
.img-right-side h3, .txt-left-side h2 {
    font-size: 22px;
    margin-bottom: 29px;
}
.form-left-to-w3l span {
    font-size: 20px;
}
.img-right-side p, .txt-left-side p {
    font-size: 13.5px;
    line-height: 24px;
    margin-bottom: 48px;
}
button[type=submit] {
    padding: 14px 20px;
    margin: 42px 0px 18px;
}
.form-left-to-w3l {
    margin: 0px 0px 25px;
}
}
@media(max-width:1440px){
h1.error {
    padding-top: 51px;
    margin-bottom: 40px;
    font-size: 46px;
} 
.w3layouts-two-grids {
    width: 66%;
  }
.img-right-side, .txt-left-side {
    padding: 3.5em 3.7em 3em;
}
.img-right-side p, .txt-left-side p {
    margin-bottom: 43px;
}
.form-left-to-w3l span {
    font-size: 18px;
}
}
@media(max-width:1366px){
.img-right-side, .txt-left-side {
    padding: 3.2em 3.5em 2.7em;
}
.w3layouts-two-grids {
    width: 69%;
}
button[type=submit] {
    margin: 39px 0px 18px;
} 
}
@media(max-width:1280px){
h1.error {
    padding-top: 48px;
    margin-bottom: 36px;
    font-size: 43px;
}
.w3layouts_more-buttn h3 {
    margin-top: 40px;
} 
.copyrigh-wthree {
    padding: 2.7em 0em 4.2em;
}
.w3layouts-two-grids {
    width: 72%;
}
}
@media(max-width:1080px){
.w3layouts-two-grids {
    width: 80%;
}
.img-right-side, .txt-left-side {
    padding: 3.2em 3em 2.7em;
}
.img-right-side h3, .txt-left-side h2 {
    font-size: 21px;
    margin-bottom: 24px;
} 
}
@media(max-width:1050px){
h1.error {
    font-size: 41px;
    letter-spacing: 2px;
} 
.form-left-to-w3l {
    margin: 0px 0px 22px;
}
.w3layouts-two-grids {
    width: 83%;
}
.copyrigh-wthree p {
    letter-spacing: 2px;
}
}
@media(max-width:1024px){
.w3layouts-two-grids {
    width: 86%;
}
h1.error {
    padding-top: 45px;
    margin-bottom: 34px;
}
.form-left-to-w3l input[type="email"], .form-left-to-w3l input[type="password"] {
    padding: .5em .6em; 
  }
.form-left-to-w3l span {
    line-height: 33px;
  }
}
@media(max-width:991px){
.w3layouts-two-grids {
    width: 89%;
}
.copyrigh-wthree {
    padding: 2.3em 0em 4em;
}
.w3layouts_more-buttn a {
    font-size: 14px;
  }
button[type=submit] {
    margin: 36px 0px 16px;
}
}
@media(max-width:900px){
h1.error {
    padding-top: 42px;
    margin-bottom: 30px;
}
.img-right-side, .txt-left-side {
    padding: 3em 2.7em 2.5em;
}
.w3layouts-two-grids {
    width: 95%;
}
.w3layouts_more-buttn h3 {
    margin-top: 37px;
}
}
@media(max-width:800px){
button[type=submit] {
    padding: 12px 20px;
}
.img-right-side p, .txt-left-side p {
    margin-bottom: 39px;
}
.img-right-side, .txt-left-side {
    padding: 2.7em 5em 2.2em;
}
h1.error {
    font-size: 38px;
  }
.mid-class {
 flex-direction: column-reverse;
}
.w3layouts-two-grids {
    width: 68%;
}
.w3layouts_more-buttn h3 {
    margin-top: 32px;
}
}
@media(max-width:768px){
.img-right-side, .txt-left-side {
    padding: 2.4em 5em 2.2em;
}
.img-right-side p, .txt-left-side p {
    margin-bottom: 32px;
}
}
@media(max-width:767px){
h1.error {
    font-size: 35px;
}
button[type=submit] {
    padding: 11px 20px;
}
.copyrigh-wthree {
    padding: 2.1em 0em 3.5em;
} 
}
@media(max-width:736px){
.w3layouts-two-grids {
    width: 70%;
}
.w3layouts_more-buttn h3 {
    font-size: 14px;
} 
}
@media(max-width:667px){
.img-right-side, .txt-left-side {
    padding: 2.4em 4em 2.2em;
}
.w3layouts-two-grids {
    width: 72%;
}
h1.error {
    font-size: 33px;
} 
}
@media(max-width:640px){
.img-right-side, .txt-left-side {
padding: 2.1em 3.5em 2.1em;
}
button[type=submit] {
    margin: 34px 0px 15px;
}
}
@media(max-width:600px){
h1.error {
    padding-top: 38px;
    margin-bottom: 27px;
}
.w3layouts-two-grids {
    width: 77%;
}
.w3layouts_more-buttn h3 {
    margin-top: 29px;
} 
}
@media(max-width:568px){
.img-right-side h3, .txt-left-side h2 {
    font-size: 20px;
  margin-bottom: 20px;
}
.w3layouts-two-grids {
    width: 78%;
} 
}
@media(max-width:480px){
.img-right-side, .txt-left-side {
    padding: 2.1em 3em 2.1em;
}
.w3layouts-two-grids {
    width: 89%;
}
.img-right-side p, .txt-left-side p {
    margin-bottom: 29px;
}
.copyrigh-wthree p {
    letter-spacing: 1px;
}
}
@media(max-width:440px){
h1.error {
    font-size: 31px;
    letter-spacing: 1px;
}
.w3layouts-two-grids {
    width: 92%;
}
.img-right-side, .txt-left-side {
    padding: 2.1em 2.2em 2.1em;
}
.copyrigh-wthree p {
    line-height: 29px;
} 
}
@media(max-width:414px){
.img-right-side p, .txt-left-side p {
    margin-bottom: 26px;
}
.copyrigh-wthree {
    padding: 2em 0em 3.2em;
}
.img-right-side h3, .txt-left-side h2 {
    font-size: 20px;
    margin-bottom: 20px;
    line-height: 33px;
}
}
@media(max-width:384px){
h1.error {
    font-size: 29px;
} 
.img-right-side, .txt-left-side {
    padding: 2em 2em 2em;
}
.w3layouts_more-buttn h3 {
    margin-top: 27px;
}
}
@media(max-width:375px){
.img-right-side h3, .txt-left-side h2 {
    margin-bottom: 17px;
    line-height: 30px;
}
.form-left-to-w3l span {
    font-size: 16px;
}
.remenber-me, a.for {
    font-size: 11px;
  }
}
@media(max-width:320px){
h1.error {
    font-size: 24px;
}
.img-right-side, .txt-left-side {
    padding: 1.8em 1.7em 1.8em;
}
.w3layouts_more-buttn h3 {
    font-size: 13px;
}
.w3layouts_more-buttn a {
    font-size: 13px;
    line-height: 27px;
} 
}
/*--//responsive--*/
</style>
@endsection

@section('footer')
    @parent
@endsection