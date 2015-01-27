<?php include('backend.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Template &middot; Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://localhost/shorturl/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
	  iframe {
	  margin-top: 20px;
	  margin-bottom: 30px;

	  -moz-border-radius: 12px;
	  -webkit-border-radius: 12px; 
	  border-radius: 12px; 

	  -moz-box-shadow: 4px 4px 14px #000; 
	  -webkit-box-shadow: 4px 4px 14px #000; 
	  box-shadow: 4px 4px 14px #000; 

	}
    </style>
    <link href="http://localhost/shorturl/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://localhost/shorturl/js/html5shiv.js"></script>
    <![endif]-->

    							   
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="muted">URL Shortener</h3>
      </div>

      <hr>

      <form method="post" action="create.php">
	  <div >
        <h1>URL You need to shrink!</h1>
          <input id="url" name="url" type="text" placeholder="Long URL Input" style="width:80%" value=''>
		  <button type="submit" class="btn" style="margin-bottom: 10px;" >Make It Short</button>
		</div>
	  </form>
      <hr>

      <div class="row-fluid" >
        <div class="span12">
		<div class="span6">
				<div class="bs-docs-example">
					<table class="table">
					  <thead>
						<tr>
						  <th>Long Url</th>
						  <th>Short Url</th>
						  <th></th>
						</tr>
					  </thead>
					  <tbody id='body' name='body' >
					  <?php 
					  if($data != 0 ){
						  foreach($data as $k=>$v){
							echo "<tr style='overflow:hidden' id='".$v['unique']."' name='".$v['unique']."' ><td>".$v['url']."</td><td><a style='cousor:pointer' target='_blank' href=\"".$rooturl.$v['unique']."\" >".$rooturl.$v['unique']."</a></td><td><a href='javascript:;' onClick='deleteurl(\"".$v['unique']."\")' >Remove</a></td><td><a href='javascript:;' onClick='preview(\"".$v['unique']."\")' >Preview</a></td></tr>";
						  } 
					  } 
					  ?>
					  </tbody>
					</table>
				</div>
        </div>
	
        <div id="prev" name="prev" class="span6">
		<div class="bs-docs-example">
			<?php// if(count($data) > 0){ ?>
			<!--
			<h3>Preview Link!</h3><iframe name="pagetext"  frameborder="no"  height="500px" style="overflow: ture" src="<?php echo $rooturl.$data[0]['unique']; ?>"></iframe>
			-->
			<?php// } else {?>
			
			<h3>Preview Link!</h3><iframe name="pagetext"  frameborder="no"  height="500px" style="overflow: ture" src="http://localhost/phpurl/pagenotfound.php"></iframe>
			
			<?php// }?>
		</div>
		</div>
		
		</div>
		
		
      </div>

      <hr>

      <div class="footer">
      <a href="http://www.000webhost.com/" target="_blank">Free Web Hosting</a>
      </div>

    </div> <!-- /container -->
	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://localhost/shorturl/js/jquery.js"></script>
	<script>
	
	function preview(key){
		var html = '<h3>Preview Link!</h3><iframe name="pagetext"  frameborder="no" width="100%" height="500px" style="overflow: ture" src="<?php echo $rooturl; ?>'+key+'"></iframe>';
		jQuery( "#prev" ).html(html);
	}
	
	function deleteurl(key){
		var data = 'id='+key;
		jQuery.ajax({
			type: "GET",
			url : '<?php echo $rooturl; ?>remove.php',
			data: data,
			complete: function(resp){
				location.reload();
			}
		});
	}
	
	</script>
    	
  </body>
</html>
