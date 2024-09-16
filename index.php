<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Template HTML Document">
  <meta name="keywords" content="comma,separated,keywords">
  <meta name="author" content="Robert Holland">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Weight</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$(document).ready(function() { 
    var baseurl = './php/getweightdata.php'
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET',baseurl,true);
    xmlhttp.onreadystatechange = function(){
    	if(xmlhttp.readyState==4 && xmlhttp.status ==200){
    		var dataSet = JSON.parse(xmlhttp.responseText);
    		$('#example').DataTable({
    	 'order': [[ 0, 'desc' ]],
        data: dataSet,
        	'columns': [
            { 'data': 'weightdate', 'defaultContent': '' },//Datatables will show error if data is null (See https://datatables.net/manual/tech-notes/4).
            { 'data': 'pounds', 'defaultContent': '' },
            { 'data': 'workout', 'defaultContent': '' }
        	]
    		});
    	}
    }
    xmlhttp.send();
} );

</script>
</head>
<style>
		/*common css*/
table.t1 {width: 99%;}
table.t1, th, td {border-collapse:collapse; border: 1px solid black;}
input[type=text], select {
  width: 100%;
  padding: 10px 10px;
  margin: 4px 0;
  /*display: inline-block;*/
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 10px 10px;;
  margin: 4px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=date] {
  width: 95%;
  background-color: #CDECFE;
  color: black;
  padding: 10px 10px;
  margin: 4px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

		@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
	  [class*="col-"] {width: 100%;}
		}
</style>
<body>
<form action="./php/insertweight.php" method="post">
<table class="t1">
<tr>
<th>Date</th><th>Weight</th><th>Workout</th>
</tr>
<tr>
<td><input type="date" id="thedate" name="thedate"></td>
<td><input type="text" id="pounds" name="pounds"></td>
<!-- <td><input type="text" id="workout" name="workout"></td> -->
<td>
<select id="workout" name="workout">
<option value="N">N</option>
<option value="Y">Y</option>
</select>
</td>
</tr>
<tr><td colspan="3"><hr /></td></tr>
<tr><td colspan="3"><hr /></td></tr>
<tr>
<td colspan="3"><input type="submit"></td>
</tr>
</table>
</form>
<br />
<table id='example' class='display example' width='100%'>
<caption><h3>Weight Data</h3></caption>
<thead>
<th>Date</th><th>Pounds</th><th>Workout</th>
</thead>
<tfoot>
<th>Date</th><th>Pounds</th><th>Workout</th>
</tfoot>
</table>

</body>
</html>
