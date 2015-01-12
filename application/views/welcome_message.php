<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Template &middot; Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $this->config->item('css_url');?>bootstrap.css" rel="stylesheet">
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
    </style>
    <link href="<?php echo $this->config->item('css_url');?>/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo $this->config->item('js_url');?>html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="muted">URL Shortener</h3>
      </div>

      <hr>

      <div >
        <h1>URL You need to shrink!</h1>
          <input id="url" name="url" type="text" placeholder="Long URL Input" style="width:80%" value=''>
		  <button type="button" class="btn" onclick="getShortUrl()">Submit</button>
		</div>

      <hr>

      <div class="row-fluid marketing">
        <div class="span12">
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
							echo "<tr id='".$v->unique."' name='".$v->unique."' ><td>".$v->url."</td><td><a style='cousor:pointer' target='_blank' href=\"".base_url()."?key=".$v->unique."\" >".base_url()."?key=".$v->unique."</a></td><td><a href='javascript:;' onClick='deleteurl(\"".$v->unique."\")' >Remove</a></td></tr>";
						  } 
					  }
					  ?>
					  </tbody>
					</table>
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
    <script src="<?php echo $this->config->item('js_url');?>jquery.js"></script>
	<script>
	
	var url='';
	
	function getShortUrl(){
		var data = 'url='+jQuery('#url').val();
		url = jQuery('#url').val();
		jQuery.ajax({
			type: "POST",
			url : '<?php echo $this->config->item('base_url'); ?>',
			data: data,
			complete: function(resp){
				addtotable(resp.responseText);
			}
		});
	}
	
	function addtotable(key){
		var html = "<tr id='"+key+"' name='"+key+"'><td>"+url+"</td><td><a style='cousor:pointer' target='_blank' href='<?php echo base_url();?>?key="+key+"'><?php echo base_url();?>?key="+key+"</a></td><td><a href='javascript:;' onClick='deleteurl(\""+key+"\")' >Remove</a></td></tr>";
		jQuery( "#body" ).append( html );
		url = '';
	}
	
	function deleteurl(key){
		var data = 'unique='+key;
		jQuery.ajax({
			type: "POST",
			url : '<?php echo $this->config->item('base_url_long'); ?>delete',
			data: data,
			complete: function(resp){
				jQuery("#"+resp.responseText).remove();
			}
		});
	}
	
	</script>   	
  </body>
</html>
