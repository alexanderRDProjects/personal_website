<html>
<head>
<title>SLtex Converter</title>
</head>
<body>
<script>
function CLatex () {
	//alert("convert to Latex");
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("LaText").innerHTML = this.responseText;
		}
	};
  xhttp.open("GET", "convert.php?contents="+encodeURI(document.getElementById("SLText").value), true);
  console.log("Request sent to : convert.php?contents="+encodeURI(document.getElementById("SLText").value));
  xhttp.send();
}
function DLatex () {
	//alert("download Latex");
	var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "down.php?contents="+encodeURI(document.getElementById("SLText").value), true);
  console.log("Request sent to : down.php?&name=document&contents="+encodeURI(document.getElementById("SLText").value));
  xhttp.send();
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
Receive Your LaTeX here ...
</textarea>
</td>
</tr>
</table>
<table width = 100%>
<tr>
<td width = 50%><button onclick="CLatex()">Convert To LaTex</button></td>
<td width = 50%><button onclick="DLatex()">Download LaTex </button></td>
<!-- <td width = 25%><button onclick="CSLTex()">Convert TO SLTex </button></td>  -->
<!-- <td width = 25%><button onclick="DSLTex()">Download SLTex </button></td> -->
</tr>
</table>
</center>
<h3> Instructions </h3>
<p>SLTex stands for Shorthard LaTeX and will correct your document by adding syntax to make it a valid LaTeX document.</p>
<p> currently SLTex does the following things </p>
<ul>
<li>adds slashes to mathematic constants (only pi and phi but will do the rest) and puts them in inline math mode</li>
<li>adds a document class if not found in document</li>
<li>adds begin and end document if not found in document</li>
</ul>
<p>SLTex is an extension for LaTex so if you give it a valid LaTeX document it will not edit anything apart from commands without slashes which need to be escaped by adding a * on the end</p><p>eg (pi* => pi but pi => \pi ($\pi$ if not in math mode))</p>
I still need to fix 
<ul>
<li></li>
</ul> <p>command escaping when not in math mode </p>
<p>eg section* => \section* when it should => section</p>
</body>
</html>