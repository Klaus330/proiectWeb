<?php


namespace App\Core;

abstract class Model
{
    protected $tableName;
    protected static $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        self::$db = App::get('database')->getPdo();
    }

    /**
     * Saves the model into its table
     */
    public function save()
    {
        $class = new \ReflectionClass($this);
        $tableName = strtolower($class->getShortName());

        if($this->tableName != ''){
            $tableName = $this->tableName;
        }

        $propsToImplode = [];

        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) { // consider only public properties of the providen
            $propertyName = $property->getName();
            $propsToImplode[$propertyName] = $this->{$propertyName};
        }


        return $this->insert($tableName, $propsToImplode); // needs refactoring for updating case
    }

    /**
     * Prepares parameterizes the values that are going to be
     * inserted into the db, preventing SQL Injections
     */
    private function parameterizeValues($array){
        return array_map(function($param){
            return ":{$param}";
        },array_keys($array));
    }

    /**
     * Inserts a row in a table
     *  @return boolean
     */
    private function insert($table, $parameters){


        $query  = sprintf("insert into %s(%s) values(%s)",
            $table,
             implode(', ', array_keys($parameters)),
            implode(',', $this->parameterizeValues($parameters))
        );


        try {
            $statement = self::$db->prepare($query);

            $result = $statement->execute($parameters);

            return $result;
        }catch (\PDOException $e){
            die("Whoops! Something Went wrong.");
        }
    }


    /**
     * Maps a row to an object
     * @return Model
     */
    public static function morph(array $object){
        $class = new \ReflectionClass(get_called_class()); // this is static method that why i used get_called_class

        $entity = $class->newInstance();

        foreach ($class->getProperties(\ReflectionException::PUBLIC) as $prop){
            if(isset($object[$prop->getName()])){
                $prop->setValue($entity, $object[$prop->getName()]);
            }
        }

        $entity->initialize(); // ?

        return $entity;
    }


    /**
     * Finds an object
     * @return Model
     */
    public static function find($options = []){
        $class = new \ReflectionClass(self);
        $tableName = strtolower($class->getShortName());

        $whereClause = '';
        $whereConditions = '';


        if(!empty($options)){
            foreach ($options as $key => $value) {
                $whereConditions[] = '`'.$key.'` = "'.$value.'"';
            }
            $whereClause = "WHERE " . implode(' AND ', $whereConditions);
        }

        $query = "SELECT * FROM {$tableName} {$whereClause}";

        die(var_dump($query));

        try{
            $raw = self::$db->query($query);
        }catch (\PDOException $exception){
            die(var_dump($exception->getMessage()));
        }

        die(var_dump($raw));

        foreach ($raw as $rawRow){
            $result[] = self::morph($rawRow);
        }

        return $result;
    }


}