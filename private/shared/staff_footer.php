    <footer>
    &copy; <?php echo date('Y'); ?> Globe Bank
    </footer>
</body>
</html>

<?php 

//most suitable place for closing database connection, as php will be done in footer
db_disconnect($db);

?>