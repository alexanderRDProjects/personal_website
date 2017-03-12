<html>
<head>
<title>Instructions</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<ul id="navbar">
<li> <a href="index.php">convertor </a> </li>
<li> <a href="help.php"> instructions </a> </li>
<center><h3>Instructions</h3></center>
<h4>Commands</h4>
the following table each commands following by its parameters (if there are multiple parameters the first parameter is the first word and the seconds is the rest) in brackets. In addition each command must be on a new line.
</ul>
<table>
<tr>
<td>command</td>
<td>parameters</td>
<td>description</td>
<td>example</td></tr>
<tr>
<td>title</td>
<td>Name of Title</td>
<td>provides a title for LaTex document</td>
<td>title An Interesting Article</td>
</tr>
<tr>
<td>section</td>
<td>Name of section</td>
<td>Inserts a section into the document and labels it sect:name_of_section</td>
<td>section Introduction</td>
</tr>
<td>subsection</td>
<td>Name of subsection</td>
<td>Inserts a subsection into the document and labels it sect:name_of_section</td>
<td>section Explaining a concept</td>
</tr>
<td>subsubsection</td>
<td>Name of subsubsection</td>
<td>Inserts a subsubsection into the document and labels it sect:name_of_section</td>
<td>section Concepts behind concept</td>
</tr>
<tr>
<td>equation</td>
<td>[equation name], contents of equation</td>
<td>Inserts a equation into the document</td>
<td>equation newton F=ma</td>
</tr>
<tr>
<td>expression</td>
<td>contents of expression</td>
<td>this provides a unnumbered equation </td>
<td> expression x+2x+1-1 = 0</td>
</tr>
<tr>
<td>figure</td>
<td>figure name</td>
<td>Loads the figure figure_name.png into the document it forces it location with h! and provides the caption figure name and label fig:figure_name</td>
<td>figure correlation in x y</td>
</tr>
<tr>
<td>biblography</td>
<td>name of biblography</td>
<td>links biblography to page and provides a reference page (indexed in table of contents if table of contents is present)</td>
</tr>
</table>
<h4>Mathematical symbols</h4>
SLTex automaticly inserts slashs before mathematical constaints if not present so the names are unchanged you just dont have to include the slashs
<h4>Referencing</h4>
SLTex will automaticly reference and cite any references and citations to ensure that it finds all of the references please use the labelling scheme used by the automatic labeling system. To ensure that SLTex finds your citation place them in squares brackets SLTex will treat any text in square brackets as citations so the * escape operator can be used to tell SLTex it is not a reference eg [ref] is a reference however [text]* is not a reference
</body>
</html>
