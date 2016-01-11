

CREATE TABLE  `presenter_categories` (
`cat_id` int (11) unsigned NOT NULL  auto_increment,
`cat_pid` int (5) unsigned NOT NULL default '0',
`cat_title` varchar (255)   NOT NULL default ' ',
`cat_desc` text   NOT NULL ,
`cat_image` varchar (255)   NOT NULL default ' ',
`cat_weight` int (5)   NOT NULL default '0',
`cat_color` varchar (10)   NULL default ' ',
`cat_status` int (10)   NOT NULL default '0',
`cat_waiting` int (10)   NOT NULL default '0',
`cat_online` tinyint (1)   NOT NULL default '0',
PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM;

#
# Structure table for `presenter_slides` 25
#

CREATE TABLE  `presenter_slides` (
`slides_id` int (8)   NOT NULL  auto_increment,
`slides_cid` int (8)   NOT NULL default '0',
`slides_uid` int (8)   NOT NULL default '0',
`slides_title` varchar (255)   NOT NULL default '',
`slides_content` text   NOT NULL ,
`css_id` varchar (25)   NOT NULL default '',
`css_class` varchar (25)   NOT NULL default '',
`slides_transition_x` varchar (5)   NOT NULL default '',
`slides_transition_y` varchar (5)   NOT NULL default '',
`slides_transition_z` varchar (5)   NOT NULL default '',
`slides_rotation_x` varchar (5)   NOT NULL default '',
`slides_rotation_y` varchar (5)   NOT NULL default '',
`slides_rotation_z` varchar (5)   NOT NULL default '',
`slides_scale_x` varchar (5)   NOT NULL default '',
`slides_scale_y` varchar (5)   NOT NULL default '',
`slides_scale_z` varchar (5)   NOT NULL default '',
`slides_created` date   NOT NULL default '0000-00-00',
`slides_published` date   NOT NULL default '0000-00-00',
`slides_position` int (5)   NOT NULL default '0',
`slides_online` tinyint (1)   NOT NULL default '0',
`slides_type` int (5)   NOT NULL default '0',
`slides_notes` text   NOT NULL ,
`slides_mp3` varchar ( 50)   NOT NULL default '',
`slides_time` int (8)   NOT NULL default '0',
`slides_status` int (10) unsigned NOT NULL default '0',
`slides_waiting` int (10) unsigned NOT NULL default '0',
PRIMARY KEY (`slides_id`)
) ENGINE=MyISAM;

INSERT INTO `presenter_categories` (`cat_id`, `cat_pid`, `cat_title`, `cat_desc`, `cat_image`, `cat_weight`, `cat_color`, `cat_status`, `cat_waiting`, `cat_online`) VALUES
(1, 1, '1st Presentation', 'My first stunning presentation done using XOOPS and Impress.js', 'blank.gif', 0, ' ', 0, 0, 0);

INSERT INTO `presenter_slides` (`slides_id`, `slides_cid`, `slides_uid`, `slides_title`, `slides_content`, `css_id`, `css_class`, `slides_transition_x`, `slides_transition_y`, `slides_transition_z`, `slides_rotation_x`, `slides_rotation_y`, `slides_rotation_z`, `slides_scale_x`, `slides_scale_y`, `slides_scale_z`, `slides_created`, `slides_published`, `slides_position`, `slides_online`, `slides_type`, `slides_notes`, `slides_mp3`, `slides_time`, `slides_status`, `slides_waiting`) VALUES
(1, 1, 1, '1st Slide', '<p style="text-align: center;"><span style="font-size: large;"><strong><span class="nt">Welcome to XOOPS Presentations powered by Impress.js!&nbsp;</span></strong></span></p><p style="text-align: center;"></p><p style="text-align: center;"><a href="index.php"><span class="nt"><img height="420" src="https://1.gravatar.com/avatar/7bcccd6b8bda7f153e9905c95fedc3da?d=https%3A%2F%2Fidenticons.github.com%2Fac44b8d010c7b0c7ac36920afbf0bc95.png&amp;s=420" width="420" /></span></a></p><p style="text-align: center;"><span class="nt"></span><span style="font-size: large;"><span style="background-color: #ffffff;">Aren''t</span> you just <strong>bored<span class="nt"></span></strong>&nbsp;with all those slides-based presentations?</span><span class="nt"><br /></span></p>', 'bored', 'step slide', '-1000', '-1500', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 1, 1, 0, '<p>This is my first slide</p>', '', 0, 1, 1),
(13, 1, 1, '', '<p>It''s a <strong>presentation tool</strong> <br/>\n        inspired by the idea behind <a href="http://prezi.com">prezi.com</a> <br/>\n        and based on the <strong>power of CSS3 transforms and transitions</strong> in modern browsers.</p>', 'its', 'step', '850', '3000', '', '', '', '90', '5', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(12, 1, 1, '', '       <span class="try">then you should try</span>\r\n        <h1>impress.js<sup>*</sup></h1>\r\n        <span class="footnote"><sup>*</sup> no rhyme intended</span>', 'title', 'step', '0', '0', '', '', '', '', '4', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(11, 1, 1, '', '<q>Would you like to <strong>impress your audience</strong> with <strong>stunning visualization</strong> of your talk?</q>', '', 'step slide', '1000', '-1500', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(10, 1, 1, '', '<q>Don''t you think that presentations given <strong>in modern browsers</strong> shouldn''t <strong>copy the limits</strong> of ''classic'' slide decks?</q>', '', 'step slide', '0', '-1500', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(14, 1, 1, '', ' <p>visualize your <b>big</b> <span class="thoughts">thoughts</span></p>', 'big', 'step', '3500', '2100', '', '', '', '180', '6', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(15, 1, 1, '', '<p>and <b>tiny</b> ideas</p>', 'tiny', 'step', '2825', '2325', '-3000', '', '', '300', '1', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(16, 1, 1, '', '<p>by <b class="positioning">positioning</b>, <b class="rotating">rotating</b> and <b class="scaling">scaling</b> them on an infinite canvas</p>', 'ing', 'step', '3500', '-850', '', '', '', '270', '6', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(17, 1, 1, '', '<p>the only <b>limit</b> is your <b class="imagination">imagination</b></p>', 'imagination', 'step', '6700', '-300', '', '', '', '', '6', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(18, 1, 1, '', '<p>want to know more?</p>\r\n        <q><a href="http://github.com/bartaz/impress.js">use the source</a>, Luke!</q>', 'source', 'step', '6300', '2000', '', '', '', '20', '4', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(19, 0, 0, '', ' <p>one more thing...</p>', 'one-more-thing', 'step', '6000', '4000', '', '', '', '', '2', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(20, 1, 1, '', '<p><span class="have">have</span> <span class="you">you</span> <span class="noticed">noticed</span> <span class="its">it''s</span> <span class="in">in</span> <b>3D<sup>*</sup></b>?</p>\r\n        <span class="footnote">* beat that, prezi ;)</span>', 'its-in-3d', 'step', '6200', '4300', '-100', '-40', '10', '', '2', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0),
(21, 1, 1, ' ', '', 'overview', 'step', '3000', '1500', '0', '0', '0', '0', '10', '0', '0', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0);
