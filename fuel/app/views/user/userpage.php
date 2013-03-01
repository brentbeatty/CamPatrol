<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Group</th>
			<th>Last Login</th>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php 

	echo 
	'<td style="margin:10px;">' . $user['id'] . '</td>
	<td style="margin:10px;">' . $user['username'] . '</td>
	<td style="margin:10px;">' . $user['group'] . '</td>
	<td style="margin:10px;">' . date("m/d/Y H:i:s", $user['last_login']) . '</td>
	';
	
?>
		</tr>
	</tbody>
</table>