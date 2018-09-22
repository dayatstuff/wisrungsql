<?php

if( isset($_POST['host1']) && isset($_POST['port1']) && isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['host2']) && isset($_POST['port2']) && isset($_POST['user2']) && isset($_POST['pass2']) && !empty($_POST['host1']) && !empty($_POST['port1']) && !empty($_POST['user1']) && !empty($_POST['pass1']) && !empty($_POST['host2']) && !empty($_POST['port2']) && !empty($_POST['user2']) && !empty($_POST['pass2']) && isset($_POST['db1'])  && isset($_POST['db2'])  && !empty($_POST['db1']) && !empty($_POST['db2']) ) {


    try {
        $db1 = new PDO('mysql:host='. $_POST['host1'] .';port='.$_POST['port1'].';dbname='.$_POST['db1'], $_POST['user1'], $_POST['pass1']);
        
    } catch (PDOException $e) {
        print "Error! MySQL Server 1 : " . $e->getMessage() . "<br/>";
        $db1->null ;
        die();
    }

    try {
        $db2 = new PDO('mysql:host='. $_POST['host2'] .';port='.$_POST['port2'].';dbname='.$_POST['db2'], $_POST['user2'], $_POST['pass2']);
        
    } catch (PDOException $e) {
        print "Error! MySQL Server 2 : " . $e->getMessage() . "<br/>";
        $db2->null ;
        die();
    }

    if( isset($db1) && isset($db2) ){

        $table1 = $table2 = [];

        if( $q1 = $db1->query('SHOW TABLES') ){
            //$rs1 = $q1->fetchAll(PDO::FETCH_BOTH);
            $rs1 = $q1->fetchAll(PDO::FETCH_COLUMN);
            /*
            foreach ($rs1 as $key => $value) {
                
                echo '<br/>' ;
                print_r($value[0]) ;
                
                $arr1[$value[0]] = [] ;
                array_push($table1, $value[0] ) ;

            }
            */
            
        }
        
        

        if( $q2 = $db2->query('SHOW TABLES') ){
            //$rs2 = $q2->fetchAll(PDO::FETCH_BOTH);
            $rs2 = $q2->fetchAll(PDO::FETCH_COLUMN) ;
            /*
            foreach ($rs2 as $key => $value) {
            
                $arr2[$value[0]] = [] ;
                array_push($table2, $value[0] ) ;
            }
            */


            
        }

        if( $rs1 && $rs2 ){
        
            $xtable = array_diff( $rs1, $rs2 ) ;

            $rc1 = $rc2 = $diff = [] ;

            //echo json_encode([ 'x' => $x, 'DB1' => $rs1 , 'DB2' => $rs2]) ;

            for ($i=0; $i < count($rs1) ; $i++) { 
                //echo $rs1[$i] ;
                $string = 'describe '.$rs1[$i] ;
                //echo $string ;
                if( $col1 = $db1->query( $string ) ){
                    $rc1[$rs1[$i]] = $col1->fetchAll(PDO::FETCH_ASSOC) ;

                    if( in_array( $rs1[$i], array_values($xtable) ) ){
                        $rc2[$rs1[$i]] = [];
                    }else{
                        if( $col2 = $db2->query( $string ) ){
                            $rc2[$rs1[$i]] = $col2->fetchAll(PDO::FETCH_ASSOC) ;
                        }else{
                            print_r($db2->errorInfo());
                        }
                        
                    }

                }else{
                    print_r($db1->errorInfo());
                
                }
                

                $xcolumn = array_diff( $rc1[$rs1[$i]], $rc2[$rs1[$i]] ) ;
                if( !empty($xcolumn) ){
                    $diff[$rs1[$i]] = $xcolumn ;
                }
                
                
                
               
                
            }

            echo json_encode( ['diff_table' => array_values($xtable),'diff_detail' => $diff ] );


            






        }
        



        /* -- close connection */
        if( $db1 ) $db1->null ;
        if( $db2 ) $db2->null ;


    }



} else{
    echo '<h2 style="color: red;"> Bro... serius, di isi dulu form nya... </h2>';
}




?>