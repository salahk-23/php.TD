<?php
// TD numero 1
// Exercice 1
$etudiant = [
    'nom' => 'EL Assassi',
    'prénom' => 'Salah',
    'matricule' => '230230'
];
echo "Nom : {$etudiant['nom']}, Prénom : {$etudiant['prénom']}, Matricule : {$etudiant['matricule']}<br>";
// Exercice 2
$etudiant['note'] = 15;
$etudiant['note'] = 18; // Modification
echo "Note actuelle : {$etudiant['note']}<br>";
// Exercice 3
$produits = [
    'fraise' => 10.5,
    'orange' => 20,
    'lemon' => 15.75
];
foreach ($produits as $nom => $prix) {
    echo "Produit : $nom, Prix : $prix €<br>";
}
// Exercice 4
$scores = [
    'hatim' => 12,
    'mooniim' => 15,
    'salah' => 14,
    'youssef' => 10,
    'mehdi' => 13
];
$moyenne = array_sum($scores) / count($scores);
echo "Moyenne des scores : $moyenne<br>";
// Exercice 5
$pays = [
    'France' => 67000000,
    'Allemagne' => 83000000,
    'Italie' => 60000000
];
arsort($pays);
foreach ($pays as $nom => $population) {
    echo "Pays : $nom, Population : $population<br>";
}
?>
<!-- Exercice 6 -->
<form method="POST" action="">
    Nom : <input type="text" name="nom" required><br>
    Âge : <input type="number" name="age" required><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['age'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    if ($age !== false) {
        echo "Bienvenue, $nom, vous avez $age ans !<br>";
    } else {
        echo "Erreur : L'âge doit être un entier valide.<br>";
    }
}
?>
<!-- Exercice 7 -->
<form method="POST" action="">
    Nom : <input type="text" name="nom" required><br>
    Âge : <input type="number" name="age" required><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['age'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    if ($age !== false && $age > 0) {
        echo "Bienvenue, $nom, vous avez $age ans !<br>";
    } else {
        echo "Erreur : L'âge doit être un entier positif.<br>";
    }
}
?>
<!-- Exercice 8 -->
<form method="POST" action="">
    Couleur préférée :
    <select name="couleur">
        <option value="rouge">Rouge</option>
        <option value="vert">Vert</option>
        <option value="bleu">Bleu</option>
    </select><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['couleur'])) {
    $couleur = htmlspecialchars($_POST['couleur']);
    echo "Votre couleur préférée est : $couleur<br>";
}
?>
<!-- Exercice 9 -->
<form method="GET" action="">
    Nombre 1 : <input type="number" name="nombre1" required><br>
    Nombre 2 : <input type="number" name="nombre2" required><br>
    <button type="submit">Calculer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombre1'], $_GET['nombre2'])) {
    $nombre1 = filter_var($_GET['nombre1'], FILTER_VALIDATE_INT);
    $nombre2 = filter_var($_GET['nombre2'], FILTER_VALIDATE_INT);
    if ($nombre1 !== false && $nombre2 !== false) {
        $somme = $nombre1 + $nombre2;
        echo "La somme est : $somme<br>";
    } else {
        echo "Erreur : Veuillez entrer des nombres valides.<br>";
    }
}
?>
<!-- Exercice 10 -->
<form method="POST" action="">
    Type de compte :
    <select name="type_compte">
        <option value="Administrateur">Administrateur</option>
        <option value="Utilisateur">Utilisateur</option>
    </select><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type_compte'])) {
    $type_compte = htmlspecialchars($_POST['type_compte']);
    if ($type_compte === 'Administrateur') {
        echo "Bienvenue, administrateur !<br>";
    } elseif ($type_compte === 'Utilisateur') {
        echo "Bienvenue, utilisateur simple !<br>";
    } else {
        echo "Erreur : Type de compte non valide.<br>";
    }
}
// TD NUMERO 2
?>
<?php
// Exercice 1 : Tableau associatif d'employés avec salaire moyen
$employes = [
    ['nom' => 'mehdi', 'poste' => 'Développeur', 'salaire' => 13000],
    ['nom' => 'salah', 'poste' => 'Designer', 'salaire' => 12000],
    ['nom' => 'hatim', 'poste' => 'Chef de projet', 'salaire' => 13500],
    ['nom' => 'youssef', 'poste' => 'comptable', 'salaire' => 13200],
    ['nom' => 'mooniim', 'poste' => 'Support IT', 'salaire' => 12500],
];
function calculer($employes) {
    $total = array_sum(array_column($employes, 'salaire'));
    return $total / count($employes);
}
echo "Salaire moyen : " . calculer($employes) . " €\n";
// Exercice 2 : Recherche dynamique d'un employé
$employesAssoc = [
    'mehdi' => ['poste' => 'Développeur', 'salaire' => 13000],
    'salah' => ['poste' => 'Designer', 'salaire' => 12800],
    'hatim' => ['poste' => 'Chef de projet', 'salaire' => 13500],
    'youssef' => ['poste' => 'Analyste', 'salaire' => 13200],
    'mooniim' => ['poste' => 'Support IT', 'salaire' => 12500],
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    if (array_key_exists($nom, $employesAssoc)) {
        $info = $employesAssoc[$nom];
        echo "Nom : $nom, Poste : {$info['poste']}, Salaire : {$info['salaire']} €\n";
    } else {
        echo "Employé non trouvé.\n";
    }
}
?>
<form method="POST" action="">
    Entrez un nom : <input type="text" name="nom" required>
    <button type="submit">Rechercher</button>
</form>
<?php
// Exercice 3 : Formulaire de connexion
$utilisateurs = [
    ['email' => 'salahkuro78@gmail.com', 'password' => 'salah1234560'],
    ['email' => 'nocturnsensefear@gmail.com', 'password' => 'hialifiha@! '],
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $found = false;
    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email && $utilisateur['password'] === $password) {
            $found = true;
            break;
        }
    }
    echo $found ? "Connexion réussie." : "Identifiants incorrects.";
}
?>
<form method="POST" action="">
    Email : <input type="email" name="email" required><br>
    Mot de passe : <input type="password" name="password" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php
// Exercice 4 : Système de panier
$panier = [
    ['nom' => 'carte memoire', 'quantite' => 20, 'prix' => 10],
    ['nom' => 'carte sim', 'quantite' => 50, 'prix' => 15],
    ['nom' => 'incassable', 'quantite' => 70, 'prix' => 7],
];
$total = array_reduce($panier, function ($carry, $item) {
    return $carry + $item['quantite'] * $item['prix'];
}, 0);
echo "Total du panier : $total ";
echo '<br>';
// Exercice 5 : Formulaire de commentaire
$commentaires = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $commentaires[] = ['texte' => $commentaire, 'date' => date('Y-m-d H:i:s')];
}
foreach ($commentaires as $c) {
    echo "{$c['texte']} ({$c['date']})<br>";
}
?>
<form method="POST" action="">
    Commentaire : <textarea name="commentaire" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>
<?php
// Exercice 6 : Ville avec température la plus élevée
$villes = [
    'El jadida' => 25,
    'Rabat' => 28,
    'Casablanca' => 24,
    'Madrid' => 35,
    'Rome' => 28,
];
$ville_max = array_keys($villes, max($villes))[0];
echo "La ville la plus chaude est $ville_max avec une température de {$villes[$ville_max]}°C.\n";
// Exercice 7 : Lecture d'un fichier CSV
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier_csv'])) {
    $file = $_FILES['fichier_csv']['tmp_name'];
    $produits = array_map('str_getcsv', file($file));
    echo "<table border='1'>";
    foreach ($produits as $produit) {
        echo "<tr><td>{$produit[0]}</td><td>{$produit[1]}</td><td>{$produit[2]}</td></tr>";
    }
    echo "</table>";
}
?>
<form method="POST" enctype="multipart/form-data">
    Fichier CSV : <input type="file" name="fichier_csv" required><br>
    <button type="submit">Importer</button>
</form>
<?php
// Exercice 8 : Sélection de produits avec total
$produits = [
    'pc' => 1000,
    'tablette' => 500,
    'ipad' => 400,
    'television' => 600,
    'ecran' => 600,
    'carte graphique' => 500,
    
];
$total = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produits'])) {
    foreach ($_POST['produits'] as $produit) {
        $total += $produits[$produit];
    }
    echo "Total : $total €<br>";
}
?>
<form method="POST">
    <?php foreach ($produits as $nom => $prix): ?>
        <input type="checkbox" name="produits[]" value="<?= $nom ?>"> <?= $nom ?> - <?= $prix ?> €<br>
    <?php endforeach; ?>
    <button type="submit">Calculer</button>
</form>
<?php
// Exercice 9 : Moyennes des étudiants
$etudiants = [
    'hatim' => ['Maths' => 15, 'Physique' => 14, 'Chimie' => 13],
    'youssef' => ['Maths' => 12, 'Physique' => 11, 'Chimie' => 14],
];
 
foreach ($etudiants as $nom => $notes) {
    $moyenne = array_sum($notes) / count($notes);
    echo "$nom : Moyenne = $moyenne<br>";
}
?>