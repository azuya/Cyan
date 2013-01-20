<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Comment extends Controller {
     
    public function action_post() {
        $comment = new Model_Comment();
        $values = $this->request->post();

        // Set now
        $values["time"] = date("Y-m-d H:i:s");
        
        // Post $values
        $comment->values($values);

		// Save to DB        
        $comment->save();
         
		$this->redirect("post/view/".$comment->post_id);
    }
 
}