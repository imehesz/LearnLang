<?php
/**
 * MUtility 
 * 
 * @package 
 * @version $id$
 * @author Imre Mehesz 
 * @license PHP Version 5 {@link http://www.php.net/license/3_01.txt}
 */
class MUtility
{
    /**
     * returns a formatted string that can be useful for
     * URL-s username etc ...
     *
     * @param $str string
     * @return string
     */
    public static function strToPretty( $str )
    {
        $retval = strtolower( $str );
        return trim(preg_replace(array('/[^a-z0-9-]/', '/-+/'), array('-','-'), $retval), '-');
    }

    /**
     * resultsToArray  
     *
     * returns an active record result set as an array
     * for example: if you need an array of IDs for 
     * an AJAX dropdown, you'd call it like
     * resultsToArray( $results, 'id' )
     *
     * If you wanna return multiple fields, like ID => name
     * see: http://www.yiiframework.com/doc/api/CHtml#listOptions-detail
     *
     * @param mixed $results 
     * @param string $fields 
     * @static
     * @access public
     * @return void
     */
    public static function resultsToArray( $results, $column = 'id' )
    {
        $retarr = array();

        if( is_array( $results ) && sizeof( $results ) )
        {
            foreach( $results as $result )
            {
                $retarr[] = $result->$column;
            }
        }

        return $retarr;
    }

    /**
     * HoursAndMinutes  
     * 
     * @param int $step 
     * @param string $format 
     * @static
     * @access public
     * @return void
     */
    public static function hoursAndMinutes( $step = 15, $options = null )
    {
        $format = ( $options && array_key_exists( 'format' ) ) ? $options['format'] : 'HH:MM';
        $minutes = range( 0, 59, $step );
        $retval = array();

        switch( $format )
        {
            case 'HH:MM':
            default:
                $hours = range( 0,23 );
                for( $i = 0; $i<sizeof( $hours ); $i++ )
                {
                    $hour = $hours[$i] < 10 ? '0' . $hours[$i] : $hours[$i];
                    for( $j=0; $j < sizeof( $minutes ); $j++ )
                    {
                        $minute = $minutes[$j] < 10 ? '0' . $minutes[$j] : $minutes[$j];
                        $retval[$hour.':'.$minute] = $hour . ':' . $minute;
                    }
                }
        }

        return $retval;
    }

    /**
     * getIdsFromCheckboxes  
     * 
     * returns a comma separated string with IDs
     *
     * @param mixed $str expected a string with & (great for GET variables)
     * @static
     * @access public
     * @return void
     */
    public static function getIdsFromCheckboxes( $str )
    {
        $retval = '';

        $checked_boxes_arr = explode( '&', $str );

        if( is_array( $checked_boxes_arr ) && sizeof( $checked_boxes_arr ) )
        {
            $ids = array();

            for( $i=0; $i < sizeof( $checked_boxes_arr ) ; $i++ )
            {
                $checked_varval = explode( '=', $checked_boxes_arr[$i] );
                if( is_array( $checked_varval ) && sizeof( $checked_varval ) == 2 )
                {
                    $ids[] = (int)$checked_varval[1];
                }
            }
            $retval = implode( ',', $ids );
        }
        return $retval;
    }

    /**
     * calculateAgeFromDob  
     * 
     * @param mixed $dob 
     * @static
     * @access public
     * @return void
     */
    public static function calculateAgeFromDob( $dob )
    {
        $year = 31536000;
        $dob_time = strtotime( $dob );
        $age = floor( (time()-$dob_time)/$year );

        return $age;
    }
}
