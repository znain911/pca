<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title><?php echo $title;?></title>

<script src="<?php echo base_url();?>admin_dir/plugins/wysiwyg/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url();?>admin_dir/plugins/wysiwyg/ajaxupload.3.5.js" ></script>

<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '<?php echo base_url();?>a_imageupload/image_upload',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				document.getElementById('status').innerHTML='<img alt="" src="<?php echo base_url();?>user/images/loading2.gif" s />';
			},
			onComplete: function(file, response){
				//On completion clear the status
				document.getElementById('status').innerHTML='';
				//Add uploaded file to list
				if(response=="success"){
					window.location='<?php echo base_url();?>a_imageupload?wysiwyg=content';					
					
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>

<script src="<?php echo base_url();?>admin_dir/plugins/wysiwyg/ajax.js"></script>
<script src="<?php echo base_url();?>admin_dir/plugins/wysiwyg/jquery.idTabs.min.js" type="text/javascript"></script>

<script language="JavaScript" type="text/javascript">

var qsParm = new Array();


/* ---------------------------------------------------------------------- *\
  Function    : retrieveWYSIWYG()
  Description : Retrieves the textarea ID for which the image will be inserted into.
\* ---------------------------------------------------------------------- */
function retrieveWYSIWYG() {
  var query = window.location.search.substring(1);
  var parms = query.split('&');
  for (var i=0; i<parms.length; i++) {
    var pos = parms[i].indexOf('=');
    if (pos > 0) {
       var key = parms[i].substring(0,pos);
       var val = parms[i].substring(pos+1);
       qsParm[key] = val;
    }
  }
}


/* ---------------------------------------------------------------------- *\
  Function    : insertImage()
  Description : Inserts image into the WYSIWYG.
\* ---------------------------------------------------------------------- */
function insertImage() {
 var pimageurl= '<?php echo base_url();?>user/images/users/' + document.getElementById('imgsize').value + document.getElementById('imageurl').value;
  var image = '<img src="' + pimageurl + '" alt="' + document.getElementById('alt').value + '" alignment="' + document.getElementById('alignment').value + '" border="' + document.getElementById('borderThickness').value + '" hspace="' + document.getElementById('horizontal').value + '" vspace="' + document.getElementById('vertical').value + '">';
  window.opener.insertHTML(image, qsParm['wysiwyg']);
  window.close();
}

</script>




<style type="text/css">
.usual {
   color:#111;
  width:100%;
}
.usual ul li { list-style:none; float:left; }
.usual ul li a {
  display:block;
  padding:6px 10px;
  text-decoration:none!important;
  margin:1px;
  margin-left:0;
  font:10px Verdana;
  color:#FFF;
  background:#444;
}
.usual ul a:hover {
  color:#FFF;
  background:#111;
  }
.usual ul a.selected {
  margin-bottom:0;
  color:#000;
  background:snow;
  border-bottom:1px solid snow;
  cursor:default;
  }
.usual .tabc {
  padding:10px 10px 8px 10px;
  *padding-top:3px;
  *margin-top:-15px;
  clear:left;
  background:snow;
  font:10pt Georgia;
  overflow:auto;
  max-height:400px;
  height:400px;
}
/*.usual div a { color:#000; font-weight:bold; }*/






.clr{clear:both; width:100%;}
.main_worp{width:98%; padding:1%;}
.main_worp .leftcol{width:75%; float:left;}
.main_worp .rightcol{width:23%; float:right; padding-right:2%;}

</style>
<style type="text/css">
#upload{
	margin:30px 200px; padding:15px;
	font-weight:bold; font-size:1.3em;
	font-family:Arial, Helvetica, sans-serif;
	text-align:center;
	background:#f2f2f2;
	color:#3366cc;
	border:1px solid #ccc;
	width:150px;
	cursor:pointer !important;
	-moz-border-radius:5px; -webkit-border-radius:5px;
}
.darkbg{
	background:#ddd !important;
}
#status{
	font-family:Arial; padding:5px;
}
ul#files{ list-style:none; padding:0; margin:0; }
ul#files li{  margin-bottom:2px; width:120px; float:left; margin-right:10px;}
ul#files li img{ max-width:120px; max-height:120px; }
.success{ /*background:#99f099; border:1px solid #339933;*/ }
.error{ /*background:#f0c6c3; border:1px solid #cc6622;*/ }

.imagebox{  margin-bottom:10px; width:140px; float:left; margin-right:10px;}
.imagebox img{ max-width:140px; max-height:140px; }
.imagebox img a{  border:1px #FFF solid; }
.imagebox img a:hover{  border:1px #FFF solid; }

/*
=======================================================================
	Paginations Rules
=======================================================================
*/
#paginations{height:30px; width:100%; margin-top:20px; clear:both; font-size:10px;}
#paginations a{text-decoration:none; color:#333;}
#paginations select{border:#CCC 1px solid; padding:0px;}
#paginations .col1{float:left; width:47%; padding:5px 0px; text-align:right;}
#paginations .col2{float:left; width:33%; padding-top:8px; }
#paginations .col3{float:left; width:20%; text-align:right; }
#paginations ul{margin:0px; padding:0px; float:left; list-style:none;}
#paginations ul li{float:left; margin-right:5px; cursor:pointer; line-height: 16px;}


#paginations .pact{display:block; float:left; font-weight:bold; cursor:pointer; padding:3px 5px; min-width:15px;  text-align:center; background-color:#868484; color:#FFF;}
#paginations .pact:hover{background-color:#aeaeae;}
#paginations .pdeact{display:block; float:left; font-weight:normal; cursor:pointer; padding:5px 5px 4px 5px; min-width:15px; text-align:center; background-color:#CCC;}


</style>
</head>
<body bgcolor="#EEEEEE" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" onLoad="retrieveWYSIWYG();">




<div class="main_worp">

    <div class="leftcol">
        <div id="usual1" class="usual"> 
            <ul> 
            	<li><a href="#tab1">Upload Files</a></li> 
            	<li><a class="selected" href="#tab2">Media Library</a></li>
            </ul> 
            <div class="tabc" id="tab1">            
            	<h3>Image Upload</h3>
				<div id="upload" ><span>Upload File</span></div><div id="status" ></div>            
            </div> 
            <div class="tabc" id="tab2">
            	<h3>Last Uploded Image</h3>	
				<?php                
               	if($site_imageupload){
				foreach($site_imageupload as $row):
                    $imagetitle = strtolower(substr($row->imagename,0,strrpos($row->imagename,".")));
					?>                    
                    <div class="imagebox"><a href="#" onClick='imgurlinsert("user<?php echo $site_user;?>", "<?php echo $row->imagename;?>","<?php echo $imagetitle;?>")'><img src="<?php echo base_url();?>user/images/users/thumb150x150_<?php echo $row->imagename;?>" alt="" border="0" /></a></div>
                    <?php
                endforeach;	
				}
                ?> 
                <div style="clear:both"></div>
				
				<?php echo $links; ?>             
            </div>
            
        </div>
		<script type="text/javascript"> 
          $("#usual1 ul").idTabs("tab2"); 
        </script>
    </div>
    <div class="rightcol">
    
            <table border="0" cellpadding="0" cellspacing="0" style="padding: 10px;"><tr><td>
        
        <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Insert Image:</span>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #F7F7F7; border: 2px solid #FFFFFF; padding: 5px;">
         
         <tr>
          	<td colspan="2" style="padding-bottom: 2px; padding-top: 0px;" width="60%" id="viewimg">&nbsp;</td>
         </tr>
         
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;" width="25%">Image URL:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;" width="60%">
            <input type="hidden" name="imageuser" id="imageuser" value="user<?php echo $site_user;?>">
            <input type="text" name="imageurl" id="imageurl" value=""  style="font-size: 10px; width: 100%;"></td>
         </tr>
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Alternate Text:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="alt" id="alt" value=""  style="font-size: 10px; width: 100%;"></td>
         </tr>
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Title Text:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="imagetitle" id="imagetitle" value=""  style="font-size: 10px; width: 100%;"></td>
         </tr>
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Image Size:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;">
                <select name="imgsize" id="imgsize" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 100%;">
                 <option value="">Full Size</option>
                 <option value="thumb150x150_">Thumbnail 150 x 150</option>
                 <option value="thumb300x300_">Thumbnail 300 x 300</option>
                 <option value="thumb630x472_">Thumbnail 630 x 472</option>
                </select>
                
            </td>
         </tr>
        </table>
            
        
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px;"><tr><td>
        
        <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Layout:</span>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #F7F7F7; border: 2px solid #FFFFFF; padding: 5px;">
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;" width="25%">Alignment:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;" width="70%">
            <select name="alignment" id="alignment" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 100%;">
             <option value="">Not Set</option>
             <option value="left">Left</option>
             <option value="right">Right</option>
             <option value="texttop">Texttop</option>
             <option value="absmiddle">Absmiddle</option>
             <option value="baseline">Baseline</option>
             <option value="absbottom">Absbottom</option>
             <option value="bottom">Bottom</option>
             <option value="middle">Middle</option>
             <option value="top">Top</option>
            </select>
            </td>
         </tr>
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Border Thickness:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="borderThickness" id="borderThickness" value=""  style="font-size: 10px; width: 100%;"></td>
         </tr>
        </table>	
        
        </td>
        <td width="10">&nbsp;</td>
        <td>
        
        <span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Spacing:</span>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #F7F7F7; border: 2px solid #FFFFFF; padding: 5px;">
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;" width="25%">Horizontal:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;" width="75%"><input type="text" name="horizontal" id="horizontal" value=""  style="font-size: 10px; width: 100%;"></td>
         </tr>
         <tr>
          <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Vertical:</td>
            <td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="vertical" id="vertical" value=""  style="font-size: 10px; width: 100%;"></td>
         </tr>
        </table>
        </td></tr></table>
        <div align="right" style="padding-top: 5px;"><input type="submit" value="  Submit  " onClick="insertImage();" style="font-size: 12px;" >&nbsp;<input type="submit" value="  Cancel  " onClick="window.close();" style="font-size: 12px;" ></div>
        </tr></td></table>
    
    
    </div>
    <div class="clr"></div>
</div>









<script type="text/javascript">
function imgurlinsert(user, str, imagetitle) {
    
	$('#viewimg').html( '<img src="<?php echo base_url();?>user/images/users/'+ str +'" style="width:100%; margin-bottom:10px;">' );
	$('#imageurl').val( str ); 
	$('#imagetitle').val( imagetitle ); 
   
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		device_width =  $(window).width();
		device_height =  $(window).height();
	});
</script>
</body>
</html>
