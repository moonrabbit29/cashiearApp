<?php 

class Controller 
{

    private $data;

    public function view($view,$data = [] )
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
      require_once '../app/models/' . $model . '.php';
       return new $model;
    }


    function setData($name, $value)
	{
		$this->data[$name] = $value;
	} 

	function getData($name)
	{
		if (isset($this->data[$name]))
		{
			return $this->data[$name];
		}
		else
		{
			return '';
		}
    }
    
}