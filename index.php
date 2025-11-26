<?php

require_once './class/user.php';

$uknow = new User();

echo '<p>' . $uknow->createUser(["Leo", "cjhvfc"]) . '</p>';