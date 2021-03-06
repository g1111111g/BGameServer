<?php
/**
 * Auto generated from test.proto at 2015-03-20 17:09:23
 */

/**
 * RemoteCall message
 */
class RemoteCall extends \ProtobufMessage
{
    /* Field index constants */
    const CLASSNAME = 1;
    const FUNCTIONNAME = 2;
    const PARAMS = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CLASSNAME => array(
            'name' => 'className',
            'required' => true,
            'type' => 7,
        ),
        self::FUNCTIONNAME => array(
            'name' => 'functionName',
            'required' => true,
            'type' => 7,
        ),
        self::PARAMS => array(
            'name' => 'params',
            'repeated' => true,
            'type' => 'KeyValue'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::CLASSNAME] = null;
        $this->values[self::FUNCTIONNAME] = null;
        $this->values[self::PARAMS] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'className' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setClassName($value)
    {
        return $this->set(self::CLASSNAME, $value);
    }

    /**
     * Returns value of 'className' property
     *
     * @return string
     */
    public function getClassName()
    {
        return $this->get(self::CLASSNAME);
    }

    /**
     * Sets value of 'functionName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFunctionName($value)
    {
        return $this->set(self::FUNCTIONNAME, $value);
    }

    /**
     * Returns value of 'functionName' property
     *
     * @return string
     */
    public function getFunctionName()
    {
        return $this->get(self::FUNCTIONNAME);
    }

    /**
     * Appends value to 'params' list
     *
     * @param KeyValue $value Value to append
     *
     * @return null
     */
    public function appendParams(KeyValue $value)
    {
        return $this->append(self::PARAMS, $value);
    }

    /**
     * Clears 'params' list
     *
     * @return null
     */
    public function clearParams()
    {
        return $this->clear(self::PARAMS);
    }

    /**
     * Returns 'params' list
     *
     * @return KeyValue[]
     */
    public function getParams()
    {
        return $this->get(self::PARAMS);
    }

    /**
     * Returns 'params' iterator
     *
     * @return ArrayIterator
     */
    public function getParamsIterator()
    {
        return new \ArrayIterator($this->get(self::PARAMS));
    }

    /**
     * Returns element from 'params' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return KeyValue
     */
    public function getParamsAt($offset)
    {
        return $this->get(self::PARAMS, $offset);
    }

    /**
     * Returns count of 'params' list
     *
     * @return int
     */
    public function getParamsCount()
    {
        return $this->count(self::PARAMS);
    }
}

/**
 * KeyValue message
 */
class KeyValue extends \ProtobufMessage
{
    /* Field index constants */
    const PARAMKEY = 1;
    const PARAMVALUE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PARAMKEY => array(
            'name' => 'paramKey',
            'required' => true,
            'type' => 7,
        ),
        self::PARAMVALUE => array(
            'name' => 'paramValue',
            'required' => true,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::PARAMKEY] = null;
        $this->values[self::PARAMVALUE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'paramKey' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setParamKey($value)
    {
        return $this->set(self::PARAMKEY, $value);
    }

    /**
     * Returns value of 'paramKey' property
     *
     * @return string
     */
    public function getParamKey()
    {
        return $this->get(self::PARAMKEY);
    }

    /**
     * Sets value of 'paramValue' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setParamValue($value)
    {
        return $this->set(self::PARAMVALUE, $value);
    }

    /**
     * Returns value of 'paramValue' property
     *
     * @return string
     */
    public function getParamValue()
    {
        return $this->get(self::PARAMVALUE);
    }
}

/**
 * Foo message
 */
class Foo extends \ProtobufMessage
{
    /* Field index constants */
    const BAR = 1;
    const BAZ = 2;
    const SPAM = 3;
    const MIAO = 4;
    const RES = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BAR => array(
            'name' => 'bar',
            'required' => true,
            'type' => 5,
        ),
        self::BAZ => array(
            'name' => 'baz',
            'required' => false,
            'type' => 7,
        ),
        self::SPAM => array(
            'name' => 'spam',
            'repeated' => true,
            'type' => 4,
        ),
        self::MIAO => array(
            'name' => 'miao',
            'required' => true,
            'type' => 7,
        ),
        self::RES => array(
            'name' => 'res',
            'repeated' => true,
            'type' => 'Result'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::BAR] = null;
        $this->values[self::BAZ] = null;
        $this->values[self::SPAM] = array();
        $this->values[self::MIAO] = null;
        $this->values[self::RES] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'bar' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setBar($value)
    {
        return $this->set(self::BAR, $value);
    }

    /**
     * Returns value of 'bar' property
     *
     * @return int
     */
    public function getBar()
    {
        return $this->get(self::BAR);
    }

    /**
     * Sets value of 'baz' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setBaz($value)
    {
        return $this->set(self::BAZ, $value);
    }

    /**
     * Returns value of 'baz' property
     *
     * @return string
     */
    public function getBaz()
    {
        return $this->get(self::BAZ);
    }

    /**
     * Appends value to 'spam' list
     *
     * @param float $value Value to append
     *
     * @return null
     */
    public function appendSpam($value)
    {
        return $this->append(self::SPAM, $value);
    }

    /**
     * Clears 'spam' list
     *
     * @return null
     */
    public function clearSpam()
    {
        return $this->clear(self::SPAM);
    }

    /**
     * Returns 'spam' list
     *
     * @return float[]
     */
    public function getSpam()
    {
        return $this->get(self::SPAM);
    }

    /**
     * Returns 'spam' iterator
     *
     * @return ArrayIterator
     */
    public function getSpamIterator()
    {
        return new \ArrayIterator($this->get(self::SPAM));
    }

    /**
     * Returns element from 'spam' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return float
     */
    public function getSpamAt($offset)
    {
        return $this->get(self::SPAM, $offset);
    }

    /**
     * Returns count of 'spam' list
     *
     * @return int
     */
    public function getSpamCount()
    {
        return $this->count(self::SPAM);
    }

    /**
     * Sets value of 'miao' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMiao($value)
    {
        return $this->set(self::MIAO, $value);
    }

    /**
     * Returns value of 'miao' property
     *
     * @return string
     */
    public function getMiao()
    {
        return $this->get(self::MIAO);
    }

    /**
     * Appends value to 'res' list
     *
     * @param Result $value Value to append
     *
     * @return null
     */
    public function appendRes(Result $value)
    {
        return $this->append(self::RES, $value);
    }

    /**
     * Clears 'res' list
     *
     * @return null
     */
    public function clearRes()
    {
        return $this->clear(self::RES);
    }

    /**
     * Returns 'res' list
     *
     * @return Result[]
     */
    public function getRes()
    {
        return $this->get(self::RES);
    }

    /**
     * Returns 'res' iterator
     *
     * @return ArrayIterator
     */
    public function getResIterator()
    {
        return new \ArrayIterator($this->get(self::RES));
    }

    /**
     * Returns element from 'res' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return Result
     */
    public function getResAt($offset)
    {
        return $this->get(self::RES, $offset);
    }

    /**
     * Returns count of 'res' list
     *
     * @return int
     */
    public function getResCount()
    {
        return $this->count(self::RES);
    }
}

/**
 * Result message
 */
class Result extends \ProtobufMessage
{
    /* Field index constants */
    const A = 1;
    const B = 2;
    const C = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::A => array(
            'name' => 'a',
            'required' => true,
            'type' => 5,
        ),
        self::B => array(
            'name' => 'b',
            'required' => true,
            'type' => 5,
        ),
        self::C => array(
            'name' => 'c',
            'required' => true,
            'type' => 4,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::A] = null;
        $this->values[self::B] = null;
        $this->values[self::C] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'a' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setA($value)
    {
        return $this->set(self::A, $value);
    }

    /**
     * Returns value of 'a' property
     *
     * @return int
     */
    public function getA()
    {
        return $this->get(self::A);
    }

    /**
     * Sets value of 'b' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setB($value)
    {
        return $this->set(self::B, $value);
    }

    /**
     * Returns value of 'b' property
     *
     * @return int
     */
    public function getB()
    {
        return $this->get(self::B);
    }

    /**
     * Sets value of 'c' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setC($value)
    {
        return $this->set(self::C, $value);
    }

    /**
     * Returns value of 'c' property
     *
     * @return float
     */
    public function getC()
    {
        return $this->get(self::C);
    }
}

/**
 * CarDate message
 */
class CarDate extends \ProtobufMessage
{
    /* Field index constants */
    const DATEID = 1;
    const USERID = 2;
    const FROM = 3;
    const TO = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::DATEID => array(
            'name' => 'dateId',
            'required' => true,
            'type' => 5,
        ),
        self::USERID => array(
            'name' => 'userId',
            'required' => true,
            'type' => 5,
        ),
        self::FROM => array(
            'name' => 'from',
            'required' => true,
            'type' => 7,
        ),
        self::TO => array(
            'name' => 'to',
            'required' => true,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::DATEID] = null;
        $this->values[self::USERID] = null;
        $this->values[self::FROM] = null;
        $this->values[self::TO] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'dateId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setDateId($value)
    {
        return $this->set(self::DATEID, $value);
    }

    /**
     * Returns value of 'dateId' property
     *
     * @return int
     */
    public function getDateId()
    {
        return $this->get(self::DATEID);
    }

    /**
     * Sets value of 'userId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUserId($value)
    {
        return $this->set(self::USERID, $value);
    }

    /**
     * Returns value of 'userId' property
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->get(self::USERID);
    }

    /**
     * Sets value of 'from' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFrom($value)
    {
        return $this->set(self::FROM, $value);
    }

    /**
     * Returns value of 'from' property
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->get(self::FROM);
    }

    /**
     * Sets value of 'to' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTo($value)
    {
        return $this->set(self::TO, $value);
    }

    /**
     * Returns value of 'to' property
     *
     * @return string
     */
    public function getTo()
    {
        return $this->get(self::TO);
    }
}

/**
 * CarDateList message
 */
class CarDateList extends \ProtobufMessage
{
    /* Field index constants */
    const DATELIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::DATELIST => array(
            'name' => 'dateList',
            'repeated' => true,
            'type' => 'CarDate'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::DATELIST] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Appends value to 'dateList' list
     *
     * @param CarDate $value Value to append
     *
     * @return null
     */
    public function appendDateList(CarDate $value)
    {
        return $this->append(self::DATELIST, $value);
    }

    /**
     * Clears 'dateList' list
     *
     * @return null
     */
    public function clearDateList()
    {
        return $this->clear(self::DATELIST);
    }

    /**
     * Returns 'dateList' list
     *
     * @return CarDate[]
     */
    public function getDateList()
    {
        return $this->get(self::DATELIST);
    }

    /**
     * Returns 'dateList' iterator
     *
     * @return ArrayIterator
     */
    public function getDateListIterator()
    {
        return new \ArrayIterator($this->get(self::DATELIST));
    }

    /**
     * Returns element from 'dateList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return CarDate
     */
    public function getDateListAt($offset)
    {
        return $this->get(self::DATELIST, $offset);
    }

    /**
     * Returns count of 'dateList' list
     *
     * @return int
     */
    public function getDateListCount()
    {
        return $this->count(self::DATELIST);
    }
}

/**
 * PlayerInfoProtoc message
 */
class PlayerInfoProtoc extends \ProtobufMessage
{
    /* Field index constants */
    const USERID = 1;
    const NICKNAME = 2;
    const SEX = 3;
    const UUID = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::USERID => array(
            'name' => 'userid',
            'required' => false,
            'type' => 5,
        ),
        self::NICKNAME => array(
            'name' => 'nickname',
            'required' => false,
            'type' => 7,
        ),
        self::SEX => array(
            'name' => 'sex',
            'required' => false,
            'type' => 8,
        ),
        self::UUID => array(
            'name' => 'uuid',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::USERID] = null;
        $this->values[self::NICKNAME] = null;
        $this->values[self::SEX] = null;
        $this->values[self::UUID] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'userid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUserid($value)
    {
        return $this->set(self::USERID, $value);
    }

    /**
     * Returns value of 'userid' property
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->get(self::USERID);
    }

    /**
     * Sets value of 'nickname' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setNickname($value)
    {
        return $this->set(self::NICKNAME, $value);
    }

    /**
     * Returns value of 'nickname' property
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->get(self::NICKNAME);
    }

    /**
     * Sets value of 'sex' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setSex($value)
    {
        return $this->set(self::SEX, $value);
    }

    /**
     * Returns value of 'sex' property
     *
     * @return bool
     */
    public function getSex()
    {
        return $this->get(self::SEX);
    }

    /**
     * Sets value of 'uuid' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setUuid($value)
    {
        return $this->set(self::UUID, $value);
    }

    /**
     * Returns value of 'uuid' property
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->get(self::UUID);
    }
}
