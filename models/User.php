<?php




namespace app\models;

use app\core\DbModel;
use app\core\Model;


class User extends DbModel
{

    public string $firstname='';
    public string $lastname='';
    public string $email='';
    public string $password='';
    public string $passwordconfirm='';


    public function tableName(): string
    {
        return 'users';
    }

    public function attribute():array
    {
        return ['firstname','lastname','email','password'];
    }

    public function save(){

        $this->password=password_hash($this->password,PASSWORD_DEFAULT);
        
      return parent::save();   


    }
    public function rules()
    {
        return [

            'firstname'=>[self::RULE_REQUIRED],
            'lastname'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>22]],
            'passwordconfirm'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],

        ];


    }


}
