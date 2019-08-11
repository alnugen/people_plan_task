<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
	  </li>
	<li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Read CSV") {?>active<?php }?>" href="read_csv.php">Read CSV</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Check Palindrome") {?>active<?php }?>" href="palindrome.php">Check Palindrome</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Mysql Query") {?>active<?php }?>" href="second_highest.php">Mysql Query</a>
	  </li>
	</ul>
</div>
