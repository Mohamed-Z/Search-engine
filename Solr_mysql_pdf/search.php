<?php

	if(isset($_POST["page"])){
		$page = $_POST["page"];
	}
	else {
		$page = 1;
	}

	$query = "";
	$type="";
	$name="";
	$path="";
	$search="";
	$select="";


	if(isset($_POST["search_text"]) && isset($_POST['select']) && $_POST["search_text"]!=""){
		$search=$_POST['search_text'];
		$select=$_POST['select'];

		$str = urlencode($search);

		$query = "$select:*$str*";
	}

	$start = $page*10-10;
	$url = "http://localhost:8983/solr/FileCollection/select?q=$query&wt=php";
	$doImport = file_get_contents("http://localhost:8983/solr/FileCollection/dataimport?command=full-import");
	$file = file_get_contents($url."&start=".$start);
	eval("\$result = " . $file . ";");
	$numOfPages = ceil($result["response"]["numFound"]/10);

    echo "<table>";
	for($i=0; $i<count($result["response"]["docs"]) ; $i++){
		echo "<tr>";
		echo "<td>".($i+$start+1)."</td>";
		foreach($result["response"]["docs"][$i] as $k=>$v){
			if($k!="_version_" && $k!="path_file" && $k!="type" && $k!="id" && $k!="name" && $k!="text"){
				echo "<td>";
				display($k,$v);
				echo "</td>";
			}else{
				if($k=="name"){
					$name=getvalue($v);
				}
				else if($k=="path_file"){
					$path=getvalue($v);
				}
				else if($k=="type"){
					$type=getvalue($v);
				}
			}
		}
		echo "<td><a href=$path>Download</a></td>";
		//echo "<td><iframe style='width:150px;height:100px' src='show.php?id=".$id."' frameborder='0'/></td>";
		echo "</tr>";
	}
	echo "</table>";
	function display($k,$x){
		
		
		//echo $k.": ";
		
		if(!is_array($x)){
			echo $x;
			return;
		}

		

		
		for($i=0; $i<count($x); $i++){
			echo $x[$i];
		}
	}

	function getvalue($x){
		
		if(!is_array($x)){
			return $x;
		}
		for($i=0; $i<count($x); $i++){
			return $x[$i];
		}
	}

	for($i=0; $i<$numOfPages; $i++){
		echo "<a href='index.php?page=".($i+1)."&search=".$search."&select=".$select."'>[".($i+1)."]</a> ";
	}
?>