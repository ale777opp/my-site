<?php

class App
{
public $httpUrl;
public $httpUri;
public $uriParams = [];
public $className;
public $classMethod;
public $classObj;
public function __construct() {
    $this->routes = [
        '/' => 'controller/index/main',
        'main' => 'controller/index/main',
        'photo' => 'controller/index/photo',
        'projects' => 'controller/index/projects',
        'contacts' => 'controller/index/contacts',
        'accounts' => 'controller/index/accounts',
    ];
    //echo "<pre>";echo "_SERVER = ";var_export($_SERVER);echo "</pre>";

    $requestURI = $_SERVER["REQUEST_URI"];// получаем строку : можно parse_url()

    echo "<pre>";echo "requestURI = ";print_r($requestURI);echo "</pre>";

    $this->httpUri = array_filter(explode('/', trim($requestURI, '/') ) );// из элемента path удаляем посл. слеш делим по / и удаляем пустые значения из массива получаем массив 
    echo "<pre>";echo "requestURI = ";print_r($this->httpUri);echo "</pre>";

    $this->setRout();    
}

public function setRout() {
    echo "<pre>";echo "setRout";print_r($this->httpUri);echo "</pre>";
    if ( empty($this->httpUri) ) { // позначению массива формируем значение строки с разделителем /
        $this->httpUrl = '/';
    } else {
        $this->httpUrl = implode('/', $this->httpUri);
    }
echo "<pre>";echo "httpUrl = ";print_r($this->httpUrl);echo "</pre>"; 

if ( isset($this->routes[$this->httpUrl]) ) {
            $this->setController($this->routes[$this->httpUrl]);        
echo "<pre>";echo "urls = ";print_r($this->routes[$this->httpUrl]);echo "</pre>";
        }

}

public function setController($url) {
echo "<pre>";echo "setController url = ";print_r($url);echo "</pre>";
    $class_split = explode('/', $url);
    $this->className = ucfirst($class_split[0]);
    //$this->classMethod = isset($class_split[1]) ? $class_split[1] : 'index';
    $this->classMethod = $class_split[1];

        if (count($class_split) >2 ) {
            for ($j=0;$j < (count($class_split)-2); $j++){
               $this->uriParams[$j] = $class_split[$j+2]; 
            }
    }
echo "<pre>";echo "class_split = ";print_r($class_split);echo "</pre>";
    }

public function run() {
    try {
        $this->classObj = new $this->className;
    echo "<pre>";echo "className = ";print_r($this->className);echo "</pre>";
    echo "<pre>";echo "classMethod = ";print_r($this->classMethod);echo "</pre>";
    echo "<pre>";echo "uriParams = ";print_r($this->uriParams);echo "</pre>";
        if (is_callable([ $this->classObj, $this->classMethod ]))  {
        call_user_func_array( [ $this->classObj, $this->classMethod ],array($this->uriParams) );
        }
    } catch(Error $e) {
        //echo $e->getMessage();
        $this->errors($e);
    }
}

public function errors($e) {
    echo "<html> <head></head><body><h1>ERROR___$e</h1></body></html>";
}


}

?>
