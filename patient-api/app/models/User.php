<?php

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $user_name;

    /**
     *
     * @var string
     */
    public $user_sex;

    /**
     *
     * @var string
     */
    public $user_religion;

    /**
     *
     * @var integer
     */
    public $user_phone;

    /**
     *
     * @var string
     */
    public $user_address;

    /**
     *
     * @var integer
     */
    public $user_nik;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("patient");
        $this->setSource("users");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]|User|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
