<?php
    $host = 'localhost';
    $db   = 'ez_recycling';
    $user = 'root';
    $pass = '';

    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;";
    try {
        $pdo = new \PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

function template_header($title) {
echo <<<EOT
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="event.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <nav>
                    <a href="member.php?page=event">Event</a>
                </nav>
            </div>
        </header>
        <main>
EOT;
}
function template_footer() {
}
?>
