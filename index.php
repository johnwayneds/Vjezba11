<?php
//funkcija
function jeProst($broj) {
    if ($broj <= 1) {
        return false; 
    }

    // Provjera 
    for ($i = 2; $i <= sqrt($broj); $i++) {
        if ($broj % $i == 0) {
            return false; 
        }
    }

    return true; 
}

$prostiBrojevi = [];
for ($i = 2; $i < 100; $i++) {
    if (jeProst($i)) {
        $prostiBrojevi[] = $i;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uneseniBroj = $_POST['broj'];

    $isProst = jeProst($uneseniBroj) ? "Prost" : "Nije prost";
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provjera prostog broja</title>
</head>
<body>

<h2>Provjera prostog broja</h2>

<form action="" method="POST">
    <label for="broj">Unesite broj:</label><br>
    <input type="number" id="broj" name="broj" required><br><br>
    <input type="submit" value="Pošaljite">
</form>

<?php
if (isset($isProst)) {
    echo "<p>Uneseni broj $uneseniBroj je: $isProst</p>";
}
?>

<h3>Prosti brojevi manji od 100:</h3>
<ul>
    <?php
    foreach ($prostiBrojevi as $broj) {
        echo "<li>$broj</li>";
    }
    ?>
</ul>

</body>
</html>
