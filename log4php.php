<?php
return array(
        'threshold' => 'ALL',
        'rootLogger' => array(
            'level' => 'DEBUG',
            'appenders' => array('default'),
        ),
        'appenders' => array(
            'default' => array(
                'class' => 'LoggerAppenderDailyFile',
                'layout' => array(
                    'class' => 'LoggerLayoutPattern',
                    'conversionPattern' => "%d{Y-m-d H:i:s} %-5p %c %X{username}: %m in %F at %L%n",
                ),
	    	'params' => array(
	     	    'file' => 'logs/bgame_%s.log',
		    'datePattern' => "Y-m-d",
		),
            ),


        ),
    );
?>
