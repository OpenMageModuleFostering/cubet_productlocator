CREATE TABLE IF NOT EXISTS `cubet_productlocator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DELIMITER $$
CREATE FUNCTION `distance`(Q_LAT FLOAT, Q_LONG FLOAT, NAV_LAT FLOAT, NAV_LONG FLOAT) RETURNS float
BEGIN
    DECLARE radlat1 FLOAT;
    DECLARE radlat2 FLOAT;
    DECLARE radlon1 FLOAT;
    DECLARE radlon2 FLOAT;
    DECLARE theta FLOAT;
    DECLARE radtheta FLOAT;
    DECLARE dist FLOAT;
    DECLARE PI FLOAT;

    SET PI = PI();
    SET dist = 0;
  
    IF ((Q_LAT IS NULL OR Q_LAT = 0) OR (Q_LONG IS NULL OR Q_LONG = 0)
        OR (NAV_LAT IS NULL OR NAV_LAT = 0) OR (NAV_LONG IS NULL OR NAV_LONG = 0)) THEN
        RETURN dist;
    ELSE
        SET radlat1 = PI * (Q_LAT/180);
        SET radlat2 = PI * (NAV_LAT/180);
        SET radlon1 = PI * (Q_LONG/180);
        SET radlon2 = PI * (NAV_LONG/180);
        SET theta = Q_LONG-NAV_LONG;
        SET radtheta = PI * (theta/180);
        SET dist = SIN(radlat1) * SIN(radlat2) + COS(radlat1) * COS(radlat2) * COS(radtheta);
        SET dist = ACOS(dist);
        SET dist = dist * (180/PI);
        SET dist = dist * 60 * 1.1515;
        SET dist = dist * 1.609344;

        SET dist = CEILING(dist);

    RETURN dist;
    END IF;
END$$

