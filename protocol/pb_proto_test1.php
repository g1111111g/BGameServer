<?php
/**
 * Auto generated from test1.proto at 2015-04-09 09:41:21
 */

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

/**
 * Enum_PriceType enum embedded in Equipment message
 */
final class Equipment_EnumPriceType
{
    const FREE = 0;
    const GOLDCOIN = 1;
    const SILVERCOIN = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'FREE' => self::FREE,
            'GOLDCOIN' => self::GOLDCOIN,
            'SILVERCOIN' => self::SILVERCOIN,
        );
    }
}

/**
 * Enum_ShopPropType enum embedded in Equipment message
 */
final class Equipment_EnumShopPropType
{
    const LegAndArm = 0;
    const Head = 1;
    const Shoes = 2;
    const Cloth = 3;
    const Trousers = 4;
    const LeftArmPad = 10;
    const RightArmPad = 11;
    const LeftLegPad = 12;
    const RightLegPad = 13;
    const SkinProp = 19;
    const Hair = 20;
    const HeadWear = 21;
    const LeftWristband = 22;
    const RightWristband = 23;
    const PointProp = 29;
    const Ball = 30;
    const EnergyDrinks = 31;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'LegAndArm' => self::LegAndArm,
            'Head' => self::Head,
            'Shoes' => self::Shoes,
            'Cloth' => self::Cloth,
            'Trousers' => self::Trousers,
            'LeftArmPad' => self::LeftArmPad,
            'RightArmPad' => self::RightArmPad,
            'LeftLegPad' => self::LeftLegPad,
            'RightLegPad' => self::RightLegPad,
            'SkinProp' => self::SkinProp,
            'Hair' => self::Hair,
            'HeadWear' => self::HeadWear,
            'LeftWristband' => self::LeftWristband,
            'RightWristband' => self::RightWristband,
            'PointProp' => self::PointProp,
            'Ball' => self::Ball,
            'EnergyDrinks' => self::EnergyDrinks,
        );
    }
}

/**
 * Enum_BoostType enum embedded in Equipment message
 */
final class Equipment_EnumBoostType
{
    const NONE = 0;
    const SPEED = 1;
    const JUMP = 2;
    const SHOOT = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'NONE' => self::NONE,
            'SPEED' => self::SPEED,
            'JUMP' => self::JUMP,
            'SHOOT' => self::SHOOT,
        );
    }
}

/**
 * Equipment message
 */
class Equipment extends \ProtobufMessage
{
    /* Field index constants */
    const PROPID = 1;
    const NAMEKEY = 2;
    const DESCRIPTIONKEY = 3;
    const PRICE = 4;
    const BOOSTVALUE = 5;
    const TIMELIMIT = 6;
    const PRICETYPE = 7;
    const PROPTYPE = 8;
    const BOOSTTYPE = 9;
    const ICONSPRITENAME = 10;
    const TEXPATH = 11;
    const MODELPATH = 12;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PROPID => array(
            'name' => 'propID',
            'required' => false,
            'type' => 7,
        ),
        self::NAMEKEY => array(
            'name' => 'nameKey',
            'required' => false,
            'type' => 7,
        ),
        self::DESCRIPTIONKEY => array(
            'name' => 'descriptionKey',
            'required' => false,
            'type' => 7,
        ),
        self::PRICE => array(
            'name' => 'price',
            'required' => false,
            'type' => 5,
        ),
        self::BOOSTVALUE => array(
            'name' => 'boostValue',
            'required' => false,
            'type' => 5,
        ),
        self::TIMELIMIT => array(
            'name' => 'timeLimit',
            'required' => false,
            'type' => 5,
        ),
        self::PRICETYPE => array(
            'name' => 'priceType',
            'required' => false,
            'type' => 5,
        ),
        self::PROPTYPE => array(
            'name' => 'propType',
            'required' => false,
            'type' => 5,
        ),
        self::BOOSTTYPE => array(
            'name' => 'boostType',
            'required' => false,
            'type' => 5,
        ),
        self::ICONSPRITENAME => array(
            'name' => 'iconSpriteName',
            'required' => false,
            'type' => 7,
        ),
        self::TEXPATH => array(
            'name' => 'texPath',
            'required' => false,
            'type' => 7,
        ),
        self::MODELPATH => array(
            'name' => 'modelPath',
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
        $this->values[self::PROPID] = null;
        $this->values[self::NAMEKEY] = null;
        $this->values[self::DESCRIPTIONKEY] = null;
        $this->values[self::PRICE] = null;
        $this->values[self::BOOSTVALUE] = null;
        $this->values[self::TIMELIMIT] = null;
        $this->values[self::PRICETYPE] = null;
        $this->values[self::PROPTYPE] = null;
        $this->values[self::BOOSTTYPE] = null;
        $this->values[self::ICONSPRITENAME] = null;
        $this->values[self::TEXPATH] = null;
        $this->values[self::MODELPATH] = null;
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
     * Sets value of 'propID' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setPropID($value)
    {
        return $this->set(self::PROPID, $value);
    }

    /**
     * Returns value of 'propID' property
     *
     * @return string
     */
    public function getPropID()
    {
        return $this->get(self::PROPID);
    }

    /**
     * Sets value of 'nameKey' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setNameKey($value)
    {
        return $this->set(self::NAMEKEY, $value);
    }

    /**
     * Returns value of 'nameKey' property
     *
     * @return string
     */
    public function getNameKey()
    {
        return $this->get(self::NAMEKEY);
    }

    /**
     * Sets value of 'descriptionKey' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setDescriptionKey($value)
    {
        return $this->set(self::DESCRIPTIONKEY, $value);
    }

    /**
     * Returns value of 'descriptionKey' property
     *
     * @return string
     */
    public function getDescriptionKey()
    {
        return $this->get(self::DESCRIPTIONKEY);
    }

    /**
     * Sets value of 'price' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPrice($value)
    {
        return $this->set(self::PRICE, $value);
    }

    /**
     * Returns value of 'price' property
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->get(self::PRICE);
    }

    /**
     * Sets value of 'boostValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setBoostValue($value)
    {
        return $this->set(self::BOOSTVALUE, $value);
    }

    /**
     * Returns value of 'boostValue' property
     *
     * @return int
     */
    public function getBoostValue()
    {
        return $this->get(self::BOOSTVALUE);
    }

    /**
     * Sets value of 'timeLimit' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimeLimit($value)
    {
        return $this->set(self::TIMELIMIT, $value);
    }

    /**
     * Returns value of 'timeLimit' property
     *
     * @return int
     */
    public function getTimeLimit()
    {
        return $this->get(self::TIMELIMIT);
    }

    /**
     * Sets value of 'priceType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPriceType($value)
    {
        return $this->set(self::PRICETYPE, $value);
    }

    /**
     * Returns value of 'priceType' property
     *
     * @return int
     */
    public function getPriceType()
    {
        return $this->get(self::PRICETYPE);
    }

    /**
     * Sets value of 'propType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPropType($value)
    {
        return $this->set(self::PROPTYPE, $value);
    }

    /**
     * Returns value of 'propType' property
     *
     * @return int
     */
    public function getPropType()
    {
        return $this->get(self::PROPTYPE);
    }

    /**
     * Sets value of 'boostType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setBoostType($value)
    {
        return $this->set(self::BOOSTTYPE, $value);
    }

    /**
     * Returns value of 'boostType' property
     *
     * @return int
     */
    public function getBoostType()
    {
        return $this->get(self::BOOSTTYPE);
    }

    /**
     * Sets value of 'iconSpriteName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIconSpriteName($value)
    {
        return $this->set(self::ICONSPRITENAME, $value);
    }

    /**
     * Returns value of 'iconSpriteName' property
     *
     * @return string
     */
    public function getIconSpriteName()
    {
        return $this->get(self::ICONSPRITENAME);
    }

    /**
     * Sets value of 'texPath' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTexPath($value)
    {
        return $this->set(self::TEXPATH, $value);
    }

    /**
     * Returns value of 'texPath' property
     *
     * @return string
     */
    public function getTexPath()
    {
        return $this->get(self::TEXPATH);
    }

    /**
     * Sets value of 'modelPath' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setModelPath($value)
    {
        return $this->set(self::MODELPATH, $value);
    }

    /**
     * Returns value of 'modelPath' property
     *
     * @return string
     */
    public function getModelPath()
    {
        return $this->get(self::MODELPATH);
    }
}

/**
 * RoomPlayerInfoProtoc message
 */
class RoomPlayerInfoProtoc extends \ProtobufMessage
{
    /* Field index constants */
    const USERID = 1;
    const NICKNAME = 2;
    const EQUIPS = 3;

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
        self::EQUIPS => array(
            'name' => 'equips',
            'repeated' => true,
            'type' => 5,
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
        $this->values[self::EQUIPS] = array();
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
     * Appends value to 'equips' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendEquips($value)
    {
        return $this->append(self::EQUIPS, $value);
    }

    /**
     * Clears 'equips' list
     *
     * @return null
     */
    public function clearEquips()
    {
        return $this->clear(self::EQUIPS);
    }

    /**
     * Returns 'equips' list
     *
     * @return int[]
     */
    public function getEquips()
    {
        return $this->get(self::EQUIPS);
    }

    /**
     * Returns 'equips' iterator
     *
     * @return ArrayIterator
     */
    public function getEquipsIterator()
    {
        return new \ArrayIterator($this->get(self::EQUIPS));
    }

    /**
     * Returns element from 'equips' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getEquipsAt($offset)
    {
        return $this->get(self::EQUIPS, $offset);
    }

    /**
     * Returns count of 'equips' list
     *
     * @return int
     */
    public function getEquipsCount()
    {
        return $this->count(self::EQUIPS);
    }
}
