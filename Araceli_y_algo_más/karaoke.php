<style>
  
  @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

.conteinerK {
  background: white;
  display: flex;
  text-transform: uppercase;
  font-family: 'Monserrat', sans-serif;
}

h2 {
  font-size: 60px;
}
h5 {
  font-size: 26px;
}

.italic {
  font-style: italic;
}

.card {
  position: relative;
  margin: auto;
  height: 350px;
  width: 1100px;
  text-align: center;
  background: linear-gradient(#FBCB91,#FAF0CF, #F9ECDC,#FDF3D2,#FAF0CF, #FBCB91);
  border-radius: 2px;
  box-shadow: 0 6px 12px -3px rgba(0,0,0,.3);
  color: #CC6645;
  padding: 30px;
}

.card header {
  position: absolute;
  top: 31px;
  left: 0;
  width: 100%;
  padding: 0 10%;
  transform: translateY(-50%);
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  align-items: center;
}

.card header > *:first-child {
  text-align: left;
}
.card header > *:last-child {
  text-align: right;
}

.logo {
  font-size: 54px;
  position: relative;
}
.logo:before,
.logo:after {
  content: '';
  position: absolute;
  top: 50%;
  border-top: 3px solid #CC6645;
  transform: translateY(-50%);
}

.logo:before {
  right: 158px;
  width: 40%;
}
.logo:after {
  left: 158px;
  width: 55%;
}

.logo span {
  /*border: solid currentColor;
  border-width: 0 3px 3px 0;
  position: absolute;
  top: -22px;
  width: 69px;
  height: 70px;
  left: 50%;
  transform: translateX(-58%) rotate(58deg) skew(0deg, -30deg);*/
  display: block;
  position: absolute;
  font-family: 'Playfair Display', serif;
  width: 100%;
  color: #6E1A05;
  font-size: 35px;
  top: calc(50% - 1px);
}

.announcement {
  position: relative;
  border: 3px solid currentColor;
  border-top: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.announcement:before,
.announcement:after {
  content: '';
  position: absolute;
  top: 0px;
  border-top: 3px solid currentColor;
  height: 0;
  width: 15px;
}
.announcement:before {
  left: -3px;
}
.announcement:after {
  right: -3px;
}


.inspiration {
  position: absolute;
  bottom: 20px;
  left: 20px;
}


* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}




a {
  color: currentColor;
  transition: .2s ease-in-out;
}

h1, h2, h3, h4 {
  margin: .10em 0;
}
h3{
  color:#6E0023;
}

</style>

<div class="conteinerK">
<div class="card">
<div class="logo"><span>GABCY</span></div>
  <div class="announcement">
  <h4  >PRESENTA</h4>
    <h2>KARAOKE</h2>
    <h3  class="italic">Sabados</h3>
    <h4 >Ven y muestra tu talento</h4>
  </div>
</div>



</div>