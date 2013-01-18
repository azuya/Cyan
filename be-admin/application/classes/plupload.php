<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Plupload helper class. Provides generic methods for generating and
 * handling Plupload
 *
 * @category   Helpers
 * @author     Anders Dahlgren
 * @copyright  (c) 2013 Anders Dahlgren
 * @license    None
 */
class Plupload {

	/**
	 * Creates a dropzone
	 *
	 *     echo Plupload::dropzone('username', $username);
	 *
	 * @param   string  ...
	 * @param   string  ...
	 * @param   string   ...
	 * @return  string
	 */
	public static function dropzone($upload_directory = "", $div_of_files = "list-of-files", $return_file_to_id = "", $image_preview_id = "")
	{


	/*

	function bliss_plupload_dropzone($upload_directory = "", $div_of_files = "list-of-files", $return_file_to_id = "", $image_preview_id = "") {
		// echo "bliss_plupload_dropzone($upload_directory, $div_of_files, $return_file_to_id, $image_preview_id)<br>";
		
		global $bliss_root_path;
		include_once($bliss_root_path . "plupload/render_plupload.php");
		bliss_render_plupload();
	
		$html  = "<script type=\"text/javascript\">".LF;
		$html .= "$(document).ready(function(){".LF;
		$html .= "$.bliss.return_file_to_id = '".$return_file_to_id."';".LF;
		$html .= "$.bliss.preview_image_id = '".$image_preview_id."';".LF;
		$html .= "});".LF;
		$html .= "</script>".LF;
		
		$html .= "<div id=\"".$div_of_files."\"><p class=\"red\">"._("No file upload runtime found!")."</p></div>" . LF;
	
		// $html .= "<div style=\"display:block; padding-top:10px; padding-left:10px;\">";
		// $html .= "<button id=\"pickfiles\" class=\"b-ui-button\">"._("Choose")."</button>" . LF;
		// $html .= "<button id=\"uploadfiles\" class=\"b-ui-button\">"._("Upload")."</button>" . LF;
		// $html .= "</div>" . LF;
	
		$html .= "<div id=\"dropZone\" class=\"dropzone\">".LF;
		$html .= "<div class=\"inner\">";
	
		$html .= "<h2>"._("Drag & drop files here")."</h2>";
		$html .= "<p>"._("You can upload more than one file at a time. Maximum upload file size: XX MB.</p><p>When a file has been uploaded, you can add titles and descriptions to the files.")."</p>";
	
		// Progress bar
		$html .= "<p><div id=\"total-upload-progress\" class=\"progress progress-striped active\">".LF;
		$html .= "<div class=\"bar\"></div>".LF;
		$html .= "</div></p>".LF;
		
		// Upload status
		$html .= "<p id=\"total-upload-status\"></p>".LF;
	
		$html .= "</div>";
		$html .= "</div>".LF;
		
		// if ($image_preview_id != "") {
		// 	$html .= "<div id=\"image_preview_div\" class=\"\"></div>".LF;
		// }
		
		return $html;
	}



	*/

		$html .= "<div id=\"plupload-fileupload\"></div>" . LF;

		return $html;
	}

}
?>