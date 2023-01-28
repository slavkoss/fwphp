<?php
  //require ("Page.php"); // should be autoloader

  class ServicesPage extends Page
  {
    private $row2buttons = array(
      "Re-engineering"       => "reengineering.php",
      "Standards Compliance" => "standards.php",
      "Buzzword Compliance"  => "index.php?s=fizzbuzz.php", //s=script
      "Mission Statements"   => "mission.php",
      "Iterator"             => "index.php?s=iterator.php", //s=script
      "Refl. ServicesPage" => "index.php?s=reflection.php&cls=ServicesPage"
      //"Refl. ServicesPage"   => "reflection.php?cls=ServicesPage"
                           );

    public function Display($view)
    {
      echo "<html>\n<head>\n";
      $this->DisplayTitle();
      $this->DisplayKeywords();
      $this->DisplayStyles(); //comment this for testing !!
      
      echo "</head>\n<body>\n";
      
      $this->DisplayHeader();
      echo "<div class='content'>\n";
        $this->DisplayMenu($this->buttons, $view);
        $this->DisplayMenu($this->row2buttons, $view);
        echo $this->content;
      echo "</div>\n";
      $this->DisplayFooter();
      
      echo "</body>\n</html>\n";

    }
  }


?>
