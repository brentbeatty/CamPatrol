<?php 

        $communitytype;

	if ($count > 0 && $searchPost) {
			$tempBool = true;
			$firstPost;
			// Write a case that will see if there is more than one neighborhood in the query.
			foreach ($communities as $community) {
				$neighborArray;

				if ($tempBool) {
					$firstPost = $community->location;
					$neighborArray[] = $firstPost;
				}
				if ($community->location !== $firstPost && !in_array($community->location, $neighborArray)) {
					$neighborArray[] = $community->location;
				}

				$tempBool = false;
			}
			// This will output the right side search menu based on what you have currently searched for.
			if ($locationPost && $namePost) {
				echo '
		        <form id="test_search" style="float:left;width:200px;" action="" method="POST">
					<div style="width:250px;">
					<label style="margin-left:80px;margin-top:3px">Search by Zip: </label>
					<input name="Search" style="margin-left:80px" type="text" value="'.$searchPost.'" data-validate="required" />
					<label style="margin-left:80px;margin-top:3px">Filter by Location: </label>
					<select style="margin-left:80px;" name="neighborhoodPost">
					';
						foreach ($neighborArray as $neighbors) {
							echo "<option value='".$neighbors."'>" . $neighbors . "</option>";
						}
				echo '
					</select>
					<label style="margin-left:80px;margin-top:3px">Filter by Name: </label>
					<input name="name" style="margin-left:80px" type="text" value="'.$namePost.'" data-validate="required" />
					<br>
					<input type="submit" value="Search" style="width:150px;margin-left:120px;">
					</div>
				</form>';	
			} else if ($locationPost) {
				echo '
		        <form id="test_search" style="float:left;width:200px;" action="" method="POST">
					<div style="width:250px;">
					<label style="margin-left:80px;margin-top:3px">Search by Zip: </label>
					<input name="Search" style="margin-left:80px" type="text" value="'.$searchPost.'" data-validate="required" />
					<label style="margin-left:80px;margin-top:3px">Filter by Neighborhood: </label>
					<select style="margin-left:80px;" name="neighborhoodPost">
					';
						foreach ($neighborArray as $neighbors) {
							echo "<option value='".$neighbors."'>" . $neighbors . "</option>";
						}
				echo '
					</select>
					<label style="margin-left:80px;margin-top:3px">Search by Name: </label>
					<input name="name" style="margin-left:80px" type="text" value="" data-validate="required" />
					<br>
					<input type="submit" value="Search" style="width:150px;margin-left:120px;">
					</div>
				</form>';	
			} else {
				// Echos the basic form for searching...
		        echo '
		        <form id="test_search" style="float:left;width:200px;" action="" method="POST">
					<div style="width:250px;">
					<label style="margin-left:80px;margin-top:3px">Search by Zip: </label>
					<input name="Search" style="margin-left:80px" type="text" value="'.$searchPost.'" data-validate="required" />
					<label style="margin-left:80px;margin-top:3px">Filter by Neighborhood: </label>
					<select style="margin-left:80px;" name="neighborhoodPost">
					';
						foreach ($neighborArray as $neighbors) {
							echo "<option value='".$neighbors."'>" . $neighbors . "</option>";
						}
					echo '
					</select>
					<br>
					<input type="submit" value="Search" style="width:150px;margin-left:120px;">
					</div>
				</form>';	
			}
	       echo '<div id="paging_container11" class="container" style="width:60%; float:right;">
				<div class="info_text"></div>
				<ul class="content">  
		';
		// This outputs the results from the search...
		foreach ($communities as $community) {
                        if ($community->community_type == 0) {
                              $communitytype = "Open Community";
                        } else if ($community->community_type == 1) {
                              $communitytype = "Limited Community";
                        } else if ($community->community_type == 2) {
                              $communitytype = "Closed Community";
                        }
			echo '
			<li class="communityList">
                <a href="/public/communities/view/'.$community->id.'"><h4>'.$community->name.'</h4></a>
                <p> Location: '.$community->location.' </p>
                <p> Zip: '.$community->zip.'</p>
                <p> Community type: '.$communitytype.' </p>    
            </li>
			';
		}
		echo '
		</ul>	
		<div class="page_navigation"></div>	
		</div>    ';
	} else {
		echo "No results can be displayed";
	}
?>