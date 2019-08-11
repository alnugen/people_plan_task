<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/peopleplan_task/read_csv.php":
			$CURRENT_PAGE = "Read CSV";
			$PAGE_TITLE = "Read CSV";
			break;
		case "/peopleplan_task/second_highest.php":
			$CURRENT_PAGE = "Mysql Query";
			$PAGE_TITLE = "Mysql Query";
			break;
		case "/peopleplan_task/palindrome.php":
			$CURRENT_PAGE = "Check Palindrome";
			$PAGE_TITLE = "Check Palindrome";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to homepage!";
	}
?>
