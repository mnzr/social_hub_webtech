<?php
if(!isset($_SESSION)) {
    session_start();
}

require_once("../vendor/danielmewes/php-rql/rdb/rdb.php");

// Get all organizations
$conn = r\connect('localhost');
# $document = []

/*
r.db('test').table('orgs').insert(
{
  "name":  "Mozilla" ,
  "posts": [
        {
      "content":  "This is MOZILLA!!" ,
      "time":  "2016-08-28"
    } ,
    ]
})
*/

$result = r\table("orgs")->run($conn)->toArray();
# print("<pre>".print_r($result,true)."</pre>");
?>
<select>
  <option value="">Select...</option>
<?php
foreach ($result as $key => $value) {
    echo "<option value='". $value['id'] . "'>"
        . $value['name']
        ."</option>";
} ?>
</select>

