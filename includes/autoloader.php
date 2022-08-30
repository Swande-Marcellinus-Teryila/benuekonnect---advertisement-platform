<?php 
/*these load all classes */
spl_autoload_register(function($classes){
require("classes/{$classes}.php");
});
?>