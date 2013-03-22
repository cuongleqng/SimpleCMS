# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: aslcms
# Generation Time: 2011-05-17 22:20:44 -0400
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `articleID` int(11) NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(65) DEFAULT NULL,
  `articleExcerpt` varchar(350) DEFAULT NULL,
  `articleBody` longtext,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `modDate` datetime DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `articleCat` int(11) DEFAULT NULL,
  `articleImage` varchar(65) DEFAULT NULL,
  `featured` int(2) DEFAULT NULL,
  PRIMARY KEY (`articleID`),
  KEY `fk_author` (`authorID`),
  KEY `fk_categories` (`articleCat`),
  CONSTRAINT `fk_author` FOREIGN KEY (`authorID`) REFERENCES `authors` (`authorID`),
  CONSTRAINT `fk_categories` FOREIGN KEY (`articleCat`) REFERENCES `categories` (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`articleID`,`articleTitle`,`articleExcerpt`,`articleBody`,`startDate`,`endDate`,`modDate`,`authorID`,`articleCat`,`articleImage`,`featured`)
VALUES
	(45,'Uggla\\\'s Blast Sends Braves to Win','ATLANTA -- As he has struggled to find consistency during his first six weeks with the Braves, Dan Uggla has shown great effort on a nightly basis and occasionally managed to blur his offensive struggles with a timely home run. ','While helping the Braves extend their recent success against the Phillies with a 3-2 win in Sunday\\\'s Delta Civil Rights Game at Turner Field, Uggla damaged Roy Halladay with his hustle and then conquered him with a decisive eighth-inning homer.\r\n\r\n\\\"It was a fun game,\\\" Braves starting pitcher Tim Hudson said. \\\"It shook out the way I think most people were anticipating. It was a close game until the very end. It was pretty much anybody\\\'s ballgame until the last out.\\\"\r\n\r\nOnce closer Craig Kimbrel produced a scoreless ninth, Uggla could fully savor the contributions he made in this victory that gave the Braves their second series win over the Phillies in consecutive weekends. They now stand 3 1/2 games behind the front-running Phillies in the National League East standings.\r\n\r\n\\\"We know they\\\'ve got good pitching,\\\" Braves utility man Eric Hinske said. \\\"We\\\'re not intimidated. To be the best, you\\\'ve got to beat the best. It\\\'s fun playing against these guys.\\\"\r\n\r\nThe Braves have certainly earned the respect of Phillies manager Charlie Manuel.\r\n\r\n\\\"I think our team and the Braves are very similar,\\\" Manuel said. \\\"When they get everybody back they\\\'re going to have some pop, and when we get [Chase] Utley back we\\\'re going to be better.\\\"\r\n\r\nAs this tight series finale unfolded, it was fitting that some of the most hard-nosed members of the Braves took center stage. Hudson produced seven solid innings and also displayed an aggressive take-out slide of his good friend Pete Orr after hitting a single off Halladay in the third inning. \r\n\r\n\\\"He plays the game like he\\\'s in Little League,\\\" Braves manager Fredi Gonzalez said. \\\"He has fun. He\\\'s a position player that just happens to pitch.\\\"\r\n\r\nHudson\\\'s efforts set the stage for Uggla, who helped the Braves score their first two runs while hustling from first to third base on Hinske\\\'s two singles. But certainly the most memorable contribution came when he drilled Halladay\\\'s 3-2 fastball over the left-center-field wall to give the Braves a lead they would not relinquish.\r\n\r\n\\\"I knew he didn\\\'t want to walk me and put me on base,\\\" Uggla said. \\\"I was just going to try to hit off the heater. If he threw me the heater, I was going to be on time.\\\"\r\n\r\nWhile he has hit just hit just .205 through the first 42 games of the season, Uggla has managed to deliver many of his seven homers in timely situations. He delivered the second of two eighth-inning homers that provided a 2-1 win over the Brewers on April 4. Nearly two weeks later he drilled a game-tying, eighth-inning homer that helped the Braves complete a three-game sweep with a 10-inning win over the Giants.\r\n\r\n\\\"Any time you can hit a homer, it\\\'s not a bad thing,\\\" said Uggla, who was acquired from the Marlins in November with the hope that his power would prove valuable in games like this one.\r\n\r\nUggla\\\'s homer allowed the Braves to beat Halladay for the first time in his five career starts against them. The two-time Cy Young Award winner had completed 16 scoreless innings in his only two previous career starts at Turner Field.\r\n\r\nHalladay might have been able to keep that scoreless streak alive if not for Uggla, who certainly didn\\\'t play like a guy who was burdened by the fact that he had just four hits and 11 strikeouts in his previous 34 at-bats entering this series finale. \r\n\r\nInstead, Uggla looked like a man on a mission as he went from first to third base when Hinske followed Uggla\\\'s broken-bat single with one of his own in the fourth inning. Two batters later, Freddie Freeman produced an RBI infield single that glanced off Halladay\\\'s glove as he tried to grab it behind his back.\r\n\r\n\\\"[Uggla] isn\\\'t doing what he wants at the plate right now, but he shows perseverance and hard work,\\\" Hinske said. \\\"He\\\'s never going to stop working at his craft.\\\"\r\n\r\nAfter drawing a sixth-inning leadoff walk, Uggla once again aggressively raced to third base on Hinske\\\'s single to shallow right field. Two batters later, Freeman drilled a game-tying sacrifice fly to deep left field.\r\n\r\n\\\"If I can get myself on base, sometimes I can help the ballclub hustling, going first to third or maybe turning an out into a hit somehow,\\\" Uggla said. \\\"That\\\'s just the way you play the game. I just haven\\\'t been getting on base very much.\\\"\r\n\r\nHudson preserved a one-run lead and kept the Phillies scoreless until John Mayberry Jr. drilled a two-out, two-run homer in the sixth inning. Mayberry walked in his first two plate appearances of the afternoon, and the Braves\\\' hurler was well aware of the fact he had also tagged him for a two-run homer in last year\\\'s regular-season finale.\r\n\r\n\\\"It was pretty disappointing,\\\" Hudson said. \\\"It was late in the game and we were starting to run out of outs with one of the best guys in the league on the other side. We were very fortunate to tie it up. I knew after we tied it up, we would win the game.\\\"\r\n\r\nHudson provided a brief scare when he briefly favored his right leg and tried to stretch it out after coming off the mound to field a Ryan Howard grounder in the fourth inning. The veteran hurler said his right hip popped and compared it to popping his knuckles or back.\r\n\r\nWhen Gonzalez went to the mound to check on Hudson, he knew there was no way his hurler was going to exit the game. Likewise, the Braves\\\' skipper spent the past couple weeks knowing offensive frustrations were not going to prevent Uggla from continuing to be a hard-nosed asset to the team.\r\n\r\n\\\"They\\\'re hard-nosed, blue collar, \\\'Here it is, I\\\'m going to lay it on the line every night,\\\'\\\" Gonzalez said of Uggla and Hudson. \\\"It brings some toughness to the team, which is good.\\\" ','2011-05-10 01:47:29',NULL,'2011-05-16 20:30:36',1,1,NULL,1),
	(48,'Hanson Keeps Braves\\\' Momentum Going','Brett Myers will surely be happy to face a team other than the Reds on Monday, when the Astros take on the Braves for a two-game series. Myers has been roughed up by the Reds his last two times out, tossing 11 2/3 innings and allowing 12 earned runs. ','\\\"I felt like I was throwing too many breaking pitches,\\\" Myers said after his last start. \\\"I was pitching all those guys like they were Babe Ruth or something like that in the first two innings, instead of just trusting my stuff and going right after them.\\\"\r\n\r\nAfter starting the year 1-0 with a 3.31 ERA in five starts, the 30-year-old right-hander has had difficulty keeping the ball in the park, giving up five homers in his last three starts and 10 total this year.\r\n\r\n\\\"Any time you\\\'ve got a guy like that, you want him on the mound as often as possible,\\\" Clint Barmes said of Myers. \\\"He\\\'s our ace and the guy we want on the mound. [Monday] is going to be a big game for us, and we need to step up and start doing all the little things and start finishing some games.\\\"\r\n\r\nMyers will be facing a depleted Braves\\\' lineup likely to be without Jason Heyward, who isn\\\'t expected to return until Tuesday with inflammation around his right shoulder, though he did appear as a defensive replacement in right field on Sunday.\r\n\r\nChipper Jones\\\' status is also doubtful. The third baseman was a late scratch Sunday and has a torn meniscus in his right knee.\r\n\r\nThe Braves have gone 10-4 since the calendar turned to May, including two series wins against the National League East-rival Phillies. They\\\'ll now turn to Tommy Hanson as they host the Astros for a pair.\r\n\r\nAtlanta couldn\\\'t take advantage of Hanson\\\'s last outing, when he tossed 5 2/3 innings and allowed just one run on five hits in his fourth straight game without taking a loss, due to a bullpen malfunction.\r\n\r\nDespite the solid performance, the 24-year-old said he was battling throughout the game, striking out just three after fanning at least seven in four straight games.\r\n\r\n\\\"I never really got in a rhythm,\\\" he said afterward. \\\"But I did my best to keep runners from scoring, and the results were what they were.\\\" \r\n\r\n\\\"I never really got in a rhythm,\\\" he said afterward. \\\"But I did my best to keep runners from scoring, and the results were what they were.\\\"\r\n\r\nThe last time the Braves took two of three from Philadelphia, they squandered some of that momentum by losing two of three at Turner Field to the Nationals. After once again taking the series from the Phillies, they\\\'ll try to keep it up against the Astros.\r\n\r\n\\\"To win the series was huge for us,\\\" Hanson said. \\\"We didn\\\'t play the way we wanted against the Nationals and to go out and play well against the Phillies, winning two of three, is huge. We just need to keep the momentum going. Keep playing the way we are, and we\\\'ll be all right.\r\n\r\nBraves: Venters used again Sunday\r\n\r\nJonny Venters pitched a clean inning Sunday and has made an appearance in five of the last six games. The left-hander has struck out 23 batters over 23 1/3 innings this season with a 0.77 ERA.\r\n\r\nManager Fredi Gonzalez said Friday that they\\\'d be cautious with their valuable reliever.\r\n\r\n\\\"Everyday Jonny is not going to be every day,\\\" Gonzalez said. \\\"We\\\'ve got to really, really be careful with that.\\\"\r\n\r\nAstros: Barmes back on track\r\n\r\nOn Sunday, Barmes reached base three times for the first time since May 3, drawing two walks and belting a solo shot in the sixth inning. It was his first home run of the season, after missing April with a broken hand he suffered in Spring Training.\r\n\r\n\\\"I made some adjustments in my swing, and I\\\'ve still been trying to find what\\\'s going to work and what\\\'s going to be the best thing for me to have some success, and stay consistent.\\\"\r\n\r\nCarlos Lee also picked up a hit Sunday, stretching his hit streak to nine games, in which he\\\'s raised his batting average from .194 to .243.\r\n\r\n\\\"For two weeks, he\\\'s been swinging the bat pretty good and staying more consistent,\\\" manager Brad Mills said. ','2011-05-10 18:29:08',NULL,'2011-05-16 20:33:39',1,3,NULL,1),
	(51,'Growing my Beard Out','Yep- I\\\'m going to do it. I will not save my face until I graduate from Full Sail University.Yep- I\\\'m going to do it. I will not save my face until I graduate from Full Sail University.Yep- I\\\'m going to do it. I will not save my face until I graduate from Full Sail University.Yep- I\\\'m going to do it.','&lt;blockquote&gt;&quot;The best reason I can think of for not running for president of the United States is that you have to shave twice a day.&quot; - Adlai E. Stevenson&lt;/blockquote&gt;\r\n\r\n&lt;p&gt;\r\nShaving one&rsquo;s face was once a simple matter involving a brush, soap, mirror and razor -- but shaving today involves a few more choices. The volume of lotions, creams and gels one can use, along with tips for achieving a close shave grows each year. For AskMen.com, these choices also include the option of getting a barber shop shave -- or a straight-blade &lt;a href=&quot;http://www.askmen.com/fashion/fashiontip_400/423_fashion_advice.html&quot;&gt;shave on the streets of Morocco&lt;/a&gt;. Other men prefer a less than clean-shaven look, choosing instead to creatively groom their facial hair with the help of clippers and beard shavers.&lt;br&gt; &lt;br&gt; Then, of course, there is the matter of shaving below the chin... with some men opting to depilate their shoulders, backs, chests and of course their genital region.&lt;br&gt; &lt;br&gt; No matter which areas or styles you prefer, you&rsquo;ll have to deal with the prospect of razor burn and rashes. To prevent these, you&rsquo;ll need to &lt;a href=&quot;http://www.askmen.com/fashion/fashiontip_200/242_fashion_advice.html&quot;&gt;build the perfect shaving kit&lt;/a&gt; with all the necessary accoutrements.&lt;br&gt; \r\n\r\n&lt;h3&gt;Shaving on AM&lt;/h3&gt; &lt;p&gt;After a great haircut the single most important aspect of &lt;a href=&quot;http://www.askmen.com/fashion/keywords/mens-grooming.html&quot;&gt;grooming&lt;/a&gt; for a man is a close shave. A variety of elements, from your skin type to where you live, and from the lotions and creams you use to the quality of your razor and stroke technique contribute to the shave you get. And if you&rsquo;re among the 30% of men who prefer an electric shave, then you&rsquo;ve got a few more factors to consider, such as foil versus rotary and dry versus wet electric shavers. Whatever your preference, you can trust AM to keep you up to date on the latest advances in shaving.&lt;br&gt; &lt;br&gt; &lt;/p&gt;\r\n\r\n&lt;h3&gt;Shaving Fact&lt;/h3&gt; &lt;p&gt;Men spend an average of five months of their lives shaving. (Are you really that surprised? You shouldn&rsquo;t be. After all, it is believed that 90% of all men shave at least once per day. Some even shave twice in one session, while others insist on shaving after an early morning shower and then again before dinner.) &lt;/p&gt;','2011-05-11 01:57:09',NULL,'2011-05-16 21:40:40',1,2,NULL,1),
	(72,'Welcome to the Jungle','Welcome to the jungle, We got fun \\\'n\\\' games, We got everything you want, Honey we know the names\r\nWe are the people that can find, Whatever you may need, If you got the money honey, We got your disease. In the jungle, Welcome to the jungle, Watch it bring you to your shun n,n,n,nn,n, n,n,n,n,n,n knees, knees, I wanna watch you bleed','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.\r\n\r\nNunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.\r\n\r\nNunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','2011-05-13 05:18:58',NULL,'2011-05-15 04:23:20',1,1,NULL,1),
	(73,'Willy WonkaBong!','He\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!','Never fear, Willy WonkaBong is here! He\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!\r\n\r\nHe\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!\r\n\r\n\r\nHe\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!He\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!He\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!\r\n\r\nHe\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!\r\nHe\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!\r\n\r\nHe\\\'s back with an exciting new adventure! Willy and his chocolate are starring in a new reality television series! The series, based on the true story of melting chocolate, displays the agonizing and deteriorating mental health of Mr. Wonkabong. The plot, based around a boy named Charlie, dramatically takes a turn when charlie lets chocolate melt!','2011-05-13 05:31:44',NULL,'2011-05-16 22:22:24',52,1,NULL,1),
	(74,'Opportunities Test Post','Opportunities Test Post','Opportunities Test Post','2011-05-14 05:20:41',NULL,NULL,1,2,NULL,1),
	(75,'GPS Events Test Post','GPS Events Test Post','GPS Events Test Post','2011-05-14 05:21:07',NULL,NULL,1,4,NULL,1),
	(76,'Community News Test Post','Community News Test Post','Community News Test Post','2011-05-14 05:21:20',NULL,'2011-05-14 18:08:16',1,5,NULL,1),
	(77,'Degrees Test Post','Degrees Test Post','Degrees Test Post','2011-05-14 05:21:34',NULL,'2011-05-14 06:20:44',1,6,NULL,1),
	(79,'Texas Man Chainsawed Best Friend, Police Say','HOUSTON –  Police who found a man\\\'s dismembered body outside a vacant house, with the head and an arm stuffed into a trash bag and the rest of his remains in a backyard next door, arrested his best friend Monday for murder.','Neighbors and family members say the two men had been best friends for years and a possible argument over money might have led to the slaying.\r\n\r\nThe body of Marlon Thomas, 35, was found about 7 p.m. Sunday in the backyard of a fenced, burned home in Houston\\\'s Fifth Ward, a historically black neighborhood east of downtown.\r\n\r\nPolice said Thomas\\\' friend, Noe Morin, 32, who lived in an apartment in the home next door, killed him. They took Morin into custody Sunday night and charged him Monday afternoon.\r\n\r\nOnline court records did not indicate he had an attorney.\r\n\r\nThomas\\\' head and an arm were found in a black trash bag behind the home where Morin was staying with a family friend. A chainsaw was next to the bag, which was behind cinderblocks that supported the home. The rest of Thomas\\\' body, with a partially severed arm, was found in a backyard next door that was full of overgrown weeds and trash.\r\n\r\n\\\"That\\\'s his best friend for over 20 years,\\\" said Thomas\\\' sister, Tonya Dangerfield, after she tied a bouquet of purple and silver birthday balloons to the chain link fence that surrounded the backyard where her brother\\\'s body was found. She said her brother would have turned 36 on June 9. \\\"Why did (Morin) do that? Why would you do something like this?\r\n\r\nAn autopsy has been ordered and a cause of death is still pending for Thomas.\r\n\r\nMae Land, 87, who lived in the two-bedroom apartment with Morin said he was a friend of her late son and had been staying with her about four months. Thomas also would stay there from time to time. Both men paid Land some money to help with the rent.\r\n\r\nNeighbors said the two men would often be found sitting on the front steps of the apartment located in a brown row house.\r\n\r\n\\\"Every single day, they were out there,\\\" said Brittney Johnson, who lived in the apartment next door. She added that sometimes the two men would be joined by Morin\\\'s sons, who were visiting their father. \\\"That\\\'s why it\\\'s really so shocking because they were friends.\\\"\r\n\r\nLand said she is in the process of moving out of the apartment and was not there most of this past weekend.\r\n\r\nCrystal Burks, who lives across the street, said Morin was known \\\"to have a temper.\\\" She said she and other neighbors heard the two men arguing Saturday night and later heard gunshots.\r\n\r\n\\\"Gun shots, we hear that every day so we didn\\\'t pay that much attention,\\\" Burks said.\r\n\r\nWhile neighbors said the two men might have had a falling out over money, police wouldn\\\'t comment on a motive.\r\n\r\nWhile police found a chainsaw next to the bag with some of Thomas\\\' remains, Burks and other neighbors said they never heard a chainsaw being used during the weekend.\r\n\r\nBurks called 911 and Johnson\\\'s husband went to investigate the backyard next door after people in the neighborhood, which is made up of older row houses and newly built townhomes, started saying there might be a body there.\r\n\r\nJohnson said after police arrived, she saw one officer open a bag in a trash can in Land\\\'s backyard and then exclaim, \\\"Oh my God, it\\\'s the head.\\\"\r\n\r\n\\\"I\\\'ve never seen anything like that in my life. It was like I was watching an episode of \\\'The First 48\\\' right before my eyes,\\\" Johnson said, referring to a reality cable show that follows the first 48 hours of homicide investigations.\r\n\r\nDangerfield said her brother was a good person who worked in construction.\r\n\r\n\\\"He didn\\\'t deserve to get this done to him,\\\" she said.','2011-05-14 21:26:31',NULL,'2011-05-17 03:23:33',52,3,NULL,1),
	(80,'Jim&amp;#39;s Post','I like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!','I like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!\r\n\r\nI like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!I like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!\r\n\r\nI like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!I like Real estate. I have been in the Real Estate.\r\n\r\n\r\nI like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!I like Real estate. I have been in the Real Estate Business for 30 years, selling over $390 Million worth of real estate! I have been married for 29 years to my wife Betty and we have two children, Jeremy-22 and Kimberly-19. Please call me if you\\\'re interested in Asheville Real Estate!\r\n','2011-05-15 19:55:46',NULL,'2011-05-17 03:04:38',28,1,NULL,1),
	(81,'I Hope The Atlanta Braves Win Tonight!','Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu.','ATLANTA -- When describing Eric Hinske, it\\\'s impossible to ignore that he is one of the most respected and well-liked members of the Braves\\\' clubhouse. At the same time, the former American League Rookie of the Year Award winner still has the ability to be a difference maker when he is on the field.\r\n\r\nHinske capped a three-hit night with a seventh-inning RBI single that backed Tommy Hanson\\\'s strong effort and allowed the Braves to claim a 3-2 win over the Astros at Turner Field on Monday night.\r\n\r\nEarlier in the day at Minute Maid Park, Astros owner Drayton McLane announced an agreement to sell the club to Houston businessman Jim Crane, pending approval by MLB owners.\r\n\r\nGiven a chance to play on a regular basis while Jason Heyward has dealt with a sore right shoulder, Hinske has given the Braves the same kind of spark he did around this time last year, when Matt Diaz was sidelined by a thumb infection.\r\n\r\nAfter Astros left-handed reliever Fernando Abad walked Nate McLouth and Dan Uggla, Hinske delivered his game-winning single to right field. It was the second three-hit game of the season for the 33-year-old utility player, who has batted .444 (12-for-27) in his past 10 games.\r\n\r\nWith Heyward\\\'s shoulder appearing healthy when he hit a sharp grounder during an eighth-inning pinch-hit appearance, the Braves were able to be happy about a lot of the evening\\\'s events. They have won three straight and four of five since dropping the first two games of the eight-game homestand. \r\n\r\nHanson did not allow a hit until Carlos Lee singled with two outs in the fourth. As the early innings unfolded, it appeared this outing would be much like his only three previous ones against the Astros. He allowed a total of three runs in those games.\r\n\r\nBut while getting his first career look at Hanson, Matt Downs altered this trend. Houston\\\'s third baseman drilled a fifth-inning solo homer and then foiled the Braves right-hander again with a two-out RBI double in the seventh.\r\n\r\nPlaying third base for the injured Chipper Jones, Martin Prado made an incredible diving stop of Lee\\\'s first-inning grounder and retired the speedy Micheal Bourn after making a barehanded grab in the third. But the former second baseman, who moved to left field this year, also made a high throw that sailed into Atlanta\\\'s dugout and allowed Lee to reach second to begin the seventh.\r\n\r\nHanson responded with consecutive strikeouts before Downs\\\' game-tying double fell in the left-center field gap.\r\n\r\nWith the help of Hinske\\\'s decisive single, Hanson won his fourth consecutive decision. He allowed two runs and three hits while matching a season-best 10 strikeouts in seven innings.\r\n\r\nIt appeared Myers might be destined for a short night when the Braves loaded the bases in both of the first two innings. But they squandered both opportunities and allowed the veteran hurler to find a temporary groove. He allowed just two singles over the next three innings.\r\n\r\nAfter needing 56 pitches to complete the first two innings, Myers started to show some fatigue when Hinske and Alex Gonzalez began the sixth with consecutive singles. Gonzalez advanced to second on a Freddie Freeman grounder and raced home when Joe Mather delivered a go-ahead two-run single to left field. ','2011-05-16 23:02:20',NULL,'2011-05-17 03:40:55',52,1,NULL,2),
	(82,'Asheville, NC: Beer Capital of the United States','Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. ','Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. \r\n\r\nAsheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. \r\n\r\nAsheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. \r\n\r\nAsheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. Asheville, NC is a beautiful city located in the heart of the Smokey Moutains. ','2011-05-17 00:15:36',NULL,'2011-05-17 00:34:57',52,1,NULL,2),
	(84,'Demo User Post','Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. ','Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. ','2011-05-17 05:41:46',NULL,NULL,54,4,NULL,1),
	(85,'Demo Post for Screencast','Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. ','Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. \r\n\r\nPhasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. \r\n\r\nPhasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. \r\n\r\nPhasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. ','2011-05-17 05:43:43',NULL,NULL,1,5,NULL,1);

/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `authorPhone` varchar(20) DEFAULT NULL,
  `bioImageID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`authorID`),
  KEY `fk_authorid` (`userID`),
  CONSTRAINT `fk_authorid` FOREIGN KEY (`userID`) REFERENCES `simpleauth` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`authorID`,`fname`,`lname`,`bio`,`authorPhone`,`bioImageID`,`userID`)
VALUES
	(1,'Jeremy','Buff','I am a web developer based in Orlando, Florida. As the co-founder of <a href=\\\"http://www.avaluxdev.com\\\">Avalux Web Development</a>, I have gained a lot of experience working with the web and human-computer interaction.','828-778-6185',NULL,1),
	(2,'Charlie','Brown',NULL,NULL,NULL,2),
	(28,'Jim','Buff','I am Realtor from Asheville, North Carolina. I co-own Keller Williams Professionals. I also have a really cool son who makes awesome websites for a living.','828-712-5186',NULL,101),
	(29,'Will','Bongos',NULL,NULL,NULL,103),
	(30,'Billy','Bob',NULL,NULL,NULL,104),
	(31,'William','Shatner',NULL,NULL,NULL,106),
	(42,'Peter','Pan',NULL,NULL,NULL,119),
	(52,'Willy','WonkaBong','I like chocolate. I also like weird books.','828-628-3050',NULL,130),
	(53,'Dan','Uggla','','828-923-3253',NULL,133),
	(54,'Demo','User','','--',NULL,136),
	(55,'John','Patsos',NULL,NULL,NULL,137);

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(30) DEFAULT NULL,
  `catParent` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`catID`,`catName`,`catParent`)
VALUES
	(1,'News',NULL),
	(2,'Opportunities',NULL),
	(3,'Student Work',NULL),
	(4,'GPS Events',NULL),
	(5,'Community News',NULL),
	(6,'Degrees',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table image_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image_types`;

CREATE TABLE `image_types` (
  `typeID` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `image_types` WRITE;
/*!40000 ALTER TABLE `image_types` DISABLE KEYS */;
INSERT INTO `image_types` (`typeID`,`typeName`)
VALUES
	(1,'AuthorPic'),
	(2,'PostPic');

/*!40000 ALTER TABLE `image_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `imageType` int(2) DEFAULT NULL,
  `imagePath` varchar(255) NOT NULL,
  `articleID` int(11) DEFAULT NULL,
  PRIMARY KEY (`imageID`),
  KEY `fk_imgType` (`imageType`),
  CONSTRAINT `fk_imgType` FOREIGN KEY (`imageType`) REFERENCES `image_types` (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`imageID`,`title`,`alt`,`authorID`,`imageType`,`imagePath`,`articleID`)
VALUES
	(1,'Example First Image','Cocoa Beach',1,2,'frontend/content/beach.jpg',NULL),
	(2,'Charlie Brown\'s Picture','Charlie Brown',2,1,'frontend/avatars/charliebrown.gif',NULL),
	(3,'Jeremy Buff\'s Picture','Jeremy Buff',1,1,'frontend/avatars/jbuff.png',NULL),
	(12,'Willy Wonka\'s Avatar','Avatar',130,1,'frontend/avatars/wonka.jpg',NULL),
	(13,'Dan Uggla\'s Avatar','Avatar',133,1,'frontend/avatars/default.jpg',NULL),
	(16,'Avalux Buds','Hanging Out',1,2,'frontend/content/avaluxbuds.jpg',NULL),
	(17,'Astronauts','Funny',1,2,'frontend/content/astronaut.jpg',NULL),
	(23,'Welcome to the Jungle','1 Image',1,2,'frontend/content/jungle.jpg',72),
	(24,'Willy WonkaBong!','News Image',52,2,'frontend/content/wonka.jpg',73),
	(49,'Very Cool Design','Web Design',1,2,'frontend/content/Screen shot 2011-05-09 at 1.56.49 AM.png',NULL),
	(50,'Crazy Teacher','Full Sail University',1,2,'frontend/content/Screen shot 2011-05-09 at 2.50.40 AM.png',NULL),
	(51,'gdsgs','Student Work Image',1,2,'frontend/content/fullsail-logo.gif',79),
	(52,'Jim\\\'s Post','News Image',28,2,'frontend/content/realtor_logo.gif',80),
	(66,'Jim Buff\'s Avatar','Avatar',101,1,'frontend/avatars/jimbuff.jpg',NULL),
	(69,'Dan\'s Avatar','Avatar',133,1,'frontend/avatars/danuggla.jpg',NULL),
	(70,'Willy WonkaBong!','Post Image',52,2,'frontend/content/wonkabong.jpg',73),
	(71,'I Hope The Atlanta Braves Win Tonight!','Post Image',52,2,'frontend/content/turnerfield.jpg',81),
	(72,'Test Asheville','Post Image',52,2,'frontend/content/asheville.jpg',82),
	(73,'Demo Post for Screencast','Community News Image',1,2,'frontend/content/asheville.gif',83),
	(74,'Demo User\'s Avatar','Avatar',136,1,'frontend/avatars/default.jpg',NULL),
	(75,'Demo\'s Avatar','Avatar',136,1,'frontend/avatars/quote.gif',NULL),
	(76,'Demo Post for Screencast','Community News Image',1,2,'frontend/content/asheville_1.gif',85),
	(77,'John Patsos\'s Avatar','Avatar',137,1,'frontend/avatars/default.jpg',NULL);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table monkeys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `monkeys`;

CREATE TABLE `monkeys` (
  `name` varchar(30) DEFAULT NULL,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `monkeys` WRITE;
/*!40000 ALTER TABLE `monkeys` DISABLE KEYS */;
INSERT INTO `monkeys` (`name`,`description`,`id`)
VALUES
	('Jeremy Buff','This dude is an orangutang. ',1),
	('Bill','He is an ape.',2);

/*!40000 ALTER TABLE `monkeys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table simpleauth
# ------------------------------------------------------------

DROP TABLE IF EXISTS `simpleauth`;

CREATE TABLE `simpleauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login` varchar(25) DEFAULT NULL,
  `login_hash` varchar(255) DEFAULT NULL,
  `profile_fields` text,
  `company` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

LOCK TABLES `simpleauth` WRITE;
/*!40000 ALTER TABLE `simpleauth` DISABLE KEYS */;
INSERT INTO `simpleauth` (`id`,`username`,`password`,`group`,`email`,`last_login`,`login_hash`,`profile_fields`,`company`)
VALUES
	(1,'jbuff','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',2,'jeremy@avaluxdev.com','1305654888','6726c4af46da18e98de12aecb507ee764dbad8e9','','Avalux Web Development'),
	(2,'cbrown','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'cbrown@peanuts.com','1305205830','511def124938d9057486fa0cc4e786e9e4cde99a','','Peantus Co.'),
	(101,'jimbuff','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',1,'kwjb76@gmail.com','1305601093','a94b07d48afd03c174ca8794ea7ce8a8fcb7739d',NULL,'Keller Williams Professionals'),
	(103,'wbongos','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'drum@bongos.com',NULL,NULL,NULL,'A Band, Co.'),
	(104,'billybob','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'asd@a.com','1305179346','e6ab3ba67f2bc03f5ba372dd5a237d6ec5d5cd20',NULL,'Redneck, Inc.'),
	(106,'wshatner','BQ74yic1YDDos9x8nOcFWYXUZzJaEpf9ZWidZJ5u6rE=',3,'a@a.com',NULL,NULL,NULL,'Space Industries'),
	(119,'ppan','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'a@a.com',NULL,NULL,NULL,'First Flight, LLC'),
	(130,'wwonka','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'sweets@candy.com','1305638328','d79da0d4cf4728680ffbbc51db06c4e61571b416',NULL,'Chocolate Co.'),
	(133,'duggla','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'dan@braves.com','1305504796','8de1193e03300962d43bcb72dce7cefdef78b405',NULL,'Atlanta Braves'),
	(136,'demouser','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',4,'test@test.com','1305610832','3d38b21710764fdb5af4affc9066651f0503a7e0',NULL,NULL),
	(137,'johnny','i6cq2TvT5Yhc+Bgn6E5/ZmtJkTU5N6g9CkKS0ilsWFA=',3,'jpatsos@me.com','1305638426','ca6fafb04cdd09fb794711c9cb7ed4dd353c1902',NULL,NULL);

/*!40000 ALTER TABLE `simpleauth` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(30) DEFAULT NULL,
  `groupNameArticle` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` (`groupID`,`groupName`,`groupNameArticle`)
VALUES
	(1,'Admin','an'),
	(2,'Developer','a'),
	(3,'Author','an'),
	(4,'Editor','an');

/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
