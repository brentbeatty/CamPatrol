<div class="community-page">

	<div class="left-column">
		<div class="mod-info">
			<h3>Comm Mod</h3>
			<h3>Brent B</h3>
		</div>
		<div class="emergency-info">
			<h3>Police Info</h3>
			<h3>Fire Info</h3>
		</div>	
	</div>
	<div class="right-column">
		<?php
			echo '<table>
			<thead>
			<tr>
			<th>Name</th>
			<th>Zip</th>
			<th>Community Type</th>
			</tr>
			</thead>
			<tr>
			<td align=center>'.$community->name.'</td>
			<td align=center>'.$community->zip.'</td>
			<td align=center>'.$community->community_type.'</td>
			<tr>
			</table>';
		?>
	</div>



</div>