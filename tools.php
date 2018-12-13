<?php
/**
 * JSON echo
 * json_encode() silently fails if it's not utf8, so utf8erize() ensures formatting
 **/
function jecho($array){
  array_walk_recursive($array,'utf8erize');
  echo "<pre>";
  echo json_encode($array, JSON_PRETTY_PRINT);
  echo "</pre>";
}
// This works in tandem with jecho
function utf8erize(&$item, $key) {
  $item = utf8_encode($item);
}

/**
 * <pre> echo
 *  
 **/
function precho($string){
  echo "<pre>";
  echo $string;
  echo "</pre>";
}

/**
 * <hr> printer
 * accepts an argument for number of <hr> lines you want to write, default 1
 **/
function hr($arg = 1){
  $i = 0;
  while($i < $arg){
    echo "<hr>";
    $i++;
  }
}

/**
 * console.log(); 
 **/
function console_log( $data ){
  echo '<script>console.log('. jecho( $data ) .')</script>';
}


/**
 * Track progress in code optimization
 **/
class TimeTrial
{
    public $start_time;
    public $end_time;

    public function start()
    {
        $this->start_time = microtime(true);
    }

    public function end($trial_name = null)
    {
        $this->end_time = microtime(true);
        $time = ($this->end_time - $this->start_time);
        // if trial name has been passed as arg print it
        if ($trial_name) {
            $title = $trial_name . " time: ";
            echo "<pre>" . $title . $time . "</pre>";
        }
        return $time;
    }

    public function waypoint($trial_name = null)
    {
        $time = $this->end($trial_name);
        $this->start();
        return $time;
    }
}
