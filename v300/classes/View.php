<?php
class View
{
    public $data = [];
    public function set(array $data)
    {
        $this->data = $data;
        //echo "<pre>";echo "View.Set -> ";print_r($data);echo "</pre>";
    }
    public function render(string $template)
    {
        //print_r('page = '.$template);
        $template = "templates/".$template.".php";
        //print_r('page = '.$template);
        if(is_readable($template)) {
            include($template);
        }
    }
}
?>
