<?php

// echo json_decode(file_get_contents('php://input'), true);

unlink('uploads/' . file_get_contents('php://input'));
echo true;