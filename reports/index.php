<?php
//
//reports/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
		
		<div id="content">
		
			<table class="table1">
			<thead>
				<tr>
				<th colspan="3">Results Template</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th>Col 1</th>
				<th>Col 2</th>
				<th>Col 3</th>
				</tr>
				<tr>
				<th class="sub">Sub head 1</th>
				<td>209385</td>
				<td>45</td>
				</tr>
				<tr>
				<th class="sub">Sub head 2</th>
				<td>4577</td>
				<td>22</td>
				</tr>
				<tr>
				<th class="sub">Sub head 3</th>
				<td>69765</td>
				<td>75</td>
				</tr>
			</tbody>
			</table>
			
			<hr />

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
