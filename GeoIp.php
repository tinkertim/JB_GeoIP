<?php
/**
 * There are no restrictions on using this source code
 *
 * @category    JB
 * @package     JB_GeoIp
 * @license     http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution 3.0 Unported
 * @author      Jeff Busby <jeff@jeffbusby.ca>
 */
/**
 * @category    JB
 * @package     JB_GeoIp
 * @license     http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution 3.0 Unported
 * @author      Jeff Busby <jeff@jeffbusby.ca>
 */
class JB_GeoIp
{
    /**
     * @var string $_addr
     */
    protected $_addr;

    /**
     * @var string $_continent_code
     */
    protected $_continent_code;

    /**
     * @var string $_country_code
     */
    protected $_country_code;

    /**
     * @var string $_country_name
     */
    protected $_country_name;

    /**
     * @var string $_region
     */
    protected $_region;

    /**
     * @var string $_region_name
     */
    protected $_region_name;

    /**
     * @var string $_city
     */
    protected $_city;

    /**
     * @var string $_dma_code
     */
    protected $_dma_code;

    /**
     * @var string $_area_code
     */
    protected $_area_code;

    /**
     * @var string $_latitude
     */
    protected $_latitude;

    /**
     * @var string $_logitude
     */
    protected $_longitude;

    /**
     * Constructor
     *
     * @param array $options
     */
    protected function __construct(array $options)
    {
        foreach($options as $key=>$val) {
            $method = $this->_setMethodName($key);
            if(method_exists($this, $method)) {
                $this->$method($val);
            }
        }
    }

    /**
     * Generates a valid method name
     *
     * @param  string $field
     * @return string $ret
     */
    protected function _setMethodName($field)
    {
        $field = str_replace('geoip_', '', strtolower($field));
        $explode = explode('_', $field);
        $ret = 'set';
        foreach($explode as $segment) {
            $ret .=  ucfirst($segment);
        }
        return $ret;
    }

    /**
     * Factory method
     *
     * Takes the $_SERVER environment variable and reduces it down to only the GEOIP
     * indexes that are needed.
     *
     * @throws Exception If GEOIP_ADDR isn't present in the array then it's safe to assume mod_geoip is not installed
     * @param  array     $serverVars
     * @return JB_GeoIp
     */
    public static function factory(array $serverVars)
    {
        if(!isset($serverVars['GEOIP_ADDR'])) {
            throw new Exception('It does not appear that mod_geoip has been installed correctly');
        }
        $array = array (
            'GEOIP_ADDR'           => '',
            'GEOIP_CONTINENT_CODE' => '' ,
            'GEOIP_COUNTRY_CODE'   => '',
            'GEOIP_COUNTRY_NAME'   => '',
            'GEOIP_REGION'         => '',
            'GEOIP_REGION_NAME'    => '',
            'GEOIP_CITY'           => '',
            'GEOIP_DMA_CODE'       => '' ,
            'GEOIP_AREA_CODE'      => '',
            'GEOIP_LATITUDE'       => '',
            'GEOIP_LONGITUDE'      => ''
        );
        $filtered = array_intersect_key($serverVars, $array);
        return new JB_GeoIp($filtered);
    }

    /**
     * Accessor for the ip address
     *
     * @return string $_addr
     */
    public function getAddr()
    {
        return $this->_addr;
    }

    /**
     * Mutator for the ip address
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setAddr($value)
    {
        $this->_addr = (string) $value;
    }

    /**
     * Accessor for the continent code
     *
     * @return string $_continent_code;
     */
    public function getContinentCode()
    {
        return $this->_continent_code;
    }

    /**
     * Mutator for the continent code
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setContinentCode($value)
    {
        $this->_continent_code = (string) $value;
    }

    /**
     * Accessor for the country code
     *
     * @return string $_country_code
     */
    public function getCountryCode()
    {
        return $this->_country_code;
    }

    /**
     * Mutator for the country code
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setCountryCode($value)
    {
        $this->_country_code = (string) $value;
    }

    /**
     * Accessor for the country name
     *
     * @return string $_country_name
     */
    public function getCountryName()
    {
        return $this->_country_name;
    }

    /**
     * Mutator for the country name
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setCountryName($value)
    {
        $this->_country_name = (string) $value;
    }

    /**
     * Accessor for the region
     *
     * @return string $_region
     */
    public function getRegion()
    {
        return $this->_region;
    }

    /**
     * Mutator for the region
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setRegion($value)
    {
        $this->_region = (string) $value;
    }

    /**
     * Accessor for the region name
     *
     * @return string $_region_name
     */
    public function getRegionName()
    {
        return $this->_region_name;
    }

    /**
     * Mutator for the region name
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setRegionName($value)
    {
        $this->_region_name = (string) $value;
    }

    /**
     * Accessor for the city
     *
     * @return string $_city
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * Mutator for the city
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setCity($value)
    {
        $this->_city = (string) $value;
    }

    /**
     * Accessor for the dma code
     *
     * @return string $_dma_code
     */
    public function getDmaCode()
    {
        return $this->_dma_code;
    }

    /**
     * Mutator for the dma code
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setDmaCode($value)
    {
        $this->_dma_code = (string) $value;
    }

    /**
     * Accessor for the area code
     *
     * @return string $_area_code
     */
    public function getAreaCode()
    {
        return $this->_area_code;
    }

    /**
     * Mutator for the area code
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setAreaCode($value)
    {
        $this->_area_code = (string) $value;
    }

    /**
     * Accessor for the latitude
     *
     * @return string $_latitude
     */
    public function getLatitude()
    {
        return $this->_latitude;
    }

    /**
     * Mutator for the latitude
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setLatitude($value)
    {
        $this->_latitude = (string) $value;
    }

    /**
     * Accessor for the logitude
     *
     * @return string $_logitude
     */
    public function getLongitude()
    {
        return $this->_longitude;
    }

    /**
     * Mutator for the logitude
     *
     * @param  string     $value
     * @return JB_GeoIp   $this    Provides a fluent interface
     */
    public function setLongitude($value)
    {
        $this->_longitude = (string) $value;
    }
}