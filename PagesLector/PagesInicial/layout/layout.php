<?php 

class Layout{
  
  private $ispage;
  private $directory;
  function __construct($page)
  {
    $this-> ispage = $page;
 
    $this-> directory = ( $this-> ispage) ? "../": "";


  }

public function prinHeader(){


    $header = <<<EOF

    <html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Sistema de votacion</title>

<link href="{$this->directory}assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" >
<link href="{$this->directory}assets\css\style.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Sistema de votacion</h5>
  <nav class="my-2 my-md-0 mr-md-3">
  </nav>
  

EOF;    

echo $header;

}

}

?>

