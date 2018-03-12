
<?php echo '
<?xml version = "1.0" encoding = "utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
        <title> Tuan Phan </title>
        <link href="https://fonts.googleapis.com/css?family=Caveat|Open+Sans" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="project1Style.css"/>
        <script>
            var arrNeighborCount =[];
            function clickme(id){
                if(document.getElementById(id).style.backgroundColor == "" ){
                        document.getElementById(id).style.backgroundColor = "red";
                    }else {
                        document.getElementById(id).style.backgroundColor = "";
                    }
                }

                function run(id,colums){
                    var total =0;

                    if (document.getElementById(id-colums)){
                        if(document.getElementById(id-colums).style.backgroundColor == "red") { // top 
                            total++;
                        }
                    }

                    if(document.getElementById(id-(colums+1))){
                        if(document.getElementById(id-(colums+1)).style.backgroundColor == "red") { // top left
                            total++;
                        }
                    }

                    if(document.getElementById(id-1)){
                        if(document.getElementById(id-1).style.backgroundColor == "red") { //left
                            total++;
                        } 
                    }

                    if(document.getElementById(id+(colums-1))){
                        if(document.getElementById(id+(colums-1)).style.backgroundColor == "red") { //low left
                            total++;
                        } 
                    }

                    if(document.getElementById(id+colums)){
                        if(document.getElementById(id+colums).style.backgroundColor == "red") { //low
                            total++;
                        }
                    }

                    if(document.getElementById(id+(colums+1))){
                        if(document.getElementById(id+(colums+1)).style.backgroundColor == "red") { //low right
                            total++;
                        }
                    }

                    if(document.getElementById(id+1)){
                        if(document.getElementById(id+1).style.backgroundColor == "red") { //right
                            total++;
                        }
                    }

                    if(document.getElementById(id-(colums-1))){
                        if(document.getElementById(id-(colums-1)).style.backgroundColor == "red") { //top right
                            total++;
                        } 
                    }
                    arrNeighborCount[id] = total;            
                }

                function next(rows,colums){
                        var lastCell = rows * colums;

                        for (var i = 0; i< lastCell; i++){
                            run(i,colums);
                        }

                        for (var i=0; i<arrNeighborCount.length; i++){
                            console.log("id: "+ i + " || neighbor: " + arrNeighborCount[i] )
                              switch(arrNeighborCount[i]){
                                case 2:
                                    if(document.getElementById(i).style.backgroundColor == "red"){
                                        document.getElementById(i).style.backgroundColor = "red";
                                    }
                                    break;
                                case 3: 
                                    document.getElementById(i).style.backgroundColor = "red";
                                    break;
                                default:
                                    document.getElementById(i).style.backgroundColor = "";
                                }
                            }
                        }
                function next20thGens(rows,colums){
                    var i =0;
                    while(i<23){
                        next(rows,colums);
                        i++;
                    }
                }
                var keepRunning;
                function start(rows,colums){
                     keepRunning = setInterval(function(){next(rows,colums);},500);
                    // alert("hello");
                }

                function stop(){
                    clearInterval(keepRunning);
                }

                function reset(rows,colums){
                    var lastCell = rows*colums;
                    for(var i=0; i<lastCell; i++){
                        arrNeighborCount[i] = 0;
                        document.getElementById(i).style.backgroundColor = "";
                    }
                }
            
    </script>
	</head>
	<body>
		 <div class="wrap">
        <h1> Welcome to CSC 4370 CRN 85410 </h1>
        <h2> Project 1 </h2>
    </div>
		<div class="main">
			<div class="wrap">
                <h2> The Conway\'s Game of Life </h2>
'
?>
<?php 
    $rows =  $_GET["rows"];
    $colums =  $_GET["colums"];
    function createTable($row, $colum){
        $di = 0; 
        echo "<table border = '1' style='border:3px #4682B4 solid;'>";
        for($i = 0; $i<$row; $i++){
            echo "<tr>";
            for($j = 0; $j<$colum; $j++){
                echo "<td id=" . $di . " height='10px' width = '10px' onclick='clickme(". $di .")'></td>";
                $di++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }

createTable($rows,$colums);
echo "<br/>";
echo "<button class='button button1' onclick='next(".$rows.",".$colums.")'>Next</button>";
echo "<button class='button button1' onclick='start(".$rows.",".$colums.")'>Start</button>";
echo "<button class='button button1' onclick='stop(".$rows.",".$colums.")'>Stop</button>";
echo "<button class='button button1' onclick='next20thGens(".$rows.",".$colums.")'>Next 23th Generation</button>";
echo "<button class='button button1' onclick='reset(".$rows.",".$colums.")'>Reset</button>";

echo "        </div>
		</div>
      ";  


echo '
    <div class="wrap">
            <h2> Team 14: </h2>
            <p>
            Member: Tuan Phan  <br/>
            Member: Mrudul Patel <br/>
            Member: Ayanna Shaheed <br/> <br/>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
    </div>
';

echo '
    </body>
    </html>
';
?>
    

