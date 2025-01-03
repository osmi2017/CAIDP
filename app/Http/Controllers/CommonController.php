<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualite;

class CommonController extends Controller
{
    public function findQualite($id){
    	return Qualite::find($id);
    }

    public static function  displayNodata($text){
    	?>
    	<div class="well">
			<br>
			<br>
			<h1 class="text-center">
				<i class="fa fa-question-circle"></i> <?php echo $text ?>
			</h1>
			<br>
			<br>
		</div>
    	<?php
    }
}
