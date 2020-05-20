<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		.top{
			background-color: gray;
			color: white;
		}
		td,th{
			width: 200px;
			height: 30px;
			text-align: center;
			border: 1px solid;
		}
	</style>
	<script type='text/javascript'>
                
			function getXhr(){
                            var xhr = null;
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non supporté par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
                            return xhr;
			}
			


			/**
			* Méthode qui sera appelée sur le click du bouton
			*/
			function goload(){
				var xhr = getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){

					

					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						di = document.getElementById('response');
						di.innerHTML = xhr.responseText;
					}
				
				}
					// Ici on va voir comment faire du post
					xhr.open("POST","search.php",true);
					// ne pas oublier ça pour le post
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

					<?php
						if(isset($_GET["page"]) && isset($_GET["search"]) && isset($_GET["select"])){
							
					?>
							var search_text = <?php echo json_encode($_GET["search"]); ?>;
							var select = <?php echo json_encode($_GET["select"]); ?>;
							var page = <?php echo json_encode($_GET["page"]); ?>;
					<?php
						}
						else {

					?>

							var page = 1;
							var search_text = document.getElementById('search_text').value;
							var select = document.getElementById('select').options[document.getElementById('select').selectedIndex].value;
					<?php
						}
					?>
					
					xhr.send("search_text="+search_text+"&select="+select+"&page="+page);

				
			}

			function go(){
				var xhr = getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){

					

					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						di = document.getElementById('response');
						di.innerHTML = xhr.responseText;
					}
				
				}
					// Ici on va voir comment faire du post
					xhr.open("POST","search.php",true);
					// ne pas oublier ça pour le post
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

							var page = 1;
							var search_text = document.getElementById('search_text').value;
							var select = document.getElementById('select').options[document.getElementById('select').selectedIndex].value;
					
					
					
					xhr.send("search_text="+search_text+"&select="+select+"&page="+page);

				
			}
		</script>
</head>
<body  onload="goload()">
	<a href="upload.php">upload</a>
	<h2>Search Engine</h2>
	<form action="index.php" method="post">
		<input type="text" name="search_text" id="search_text" value=<?php if(isset($_GET['search'])){ echo $_GET['search'];}else{ echo "";} ?>>
		<input type="button" value="Search" onclick="go()"/>
		<label for="select">Search by : </label>
		<select id="select" name="select">
			<option value="title">Title</option>
			<option value="description">Description</option>
			<option value="text">Contenu</option>
		</select>
	</form>
	<br>
	<hr>
	<br>
	<div id='response' style='display:inline'>
	
		

</body>
</html>