#
# Table structure for table `Bookmarks`
#

CREATE TABLE Bookmarks (
  id int(11) NOT NULL auto_increment,
  readerid int(11) NOT NULL,
  bookid int(11) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

# --------------------------------------------------------

#
# Table structure for table `Books`
#

CREATE TABLE Books (
  id int(11) NOT NULL auto_increment,
  title varchar(45) NOT NULL,
  author varchar(50) NOT NULL,
  categoryid text NOT NULL,
  count int(11) NOT NULL,
  publication varchar(45) default NULL,
  placepublication varchar(45) default NULL,
  yearpublication varchar(20) default NULL,
  countpages int(11) default NULL,
  price float NOT NULL,
  isbn char(17) default NULL,
  datecome varchar(20) default NULL,
  img text NOT NULL,
  shortstory text NOT NULL,
  fullstory text NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

#
# Table structure for table `Categories`
#

CREATE TABLE Categories (
  id int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;


#
# Table structure for table `Readers`
#

CREATE TABLE Readers (
  id int(11) NOT NULL auto_increment,
  sername varchar(30) default NULL,
  `name` varchar(30) NOT NULL,
  datebirth varchar(10) default NULL,
  address varchar(60) default NULL,
  contphone varchar(20) default NULL,
  sex enum('m','f') default NULL,
  email varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` smallint(2) default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Dumping data for table `Readers`
#

INSERT INTO Readers VALUES (1, 'GOL', 'r0n9', '621115200', '', '', 'm', 'ron9.gol@gmail.com', md5('1'), 0);

#
# Table structure for table `TRBooks`
#

CREATE TABLE TRBooks (
  id int(11) NOT NULL auto_increment,
  readerid int(11) NOT NULL,
  bookid int(11) NOT NULL,
  count int(11) NOT NULL,
  datet varchar(20) NOT NULL,
  dater varchar(20) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;


