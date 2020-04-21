<html>

<head>
    <link rel="stylesheet" href="../css/common.css">
</head>

<body>
    <div class="header">
        <?php include $appTemplatePath . '/inc.header.php'; ?>
    </div>

    <div class="topnav">
        <?php include $appTemplatePath . '/inc.menu.php'; ?>
    </div>

    <div class="row">
        <div class="column side">
            <h2>Side</h2>
        </div>

        <div class="column middle">
            <?php include $appTemplatePath . '/' . $templateFile; ?>
        </div>
    </div>

    <div class="footer">
        <?php include $appTemplatePath . '/inc.footer.php'; ?>
    </div>

</body>

</html>