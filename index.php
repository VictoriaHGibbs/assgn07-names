<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'names-short-list.txt';
$fullNames = load_full_names($fileName);
$firstNames = load_first_names($fullNames);
$lastNames = load_last_names($fullNames);

// $findMe = ',';
// echo $fullNames[0] . '<br>';
// echo strpos($fullNames[0], $findMe) . '<br>';
// echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
// exit();

// Get valid names
for ($i = 0; $i < sizeof($fullNames); $i++) {
  // jam the first and last name together without a comma, then test for alpha-only characters
  if (ctype_alpha($lastNames[$i] . $firstNames[$i])) {
    $validFirstNames[$i] = $firstNames[$i];
    $validLastNames[$i] = $lastNames[$i];
    $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
  }
}

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';
foreach ($fullNames as $fullName) {
  echo "<li>$fullName</li>";
}
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';
foreach ($validFullNames as $validFullName) {
  echo "<li>$validFullName</li>";
}
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';
foreach ($uniqueValidNames as $uniqueValidNames) {
  echo "<li>$uniqueValidNames</li>";
}
echo "</ul>";

echo '<h2>Unique Last Names</h2>';
$uniqueLastNames = (array_unique($validLastNames));
echo ("<p>There are " . sizeof($uniqueLastNames) . " Unique Last names</p>");
echo '<ul style="list-style-type:square">';
foreach ($uniqueLastNames as $uniqueLastNames) {
  echo "<li>$uniqueLastNames</li>";
}
echo "</ul>";

echo '<h2>Unique First Names</h2>';
$uniqueFirstNames = (array_unique($validFirstNames));
echo ("<p>There are " . sizeof($uniqueFirstNames) . " Unique First names</p>");
echo '<ul style="list-style-type:square">';
foreach ($uniqueFirstNames as $uniqueFirstNames) {
  echo "<li>$uniqueFirstNames</li>";
}
echo "</ul>";

echo '<h2>Most Common Last Names</h2>';
//most common last name stored in associative array as [name]=>count
$commonLastNames = array_count_values($lastNames);
echo '<ol>';
foreach ($commonLastNames as $commonLastName => $lastCommonCount) {
  if ($lastCommonCount > 1) {
    echo "<li>$commonLastName appears $lastCommonCount times.";
  }
}
echo "</ol>";
// --------------------------------

echo '<h2>Most Common First Names</h2>';
//most common first name stored in associative array as [name]=>count
$commonFirstNames = array_count_values($firstNames);
echo '<ol>';
foreach ($commonFirstNames as $commonFirstName => $firstCommonCount) {
  if ($firstCommonCount > 1) {
    echo "<li>$commonFirstName appears $firstCommonCount times.";
  }
}
echo "</ol>";
