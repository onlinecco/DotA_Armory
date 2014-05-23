-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: engr-cpanel-mysql.engr.illinois.edu
-- Generation Time: May 23, 2014 at 01:26 AM
-- Server version: 5.1.73
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dotaarmory_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `Chat`
--

CREATE TABLE IF NOT EXISTS `Chat` (
  `Username` text NOT NULL,
  `Message` text NOT NULL,
  `Time` bigint(200) NOT NULL,
  UNIQUE KEY `Time` (`Time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Chat`
--

INSERT INTO `Chat` (`Username`, `Message`, `Time`) VALUES
('anonymous', 'hi', 1398631496),
('anonymous', 'this is a demo', 1398720661),
('anonymous', 'hi', 1398720744),
('test2', 'dasdsadas', 1398720837),
('anonymous', 'sssssssssssssssssss', 1398720841),
('anonymous', 'hi', 1398721426),
('anonymous', 'jj', 1398738834),
('anonymous', 'sdfasdfasdf', 1398784808),
('yisiliu', 'aksdfj', 1398819589),
('yisiliu', 'hi', 1400103078),
('anonymous', 'hi', 1400740395),
('anonymous', 's', 1400740404);

-- --------------------------------------------------------

--
-- Table structure for table `Heroes`
--

CREATE TABLE IF NOT EXISTS `Heroes` (
  `HID` int(11) NOT NULL,
  `Hname` char(20) NOT NULL,
  `Hnameserver` char(20) NOT NULL,
  `Type` text NOT NULL,
  `Hdescription` text NOT NULL,
  PRIMARY KEY (`HID`),
  UNIQUE KEY `HID_2` (`HID`),
  UNIQUE KEY `HID_3` (`HID`),
  UNIQUE KEY `HID_4` (`HID`),
  UNIQUE KEY `HID_5` (`HID`),
  KEY `HID` (`HID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Heroes`
--

INSERT INTO `Heroes` (`HID`, `Hname`, `Hnameserver`, `Type`, `Hdescription`) VALUES
(1, 'Anti-Mage', 'antimage', 'Agility', 'The monks of Turstarkuri watched the rugged valleys below their mountain monastery as wave after wave of invaders swept through the lower kingdoms. Ascetic and pragmatic, in their remote monastic eyrie they remained aloof from mundane strife, wrapped in meditation that knew no gods or elements of magic. Then came the Legion of the Dead God, crusaders with a sinister mandate to replace all local worship with their Unliving Lord''s poisonous nihilosophy. From a landscape that had known nothing but blood and battle for a thousand years, they tore the souls and bones of countless fallen legions and pitched them against Turstarkuri. The monastery stood scarcely a fortnight against the assault, and the few monks who bothered to surface from their meditations believed the invaders were but demonic visions sent to distract them from meditation. They died where they sat on their silken cushions. Only one youth survived--a pilgrim who had come as an acolyte, seeking wisdom, but had yet to be admitted to the monastery. He watched in horror as the monks to whom he had served tea and nettles were first slaughtered, then raised to join the ranks of the Dead God''s priesthood. With nothing but a few of Turstarkuri''s prized dogmatic scrolls, he crept away to the comparative safety of other lands, swearing to obliterate not only the Dead God''s magic users--but to put an end to magic altogether. '),
(2, 'Axe', 'axe', 'Strength', ''),
(3, 'Bane', 'bane', 'Intelligence', ''),
(4, 'Bloodseeker', 'bloodseeker', 'Agility', ''),
(5, 'Crystal Maiden', 'crystal_maiden', 'Intelligence', 'Born in a temperate realm, raised with her fiery older sister Lina, Rylai the Crystal Maiden soon found that her innate elemental affinity to ice created trouble for all those around her. Wellsprings and mountain rivers froze in moments if she stopped to rest nearby; ripening crops were bitten by frost, and fruiting orchards turned to mazes of ice and came crashing down, spoiled. When their exasperated parents packed Lina off to the equator, Rylai found herself banished to the cold northern realm of Icewrack, where she was taken in by an Ice Wizard who had carved himself a hermitage at the crown of the Blueheart Glacier. After long study, the wizard pronounced her ready for solitary practice and left her to take his place, descending into the glacier to hibernate for a thousand years. Her mastery of the Frozen Arts has only deepened since that time, and now her skills are unmatched.'),
(6, 'Drow Ranger', 'drow_ranger', 'Agility', ''),
(7, 'Earthshaker', 'earthshaker', 'Strength', 'Like a golem or gargoyle, Earthshaker was one with the earth but now walks freely upon it. Unlike those other entities, he created himself through an act of will, and serves no other master. In restless slumbers, encased in a deep seam of stone, he became aware of the life drifting freely above him. He grew curious. During a season of tremors, the peaks of Nishai shook themselves loose of avalanches, shifting the course of rivers and turning shallow valleys into bottomless chasms. When the land finally ceased quaking, Earthshaker stepped from the settling dust, tossing aside massive boulders as if throwing off a light blanket. He had shaped himself in the image of a mortal beast, and named himself Raigor Stonehoof. He bleeds now, and breathes, and therefore he can die. But his spirit is still that of the earth; he carries its power in the magical totem that never leaves him. And on the day he returns to dust, the earth will greet him as a prodigal son.	'),
(8, 'Juggernaut', 'juggernaut', 'Agility', ''),
(9, 'Mirana', 'mirana', 'Agility', ''),
(10, 'Morphling', 'morphling', 'Agility', ''),
(11, 'Shadow Fiend', 'nevermore', 'Agility', ''),
(12, 'Phantom Lancer', 'phantom_lancer', 'Agility', ''),
(13, 'Puck', 'puck', 'Intelligence', ''),
(14, 'Pudge', 'pudge', 'Strength', ''),
(15, 'Razor', 'razor', 'Agility', ''),
(16, 'Sand King', 'sand_king', 'Strength', ''),
(17, 'Storm Spirit', 'storm_spirit', 'Intelligence', ''),
(18, 'Sven', 'sven', 'Strength', 'Sven is the bastard son of a Vigil Knight, born of a Pallid Meranth, raised in the Shadeshore Ruins. With his father executed for violating the Vigil Codex, and his mother shunned by her wild race, Sven believes that honor is to be found in no social order, but only in himself. After tending his mother through a lingering death, he offered himself as a novice to the Vigil Knights, never revealing his identity. For thirteen years he studied in his father''s school, mastering the rigid code that declared his existence an abomination. Then, on the day that should have been his In-Swearing, he seized the Outcast Blade, shattered the Sacred Helm, and burned the Codex in the Vigil''s Holy Flame. He strode from Vigil Keep, forever solitary, following his private code to the last strict rune. Still a knight, yes...but a Rogue Knight. He answers only to himself.'),
(19, 'Tiny', 'tiny', 'Strength', ''),
(20, 'Vengeful Spirit', 'vengefulspirit', 'Agility', ''),
(21, 'Windranger', 'windrunner', 'Intelligence', ''),
(22, 'Zeus', 'zuus', 'Intelligence', ''),
(23, 'Kunkka', 'kunkka', 'Strength', ''),
(25, 'Lina', 'lina', 'intelligence', ''),
(26, 'Lion', 'lion', 'intelligence', ''),
(27, 'Shadow Shaman', 'shadow_shaman', 'Intelligence', ''),
(28, 'Slardar', 'slardar', 'Strength', ''),
(29, 'Tidehunter', 'tidehunter', 'Strength', ''),
(30, 'Witch Doctor', 'witch_doctor', 'Intelligence', ''),
(31, 'Lich', 'lich', 'intelligence', ''),
(32, 'Riki', 'riki', 'Agility', ''),
(33, 'Enigma', 'enigma', 'intelligence', ''),
(34, 'Tinker', 'tinker', ' 	Intelligence', ''),
(35, 'Sniper', 'sniper', 'Agility', ''),
(36, 'Necrophos', 'necrolyte', 'Intelligence', ''),
(37, 'Warlock', 'warlock', 'Intelligence', ''),
(38, 'Beastmaster', 'beastmaster', 'Strength', ''),
(39, 'Queen of Pain', 'queenofpain', 'Intelligence', ''),
(40, 'Venomancer', 'venomancer', 'Agility', ''),
(41, 'Faceless Void', 'faceless_void', 'Agility', ''),
(42, 'Skeleton King', 'skeleton_king', 'Strength', ''),
(43, 'Death Prophet', 'death_prophet', 'Intelligence', ''),
(44, 'Phantom Assassin', 'phantom_assassin', 'Agility', ''),
(45, 'Pugna', 'pugna', 'Intelligence', ''),
(46, 'Templar Assassin', 'templar_assassin', 'Agility', ''),
(47, 'Viper', 'viper', 'Agility', ''),
(48, 'Luna', 'luna', 'Agility', ''),
(49, 'Dragon Knight', 'dragon_knight', 'Strength', ''),
(50, 'Dazzle', 'dazzle', 'Intelligence', ''),
(51, 'Clockwerk', 'rattletrap', 'Strength', ''),
(52, 'Leshrac', 'leshrac', 'intelligence', ''),
(53, 'Nature''s Prophet', 'furion', 'intelligence', ''),
(54, 'Lifestealer', 'life_stealer', 'Strength', ''),
(55, 'Dark Seer', 'dark_seer', 'Intelligence', ''),
(56, 'Clinkz', 'clinkz', 'Agility', ''),
(57, 'Omniknight', 'omniknight', 'Strength', ''),
(58, 'Enchantress', 'enchantress', 'intelligence', ''),
(59, 'Huskar', 'huskar', 'Strength', ''),
(60, 'Night Stalker', 'night_stalker', 'Agility', ''),
(61, 'Broodmother', 'broodmother', 'Agility', ''),
(62, 'Bounty Hunter', 'bounty_hunter', 'Agility', ''),
(63, 'Weaver', 'weaver', 'Agility', ''),
(64, 'Jakiro', 'jakiro', 'intelligence', ''),
(65, 'Batrider', 'batrider', ' 	Intelligence', ''),
(66, 'Chen', 'chen', 'Intelligence', ''),
(67, 'Spectre', 'spectre', 'Agility', ''),
(68, 'Ancient Apparition', 'ancient_apparition', ' 	Intelligence', ''),
(69, 'Doom', 'doom_bringer', 'Strength', ''),
(70, 'Ursa', 'ursa', 'Agility', ''),
(71, 'Spirit Breaker', 'spirit_breaker', 'Strength', ''),
(72, 'Gyrocopter', 'gyrocopter', 'Agility', ''),
(73, 'Alchemist', 'alchemist', 'Strength', ''),
(74, 'Invoker', 'invoker', 'intelligence', ''),
(75, 'Silencer', 'silencer', 'Intelligence', ''),
(76, 'Outworld Devourer', 'obsidian_destroyer', 'Intelligence', ''),
(77, 'Lycanthrope', 'lycan', 'Strength', ''),
(78, 'Brewmaster', 'brewmaster', 'Strength', ''),
(79, 'Shadow Demon', 'shadow_demon', 'Intelligence', ''),
(80, 'Lone Druid', 'lone_druid', ' 	Agility', ''),
(81, 'Chaos Knight', 'chaos_knight', 'Strength', ''),
(82, 'Meepo', 'meepo', 'Agility', ''),
(83, 'Treant Protector', 'treant', 'Strength', ''),
(84, 'Ogre Magi', 'ogre_magi', 'Intelligence', ''),
(85, 'Undying', 'undying', 'Strength', ''),
(86, 'Rubick', 'rubick', 'Agility', ''),
(87, 'Disruptor', 'disruptor', 'Intelligence', ''),
(88, 'Nyx Assassin', 'nyx_assassin', 'Agility', ''),
(89, 'Naga Siren', 'naga_siren', 'Agility', ''),
(90, 'Keeper of the Light', 'keeper_of_the_light', 'intelligence', ''),
(91, 'Wisp', 'wisp', 'Strength', ''),
(92, 'Visage', 'visage', 'Intelligence', ''),
(93, 'Slark', 'slark', 'Agility', ''),
(94, 'Medusa', 'medusa', 'Agility', ''),
(95, 'Troll Warlord', 'troll_warlord', 'Agility', ''),
(96, 'Centaur Warrunner', 'centaur', 'Strength', ''),
(97, 'Magnus', 'magnataur', 'Strength', ''),
(98, 'Timbersaw', 'shredder', 'Strength', ''),
(99, 'Bristleback', 'bristleback', 'Strength', ''),
(100, 'Tusk', 'tusk', 'Strength', ''),
(101, 'Skywrath Mage', 'skywrath_mage', 'Intelligence', ''),
(102, 'Abaddon', 'abaddon', 'Strength', ''),
(103, 'Elder Titan', 'elder_titan', 'Strength', ''),
(104, 'Legion Commander', 'legion_commander', 'Strength', ''),
(106, 'Ember Spirit', 'ember_spirit', 'Agility', ''),
(107, 'Earth Spirit', 'earth_spirit', 'Strength', ''),
(109, 'Terrorblade', 'terrorblade', 'Agility', ''),
(110, 'Phoenix', 'phoenix', 'Strength', '');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE IF NOT EXISTS `Items` (
  `IID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Idescription` text NOT NULL,
  `Iname` text NOT NULL,
  UNIQUE KEY `IID` (`IID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`IID`, `Price`, `Idescription`, `Iname`) VALUES
(0, 0, '', 'empty'),
(1, 2150, 'Basic Item.Teleport to a target spot up to 1200 unit away.', 'blink'),
(2, 0, 'Basic Item.', 'blades_of_attack'),
(3, 1200, 'Basic item. +18 Damage.', 'broadsword'),
(4, 550, 'Basic item. +5 Armory.', 'chainmail'),
(5, 0, 'Basic Item.', 'claymore'),
(6, 950, 'Basic item. +5 Armory.', 'helm_of_iron_will'),
(7, 0, 'Basic Item.', 'javelin'),
(8, 0, 'Basic Item.', 'mithril_hammer'),
(9, 0, 'Basic Item.', 'platemail'),
(10, 0, 'Basic Item.', 'quarterstaff'),
(11, 0, 'Basic Item.', 'quelling_blade'),
(12, 0, 'Basic Item.', 'ring_of_protection'),
(13, 0, 'Basic Item.', 'gauntlets'),
(14, 0, 'Basic Item.', 'slippers'),
(15, 0, 'Basic Item.', 'mantle'),
(16, 0, 'Basic Item.', 'branches'),
(17, 0, 'Basic Item.', 'belt_of_strength'),
(18, 0, 'Basic Item.', 'boots_of_elves'),
(19, 0, 'Basic Item.', 'robe'),
(20, 0, 'Basic Item.', 'circlet'),
(21, 0, 'Basic Item.', 'ogre_axe'),
(22, 0, 'Basic Item.', 'blade_of_alacrity'),
(23, 0, 'Basic Item.', 'staff_of_wizardry'),
(24, 0, 'Basic Item.', 'ultimate_orb'),
(25, 0, 'Basic Item.', 'gloves'),
(26, 0, 'Basic Item.', 'lifesteal'),
(27, 0, 'Basic Item.', 'ring_of_regen'),
(28, 0, 'Basic Item.', 'sobi_mask'),
(29, 0, 'Basic Item.', 'boots'),
(30, 0, 'Basic Item.', 'gem'),
(31, 0, 'Basic Item.', 'cloak'),
(32, 0, 'Basic Item.', 'talisman_of_evasion'),
(33, 0, 'Basic Item.', 'cheese'),
(34, 0, 'Basic Item.', 'magic_stick'),
(35, 0, 'Basic Item.', 'recipe_magic_wand'),
(36, 0, 'Basic Item.', 'magic_wand'),
(37, 0, 'Basic Item.', 'ghost'),
(38, 0, 'Basic Item.', 'clarity'),
(39, 0, 'Basic Item.', 'flask'),
(40, 0, 'Basic Item.', 'dust'),
(41, 0, 'Basic Item.', 'bottle'),
(42, 0, 'Basic Item.', 'ward_observer'),
(43, 0, 'Basic Item.', 'ward_sentry'),
(44, 0, 'Basic Item.', 'tango'),
(45, 0, 'Basic Item.', 'courier'),
(46, 0, 'Basic Item.', 'tpscroll'),
(47, 0, '', 'recipe_travel_boots'),
(48, 0, '', 'travel_boots'),
(49, 0, '', 'recipe_phase_boots'),
(50, 0, '', 'phase_boots'),
(51, 0, '', 'demon_edge'),
(52, 0, '', 'eagle'),
(53, 0, '', 'reaver'),
(54, 0, '', 'relic'),
(55, 0, '', 'hyperstone'),
(56, 0, '', 'ring_of_health'),
(57, 0, '', 'void_stone'),
(58, 0, '', 'mystic_staff'),
(59, 0, '', 'energy_booster'),
(60, 0, '', 'point_booster'),
(61, 0, '', 'vitality_booster'),
(62, 0, '', 'recipe_power_treads'),
(63, 0, '', 'power_treads'),
(64, 0, '', 'recipe_hand_of_midas'),
(65, 0, '', 'hand_of_midas'),
(66, 0, '', 'recipe_oblivion_staff'),
(67, 0, '', 'oblivion_staff'),
(68, 0, '', 'recipe_pers'),
(69, 0, '', 'pers'),
(70, 0, '', 'recipe_poor_mans_shield'),
(71, 0, '', 'poor_mans_shield'),
(72, 0, '', 'recipe_bracer'),
(73, 0, '', 'bracer'),
(74, 0, '', 'recipe_wraith_band'),
(75, 0, '', 'wraith_band'),
(76, 0, '', 'recipe_null_talisman'),
(77, 0, '', 'null_talisman'),
(78, 0, '', 'recipe_mekansm'),
(79, 0, '', 'mekansm'),
(80, 0, '', 'recipe_vladmir'),
(81, 0, '', 'vladmir'),
(84, 0, '', 'flying_courier'),
(85, 0, '', 'recipe_buckler'),
(86, 0, '', 'buckler'),
(87, 0, '', 'recipe_ring_of_basilius'),
(88, 0, '', 'ring_of_basilius'),
(89, 0, '', 'recipe_pipe'),
(90, 0, '', 'pipe'),
(91, 0, '', 'recipe_urn_of_shadows'),
(92, 0, '', 'urn_of_shadows'),
(93, 0, '', 'recipe_headdress'),
(94, 0, '', 'headdress'),
(95, 0, '', 'recipe_sheepstick'),
(96, 0, '', 'sheepstick'),
(97, 0, '', 'recipe_orchid'),
(98, 0, '', 'orchid'),
(99, 0, '', 'recipe_cyclone'),
(100, 0, '', 'cyclone'),
(101, 0, '', 'recipe_force_staff'),
(102, 0, '', 'force_staff'),
(103, 0, '', 'recipe_dagon'),
(104, 0, '', 'dagon'),
(105, 0, '', 'recipe_necronomicon'),
(106, 0, '', 'necronomicon'),
(107, 0, '', 'recipe_ultimate_scepter'),
(108, 0, '', 'ultimate_scepter'),
(109, 0, '', 'recipe_refresher'),
(110, 0, '', 'refresher'),
(111, 0, '', 'recipe_assault'),
(112, 0, '', 'assault'),
(113, 0, '', 'recipe_heart'),
(114, 0, '', 'heart'),
(115, 0, '', 'recipe_black_king_bar'),
(116, 0, '', 'black_king_bar'),
(117, 0, '', 'aegis'),
(118, 0, '', 'recipe_shivas_guard'),
(119, 0, '', 'shivas_guard'),
(120, 0, '', 'recipe_bloodstone'),
(121, 0, '', 'bloodstone'),
(122, 0, '', 'recipe_sphere'),
(123, 0, '', 'sphere'),
(124, 0, '', 'recipe_vanguard'),
(125, 0, '', 'vanguard'),
(126, 0, '', 'recipe_blade_mail'),
(127, 0, '', 'blade_mail'),
(128, 0, '', 'recipe_soul_booster'),
(129, 0, '', 'soul_booster'),
(130, 0, '', 'recipe_hood_of_defiance'),
(131, 0, '', 'hood_of_defiance'),
(132, 0, '', 'recipe_rapier'),
(133, 0, '', 'rapier'),
(134, 0, '', 'recipe_monkey_king_bar'),
(135, 0, '', 'monkey_king_bar'),
(136, 0, '', 'recipe_radiance'),
(137, 0, '', 'radiance'),
(138, 0, '', 'recipe_butterfly'),
(139, 0, '', 'butterfly'),
(140, 0, '', 'recipe_greater_crit'),
(141, 0, '', 'greater_crit'),
(142, 0, '', 'recipe_basher'),
(143, 0, '', 'basher'),
(144, 0, '', 'recipe_bfury'),
(145, 0, '', 'bfury'),
(146, 0, '', 'recipe_manta'),
(147, 0, '', 'manta'),
(148, 0, '', 'recipe_lesser_crit'),
(149, 0, '', 'lesser_crit'),
(150, 0, '', 'recipe_armlet'),
(151, 0, '', 'armlet'),
(152, 0, '', 'invis_sword'),
(153, 0, '', 'recipe_sange_and_yasha'),
(154, 0, '', 'sange_and_yasha'),
(155, 0, '', 'recipe_satanic'),
(156, 0, '', 'satanic'),
(157, 0, '', 'recipe_mjollnir'),
(158, 0, '', 'mjollnir'),
(159, 0, '', 'recipe_skadi'),
(160, 0, '', 'skadi'),
(161, 0, '', 'recipe_sange'),
(162, 0, '', 'sange'),
(163, 0, '', 'recipe_helm_of_the_dominator'),
(164, 0, '', 'helm_of_the_dominator'),
(165, 0, '', 'recipe_maelstrom'),
(166, 0, '', 'maelstrom'),
(167, 0, '', 'recipe_desolator'),
(168, 0, '', 'desolator'),
(169, 0, '', 'recipe_yasha'),
(170, 0, '', 'yasha'),
(171, 0, '', 'recipe_mask_of_madness'),
(172, 0, '', 'mask_of_madness'),
(173, 0, '', 'recipe_diffusal_blade'),
(174, 0, '', 'diffusal_blade'),
(175, 0, '', 'recipe_ethereal_blade'),
(176, 0, '', 'ethereal_blade'),
(177, 0, '', 'recipe_soul_ring'),
(178, 0, '', 'soul_ring'),
(179, 0, '', 'recipe_arcane_boots'),
(180, 0, '', 'arcane_boots'),
(181, 0, '', 'orb_of_venom'),
(182, 0, '', 'stout_shield'),
(183, 0, '', 'recipe_invis_sword'),
(184, 0, '', 'recipe_ancient_janggo'),
(185, 0, '', 'ancient_janggo'),
(186, 0, '', 'recipe_medallion_of_courage'),
(187, 0, '', 'medallion_of_courage'),
(188, 0, '', 'smoke_of_deceit'),
(189, 0, '', 'recipe_veil_of_discord'),
(190, 0, '', 'veil_of_discord'),
(191, 0, '', 'recipe_necronomicon_2'),
(192, 0, '', 'recipe_necronomicon_3'),
(193, 0, '', 'necronomicon_2'),
(194, 0, '', 'necronomicon_3'),
(195, 0, '', 'recipe_diffusal_blade_2'),
(196, 0, '', 'recipe_diffusal_blade_2'),
(197, 0, '', 'recipe_dagon_2'),
(198, 0, '', 'recipe_dagon_3'),
(199, 0, '', 'recipe_dagon_4'),
(200, 0, '', 'recipe_dagon_5'),
(201, 0, '', 'dagon_2'),
(202, 0, '', 'dagon_3'),
(203, 0, '', 'dagon_4'),
(204, 0, '', 'dagon_5'),
(205, 0, '', 'recipe_rod_of_atos'),
(206, 0, '', 'rod_of_atos'),
(207, 0, '', 'recipe_abyssal_blade'),
(208, 0, '', 'abyssal_blade'),
(209, 0, '', 'recipe_heavens_halberd'),
(210, 0, '', 'heavens_halberd'),
(211, 0, '', 'recipe_ring_of_aquila'),
(212, 0, '', 'ring_of_aquila'),
(213, 0, '', 'recipe_tranquil_boots'),
(214, 0, '', 'tranquil_boots'),
(215, 0, '', 'shadow_amulet'),
(216, 0, '', 'halloween_candy_corn'),
(217, 0, '', 'mystery_hook'),
(218, 0, '', 'mystery_arrow'),
(219, 0, '', 'mystery_missile'),
(220, 0, '', 'mystery_toss'),
(221, 0, '', 'mystery_vacuum'),
(226, 0, '', 'halloween_rapier'),
(227, 0, '', 'present'),
(228, 0, '', 'greevil_whistle'),
(229, 0, '', 'winter_stocking'),
(230, 0, '', 'winter_skates'),
(231, 0, '', 'winter_cake'),
(232, 0, '', 'winter_cookie'),
(233, 0, '', 'winter_coco'),
(234, 0, '', 'winter_ham'),
(235, 0, '', 'greevil_whistle_toggle'),
(236, 0, '', 'winter_kringle'),
(237, 0, '', 'winter_mushroom'),
(238, 0, '', 'winter_greevil_treat'),
(239, 0, '', 'winter_greevil_garbage'),
(240, 0, '', 'winter_greevil_chewy'),
(241, 0, '', 'tango_single');

-- --------------------------------------------------------

--
-- Table structure for table `Recommend`
--

CREATE TABLE IF NOT EXISTS `Recommend` (
  `Steamid` bigint(200) NOT NULL,
  `Hero0` int(11) NOT NULL,
  `Hero1` int(11) NOT NULL,
  `Hero2` int(11) NOT NULL,
  PRIMARY KEY (`Steamid`),
  UNIQUE KEY `Steamid` (`Steamid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Recommend`
--

INSERT INTO `Recommend` (`Steamid`, `Hero0`, `Hero1`, `Hero2`) VALUES
(76561198044558678, 42, 98, 103),
(76561198047054082, 28, 29, 71),
(76561198049457594, 2, 19, 102),
(76561198052582164, 96, 98, 102),
(76561198059294621, 7, 19, 59),
(76561198062987490, 7, 38, 110),
(76561198063113434, 2, 18, 97),
(76561198077027052, 2, 29, 54),
(76561198084015670, 2, 7, 69),
(76561198085461005, 49, 104, 110),
(76561198089075929, 38, 57, 77),
(76561198105759042, 14, 42, 69),
(76561198109789611, 7, 28, 51),
(76561198111599467, 23, 103, 110),
(76561198111660018, 96, 98, 99),
(76561198130553941, 42, 81, 91);

-- --------------------------------------------------------

--
-- Table structure for table `Stats`
--

CREATE TABLE IF NOT EXISTS `Stats` (
  `Steamid` bigint(200) NOT NULL,
  `mostgpm` bigint(200) NOT NULL,
  `mostgpmhero` bigint(200) NOT NULL,
  `mostkill` bigint(200) NOT NULL,
  `mostkillhero` bigint(200) NOT NULL,
  `mostdeath` bigint(200) NOT NULL,
  `mostdeathhero` bigint(200) NOT NULL,
  `mostassist` bigint(200) NOT NULL,
  `mostassisthero` bigint(200) NOT NULL,
  `longestgame` bigint(200) NOT NULL,
  `longestgamehero` bigint(200) NOT NULL,
  `totalgame` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stats`
--

INSERT INTO `Stats` (`Steamid`, `mostgpm`, `mostgpmhero`, `mostkill`, `mostkillhero`, `mostdeath`, `mostdeathhero`, `mostassist`, `mostassisthero`, `longestgame`, `longestgamehero`, `totalgame`) VALUES
(76561198109789611, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76561198077027052, 663, 11, 20, 2, 11, 2, 29, 14, 3595, 69, 30),
(76561198062987490, 488, 22, 14, 22, 12, 31, 13, 30, 2162, 30, 5),
(76561198089075929, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76561198052582164, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76561198059294621, 456, 109, 13, 32, 13, 110, 23, 110, 3332, 26, 18),
(76561198130553941, 570, 110, 16, 14, 13, 62, 34, 29, 4162, 9, 50),
(76561198111599467, 486, 1, 11, 1, 11, 47, 33, 96, 3501, 96, 15),
(76561198084015670, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76561198049457594, 609, 47, 19, 59, 14, 104, 38, 67, 4141, 104, 18),
(76561198047054082, 525, 74, 19, 74, 13, 107, 24, 7, 3560, 7, 17),
(76561198085461005, 1799, 0, 21, 93, 11, 40, 32, 40, 3698, 51, 60),
(76561198105759042, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76561198111660018, 564, 18, 24, 93, 18, 23, 20, 23, 4026, 93, 22),
(76561198063113434, 729, 104, 21, 98, 16, 27, 24, 7, 4142, 27, 37),
(76561198044558678, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76561198063704467, 570, 53, 10, 53, 8, 53, 22, 53, 2602, 53, 1),
(76561198056516984, 717, 4, 21, 4, 9, 4, 22, 106, 3346, 93, 21),
(76561198004086463, 473, 104, 9, 104, 11, 79, 22, 86, 3915, 86, 12),
(76561197994057454, 561, 34, 16, 34, 11, 5, 21, 66, 3523, 34, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `SteamID` bigint(20) NOT NULL,
  `Username` text NOT NULL,
  `Password` char(20) NOT NULL,
  `Wins` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Rank` int(11) NOT NULL,
  `lastupdate` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `UID_2` (`UID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='User table' AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UID`, `SteamID`, `Username`, `Password`, `Wins`, `Email`, `Rank`, `lastupdate`) VALUES
(1, 76561198109789611, 'test1', '0', 0, 'ewq@illinois.edu', -999, 1398715287),
(2, 76561198077027052, 'test2', '0', 0, '12312@illinois.edu', 12, 1398715304),
(3, 76561198062987490, 'yisiliu', '940528', 0, 'yisiliu2@illinois.edu', 2, 1400103123),
(4, 76561198089075929, 'test3', '0', 0, '31231@illinois.edu', -999, 1398715309),
(5, 76561198052582164, 'test4', '0', 0, '2131@illinois.edu', -999, 1398715309),
(6, 76561198059294621, 'dgcbb', '0', 0, 'zjiang20@illinois.edu', 0, 1398715319),
(7, 76561198130553941, 'woodyye', '0', 0, 'yangye2@illinois.edu', -42, 1398715346),
(8, 76561198111599467, 'zky314343421', '0', 0, 'kzhou10@illinois.edu', -6, 1398715354),
(9, 76561198084015670, 'onlinecco', '0', 0, 'das@illinois.edu', -999, 1398715355),
(10, 76561198049457594, 'qibolun', 'Qi167974542', 0, 'bolunqi2@illinois.edu', 0, 1398715365),
(11, 76561198047054082, 'jcao7', '123456', 0, 'dsa@illinois.edu', 4, 1399186277),
(12, 76561198085461005, 'LosT', 'J34g7hu3', 0, 'ruiyan2@illinois.edu', 22, 1398715407),
(13, 76561198105759042, 'zzeng11', 'JozifZ007', 0, 'zzeng11@illinois.edu', -999, 1398715408),
(14, 76561198111660018, 'daweixu2', 'leo940729', 0, 'daweixu2@illinois.edu', 0, 1398715420),
(15, 76561198063113434, 'stark1995512', '15011344651', 0, 'zli86@illinois.edu', 14, 1398715440),
(16, 76561198044558678, 'kanzy', 'rawr1', 0, 'zkan2@illinois.edu', -999, 1398715444),
(19, 76561198063704467, 'gsxy92', '12345', 0, 'gasim2@illinois.edu', -4, 1398715445),
(20, 76561198056516984, 'jonckr', 'Password1', 0, 'jkcheon2@illinois.edu', 28, 1398715457),
(21, 76561198004086463, 'zzy4ever', 'kanzy123', 0, 'zzhng112@illinois.edu', -12, 1398715464),
(22, 76561197994057454, 'CY', 'abcdef', 0, 'ctan12@illinois.edu', 6, 1398715472);

-- --------------------------------------------------------

--
-- Table structure for table `Winrate`
--

CREATE TABLE IF NOT EXISTS `Winrate` (
  `Steamid` bigint(200) NOT NULL,
  `day0` double NOT NULL,
  `day1` double NOT NULL,
  `day2` double NOT NULL,
  `day3` double NOT NULL,
  `day4` double NOT NULL,
  `day5` double NOT NULL,
  `day6` double NOT NULL,
  UNIQUE KEY `Steamid` (`Steamid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Winrate`
--

INSERT INTO `Winrate` (`Steamid`, `day0`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`) VALUES
(76561197994057454, 0, 0.666666666667, 0.5, 0.666666666667, 1, 0.5, 0),
(76561198004086463, 0, 1, 0.5, 1, 0, 0.333333333333, 1),
(76561198044558678, 0, 0, 0, 0, 0, 0, 0),
(76561198047054082, 0, 0, 0.25, 0, 0.6, 0, 1),
(76561198049457594, 0.5, 1, 0.25, 0.25, 0.5, 0.5, 1),
(76561198052582164, 0, 0, 0, 0, 0, 0, 0),
(76561198056516984, 0, 1, 0.666666666667, 0.75, 0.5, 0.5, 1),
(76561198059294621, 1, 0, 0.333333333333, 0.5, 0.6, 0.5, 0),
(76561198062987490, 0, 0, 1, 0, 0, 0, 0),
(76561198063113434, 0.5, 0.5, 0.857142857143, 0.4, 0.454545454545, 1, 0.6),
(76561198063704467, 0, 0, 0, 0, 0, 0, 0),
(76561198077027052, 1, 0.333333333333, 1, 0.6, 0, 0.666666666667, 0.333333333333),
(76561198078998944, 0, 0, 0, 0, 0, 0, 0),
(76561198084015670, 0, 0, 0, 0, 0, 0, 0),
(76561198085461005, 0.428571428571, 0.666666666667, 0.555555555556, 0.4, 0.625, 0.454545454545, 0.666666666667),
(76561198089075929, 0, 0, 0, 0, 0, 0, 0),
(76561198105759042, 0, 0, 0, 0, 0, 0, 0),
(76561198109789611, 0, 0, 0, 0, 0, 0, 0),
(76561198111599467, 0, 0.5, 1, 0, 0.333333333333, 1, 0.333333333333),
(76561198111660018, 0, 0.25, 1, 0.75, 0.4, 0.6, 0.5),
(76561198130553941, 0.5, 0.333333333333, 0.4, 0.333333333333, 0.363636363636, 0.375, 0.5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
