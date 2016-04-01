
<nav>
	<ul class="pagination">
		<?php
			
			$active = null;
			$pagina = $this->uri->segment(3) != null ? $this->uri->segment(3) : 1;
			for ($i=1; $i < ($total / $perPage) + 1; $i++) { 

				$active = $pagina  == $i ? 'active' : '';

				echo '<li class="'. $active .'"><a href="'. base_url() . $controller .'/index/'. $i . '?' . $_SERVER['QUERY_STRING'] . '">'. $i .'</a></li>';
			}
			
		?>
     </ul>
   </nav>