<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagecrop {
	
	
	function thumb_image($filename,$filename2,$filetype,$width,$height){
		if($filetype=='image/png'){
			$im = imagecreatefrompng($filename);			
		}else if($filetype=='image/gif'){
			$im = imagecreatefromgif($filename);			
		}else if($filetype=='image/jpeg' || $filetype=='image/jpg'){
			$im = imagecreatefromjpeg($filename);
		}else{
			$im = imagecreatefromjpeg($filename);
		}
		
		if(!$im){ 
			echo "<p><strong>Error: Couldn't open image to create thumbnail!</strong></p>\n\n" ;				
		}else {
			$imw = imagesx($im); // uploaded image width
			$imh = imagesy($im); // uploaded image height
			
			/*if($imw<$width)
				$nw = $imw;
			else*/
				$nw = $width;
						
			//$nh = $imh * ($nw / $imw); //thumnail height
			$nh = $height;
			$newim = imagecreatetruecolor ($width, $height);
			
			// set background to white
			$white = imagecolorallocate($im, 255, 255, 255);
			imagefill($newim, 0, 0, $white);
			
			
			if($filetype=='image/png'){
				imagealphablending($newim, false);
				imagesavealpha($newim, true); 
				imagealphablending($im, true);			
			}
			if($nh>$height){
				$top = ($nh-$height)/2;
				imagecopyresampled ($newim,$im, 0, 0, 0, 0, $nw, $height, $imw, $imh);
			}else if($nh<$height){
				$top = ($height-$nh)/2;
				imagecopyresampled ($newim,$im, 0, 0, 0, $top, $nw, $height, $imw, $imh);
			}else{
				imagecopyresampled ($newim,$im, 0, 0, 0, 0, $nw, $nh, $imw, $imh);
			}
			
			if($filetype=='image/png'){
				imagepng($newim, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}else if($filetype=='image/gif'){
				imagegif($newim, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}else if($filetype=='image/jpeg' || $filetype=='image/jpg'){
				imagejpeg($newim, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}
		}
	}



	function thumb_image_width($filename,$filename2,$filetype,$width){
		if($filetype=='image/png'){
			$im = imagecreatefrompng($filename);			
		}else if($filetype=='image/gif'){
			$im = imagecreatefromgif($filename);			
		}else if($filetype=='image/jpeg' || $filetype=='image/jpg'){
			$im = imagecreatefromjpeg($filename);
		}else{
			$im = imagecreatefromjpeg($filename);
		}
		
		if(!$im){ 
			echo "<p><strong>Error: Couldn't open image to create thumbnail!</strong></p>\n\n" ;				
		}else {
			$imw = imagesx($im); // uploaded image width
			$imh = imagesy($im); // uploaded image height
			
			if($imw<$width)
				$nw = $imw;//round(($nh / $imh) * $imw); //thumnail width
			else
				$nw = $width;//round(($nh / $imh) * $imw); //thumnail width
						
			$nh = $imh * ($nw / $imw); //thumnail height
			$newim = imagecreatetruecolor ($nw, $nh);
			
			if($filetype=='image/png'){
				imagealphablending($newim, false);
				imagesavealpha($newim, true); 
				imagealphablending($im, true);			
			}
			
			imagecopyresampled ($newim,$im, 0, 0, 0, 0, $nw, $nh, $imw, $imh);
						
			if($filetype=='image/png'){
				imagepng($newim, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}else if($filetype=='image/gif'){
				imagegif($newim, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}else if($filetype=='image/jpeg' || $filetype=='image/jpg'){
				imagejpeg($newim, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}
		}
	}
	
	
	function thumb3_image($filename,$filename2,$filetype,$width,$height){
		if($filetype=='image/png'){
			$im = imagecreatefrompng($filename);			
		}else if($filetype=='image/gif'){
			$im = imagecreatefromgif($filename);			
		}else if($filetype=='image/jpeg' || $filetype=='image/jpg'){
			$im = imagecreatefromjpeg($filename);
		}else{
			$im = imagecreatefromjpeg($filename);
		}
		
		if(!$im){ 
			echo "<p><strong>Error: Couldn't open image to create thumbnail!</strong></p>\n\n" ;				
		}else {
			$imw = imagesx($im); // uploaded image width
			$imh = imagesy($im); // uploaded image height
			$nw = $width;//round(($nh / $imh) * $imw); //thumnail width
			$nh = $imh * ($nw / $imw); //thumnail height
			$newim = imagecreatetruecolor ($nw, $nh);
			imagecopyresampled ($newim,$im, 0, 0, 0, 0, $nw, $nh, $imw, $imh);					
					
					$dest = imagecreatetruecolor ($width, $height);
					$red = imagecolorallocate($dest, 255, 255, 255);					
					// Draw a white rectangle
					imagefilledrectangle($dest, 0, 0, $width, $height, $red);
					// Set the brush
					imagesetbrush($dest, $newim);
					// Draw a couple of brushes, each overlaying each
					imageline($dest, imagesx($dest) / 2, imagesy($dest) / 2, imagesx($dest) / 2, imagesy($dest) / 2, '#f5f5f5');			
			
			if($filetype=='image/png'){
				imagepng($dest, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}else if($filetype=='image/gif'){
				imagegif($dest, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}else if($filetype=='image/jpeg' || $filetype=='image/jpg'){
				imagejpeg($dest, $filename2) or die("<p><strong>Error: Couldn't save thumnbail!</strong></p>");
			}
		}
	}
				
											
	
}// End of Class 
?>