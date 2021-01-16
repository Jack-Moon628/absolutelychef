<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * RetrieveCatalogObjectResponse Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 */
class RetrieveCatalogObjectResponse implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'errors' => '\SquareConnect\Model\Error[]',
        'object' => '\SquareConnect\Model\CatalogObject',
        'related_objects' => '\SquareConnect\Model\CatalogObject[]'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'errors' => 'errors',
        'object' => 'object',
        'related_objects' => 'related_objects'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'errors' => 'setErrors',
        'object' => 'setObject',
        'related_objects' => 'setRelatedObjects'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'errors' => 'getErrors',
        'object' => 'getObject',
        'related_objects' => 'getRelatedObjects'
    );
  
    /**
      * $errors The set of `Error`s encountered.
      * @var \SquareConnect\Model\Error[]
      */
    protected $errors;
    /**
      * $object The `CatalogObject`s returned.
      * @var \SquareConnect\Model\CatalogObject
      */
    protected $object;
    /**
      * $related_objects A list of `CatalogObject`s referenced by the object in the `object` field.
      * @var \SquareConnect\Model\CatalogObject[]
      */
    protected $related_objects;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["errors"])) {
              $this->errors = $data["errors"];
            } else {
              $this->errors = null;
            }
            if (isset($data["object"])) {
              $this->object = $data["object"];
            } else {
              $this->object = null;
            }
            if (isset($data["related_objects"])) {
              $this->related_objects = $data["related_objects"];
            } else {
              $this->related_objects = null;
            }
        }
    }
    /**
     * Gets errors
     * @return \SquareConnect\Model\Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }
  
    /**
     * Sets errors
     * @param \SquareConnect\Model\Error[] $errors The set of `Error`s encountered.
     * @return $this
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
    }
    /**
     * Gets object
     * @return \SquareConnect\Model\CatalogObject
     */
    public function getObject()
    {
        return $this->object;
    }
  
    /**
     * Sets object
     * @param \SquareConnect\Model\CatalogObject $object The `CatalogObject`s returned.
     * @return $this
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }
    /**
     * Gets related_objects
     * @return \SquareConnect\Model\CatalogObject[]
     */
    public function getRelatedObjects()
    {
        return $this->related_objects;
    }
  
    /**
     * Sets related_objects
     * @param \SquareConnect\Model\CatalogObject[] $related_objects A list of `CatalogObject`s referenced by the object in the `object` field.
     * @return $this
     */
    public function setRelatedObjects($related_objects)
    {
        $this->related_objects = $related_objects;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}