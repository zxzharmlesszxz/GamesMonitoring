class Games extends DatabaseObject {
 protected static $table_name = "games";
 protected static $db_fields = array('gameid', 'shortname', 'fullname','description');

 protected $gameid;
 protected $shortname;
 protected $fullname;
 public $description;

 public static function add($shortname, $fullname, $description = NULL) {
  $new = new static;
  $new->shortname = trim($shortname);
  $new->fullname = trim($fullname);
  $new->description = trim($description);
  return $new;
 }
}