<html>
<head>
<title>SLtex Converter</title>
</head>
<body>
<script>
function CLatex () {
	alert("convert to Latex");
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("LaText").innerHTML = this.responseText;
		}
	};
  xhttp.open("GET", "convert.php?contents="+encodeURI(document.getElementById("SLText").value), true);
  xhttp.send();
}
function DLatex () {
	alert("download Latex");
}
function CSLTex () {
	alert("convert to SLTex");
}
function DSLTex () {
	alert("download SLTex");
}
</script>
<center>
<table width = 100%>
<tr width = 100%>
<td width = 100%>
<center><h1>SLTex LaTex Converter</h1></center>
</td>
</tr>
<tr>
<td width = 50%> SLTex </td>
<td width = 50%> LaTex </td>
</tr>
<tr>
<td>
<textarea id ="SLText" style="margin: 0px; width: 670px; height: 135px;">
Enter Your SLTex here ...
</textarea>
</td>
<td>
<textarea id="LaText" style="margin: 0px; width: 670px; height: 135px;">
Enter Your LaTeX here ...
</textarea>
</td>
</tr>
</table>
<table width = 100%>
<tr>
<td width = 25%><button onclick="CLatex()">Convert To LaTex</button></td>
<td width = 25%><button onclick="DLatex()">Download LaTex </button></td>
<td width = 25%><button onclick="CSLTex()">Convert TO SLTex </button></td>
<td width = 25%><button onclick="DSLTex()">Download SLTex </button></td>
</tr>
</table>
</center>
</body>
</html>