<?
try {
    $dbh = new PDO(
        'mysql:host=localhost;dbname=a20i86webprog',
        'a20i86webprog',
        'a20i86',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    $sqlSelect = "select name, email, phone,
    subject, message, send_date, is_guest from messages order by send_date desc";
    $sth = $dbh->prepare($sqlSelect);
    $sth->execute();

    $rows = array();
    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        array_push($rows,$row);
    }
    

} catch (PDOException $e) {
    $errormessage = "Error: " . $e->getMessage();
}


?>
