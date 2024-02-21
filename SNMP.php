<?php
$ip = '192.168.1.1';

$community = 'private'; // Remplacez par votre nom de communauté SNMP réel

// Obtenir la valeur de l'OID spécifié
$oid = '.1.3.6.1.2.1.1.5.0';
$name = $_POST['prenom'];

// Prendre la valeur de l'OID spécifié
if (function_exists('snmpget')) {
    $result = snmpget($ip, $community, $oid);

    if ($result === false) {
        echo "Erreur lors de la récupération de la valeur de l'OID.\n";
    } else {
        // Afficher le résultat
        echo "Résultat: " . $result . "\n";
    }
} else {
    echo "L'extension SNMP n'est pas activée sur ce serveur.\n";
}

// Modifier la valeur de l'OID spécifié
if (function_exists('snmpset')) {
    $setResult = snmpset($ip, $community, $oid, 's', $name);

    if ($setResult === false) {
        echo "Erreur lors de la mise à jour de la valeur de l'OID.\n";
    } else {
        // Afficher le résultat de la mise à jour
        echo "Résultat de la mise à jour: " . $setResult . "\n";
    }
} else {
    echo "L'extension SNMP n'est pas activée sur ce serveur.\n";
}
?>