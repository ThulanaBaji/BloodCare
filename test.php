<?php

$random_hash = md5(uniqid(rand().time(), true));
echo $random_hash.'<br>'.strlen($random_hash);