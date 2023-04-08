<!DOCTYPE html>
<html>
<head>
	<style>

.has-float-label .form-control:placeholder-shown:not(:focus)+* {
    font-size: 90%;
    opacity: 1;
    top: .7em;
        padding: 6px 6px;

}

.has-float-label label, .has-float-label>span {
    position: absolute;
    cursor: text;
    font-size: 70%;
    opacity: 1;
    -webkit-transition: all .15s;
    transition: all .15s;
    top: 0.2rem;
    left: .75rem;
    z-index: 1;
    padding: 0 5px;
        background: #fff;


}
input {
    -webkit-writing-mode: horizontal-tb !important;
    text-rendering: auto;
    color: -internal-light-dark(black, white);
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    appearance: auto;
    background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
    -webkit-rtl-ordering: logical;
    cursor: text;
    margin: 0em;
    font: 400 13.3333px Arial;
    padding: 8px 8px;
    border-width: 2px;
    border-style: inset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
}


	</style>
	<title></title>
</head>
<body>

  <div class="form-group input-group">
    <span class="has-float-label">
      <input class="form-control" id="email" type="text" placeholder="&nbsp"/>
      <label for="email">Enter email</label>
    </span>   
  </div>
  <p><p><p><p></p></p></p></p>

<!--  <div class="form-group input-group">
    <span class="has-float-label">
      <input class="form-control" id="mobile" type="text" placeholder="&nbsp"/>
      <label for="mobile">Enter Mobile</label>
    </span>   
  </div>
 -->
 

<!---->



</body>
</html>