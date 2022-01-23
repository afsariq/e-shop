<html>
<body>


<button onclick="showOrHideDiv()">Click The Button</button>
<div id="Hide">
hide
</div>


<div id="show">
show
</div>
<script>
   function showOrHideDiv() {
      var v = document.getElementById("hide");
	  var s = document.getElementById("show");
      if (v.style.display === "none") {
         v.style.display = "block";
		 s.style.display = "none";
      } else {
         v.style.display = "none";
		  s.style.display = "block";
      }
   }
</script>











</body>
</html>