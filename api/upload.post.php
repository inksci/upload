<?php
// var_dump($_FILES);

$type = end( explode('.', $_FILES["file"]["name"]) );

if ( (($type != "php")
&& ($type != "js")
&& ($type != "html")
&& ($type != "deb"))
&& ($_FILES["file"]["size"] < 8*1024*1024))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("../files-save/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../files-save/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "../files-save/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>