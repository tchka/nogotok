$filename = 'dump.sql'; // ��� ����� �����
$mysql_host = 'localhost'; // ����� ������� MySQL
$mysql_username = 'root'; // ��� ������������ MySQL
$mysql_password = 'password'; // ������ MySQL
$mysql_database = 'base'; // ��� ��
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
$templine = '';
$lines = file($filename);
foreach ($lines as $line){
if (substr($line, 0, 2) == '--' || $line == '')
continue;
$templine .= $line;
if (substr(trim($line), -1, 1) == ';'){
mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '');
$templine = '';
}
}
echo "������� ������� �������������";