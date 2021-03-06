
<style>
body {
  background: #222;
  color: #FFF;
  line-height: 1.33;
  display: flex;
  height: 100%;
  margin: 0;
}

body, html {
  height: 100%;
}

.container {
  margin: auto;
}

/* Sys vars (bootstrap) */
/* Holder */
.radar-message {
  text-align: center;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 12px;
  margin: 19px 0;
}

.radar-holder {
  width: 84px;
  margin: 0 auto;
  text-align: center;
  position: relative;
  height: 72px;
}
.radar-holder .radar-1x {
  position: absolute;
  top: 24px;
  left: 24px;
}
.radar-holder .radar-2x {
  position: absolute;
  top: 12px;
  left: 12px;
}
.radar-holder .radar-3x {
  position: absolute;
  top: 0;
  left: 0;
}

/* Spinner */
@-webkit-keyframes rotation {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(359deg);
  }
}
.radar {
  height: 24px;
  width: 24px;
  display: inline-block;
  position: relative;
  -webkit-animation: rotation 1.4s infinite linear;
  animation: rotation 1.4s infinite linear;
  border: 4px solid #80bcff;
  border-radius: 100%;
}
.radar, .radar:before, .radar:after {
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
}
.radar:before {
  content: "";
  display: block;
  position: absolute;
  left: -4px;
  top: -4px;
  height: 100%;
  width: 100%;
  border-top: 4px solid #0079FF;
  border-left: 4px solid transparent;
  border-bottom: 4px solid transparent;
  border-right: 4px solid transparent;
  border-radius: 100%;
}

.radar-2x {
  height: 48px;
  width: 48px;
  border: 4px solid #80bcff;
  animation-delay: 0.1s;
  opacity: 0.66;
  -webkit-animation-delay: 0.1s;
  /* Safari and Chrome */
}
.radar-2x:before {
  left: -4px;
  top: -4px;
  border-top: 4px solid #0079FF;
  border-left: 4px solid transparent;
  border-bottom: 4px solid transparent;
  border-right: 4px solid transparent;
}

.radar-3x {
  height: 72px;
  width: 72px;
  border: 4px solid #80bcff;
  animation-delay: 0.2s;
  -webkit-animation-delay: 0.2s;
  /* Safari and Chrome */
  opacity: 0.33;
}
.radar-3x:before {
  left: -4px;
  top: -4px;
  border-top: 4px solid #0079FF;
  border-left: 4px solid transparent;
  border-bottom: 4px solid transparent;
  border-right: 4px solid transparent;
}

</style>
<title>Skytells Firewall</title>
<div class="container">
  <div class="radar-holder">
    <div class="radar radar-1x"></div>
    <div class="radar radar-2x"></div>
    <div class="radar radar-3x"></div>
  </div>
  <p class="radar-message">Checking your computer before accessing our server..</p>
    <p class="radar-message">Please do not refresh your browser</p>
</div>

<? if (checkBrowser() == true) {


  @header("refresh:4;url=".getUrl());
}else{

} ?>
