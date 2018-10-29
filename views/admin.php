<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

  
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <table style="width:100%">
          <tr>
            <th>Mall name</th>
            <th>Update</th> 
          </tr>
          <?php
          foreach ($mall as  $value) {
          ?>
          <tr>
            <td><?php echo $value->name; ?></td>
            <td><button onclick="myFunction(<?php echo $value->id; ?>)" >Delete</button></td>
          </tr>
          <?php 
            }
          ?>
        </table>
    </div>
    <div class="col-sm-6">
        <table style="width:100%">
         <tr>
            <th>shop name</th>
            <th>mall name</th> 
            <th>Update</th> 
          </tr>
          <?php
          foreach ($shop as  $value) {
          ?>
          <tr>
            <td><?php echo $value->sname; ?></td>
            <td><?php echo $value->name; ?></td>
            <td><button onclick="myFunction1(<?php echo $value->id; ?>)" >Delete</button></td>
          </tr>
          <?php 
            }
          ?>
        </table>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <table style="width:100%">
          <tr>
            <th>Mall name</th>
            <th>Update</th> 
          </tr>
          <tr>
            <td><input type="text" name="mall" id=mal_name placeholder="mall name"></td>
            <td><button onclick="myFunction2()" >Add</button></td>
          </tr>
        </table>
    </div>
    <div class="col-sm-6">
        <table style="width:100%">
         <tr>
            <th>shop name</th>
            <th>select mall</th>
            <th>Update</th> 
          </tr>
          <tr>
            <td><input type="text" name="shop" id="shop_name" placeholder="shop name"></td>
            <td>
                <select id="select">
                    <?php
          foreach ($mall as  $value) {
          ?>
                    <option tag="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                    <?php 
            }
          ?>
                
                </select>
            </td>
            <td><button onclick="myFunction3()" >Add</button></td>
          </tr>
        </table>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">

function myFunction(id) {
 var BASE_URL = "<?php echo base_url();?>";
    $.ajax
    ({
        type: "POST",
        url: BASE_URL+'/index.php/welcome/del_mall',
        data: {'id' : id},
        cache: false,
        success: function(html)
        {
            setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
            }, 100);
        } 
    });
}
function myFunction1(id) {
 var BASE_URL = "<?php echo base_url();?>";
    $.ajax
    ({
        type: "POST",
        url: BASE_URL+'/index.php/welcome/del_shop',
        data: {'id' : id},
        cache: false,
        success: function(html)
        {
            setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
            }, 5000);
        } 
    });
}
function myFunction2() {
 var BASE_URL = "<?php echo base_url();?>";
 var mallname=$("#mal_name").val();
    $.ajax
    ({
        type: "POST",
        url: BASE_URL+'/index.php/welcome/mall_add',
        data: {'mallname' : mallname},
        cache: false,
        success: function(html)
        {
            setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
            }, 5000);
        } 
    });
}
function myFunction3() {
 var BASE_URL = "<?php echo base_url();?>";
 var shopname=$("#shop_name").val();
 var mall_id=$('#select').find(":selected").attr('tag');
 
    $.ajax
    ({
        type: "POST",
        url: BASE_URL+'/index.php/welcome/shop_add',
        data: {'shopname' : shopname, "mall_id" : mall_id},
        cache: false,
        success: function(html)
        {
            setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
            }, 5000);
        } 
    });
}
</script>
