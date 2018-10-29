
<!DOCTYPE html>
<html>
<head>
<style>
	table, th, td {
	    border: 1px solid black;
	}
</style>
</head>
<body>

<div>
	<button onclick="insRow()" type="button">+</button>
</div>
<br>
<table id="myTable" >
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td contenteditable='true' class="one" placeholder="Please Ent"></td>
    <td contenteditable='true' class="two" placeholder="Please En"></td>
    <td contenteditable='true' class="three" placeholder="Please En"></td>
  </tr>
</table>
<br>
<div>
	<button onclick="myfun()">SAVE</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>  
function myfun()
{
	var one = [];
	var two = [];
	var three = [];
	var i = 0;
		$('#myTable tr td').each(function(){
			if($(this).attr('class')=='one'){
		    	one[i] = $(this).text(); 
			}
			else if($(this).attr('class')=='two'){
				two[i] = $(this).text();
			}
			else{
				three[i] = $(this).text();	
			}
			if(one[i]!=null && two[i]!= null && three[i]!= null){
				i++;
			}
		});
		$.ajax({
	        type: "POST",
	        url: "index1.php",
	        data:{'one': one , 'two' : two , 'three' : three}, 
	        cache: false,

	        success: function(){
	            alert("OK");
	        }
    	});
		console.log($(one).serializeArray());
		console.log(two);
		console.log(three);
		
}
function insRow()
{
    var x=document.getElementById('myTable');
       // deep clone the targeted row
    var new_row = x.rows[1].cloneNode(true);

       // append the new row to the table
    x.appendChild( new_row );
}
</script>
</body>
</html>
